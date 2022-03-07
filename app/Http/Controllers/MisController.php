<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HTTP;

class MisController extends Controller
{
    public function saveupdateallowance(Request $request)
    {
        $taskstatus = $request->taskstatus;
        
        $allowanceid = $request->allowanceid;

        $data = [
            'allowance_code' => $request->allowance_code,
            'title' => $request->title,
            'account' => $request->account,
            'dr_cr' => $request->dr_cr
        ];

        if($taskstatus == 'save') {
            DB::table('FA_ALLOWANCE_LIST')->insert($data);
            $message = 'Saved';
        }
        else {
            DB::table('FA_ALLOWANCE_LIST')->where('allowanceid', $allowanceid)->update($data);
            $message = 'Updated';
        }
        $notification = array(
            'message' => "Allowance Info $message Succesfully",
            'alert-type' => 'success'
        );
        return redirect('/missetting/allowance')->with($notification);
    }




    /********************** Deduction Controller ************************ */
    public function getDeduction() {
        $data=[
            'getdeduction'=> DB::table('FA_DEDUCTION')->get(),
        ];
        return view('layouts.mcsfa.settings.deduction', $data);
    }

    public function saveupdatededuction(Request $request)
    {
        $taskstatus = $request->taskstatus;
        
        $deductionid = $request->dataid;

        $data = [
            'deduction_code' => $request->deduction_code,
            'title' => $request->title,
            'account' => $request->account,
            'inst_acc' => $request->inst_acc,
            'dep_acct' => $request->dep_acct,
            'dept_inst_acc' => $request->dept_inst_acc,
        ];

        if($taskstatus == 'save') {
            DB::table('FA_DEDUCTION')->insert($data);
            $message = 'Saved';
        }
        else {
            DB::table('FA_DEDUCTION')->where('deductionid', $deductionid)->update($data);
            $message = 'Updated';
        }
        $notification = array(
            'message' => "Deduction Info $message Succesfully",
            'alert-type' => 'success'
        );
        return redirect('/missettings/deduction')->with($notification);
    }
    public function getdeductiontypedata($id){
        $result=DB::table('FA_DEDUCTION')->where('deductionid', $id)->first();
        return response()->json($result);
    }
    public function deletededuction($id){
       DB::table('FA_DEDUCTION')->where('deductionid', $id)->delete();
       $notification = array(
        'message' => "Deduction Info Deleted Succesfully",
        'alert-type' => 'success'
        );
        return redirect('/missettings/deduction')->with($notification);
    }










/********************** House Type Controller ************************ */

    // get House Info
    public function getHouseType() {
        $data=[
            'gethousetype'=> DB::table('FA_HOUSE_TYPE')->get(),
        ];
        return view('layouts.mcsfa.settings.houseType', $data);
    }

    // post a house info
    public function saveupdatehouse(Request $request)
    {
        $taskstatus = $request->taskstatus;
        $housetypeid = $request->dataid;

        $data = [
            'h_type' => $request->h_type,
            'service_charge' => $request->service_charge,
            'house_rent' => $request->house_rent,
            'max_amt' => $request->max_amt,
            'min_amt' => $request->min_amt,
            'hr_deduction' => $request->hr_deduction,
            'p_yn' => $request->p_yn,
        ];

        if($taskstatus == 'save') {
            DB::table('FA_HOUSE_TYPE')->insert($data);
            $message = 'Saved';
        }
        else {
            DB::table('FA_HOUSE_TYPE')->where('housetypeid', $housetypeid)->update($data);
            $message = 'Updated';
        }
        $notification = array(
            'message' => "House Info $message Succesfully",
            'alert-type' => 'success'
        );
        return redirect('/missettings/house')->with($notification);
    }

    // get a single house info
    public function gethousetypedata($id){
        $result=DB::table('FA_HOUSE_TYPE')->where('housetypeid', $id)->first();
        return response()->json($result);
    }

    // delete a single house info
    public function deletehousetype($id){
       DB::table('FA_HOUSE_TYPE')->where('housetypeid', $id)->delete();
       $notification = array(
        'message' => "House Info Deleted Succesfully",
        'alert-type' => 'success'
        );
        return redirect('/missettings/house')->with($notification);
    }
    

    








/********************** Allowance Controller ************************ */

    public function allemployee_apidata() {
        $response = Http::get("http://192.168.3.8:8085/ords/hrm/employees/v_emp?limit=1000");
        $decoded = json_decode($response, true);
        return $decoded;
    }
    public function single_empapidata($id) {
        $response =$response = Http::get("http://192.168.3.8:8085/ords/hrm/employees/v_emp_all/" . $id);
        $decoded = json_decode($response, true);
        return $decoded;
    }

    public function allowanceCode() {
        $response = Http::get("http://192.168.3.15:8082/ords/mcs/allowance_list/");
        $decoded = json_decode($response, true);
        return $decoded;
    }

    // index method [note: need to join query here]
    public function allowanceManage() {
        $data=[
            'getallallowance'=> DB::table('FA_ALL_ALLOWANCE')->leftJoin('FA_ALLOWANCE', 'FA_ALL_ALLOWANCE.allowance_code', '=', 'FA_ALLOWANCE.allowance_code')->get(),
            'emoployees'=>$this->allemployee_apidata(),
            'allowancecode'=> DB::table('FA_ALLOWANCE')->get(),
        ];

        return view('layouts.mcsfa.allowance', $data);
    }


    // allallowance post and update 
    public function allowancesaveupdate(Request $request) {

        $taskstatus = $request->taskstatus;
        $allallowanceid = $request->dataid;

        $data = [
            'allowance_code' => $request->allowance_code,
            'status_code' => $request->status_code,
            'percentage' => $request->parcentage,
            'amount' => $request->amount,
            'remarks' => $request->remarks,
            'percentage_yn' => $request->p_yn,
            'emp_no' => $request->employe_id,
        ];

        if($taskstatus == 'save') {
            DB::table('FA_ALL_ALLOWANCE')->insert($data);
            $message = 'Saved';
        }
        else {
            DB::table('FA_ALL_ALLOWANCE')->where('allallowanceid', $allallowanceid)->update($data);
            $message = 'Updated';
        }
        $notification = array(
            'message' => "All Allowance Info $message Succesfully",
            'alert-type' => 'success'
        );
        return redirect('/allowance')->with($notification);
    }

    //find single allallowance by id
    public function editallowance($id){
        $result=DB::table('FA_ALL_ALLOWANCE')->where('allallowanceid', $id)->first();
        $getresult=$this->single_empapidata($result->emp_no);

        $data = [
            'employe_id'=>$getresult['employe_id'],
            'empolye_name'=>$getresult['name_english'],
            'designation'=>$getresult['designation'],
            'departement'=>$getresult['departement'],
            'allowance_code'=>$result->allowance_code,
        ];
        return view('layouts.mcsfa.updateAllowance', $data);
    }

    // delete single allallowance info
    public function deleteallallowance($id){
       DB::table('FA_ALL_ALLOWANCE')->where('allallowanceid', $id)->delete();
       $notification = array(
        'message' => "All Allowance Info Deleted Succesfully",
        'alert-type' => 'success'
        );
        return redirect('/allowance')->with($notification);
    }


    // search 
    public function allowancesearch(Request $request) 
    {
        $taskstatus = $request->taskstatus;

        $data = [
            'allowance_code' => $request->allowance_code,
            'percentage' => $request->parcentage,
            'amount' => $request->amount,
            'emp_no' => $request->employe_id,
        ];

        if($taskstatus == 'search') {
            
        }
    }

    /********************** Deduction Info Controller ************************ */

    // index method [note: need to join query here]
    public function deductionManage() {
        $data=[
            'getdeductioninfo'=>[],
            'emoployees'=>$this->allemployee_apidata(),
            'getdeductiocode'=>DB::table('FA_DEDUCTION')->get()
        ];
        return view('layouts.mcsfa.deduction', $data);
    }

        // deduction post and update 
        public function deductionsaveupdate(Request $request) {

            $taskstatus = $request->taskstatus;
            $deductioninfoid = $request->dataid;
    
            $data = [
                'deduction_code' => $request->deduction_code,
                'percentage' => $request->parcentage,
                'amount' => $request->amount,
                'remarks' => $request->remarks,
                'percentage_yn' => $request->p_yn,
                'emp_no' => $request->employe_id,
            ];
    
            if($taskstatus == 'save') {
                DB::table('FA_DEDUCTION_INFO')->insert($data);
                $message = 'Saved';
            }
            else {
                DB::table('FA_DEDUCTION_INFO')->where('deductioninfoid', $deductioninfoid)->update($data);
                $message = 'Updated';
            }
            $notification = array(
                'message' => "Deduction Info $message Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/deduction')->with($notification);
        }

        //find single deduction info by id
        public function editdeduction($id){
            $result=DB::table('FA_DEDUCTION_INFO')->where('deductioninfoid', $id)->first();
            return response()->json($result);
        }
    
        // delete single deduction info
        public function deletedeductioninfo($id){
           DB::table('FA_DEDUCTION_INFO')->where('deductioninfoid', $id)->delete();
           $notification = array(
            'message' => "Deduction Info Deleted Succesfully",
            'alert-type' => 'success'
            );
            return redirect('/allowance')->with($notification);
        }

    
    // search 
    public function deductionsearch(Request $request) 
    {
        $taskstatus = $request->taskstatus;

        $data = [
            'allowance_code' => $request->deduction_code,
            'percentage' => $request->parcentage,
            'amount' => $request->amount,
            'emp_no' => $request->employe_id,
        ];

        if($taskstatus == 'search') {
            echo "searching";
        }
    }



    /********************** Employee Suspend Controller ************************ */
    public function employesuspendmanage(Request $request) 
    {
        $data=[
            'getemployeesuspend'=>DB::table('FA_EMPLOYEE_SUSPEND')->get(),
            'emoployees'=>$this->allemployee_apidata()
        ];
        return view('layouts.mcsfa.employesuspend', $data);
    }

    public function employesuspendsaveupdate(Request $request) {
        $taskstatus = $request->taskstatus;
        $employeesuspendid = $request->dataid;
        $data = [
            'employe_id' => $request->employe_id,
            'reason' => $request->reason,
            'order_date' => $request->order_date,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
            'active_yn' => $request->a_yn,
            
        ];

        if($taskstatus == 'save') {
            DB::table('FA_EMPLOYEE_SUSPEND')->insert($data);
            $message = 'Saved';
        }
        else {
            DB::table('FA_EMPLOYEE_SUSPEND')->where('employeesuspendid', $employeesuspendid)->update($data);
            $message = 'Updated';
        }
        $notification = array(
            'message' => "Employee Suspend Info $message Succesfully",
            'alert-type' => 'success'
        );
        return redirect('/employesuspend')->with($notification);
    }

    public function editemployesuspend($id) {
        $result=DB::table('FA_EMPLOYEE_SUSPEND')->where('employeesuspendid', $id)->first();
        return response()->json($result);
    }

    public function deleteemployesuspend($id){
        DB::table('FA_EMPLOYEE_SUSPEND')->where('employeesuspendid', $id)->delete();
        $notification = array(
         'message' => "Employee Suspend Info Deleted Succesfully",
         'alert-type' => 'success'
         );
         return redirect('/employesuspend')->with($notification);
     }










      /**********************  Info Controller ************************ */
      
      public function personalinfomanage(Request $request) 
      {
          return view('layouts.mcsfa.personalinfo');
      }


    public function professionalinfomanage(Request $request) 
        {
            $data=[
                'getOffice'=>DB::table('FA_OFFICE')->get(),
                'getbbabanks'=>DB::table('FA_BBABANKS')->select('bank')->distinct()->orderBy('bank','asc')->get(),
                'gethousetype'=> DB::table('FA_HOUSE_TYPE')->get(),
                'getProfessionalInfo'=>DB::table('FA_PROFESSIONAL')->leftJoin('FA_HOUSE_TYPE', 'FA_PROFESSIONAL.h_type', '=', 'FA_HOUSE_TYPE.housetypeid')->get(),
            ];
            return view('layouts.mcsfa.professionalinfo', $data);
        }

    
        public function getallthebankbranch(Request $request) {
            $value = $request->get('value');
            $result = DB::table('FA_BBABANKS')->orderBy('branch', 'asc')->where('bank', $value)->get();
            echo'<option value = "">Select Branch</option>';
            foreach ($result as $value) {
                echo'<option name="bank_id" value = "' . $value->bankid . '">' . $value->branch . '</option>';
            }
        }

        public function professionsaveupdate(Request $request)
        {
            $taskstatus = $request->taskstatus;
            $professioninfoid = $request->dataid;
            $data = [
                'pproject' => $request->project,
                'pscale' => $request->scale,
                'bank_name' => $request->bank_name,
                'bank_id' => $request->bank_id,
                'emp_bnk_acc_no' => $request->emp_bnk_acc_no,
                'quater' => $request->quater,
                'staff_bus_use' => $request->staff_bus_use,
                'car_use' => $request->car_use,
                'emp_type' => $request->emp_type,
                'present_basic' => $request->present_basic,
                'privious_basic' => $request->privious_basic,
                'inc_date' => $request->inc_date,
                'inc_rate' => $request->inc_rate,
                'h_type' => $request->h_type,
                'amount' => $request->amount,
                'tin_no' => $request->tin_no,
            ];

            if($taskstatus == 'save') {
                DB::table('FA_PROFESSIONAL')->insert($data);
                $message = 'Saved';
            }
            else {
                DB::table('FA_PROFESSIONAL')->where('professioninfoid', $professioninfoid)->update($data);
                $message = 'Updated';
            }
            $notification = array(
                'message' => "Professional Info $message Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/professionalinfo')->with($notification);
        }

        public function editProfessionalInfo($id) {
            $data=[
                'getOffice'=>DB::table('FA_OFFICE')->get(),
                'getbbabanks'=>DB::table('FA_BBABANKS')->select('bank')->distinct()->orderBy('bank','asc')->get(),
                'gethousetype'=> DB::table('FA_HOUSE_TYPE')->get(),
                'getProfessionalInfo'=>DB::table('FA_PROFESSIONAL')->where('professioninfoid', $id)->first()
            ];
            
            return view('layouts.mcsfa.updateProfessionalInfo', $data);
        }

        public function deleteProfessionalInfo($id){
            DB::table('FA_PROFESSIONAL')->where('professioninfoid', $id)->delete();
            $notification = array(
             'message' => "Professional Info Deleted Succesfully",
             'alert-type' => 'success'
             );
             return redirect('/professionalinfo')->with($notification);
         }


        






        /// Increment Info
        public function incrementinfomanage(Request $request) 
        {
            $data=[
                'getincrementinfo'=>DB::table('FA_INCREMENT')->get()
            ];
            return view('layouts.mcsfa.incrementinfo', $data);
        }

        public function incrementinfosaveupdate(Request $request)
        {
            $taskstatus = $request->taskstatus;
            $incrementid = $request->dataid;
            $data = [
                'increment_date' => $request->increment_date,
                'increment_amount' => $request->increment_amount
            ];

            if($taskstatus == 'save') {
                DB::table('FA_INCREMENT')->insert($data);
                $message = 'Saved';
            }
            else {
                DB::table('FA_INCREMENT')->where('incrementid', $incrementid)->update($data);
                $message = 'Updated';
            }
            $notification = array(
                'message' => "Increment Info $message Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/incrementinfo')->with($notification);
        }

        public function editincrementinfo($id) {
            $result=DB::table('FA_INCREMENT')->where('incrementid', $id)->first();
            return response()->json($result);
        }
    
        public function deleteincrementinfo($id){
            DB::table('FA_INCREMENT')->where('incrementid', $id)->delete();
            $notification = array(
             'message' => "Increment Info Deleted Succesfully",
             'alert-type' => 'success'
             );
             return redirect('/incrementinfo')->with($notification);
         }




        // public function employeetraning() {
        //     $response = Http::get("http://192.168.3.8:8085/ords/hrm/emp_tra/v_emp_tra/e/576");
        //     $decoded = json_decode($response, true);
        //     return $decoded;
        // }
        // public function traninginfomanage(Request $request) 
        // {
        //     $data=[
        //         'emoployeestraning'=>$this->employeetraning()
        //     ];
        //     return view('layouts.mcsfa.traninginfo',$data);
        // }



        /// Employee Traning Info
        public function employeetraning() {
            $response = Http::get("http://192.168.3.8:8085/ords/hrm/emp_tra/v_emp_tra/e/576");
            $decoded = json_decode($response, true);
            return $decoded;
        }
        public function employeetraninginfomanage(Request $request) 
        {
            $data=[
                'emoployeestraning'=>$this->employeetraning()
            ];
            return view('layouts.mcsfa.traninginfo',$data);
        }
        
}


