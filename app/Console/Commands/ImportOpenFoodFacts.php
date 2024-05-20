<?php

namespace App\Console\Commands;

use App\Models\Food;
use App\Models\Import;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class ImportOpenFoodFacts extends Command
{
    protected $signature = 'app:import-open-food-facts';
    protected $description = 'Command description';
    private string $url = 'https://challenges.coode.sh/food/data/json/';

    public function handle()
    {
        $files = $this->getFilesToUpdate();
        $this->importFoods($files);
    }

    private function getFilesToUpdate(): Collection
    {
        $data = collect(preg_split('/\s*\R/', rtrim(Http::get($this->url . 'index.txt')->body())));
        $import = Import::whereDate('updated_at', Carbon::now())->get()->pluck('file');
        return $data->diff($import);
    }

    private function getDataFromFile(string $url): array
    {
        $gz = gzopen($url, 'r');
        $txt = '';
        while (!gzeof($gz)) {
            $txt .= gzread($gz, 1024);
        }
        gzclose($gz);
        return preg_split('/\s*\R/', rtrim($txt));
    }

    private function saveFoods(array $data): void
    {
        $limit = 100;
        foreach ($data as $json) {
            if ($json = json_decode($json, true)) {
                $json['code'] = preg_replace('/[^0-9]/', '', $json['code']);
                Food::updateOrCreate(['code' => $json['code']], $json);
                $limit--;
            }
            if ($limit == 0) break;
        }
    }

    private function importFoods(Collection $files): void
    {
        foreach ($files as $file) {
            $import = Import::updateOrCreate(['file' => $file], ['file' => $file]);
            $import->updated_at = Carbon::now();
            $import->save();
            $this->info("Importing $file...");
            $data = $this->getDataFromFile($this->url . $file);
            $this->saveFoods($data);
        }
    }
}
