<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'email', 'phone_number', 'address', 'product', 'status', 'total'
    ];

    // Mutator to convert array to comma-separated string before saving
    public function setProductAttribute($value)
    {
        $this->attributes['product'] = implode(',', $value);
    }

    // Accessor to convert comma-separated string to array after retrieving
    public function getProductAttribute($value)
    {
        return explode(',', $value);
    }
}
