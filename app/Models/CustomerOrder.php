<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'serviceType',
        'shippingOption',
        'kilo',
        'detergent',
        'fabcon',
        'bleach',
        'plastic',
        'serviceStatus',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
