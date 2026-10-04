<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable , HasFactory;

    use SoftDeletes;

    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'image',
        'age',
        'phone'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }


    public function UserProducts()
    {
        return $this->belongsToMany(Product::class , 'add_to_carts')
            ->withPivot('quantity')
            ->withTimestamps();
    }



}
