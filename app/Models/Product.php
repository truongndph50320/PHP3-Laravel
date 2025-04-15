<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    public $timestamps = false;
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'image',
        'category_id',
        'description',
        'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeActive($query)
    {
        return $query->whereHas('category', function ($q) {
            $q->where('status', 1);
        });
    }
}
