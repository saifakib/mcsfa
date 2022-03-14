<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HTTP;
use DateTime;

class CPFController extends Controller
{
    public function allemployee_apidata() {
        $response = Http::get("http://192.168.3.8:8085/ords/hrm/employees/v_emp?limit=1000");
        $decoded = json_decode($response, true);
        return $decoded;
    }

    public function allaccounts_apidata() {
        $response = Http::get("http://192.168.3.15:8082/ords/mcs/cha_of_acc_cpf");
        $decoded = json_decode($response, true);
        return $decoded;
    }



    /********** Opening Banalce ***********/ 
    public function openingBlnCre() {
        $data=[
            'getProjects'=>DB::table('FA_PROJECTS')->get(),
            'emoployees'=>$this->allemployee_apidata(),
            'accounts'=>$this->allaccounts_apidata(),
        ];
        return view('layouts.mcsfa.createOpeningBalance', $data);
    }

    public function openingBalance()
    {
        $data = [
            'getopnbalances'=>DB::table('FA_CPFOPNBAL')->leftJoin('FA_PROJECTS', 'FA_CPFOPNBAL.project_id', '=', 'FA_PROJECTS.project_id')->get(),
        ];
        return view('layouts.mcsfa.openingBalance', $data);
    }

    public function openingbanalaceSaveUpdate(Request $request)
    {
        $taskstatus = $request->taskstatus;
        $opnblnid = $request->dataid;

        $data = [
            'project_id' => $request->project_id,
            'employee_id' => $request->employee_id,
            'vdate' => $request->vdate,
            'acc_name' => $request->acc_name,
            'init_bal' => $request->init_bal,
            'bal_type' => $request->bal_type,
        ];

        if($taskstatus == 'save') {
            DB::table('FA_CPFOPNBAL')->insert($data);
            $message = 'Saved';
        }
        else {
            DB::table('FA_CPFOPNBAL')->where('opnblnid', $opnblnid)->update($data);
            $message = 'Updated';
        }
        $notification = array(
            'message' => "Opening Balance Info $message Succesfully",
            'alert-type' => 'success'
        );
        return redirect('/openingbalance')->with($notification);
    }

    public function editServiceInfo($id){
        $data=[
            'getProjects'=>DB::table('FA_PROJECTS')->get(),
            'emoployees'=>$this->allemployee_apidata(),
            'accounts'=>$this->allaccounts_apidata(),
            'getopnbal'=>DB::table('FA_CPFOPNBAL')->where('opnblnid', $id)->first(),
        ];
        return view('layouts.mcsfa.updateOpeningBalance', $data);
    }

    public function deleteOpeningBalance($id){
       DB::table('FA_CPFOPNBAL')->where('opnblnid', $id)->delete();
       $notification = array(
        'message' => "Opening Balance Info Deleted Succesfully",
        'alert-type' => 'success'
        );
        return redirect('/openingbalance')->with($notification);
    }
}
