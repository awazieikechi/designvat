<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'customer_first_name',
        'customer_middle_name',
        'customer_surname',
        'customer_photo',
        'customer_email',
        'phone_number',
        'gender',
        'address',
        'customer_state',
        'customer_local_government',
        'customer_business_type',
        'customer_business_address',
        'customer_business_description',
        'marital_status',
        'occupation',
        'next_kin_name',
        'next_kin_address',
        'next_kin_phone_number',
        'customer_guarantor_name',
        'customer_guarantor_address',
        'customer_guarantor_phone_no',
        'other_transactions',
        'account_balance',
        'created_at',
        'updated_at',
        'branch_id',
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function transactions()
    {

        return $this->hasMany(Bank::class);
    }

    public function sales()
    {

        return $this->hasMany(Sale::class);
    }

    protected static function booted()
    {
        static::creating(function ($customer) {
            $customer->user_id = Auth::id();
            $customer->branch_id = auth()->user()->branch_id;
        });

        static::updating(function ($customer) {
            return $customer->customer_photo;
        });
    }
}
