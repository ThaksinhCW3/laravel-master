<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'category_id'   // Ensure 'category_id' is fillable
    ];

    // Correct the foreign key for 'category_id' here
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');  // Reference category_id
    }
}
