<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_id',
        'import_price_product_detail',
        'price_product_detail',
        'color_id',
        'size_id',
        'fabric_id',
        'description',
        'quantity',
        'note',
        'slug',
        'status',
    ];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function fabric()
    {
        return $this->belongsTo(Fabric::class);
    }
}
