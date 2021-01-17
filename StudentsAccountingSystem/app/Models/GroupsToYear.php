<?php

namespace App\Models;

use App\ModelFilters\GroupsToYearFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class GroupsToYear extends Model
{
    use Filterable;

    protected $table = 'groups_to_years';
    protected $guarded = [];
    public $timestamps = false;

    public static function allGrades()
    {
        return self::select('grade')->groupBy('grade')->get()->pluck('grade')->toArray();
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function modelFilter()
    {
        return $this->provideFilter(GroupsToYearFilter::class);
    }
}
