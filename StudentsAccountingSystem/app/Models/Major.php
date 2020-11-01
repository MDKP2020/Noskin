<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GroupPattern;

class Major extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function groupPatterns() {
        return $this->hasMany(GroupPattern::class);
    }
}
