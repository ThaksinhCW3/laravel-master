<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image'
    ];

    // Correct foreign key here: products reference category_id
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');  // Correct foreign key
    }
}