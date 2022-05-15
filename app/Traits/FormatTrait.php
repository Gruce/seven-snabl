<?php
namespace App\Traits;
use Illuminate\Database\Eloquent\Casts\Attribute;


trait FormatTrait {
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
}
