<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class addToCart extends Model
{
    use Notifiable;

    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = ['user_id' , 'product_id' , 'quantity'];



}
