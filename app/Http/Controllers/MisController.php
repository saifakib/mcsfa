<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HTTP;
use DateTime;

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
            'dep_inst_acc' => $request->dept_inst_acc,
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
            // 'employe_id'=>$getresult['employe_id'],
            // 'empolye_name'=>$getresult['name_english'],
            // 'designation'=>$getresult['designation'],
            // 'departement'=>$getresult['departement'],
            // 'allowance_code'=>$result->allowance_code,
            'emoployees'=>$this->allemployee_apidata(),
            'allallowance'=>DB::table('FA_ALL_ALLOWANCE')->where('allallowanceid', $id)->first(),
            'allowancecode'=> DB::table('FA_ALLOWANCE')->get(),
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










      /********************** Personal Info Controller ************************ */
      
      public function profile_apidata($param) {
        $response = Http::get("http://192.168.3.8:8085/ords/hrm/employees/v_emp_all/" . $param);
        $decoded = json_decode($response, true);
        return $decoded;
    }

      public function personalinfomanage($id) 
      {
          $data = [
            'employee'=>$this->profile_apidata($id),
          ];

          return view('layouts.mcsfa.personalinfo',$data);
      }





    /********************** Professional Info Controller ************************ */

    public function professionalinfomanage(Request $request) 
        {
            $data=[
                'getProject'=>DB::table('FA_PROJECTS')->get(),
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
            $professid = $request->dataid;
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
                DB::table('FA_PROFESSIONAL')->where('professid', $professid)->update($data);
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
                'getProject'=>DB::table('FA_PROJECTS')->get(),
                'getbbabanks'=>DB::table('FA_BBABANKS')->select('bank')->distinct()->orderBy('bank','asc')->get(),
                'gethousetype'=> DB::table('FA_HOUSE_TYPE')->get(),
                'getProfessionalInfo'=>DB::table('FA_PROFESSIONAL')->where('professid', $id)->first()
            ];
            
            return view('layouts.mcsfa.updateProfessionalInfo', $data);
        }

        public function deleteProfessionalInfo($id){
            DB::table('FA_PROFESSIONAL')->where('professid', $id)->delete();
            $notification = array(
             'message' => "Professional Info Deleted Succesfully",
             'alert-type' => 'success'
             );
             return redirect('/professionalinfo')->with($notification);
         }

         public function getSingleProfessionalInfo($id) {
             $data = [
                'getProfessionalInfo'=>DB::table('FA_PROFESSIONAL')->leftJoin('FA_HOUSE_TYPE', 'FA_PROFESSIONAL.h_type', '=', 'FA_HOUSE_TYPE.housetypeid')->where('professid', $id)->first()
             ];
             return view('layouts.mcsfa.viewProfessionalInfo', $data);
         }


        






        /// Increment Info
        public function incrementinfomanage() 
        {
            $lastincrementcode = DB::table('FA_INCREMENT')->select('increment_code')->orderBy('incrementid', 'desc')->first();
            $resresult = explode('00', @$lastincrementcode->increment_code);
            if (empty(@$lastincrementcode->increment_code)) {
                $getresresult = "001";
            } else {
                $number_res = $resresult[1] + 1;
                $getresresult = '00' . $number_res;
            }

            $data=[
                'emoployees'=>$this->allemployee_apidata(),
                'getincrementinfo'=>DB::table('FA_INCREMENT')->get(),
                'lastincrementcode'=>$getresresult,
            ];
            return view('layouts.mcsfa.incrementinfo', $data);
        }

        public function incrementinfosaveupdate(Request $request)
        {
            $taskstatus = $request->taskstatus;
            $incrementid = $request->dataid;

            $now = new DateTime();
            $data = [
                'increment_date' => $request->inc_date,
                'increment_amount' => $request->increment_amount,
                'increment_code' => $request->increment_code,
                'employeeid' => $request->employe_id,
                'description' => $request->description,
                'create_month' => $now->format('M'),
                'create_date' => $now->format('d')
            ];

            if($taskstatus == 'save') {
                DB::table('FA_INCREMENT')->insert($data);
                $message = 'Saved';
            }
            else {
                $data = [
                    'increment_date' => $request->inc_date,
                    'increment_amount' => $request->increment_amount,
                    'increment_code' => $request->increment_code,
                    'employeeid' => $request->employe_id,
                    'description' => $request->description
                ];
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
        



    ///****************** House Rent ************************ */ 
    public function houseRentManage() 
    {
        $data=[
            'getHouseRent'=>DB::table('FA_HOUSERENT')->get(),
         ];
        return view('layouts.mcsfa.houseRent', $data);
    }
    
    public function houseRentSaveUpdate(Request $request)
    {
        $taskstatus = $request->taskstatus;
        $houserentid = $request->dataid;
    
        $data = [
            'basic_scale' => $request->basic_scale,
            'location_id' => $request->location_id,
            'max_amount' => $request->max_amt,
            'min_amount' => $request->min_amt,
            'percentage' => $request->percentage,
            'account_code' => $request->account_code,
            'p_yn' => $request->p_yn
        ];
    
        if($taskstatus == 'save') {
            DB::table('FA_HOUSERENT')->insert($data);
            $message = 'Saved';
        }
        else {
            DB::table('FA_HOUSERENT')->where('houserentid', $houserentid)->update($data);
            $message = 'Updated';
        }
        $notification = array(
            'message' => "House Rent Info $message Succesfully",
            'alert-type' => 'success'
        );
        return redirect('/houserentmanage')->with($notification);
    }
    
    public function editHouseRent ($id) {
        $result=DB::table('FA_HOUSERENT')->where('houserentid', $id)->first();
        return response()->json($result);
    }
        
    public function deleteHouseRent($id)
    {
        DB::table('FA_HOUSERENT')->where('houserentid', $id)->delete();
        $notification = array(
            'message' => "House Rent Info Deleted Succesfully",
            'alert-type' => 'success'
        );
        return redirect('/houserentmanage')->with($notification);
    }







        ///****************** Loan Management ************************ */ 
        public function loanManage() 
        {
            $data=[
                'getLoanTypes'=>DB::table('FA_LOANTYPES')->get(),
                'getLoanManage'=>DB::table('FA_LOANMANAGE')->leftJoin('FA_LOANTYPES', 'FA_LOANMANAGE.loan_type_id', '=', 'FA_LOANTYPES.LONID')->get(),
                'emoployees'=>$this->allemployee_apidata(),
             ];
            return view('layouts.mcsfa.loanManage', $data);
        }
        
        public function loanManageSaveUpdate(Request $request)
        {
            $taskstatus = $request->taskstatus;
            $loanmanageid = $request->dataid;
        
            $data = [
                'loan_type_id' => $request->loan_type_id,
                'employe_id' => $request->employe_id,
                'loan_amount' => $request->loan_amount,
                'install_no' => $request->install_no,
                'install_amount' => $request->install_amount,
                'interest_amount' => $request->interest_amount,
                'interest_rate' => $request->interest_rate,
                'loan_period' => $request->loan_period,
                'loan_taken_date' => $request->loan_taken_date,
                'interest_install_amount' => $request->interest_install_amount,
                'wf_interest' => $request->wf_interest,
                'loan_schedule' => $request->loan_schedule,
                'loan_reschedule' => $request->loan_reschedule,
                'interest_schedule' => $request->interest_schedule,
                'loan_recover' => $request->loan_recover,

            ];
        
            if($taskstatus == 'save') {
                DB::table('FA_LOANMANAGE')->insert($data);
                $message = 'Saved';
            }
            else {
                DB::table('FA_LOANMANAGE')->where('loanmanageid', $loanmanageid)->update($data);
                $message = 'Updated';
            }
            $notification = array(
                'message' => "Loan Manage Info $message Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/loanmanage')->with($notification);
        }
        
        public function editLoanManage ($id) {
            $data=[
                'getLoanTypes'=>DB::table('FA_LOANTYPES')->get(),
                'emoployees'=>$this->allemployee_apidata(),
                'getsingleLoanManage'=>DB::table('FA_LOANMANAGE')->where('loanmanageid', $id)->first()
            ];
            return view('layouts.mcsfa.updateLoanManage', $data);
        }
            
        public function deleteLoanManage($id)
        {
            DB::table('FA_LOANMANAGE')->where('loanmanageid', $id)->delete();
            $notification = array(
                'message' => "Loan Manage Info Deleted Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/loanmanage')->with($notification);
        }





        /**************** Loan Schedule **************/
        public function loanSchedule() 
        {
            $data=[
                'getloans'=>DB::table('FA_LOANMANAGE')->get(),
                'getLoanSchedule'=>[]
            ];
            return view('layouts.mcsfa.loanSchedule', $data);
        }





        /************Bill Registation ************ */
        public function budgetbill()
        {
            $data=[
                'getapprovedbudgets'=>DB::table('FA_BUDGETTABS')->leftJoin('FA_PROJECTS', 'FA_BUDGETTABS.PROJECTCODE', '=', 'FA_PROJECTS.PROJECT_CODE')->where('budgettype', 'Approved')->GET(),
            ];

            return view('layouts.mcsfa.bill', $data);
        }

        public function billEntry($id)
        {
            $data = [
                'budget'=>DB::table('FA_BUDGETTABS')->where('budgetid', $id)->first(),
                'lastbudget'=>DB::table('FA_BILLBUDGET')->select('restbgamount')->where('budget_id', $id)->orderBy('bilid','desc')->first(),
            ];
            return view('layouts.mcsfa.billte', $data);
        }

        public function billManage()
        {
            $data=[
                'getAllBills'=>DB::table('FA_BILLBUDGET')->leftJoin('FA_BUDGETTABS', 'FA_BILLBUDGET.budget_id', '=', 'FA_BUDGETTABS.budgetid')->get(),
            ];
            return view('layouts.mcsfa.billManage', $data);
        }

        public function bilRegistaterSaveUpdate(Request $request)
        {
            date_default_timezone_set("Asia/Dhaka");

            $taskstatus = $request->taskstatus;
            $budgetamount=$request->budgetamount;
            $amount=$request->amount;
            $rest_amount = $budgetamount - $amount;
            
            $data = [
                'budget_id' => $request->budget_id,
                'budget_amount' => $budgetamount,
                'billamount' => $amount,
                'restbgamount' => $rest_amount,
                'vat' => $request->vat,
                'tax' => $request->tax,
                'billdate' => $request->date,
                'remarks' => $request->remarks,
                'bdescription' => $request->description,
                'createdate' =>date('Y-m-d'),
                'createtime' =>date('g:i A'),
                'createmonth' =>date('F-Y'),
            ];

            DB::table('FA_BILLBUDGET')->insert($data);

        $notification = array(
                'message' => "Bill Info Saved Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/billmanage')->with($notification);

        // public function bilRegistaterSaveUpdate(Request $request)
        // {
        //     $taskstatus = $request->taskstatus;
        //     $bilid = $request->dataid;
        
        //     $data = [
        //         'budget_id' => $request->budget_id,
        //         'amount' => $request->amount,
        //         'vat' => $request->vat,
        //         'tax' => $request->tax,
        //         'billdate' => $request->date,
        //         'remarks' => $request->remarks,
        //         'billdescription' => $request->description
        //     ];
        //     if($taskstatus == 'save') {
        //         if($request->budget_amount > $request->amount) {
        //             $rest_amount = $request->budget_amount - $request->amount;
                    
        //             DB::table('FA_BILLBUDGET')->insert($data);
        //             $message = 'Saved';
        //         } else {
        //             $notification = array(
        //                 'message' => "Your Bill Amount Cross the Budget",
        //                 'alert-type' => 'error'
        //             );
        //             return redirect('/billmanage')->with($notification);
        //         }
        //     }
        //     else {
        //         DB::table('FA_BILLBUDGET')->where('bilid', $bilid)->update($data);
        //         $message = 'Updated';
        //     }
        //     $notification = array(
        //         'message' => "Bill Info $message Succesfully",
        //         'alert-type' => 'success'
        //     );
        //     return redirect('/billmanage')->with($notification);

        }




        /*********** Service Information ************/
        
        public function serviceinfomanage() {

            $lastser_code = DB::table('FA_SERVICEINFO')->select('ser_code')->orderBy('ser_no', 'desc')->first();
            $resresult = explode('S00', @$lastser_code->ser_no);
            if (empty(@$lastser_code->ser_no)) {
                $getresresult = "S001";
            } else {
                $number_res = $resresult[1] + 1;
                $getresresult = 'S00' . $number_res;
            }

            $data = [
                'services'=>DB::table('FA_SERVICEINFO')->get(),
                'lastser_code'=>$getresresult,
            ];
            return view('layouts.mcsfa.serviceinfo', $data);
        }

        public function serviceinfomanageSaveUpdate(Request $request)
        {
            $taskstatus = $request->taskstatus;
            $ser_no = $request->dataid;

            $data = [
                'ser_code' => $request->ser_code,
                'ser_name' => $request->ser_name,
                'ser_per' => $request->ser_per,
                'entry_date' => $request->entry_date,
                'challan_code' => $request->challan_code,
            ];
            if($taskstatus == 'save') {
                DB::table('FA_SERVICEINFO')->insert($data);
                $message = 'Saved';
            }
            else {
                DB::table('FA_SERVICEINFO')->where('ser_no', $ser_no)->update($data);
                $message = 'Updated';
            }
            $notification = array(
                'message' => "Service Info $message Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/serviceinfo')->with($notification);
            
        }

        public function editServiceInfo ($id) {
            $result = DB::table('FA_SERVICEINFO')->where('ser_no', $id)->first();
            return response()->json($result);
        }

        public function deleteServiceinfo($id)
        {
            DB::table('FA_SERVICEINFO')->where('ser_no', $id)->delete();
            $notification = array(
                'message' => "Service Info Deleted Succesfully",
                'alert-type' => 'success'
            );
            return redirect('/serviceinfo')->with($notification);
        }




        /*********Vat and tax Payment************ */
        public function vattaxpayment() 
        {
            $data = [
                'offices'=>DB::table('FA_PROJECTS')->get(),
                'accounts'=>DB::table('FA_CHARTACCODES')->get(),
                'getVatTaxs'=>[]
            ];
            return view('layouts.mcsfa.vattaxpayment', $data);
        }
}


