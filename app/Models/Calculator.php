<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculator extends Model
{
    use HasFactory;
    protected $fillable=[
        'contract_id',
        'rent_money',
        'Compensatory_money',
        'money',



    ];

    public function contract()
    {
        return $this->hasMany(Contract::class);


    }

}
