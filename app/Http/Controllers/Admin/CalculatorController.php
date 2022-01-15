<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Calculator;
use App\Models\Contract;
use App\Models\HomePrice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calculators =Calculator::query()->paginate(6);
        $search="";
        return view('admin.calculator.calculators', compact('calculators','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  // $employees = DB::table('employees')->where('status', 1)->select('id', DB::raw("CONCAT(employees.name,' ',employees.family) AS full_name"))->get()->pluck('full_name', 'id');
      //  $homes = DB::table('homes')->select('id', DB::raw("CONCAT( 'بلوک' , homes.district,' واحد ',homes.unit) AS full_name"))->get()->pluck('full_name', 'id');

    //    return view('dmin.calculator.create_calculator', compact('employees', 'homes'));
       //eturn view('admin.calculator.calculators', compact('calculators','search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $price= Contract::home_price();
        $h="";
        $i=0;
        foreach ($price as $sku)
        {
            $fDate=$sku->from_date;
            $tDate=$sku->to_date;
            $sDate=$sku->start_date;
            $eDate=$sku->end_date;
            if (($sDate >= $fDate) && ($eDate <= $tDate))
            {
                $f_interval = Carbon::parse($fDate);
                $t_interval =Carbon::parse( $tDate);
                $diff_date= $f_interval->diffInDays($t_interval);

                $r=($sku->price)/$diff_date;
                $c=($sku->Compensatory)/$diff_date;
                $s_interval = Carbon::parse($sDate);
                $e_interval =Carbon::parse( $eDate);
                $diff= $s_interval->diffInDays($e_interval);
                $money_rent= $r*$diff;
                $money_Compensatory=$c*$diff;
                $calculator = Calculator::query()->create([
                    'contract_id'=>$sku->id,
                    'rent_money' => $money_rent,
                  ' Compensatory_money' => $money_Compensatory,

                ]);
                return redirect()->back()->with('message', 'قرارداد با موفقیت ایجاد شد ');

            }

        }




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calculator = Calculator::query()->find($id);
        return view('admin.calculator.update_calculator', compact('calculator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
   // public function searchCalculator(Request $request)
   // {

  //  }
    public function exportExel(Request $request)
    {

    }

    public function calculatorRent()
    {

   $price= Contract::home_price();
        $h="";
        $i=0;
        foreach ($price as $sku)
        {
            $fDate=$sku->from_date;
            $tDate=$sku->to_date;
            $sDate=$sku->start_date;
            $eDate=$sku->end_date;
            if (($sDate >= $fDate) && ($eDate <= $tDate))
            {
                $f_interval = Carbon::parse($fDate);
                $t_interval =Carbon::parse( $tDate);
               $diff_date= $f_interval->diffInDays($t_interval);

              $r=($sku->price)/$diff_date;
              $c=($sku->Compensatory)/$diff_date;
                $s_interval = Carbon::parse($sDate);
                $e_interval =Carbon::parse( $eDate);
                $diff= $s_interval->diffInDays($e_interval);
                $money_rent= $r*$diff;
                $money_Compensatory=$c*$diff;


            }

        }


    }

    public function searchCalculator(Request  $request)
    {

        $price= Contract::home_price();
        
        //dd($price);
        foreach ($price as $sku)
        {
            $fDate=$sku->from_date;
            $tDate=$sku->to_date;
            $sDate=$sku->start_date;
            $eDate=$sku->end_date;
            if (($sDate >= $fDate) && ($eDate <= $tDate))
            {
                $f_interval = Carbon::parse($fDate);
                $t_interval =Carbon::parse( $tDate);
                $diff_date= $f_interval->diffInDays($t_interval);

                $r=($sku->price)/$diff_date;
                $c=($sku->Compensatory)/$diff_date;
                $s_interval = Carbon::parse($sDate);
                $e_interval =Carbon::parse( $eDate);
                $diff= $s_interval->diffInDays($e_interval);
                $moneyRent= $r*$diff;
                $moneyCompensatory=$c*$diff;

                $calculator = Calculator::query()->create([
                    'contract_id'=>$sku->id,
                    'rent_money' => $moneyRent,
                    'Compensatory_money' => $moneyCompensatory,
                    'money'=>$moneyCompensatory+$moneyRent,

                ]); return redirect()->back()->with('message', 'قرارداد با موفقیت ایجاد شد ');

            }

        }
    }
}
