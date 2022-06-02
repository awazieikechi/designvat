<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [

        'deposits',
        'date',
        'withrawals',
        'customer_id',
        'user_id',
        'transaction_type'

    ];

    public function customer()
    {

        return $this->belongsTo(Customer::class);
    }

    protected static function booted()
    {
        static::creating(function ($bank) {
            $bank->user_id = Auth::id();
        });

       
        
       
    }
}
