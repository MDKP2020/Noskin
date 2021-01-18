<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static find(int $id)
 * @method static where(string $column, string $operation, string $value)
 */
class Major extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function groupPatterns()
    {
        return $this->hasMany(GroupPattern::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
