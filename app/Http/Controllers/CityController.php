<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
class CityController extends Controller
{
    use LazilyRefreshDatabase;

    public function __invoke(Request $request): Collection
    {
        return City::modelSelect($request->search , $request->selected)->get();
    }
}
