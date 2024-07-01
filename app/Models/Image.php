<?php

namespace App\Models;


use App\Models\ProductDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_detail_id',
        'name_image',
        'url',
        'create_date',
        'update_date',
    ];

    public $timestamps = false;

    // Định nghĩa mối quan hệ với model ProductDetail
    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
