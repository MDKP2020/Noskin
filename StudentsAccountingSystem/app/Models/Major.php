<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GroupPattern;
use App\Models\Group;

/**
 * @method static find(int $id)
 */
class Major extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function groupPatterns() {
        return $this->hasMany(GroupPattern::class);
    }

    public function groups() {
        return $this->hasMany(Group::class);
    }
}
