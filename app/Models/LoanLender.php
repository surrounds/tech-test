<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanLender extends Model
{
    protected $fillable = [
        'user_id',
        'name',
    ];
}
