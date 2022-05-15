<?php

namespace App\Http\Controllers;


use App\Models\GiveType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;

class SelectController extends Controller
{
    use LazilyRefreshDatabase;
    public function cities(Request $request): Collection
    {
        // return City::modelSelect($request->search , $request->selected)->get();

        return City::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->selected,
                fn (Builder $query) => $query->whereIn('id', $request->selected),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();
    }

    public function giveTypes(Request $request): Collection
    {
        // return GiveType::modelSelect($request->search , $request->selected)->get();
        return GiveType::query()
            ->select('id', 'name')
            ->orderBy('name')
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->selected,
                fn (Builder $query) => $query->whereIn('id', $request->selected),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();
    }


}
