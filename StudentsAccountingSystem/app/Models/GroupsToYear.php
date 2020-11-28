<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupsToYear extends Model
{
    protected $table = 'groups_to_years';
    protected $guarded = [];
    public $timestamps = false;

    public static function allGrades() {
        return self::select('grade')->groupBy('grade')->get()->pluck('grade')->toArray();
    }
}
