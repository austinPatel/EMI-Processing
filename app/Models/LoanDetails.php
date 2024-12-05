<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LoanDetails extends Model
{
    use HasFactory;
        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string,float,date>
     */
    protected $fillable = [
        'num_of_payment',
        'first_payment_date',
        'last_payment_date',
        'loan_amount',
    ];
}
