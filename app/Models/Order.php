<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    protected $fillable = [

        'user_id',
        'name',
        'email',
        'phone',

        'country',
        'state',
        'district',
        'city',
        'pincode',

        'house_no',
        'area',
        'landmark',

        'address',

        'total_amount',
        'payment_method',
        'status',

        'delivered_at',

        'return_request_status',
        'return_approval_status',
        'return_process_status'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}