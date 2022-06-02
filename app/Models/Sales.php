<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [

        'type',
        'date',
        'service_id',
        'customer_id',
        'user_id',
        'loan_amount',
        'revenue_amount',

    ];

    public function customer()
    {

        return $this->belongsTo(Customer::class);
    }

    public function service()
    {

        return $this->belongsTo(Service::class, 'service_id');
    }

    protected static function booted()
    {
        static::creating(function ($sales) {
            $sales->user_id = Auth::id();
        });

    }
}
