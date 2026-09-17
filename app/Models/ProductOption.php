<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $primaryKey = 'option_id';
    protected $guarded = [];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    public function orderItemOptions()
    {
        return $this->hasMany(OrderItemOption::class, 'option_id', 'option_id');
    }
}
