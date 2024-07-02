<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;
    protected $table = 'bills'; // Tên của bảng
    /**
     * Accessor cho trường buy_date để định dạng ngày tháng
     *
     * @param  string  $value
     * @return string|null
     */
    public function getBuyDateAttribute($value)
    {
        if ($value) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        }
        return null;
    }
    /**
     * Accessor cho trường delivery_date để định dạng ngày tháng
     *
     * @param  string  $value
     * @return string|null
     */
    public function getDeliveryDateAttribute($value)
    {
        if ($value) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        }
        return null;
    }

    /**
     * Accessor cho trường estimated_delivery_date để định dạng ngày tháng
     *
     * @param  string  $value
     * @return string|null
     */
    public function getEstimatedDeliveryDateAttribute($value)
    {
        if ($value) {
            return Carbon::createFromFormat('Y-m-d', $value)->format('d/m/Y');
        }
        return null;
    }
    protected $fillable = [
        'bill_name',
        'bill_type',
        'user_id',
        'email',
        'address',
        'promotion_id',
        'buy_date',
        'cost',
        'discount_price',
        'shipping_fee',
        'qr_code',
        'note',
        'estimated_delivery_date',
        'delivery_date',
        'recipient_name',
        'create_date',
        'update_date',
        'status',
    ];

    public $timestamps = false; // Tắt timestamps mặc định
    const CREATED_AT = 'create_date';
    const UPDATED_AT = 'update_date';
}
