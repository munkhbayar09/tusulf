<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemOption extends Model
{
    protected $primaryKey = 'order_item_option_id';
    protected $guarded = [];
    public $timestamps = false;

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'order_item_id', 'order_item_id');
    }

    public function productOption()
    {
        return $this->belongsTo(ProductOption::class, 'option_id', 'option_id');
    }
}
