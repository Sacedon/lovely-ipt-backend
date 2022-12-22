<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['fname', 'lname', 'age', 'address'];

    function loans(){
        return $this->hasMany('App\Models\Loan', 'client_id');
    }
}
