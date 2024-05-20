<?php

namespace App\Http\Api;

use App\Models\Food as FoodModels;
use Illuminate\Http\Request;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Illuminate\Support\Facades\Auth;

class Food extends Controller
{
    use DisableAuthorization;

    protected $model = FoodModels::class;

    public function resolveUser()
    {
        return Auth::guard('sanctum')->user();
    }

    protected function keyName(): string
    {
        return 'code';
    }

    protected function afterDestroy(Request $request, $food)
    {
        $food->status = 'trash';
        $food->save();
    }
}
