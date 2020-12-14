<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentToGroup extends Model
{
    use Filterable;

    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'student_to_group';
}
