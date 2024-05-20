<?php

namespace App\Http\Api;

use App\Models\Food;
use Orion\Http\Controllers\Controller;
use Orion\Concerns\DisableAuthorization;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    use DisableAuthorization;

    protected $model = Food::class;

    public function resolveUser()
    {
        return Auth::guard('sanctum')->user();
    }

    protected function keyName(): string
    {
        return 'code';
    }
}
