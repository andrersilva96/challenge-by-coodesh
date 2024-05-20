<?php

namespace App\Http\Api;

use App\Http\Controllers\Controller;
use App\Models\Import;

class GetImport extends Controller
{
    public function __invoke(): mixed
    {
        return Import::all();
    }
}
