<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupPattern extends Model
{
    protected $table = 'group_patterns';
    protected $guarded = [];
    public $timestamps = false;

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
