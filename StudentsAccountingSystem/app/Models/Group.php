<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Major;
use App\Models\GroupPattern;

class Group extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function major() {
        return $this->belongsTo(Major::class);
    }

    public function pattern() {
        return $this->belongsTo(GroupPattern::class);
    }
}
