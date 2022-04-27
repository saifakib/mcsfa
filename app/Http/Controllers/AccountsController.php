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
}
