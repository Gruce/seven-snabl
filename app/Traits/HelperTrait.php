<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;


trait HelperTrait {
    protected function formatDate(): Attribute {
        return Attribute::make(
            get: function () {
                return $this->created_at->format('Y-m-d');
            },
        );
    }

    protected function scopeWhereExist($query, $column, $value = null ,$operator = '=') {
        if(is_array($column) && array_key_exists('search' , $column)) unset($column['search']);

        if (is_array($column)) foreach ($column as $value) $query->whereExist($value[0],$value[1],count($value) == 3 ? $value[2] : $operator);
        elseif ($value) {
            $column = explode('.', $column);

            if (isset($column[1]))
                $query->whereRelation($column[0], $column[1], $operator ,$value);
            else $query->where($column[0], $operator ,$value);
        }
    }

    protected function scopeModelSelect($query , $search = null , $selected = null){
        $this->query()
        ->select('id', 'name')
        ->orderBy('name')
        ->when(
            $search,
            fn (Builder $q) => $q
                ->where('name', 'LIKE', '%' . $search . '%')
        )
        ->when(
            $selected,
            fn (Builder $q) => $q->whereIn('id', $selected),
            fn (Builder $q) => $q->limit(10)
        );
    }
}
