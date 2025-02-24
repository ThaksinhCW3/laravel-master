<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

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
        'category_id'
    ];
    // In Product model
    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

}
