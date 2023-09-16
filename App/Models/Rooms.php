<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    public $timestamps = false;
    protected $table = 'room';
    protected $fillable = ['id', 'type', 'bedding', 'place', 'cusid'];
}
