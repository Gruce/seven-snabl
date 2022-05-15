<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use App\Models\{
    GiveType,
    City,
};

class SelectController extends Controller
{
    use LazilyRefreshDatabase;

    public function cities(Request $request): Collection {
        return City::modelSelect($request->search , $request->selected)->get();
    }

    public function giveTypes(Request $request): Collection {
        return GiveType::modelSelect($request->search , $request->selected)->get();
    }


}
