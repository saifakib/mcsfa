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







        /********** Opening Banalce ***********/ 
        public function subOpeningBlnCre() {
            $data=[
                'getProjects'=>DB::table('FA_PROJECTS')->get(),
                'emoployees'=>$this->allemployee_apidata(),
                'accounts'=>$this->allaccounts_apidata(),
            ];
            return view('layouts.mcsfa.createSubOpeningBalance', $data);
        }

        public function getemporsupplier(Request $request) {
            $value = $request->get('value');
   
            if($value == 'employee') {
                $employees = $this->allemployee_apidata();
                echo'<option value = "">Select Employee</option>';
                foreach ($employees['items'] as $values) {
                    echo'<option name="emporsup_id" value = "' . $values['employe_id'] . '">' . $values['employe_registration_number'] . $values['name_english'] . $values['designation'] .'</option>';
                }
            } else {
                $supliers = DB::table('FA_SUPLIERTYPELIST')->get();
                echo'<option value = "">Select Supplier</option>';
                foreach ($supliers as $value) {
                    echo'<option name="emporsup_id" value = "' . $value->suptypeid . '">' . $value->suplier_code .' => '. $value->supp_name .'</option>';
                }
            }
        }
        public function subopeningBalance()
        {
            $data = [
                'getsubopnbalances'=>DB::table('FA_CPFSUBOPNBAL')->leftJoin('FA_PROJECTS', 'FA_CPFSUBOPNBAL.project_id', '=', 'FA_PROJECTS.project_id')->get(),
            ];
            return view('layouts.mcsfa.subOpeningBalance', $data);
        }
    
        public function subopeningbanalaceSaveUpdate(Request $request)
        {
            $taskstatus = $request->taskstatus;
            $subopnblnid = $request->dataid;
    
            $data = [
                'project_id' => $request->project_id,
                'emporsup_id' => $request->emporsup_id,
                'acc_for' => $request->acc_for,
                'acc_code' => $request->acc_code,
                'bal_type' => $request->bal_type,
                'bal' => $request->bal,
            ];
    
            if($taskstatus == 'save') {
                DB::table('FA_CPFSUBOPNBAL')->insert($data);
                $message = 'Saved';
            }
            else {
                DB::table('FA_CPFSUBOPNBAL')->where('subopnblnid', $subopnblnid)->update($data);
                $message = 'Updated';
            }
            $notification = array(
                'message' => "Sub Opening Balance Info $message Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/subopeningbalance')->with($notification);
        }
    
        // public function editServiceInfo($id){
        //     $data=[
        //         'getProjects'=>DB::table('FA_PROJECTS')->get(),
        //         'emoployees'=>$this->allemployee_apidata(),
        //         'accounts'=>$this->allaccounts_apidata(),
        //         'getopnbal'=>DB::table('FA_CPFOPNBAL')->where('opnblnid', $id)->first(),
        //     ];
        //     return view('layouts.mcsfa.updateOpeningBalance', $data);
        // }
    
        public function deleteSubOpeningBalance($id){
           DB::table('FA_CPFSUBOPNBAL')->where('subopnblnid', $id)->delete();
           $notification = array(
            'message' => "Sub Opening Balance Info Deleted Succesfully",
            'alert-type' => 'success'
            );
            return redirect('/subopeningbalance')->with($notification);
        }
}
