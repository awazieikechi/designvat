<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'expense_category',
        'expense_detail',
        'quantity',
        'unit_price',
        'total_cost',
    ];
}
