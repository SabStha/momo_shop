<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;

    protected $fillable = ['customer_id','customer_name', 'customer_phone', 'customer_address', 'total_amount', 'status'];

    public function items() {
        return $this->hasMany(OrderItem::class);
    }
}
