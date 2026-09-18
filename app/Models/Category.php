<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['department']; // alow database to storage new data fome website

    public $timestamps = false;
}
