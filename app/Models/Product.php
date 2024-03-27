<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'description', 'price',
    ];

    // Define the relationship with UserRating
    public function userRatings()
    {
        return $this->hasMany(UserRating::class);
    }
}