<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HTTP;
use DateTime;
use PDF;

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
                    echo'<option name="emporsup_id" value = "' . $values['employe_id'] . '">' . $values['employe_registration_number'].' => '. $values['name_english'] .' => '. $values['designation'] .'</option>';
                }
            } else {
                $supliers = DB::table('FA_SUPLIERLIST')->get();
                echo'<option value = "">Select Supplier</option>';
                foreach ($supliers as $value) {
                    echo'<option name="emporsup_id" value = "' . $value->suptype . '">' . $value->supcode .' => '. $value->supname .'</option>';
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
            $subopnbalid = $request->dataid;
    
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
                DB::table('FA_CPFSUBOPNBAL')->where('subopnbalid', $subopnbalid)->update($data);
                $message = 'Updated';
            }
            $notification = array(
                'message' => "Sub Opening Balance Info $message Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/subopeningbalance')->with($notification);
        }
    
        public function editSubServiceInfo($id){

            $result=DB::table('FA_CPFSUBOPNBAL')->where('subopnbalid',$id)->first();
            $acc_for=$result->acc_for;
            $esid=$result->emporsup_id;

            if($acc_for=='employee'){
                $response = Http::get("http://192.168.3.8:8085/ords/hrm/employees/v_emp_all/" . $esid);
                $decoded = json_decode($response, true);
                $dataname =$decoded['employe_registration_number'].' => '. $decoded['name_english'] .' => '. $decoded['designation'];
            }else{
                $response=DB::table('FA_SUPLIERTYPELIST')->where('suptypeid',$esid)->first();
                $dataname=$response->suplier_code.' => '.$response->supp_name;
            }
            
            $data=[
                'getProjects'=>DB::table('FA_PROJECTS')->get(),
                'emoployees'=>$this->allemployee_apidata(),
                'accounts'=>$this->allaccounts_apidata(),
                'dataname'=>$dataname,
                'getsubopnbal'=>$result,
            ];
            return view('layouts.mcsfa.updateSubOpeningBalance', $data);
        }
    
        public function deleteSubOpeningBalance($id){
           DB::table('FA_CPFSUBOPNBAL')->where('subopnblnid', $id)->delete();
           $notification = array(
            'message' => "Sub Opening Balance Info Deleted Succesfully",
            'alert-type' => 'success'
            );
            return redirect('/subopeningbalance')->with($notification);
        }



        // FDR Statement Report
        public function fdrStatementReport() {
            $data = [
                'getfdrbankinfo'=>DB::table('FA_FDRINFO')->select('bankname')->distinct()->get(),
            ];
            return view('layouts.mcsfa.fdrStatementReport',$data);
        }
        public function viewpdfgenerate() {
            $data = [
                'getfdrinfo'=>DB::table('FA_FDRINFO')->get(),
            ];
            return view('fdrStatement', $data);
        }
        public function generateFDRPDF() {
            // $data = [
            //     'getfdrinfo'=>DB::table('FA_FDRINFO')->get(),
            // ];
            $data = [
                'getfdrbankinfo'=>DB::table('FA_FDRINFO')->select('bankname')->distinct()->get(),
            ];
            $pdf = PDF::loadView('fdrStatement', $data)->setPaper('a4', 'landscape')->setWarnings(false);
            return $pdf->download('fdrStatement.pdf');
        }
        public function setHouseAllowance($employeeId) {

            $response = Http::get("http://192.168.3.10/fa/singleemployeegradeapidata/" . $employeeId);
            $decoded = json_decode($response, true);

            $areatype_id = DB::table('FA_LOCATION')->select('areatype_id')->where('location_name', $decoded['location'])->first();

            if(!@$areatype_id->areatype_id) {
                $areatype_id = DB::table('FA_AREATYPE')->where('areatype_name', 'Others')->pluck('areatype_id')[0];
            }

            // if basic is null then basic set 0
            if(!$decoded['basic']) {
                $decoded['basic'] = 0;
            }

            $basic = (int)$decoded['basic'];

            $gadget = DB::table('FA_HOUSEGADGET')
            ->where('scale_str', '<=', $basic)
            ->where('scale_end', '>=', $basic)
            ->where('area_id', $areatype_id)
            ->get();

            // $gadget = DB::table('FA_HOUSEGADGET')
            // ->where([
            //     ['scale_str', '<=', $basic],
            //     ['scale_end', '>=', $basic],
            //     ['area_id', $areatype_id]
            // ])->first();

            echo '<pre>';
            print_r($gadget);
            exit();
            $percentWiseRentAmt = (($decoded['basic']/100)*$gadget->percentage);

            if($percentWiseRentAmt < $gadget->min_amount) {
                return $gadget->min_amount;
            }
            return $percentWiseRentAmt;
        }
}
