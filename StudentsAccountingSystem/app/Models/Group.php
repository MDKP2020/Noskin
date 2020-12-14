<?php

namespace App\Models;

use App\ModelFilters\GroupFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Major;
use App\Models\GroupPattern;

class Group extends Model
{
    use Filterable;

    protected $guarded = [];
    public $timestamps = false;

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function pattern()
    {
        return $this->belongsTo(GroupPattern::class, 'group_pattern_id', 'id');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_to_group', 'group_id', 'student_id')
            ->withPivot('start_date', 'end_date');
    }

    public function years()
    {
        return $this->hasMany(GroupsToYear::class, 'group_id', 'id');
    }

    public function getGradeAttribute()
    {
        if($this->relationLoaded('years')) {
            return $this->years()->first()->grade ?? null;
        }
    }

    public function modelFilter()
    {
        return $this->provideFilter(GroupFilter::class);
    }
}
