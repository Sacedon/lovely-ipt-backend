<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $fillable = ['client_id', 'ammount', 'loan_date', 'due_date'];

    function clients(){
        return $this->belongsTo('App\Models\Client', 'client_id');
    }
}
