<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class GroupFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function major($majorId) {
        return $this->where('major_id', $majorId);
    }

    public function grade($grade) {
        return $this->related('years', 'grade', $grade);
    }

    public function year_id($year_id) {
        return $this->related('years', 'year_id', $year_id);
    }
}
