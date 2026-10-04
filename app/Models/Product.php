<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    public $timestamps = false;

    use SoftDeletes;

    use HasFactory , Notifiable;

    protected $fillable = [   // alow database to storage new data fome website
        'name',
        'price',
        'image',
        'size',
        'category_id'
    ];


    public function category() //relationShip between category (1) <------> (m) Product
    {
        return $this->belongsTo(Category::class);
    }


    public function UserProducts() //relationShip between Users (m) <------> (m) Products
    {
        return $this->belongsToMany(User::class , 'add_to_carts')
            ->withPivot('quantity')
            ->withTimestamps();
    }



}


