<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class GroupsToYearFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function major($majorId) {
        return $this->related('group', 'major_id', $majorId);
    }

    public function grade($grade) {
        return $this->where( 'grade', $grade);
    }

    public function year($year_id) {
        return $this->where('year_id', $year_id);
    }
}
