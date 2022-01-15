<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contract extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_id',
        'home_id',
        'start_date',
        'end_date',
        'status',
        'description'


    ];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
    public function home()
    {
        return $this->belongsTo(Home::class);
    }
    public function calculator()
    {
        return $this->belongsTo(Calculator::class);
    }
     public function home_price()
     {
     $price=DB::table('contracts')
         ->join('homes','contracts.home_id','=','homes.id')
         ->join('home_prices','homes.home_kind_id','=','home_prices.home_kind_id')
         ->select('home_prices.from_date','home_prices.to_date','homes.id','contracts.id','contracts.start_date'
         ,'contracts.end_date','home_prices.Compensatory','home_prices.price','contracts.end_date')->distinct()
      //   ->whereBetween( 'contracts.start_date',['home_prices.from_date','home_prices.to_date'],'and')
         ->Where('home_prices.status','=',1)
         ->get();


     return $price;
 }


}
