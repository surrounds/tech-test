<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
        'user_id',
        'loan_lender_id',
        'loan_borrower_id',
        'name',
        'amount',
        'rate',
        'duration',
    ];
}
