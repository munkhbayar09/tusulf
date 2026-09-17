<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $primaryKey = 'staff_id';
    protected $guarded = [];
    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'staff_id', 'staff_id');
    }
}
