<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HTTP;
use AmrShawky\LaravelCurrency\Facade\Currency;

class AccountsController extends Controller
{
    public function payblepayment() {
        $data = [
            'getProjects'=>DB::table('FA_PROJECTS')->get(),
            'accounts'=>DB::table('FA_CHARTACCODES')->get(),
            'getPayblePaymentsVou'=>[]
        ];
        return view('layouts.mcsfa.paybleAccountPayment',$data);
    }

    public function payblePaymentSearch(Request $request) {
        $taskstatus = $request->taskstatus;
        $project_code = $request->project_code;
        $accode = $request->acc_code;
        $vdate = $request->v_date;
        $employee = 'Employee';

        $data = [
            'getProjects'=>DB::table('FA_PROJECTS')->get(),
            'accounts'=>DB::table('FA_CHARTACCODES')->get(),
            'getPayblePaymentsVou'=>DB::table('FA_VOUCHER')
            ->leftJoin('FA_VOUCHERS', 'FA_VOUCHER.newid', '=', 'FA_VOUCHERS.vcid')
            ->where('project_code', $project_code)
            ->where('vdate', $vdate)
            ->where('accode',$accode)
            ->get(),
        ];
        return view('layouts.mcsfa.paybleAccountPayment',$data);
    }







    /********************** Salary Bill  ***********************/
    
    public function salaryBill() {
        return view('layouts.mcsfa.salaryBill'); 
    }


    //****************Salary Statement ****************** */
    public function salaryStatement() {
        return view('layouts.mcsfa.satest');
    }
    public function allsalarystatement(Request $request) {
        // $month = $request->month . '-' . date('Y');
        // $task = $request->task;
        //$result = DB::table('FA_SALARY')->where('salalrymonth', $month)->count();
        // if ($result == 0) {
        //     $notification = array(
        //         'message' => "Result Not Found!",
        //         'alert-type' => 'error'
        //     );
        //     return redirect('/')->with($notification);
        // }
        $month = 'April-2022';
        $data = [
            'month' => $month,
            'monthdata' => $month,
            'salarystatement' => DB::table('FA_SALARY')->where('salalrymonth', $month)->get(),
        ];
        return view('layouts.mcsfa.monthstate', $data);
    }



    //*****************  Leadge **************************//
    public function viewleadge() {
        return view('leadgeStatement');
    }


    //*********Currecncy Converter*************** */

    public function currencyConverter() 
    {
        return view('layouts.mcsfa.currencyConverter');
    }
    public function postcurrencyConverter(Request $request) 
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $amount= $request->get('amount');

        $converted=Currency::convert()
            ->from($from)
            ->to($to)
            ->amount($amount)
            ->get();
        return $converted;
    }



    /*********Reconcillation Page Design*************/
    public function reconcillation() {
        return view('layouts.mcsfa.reconcillation');
    }

    //********Cash Flow  *********************/
    public function cashflow() {
        return view('layouts.mcsfa.cashflow');
    }

    //********** Trial Balance ***************/
    public function trialbalance() {
        return view('layouts.mcsfa.trialbalance');
    }

    public function trialbalance2() {

        $result = DB::table('FA_VOUCHERSALT')
        ->get()
        ->groupBy('pcode')
        ->groupBy('ccode')
        ->groupBy('scode');
        // foreach($result as $value){
        //     echo $value->scode.'<br>';
        // }

        echo '<pre>';
        print_r($result);
        exit();
        $data = [
            'codes'=>$result
        ];
        return view('layouts.mcsfa.trialbalance', $data);
    }

    public function balancesheet() {
        // $response = DB::table('FA_VOUCHERSALT')
        // ->where('voucher_coapc', 1000000)
        // ->get()
        // ->groupBy('voucher_coacc');

        $response = DB::table('FA_VOUCHERSALT')
        ->where('voucher_coapc', 2000000)
        ->get()
        ->groupBy('voucher_coacc');
        

        $response = json_decode($response);

        echo '<pre>';
        print_r($response);
        //print_r(gettype($response));
        exit();
    }
 }
 