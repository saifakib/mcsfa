<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.mcsfa.dashboard');
});

Route::get('/settings/loan', function () {
    return view('layouts.mcsfa.settings.loan');
});
Route::get('/settings/officeInfo', function () {
    return view('layouts.mcsfa.settings.officeInfo');
});
Route::get('/settings/employee-absence', function () {
    return view('layouts.mcsfa.settings.employeeAbsence');
});
Route::get('/missettings/allowance', function () {
    $data=[
        'getallowance'=>  DB::table('FA_ALLOWANCE')->get(),
    ];
    return view('layouts.mcsfa.settings.allowance',$data);
});

// Route::get('/missettings/house', function () {
//     $data=[
//         'gethouse'=>[],
//     ];
//     return view('layouts.mcsfa.settings.houseType',$data);
// });



Route::post('/saveupdateallowance', [\App\Http\Controllers\MisController::class, 'saveupdateallowance'])->name('saveupdateallowance');


//deduction
Route::get('/missettings/deduction', [\App\Http\Controllers\MisController::class, 'getDeduction']);
Route::post('/saveupdatededuction', [\App\Http\Controllers\MisController::class, 'saveupdatededuction'])->name('saveupdatededuction');
Route::get('/getdeductiontypedata/{id}', [\App\Http\Controllers\MisController::class, 'getdeductiontypedata']);
Route::get('/deletededuction/{id}', [\App\Http\Controllers\MisController::class, 'deletededuction']);


// house type
Route::get('/missettings/house', [\App\Http\Controllers\MisController::class, 'getHouseType']);
Route::post('/saveupdatehouse', [\App\Http\Controllers\MisController::class, 'saveupdatehouse'])->name('saveupdatehouse');
Route::get('/gethousetypedata/{id}', [\App\Http\Controllers\MisController::class, 'gethousetypedata']);
Route::get('/deletehousetype/{id}', [\App\Http\Controllers\MisController::class, 'deletehousetype']);



// allowance
Route::get('/allowance', [\App\Http\Controllers\MisController::class, 'allowanceManage']);
Route::post('/allowance', [\App\Http\Controllers\MisController::class, 'allowancesaveupdate'])->name('allowancesaveupdate');
Route::get('/allowance/{id}', [\App\Http\Controllers\MisController::class, 'editallowance']);
Route::get('/deleteallallowance/{id}', [\App\Http\Controllers\MisController::class, 'deleteallallowance']);
Route::get('/allowancesearch', [\App\Http\Controllers\MisController::class, 'allowancesearch'])->name('allowancesearch');



// deduction info
Route::get('/deduction', [\App\Http\Controllers\MisController::class, 'deductionManage']);
Route::post('/deduction', [\App\Http\Controllers\MisController::class, 'deductionsaveupdate'])->name('deductionsaveupdate');
Route::get('/deduction/{id}', [\App\Http\Controllers\MisController::class, 'editdeduction']);
Route::get('/deletedeductioninfo/{id}', [\App\Http\Controllers\MisController::class, 'deletedeductioninfo']);
Route::get('/deductionsearch', [\App\Http\Controllers\MisController::class, 'deductionsearch'])->name('deductionsearch');




// employee suspend
Route::get('/employesuspend', [\App\Http\Controllers\MisController::class, 'employesuspendmanage']);
Route::post('/employesuspend', [\App\Http\Controllers\MisController::class, 'employesuspendsaveupdate'])->name('employesuspendsaveupdate');
Route::get('/employesuspend/{id}', [\App\Http\Controllers\MisController::class, 'editemployesuspend']);
Route::get('/deleteemployesuspend/{id}', [\App\Http\Controllers\MisController::class, 'deleteemployesuspend']);


// Professional Information
Route::get('/professionalinfo', [\App\Http\Controllers\MisController::class, 'professionalinfomanage']);
Route::post('/professionalinfo', [\App\Http\Controllers\MisController::class, 'professionsaveupdate'])->name('professionsaveupdate');
Route::get('/getallthebankbranch', [\App\Http\Controllers\MisController::class, 'getallthebankbranch']);
Route::get('/editprofessionalinfo/{id}', [\App\Http\Controllers\MisController::class, 'editProfessionalInfo']);
Route::get('/deleteprofessionalinfo/{id}', [\App\Http\Controllers\MisController::class, 'deleteProfessionalInfo']);
Route::get('/professionalinfo/{id}', [\App\Http\Controllers\MisController::class, 'getSingleProfessionalInfo']);



// Personal Info
Route::get('/personalinfo/{id}', [\App\Http\Controllers\MisController::class, 'personalinfomanage']);


// Increment Info
Route::get('/incrementinfo', [\App\Http\Controllers\MisController::class, 'incrementinfomanage']);
Route::post('/incrementinfo', [\App\Http\Controllers\MisController::class, 'incrementinfosaveupdate'])->name('incrementinfosaveupdate');
Route::get('/incrementinfo/{id}', [\App\Http\Controllers\MisController::class, 'editincrementinfo']);
Route::get('/deleteincrementinfo/{id}', [\App\Http\Controllers\MisController::class, 'deleteincrementinfo']);



//Employee traning Info
Route::get('/employeetraninginfo', [\App\Http\Controllers\MisController::class, 'employeetraninginfomanage']);



// House Rent Manage
Route::get('/houserentmanage', [\App\Http\Controllers\MisController::class, 'houseRentManage']);
Route::post('/houserentmanage', [\App\Http\Controllers\MisController::class, 'houseRentSaveUpdate'])->name('houseRentSaveUpdate');
Route::get('/houserentmanage/{id}', [\App\Http\Controllers\MisController::class, 'editHouseRent']);
Route::get('/deletehouserent/{id}', [\App\Http\Controllers\MisController::class, 'deleteHouseRent']);



// Loan Management
Route::get('/loanmanage', [\App\Http\Controllers\MisController::class, 'loanManage']);
Route::post('/loanmanage', [\App\Http\Controllers\MisController::class, 'loanManageSaveUpdate'])->name('loanManageSaveUpdate');
Route::get('/editloanmanage/{id}', [\App\Http\Controllers\MisController::class, 'editLoanManage']);
Route::get('/deleteloanmanage/{id}', [\App\Http\Controllers\MisController::class, 'deleteLoanManage']);


// Loan Schedule
Route::get('/loanschedule', [\App\Http\Controllers\MisController::class, 'loanSchedule']);




// Bill Registation
Route::get('/bill', [\App\Http\Controllers\MisController::class, 'budgetbill']);
Route::get('/billentry/{id}', [\App\Http\Controllers\MisController::class, 'billEntry']);
Route::post('/billregister', [\App\Http\Controllers\MisController::class, 'bilRegistaterSaveUpdate'])->name('bilRegistaterSaveUpdate');
Route::get('/billmanage', [\App\Http\Controllers\MisController::class, 'billManage']);



// Service Information
Route::get('/serviceinfo', [\App\Http\Controllers\MisController::class, 'serviceinfomanage']);
Route::post('/serviceinfo', [\App\Http\Controllers\MisController::class, 'serviceinfomanageSaveUpdate'])->name('serviceinfomanageSaveUpdate');
Route::get('/serviceinfo/{id}', [\App\Http\Controllers\MisController::class, 'editServiceInfo']);
Route::get('/deleteserviceinfo/{id}', [\App\Http\Controllers\MisController::class, 'deleteServiceinfo']);



// Vat and Tax Payment
Route::get('/vattaxpayment', [\App\Http\Controllers\MisController::class, 'vattaxpayment']);



// Payble Account Payment
Route::get('/payblepayment', [\App\Http\Controllers\AccountsController::class, 'payblepayment']);
Route::get('/payblepaymentsearch', [\App\Http\Controllers\AccountsController::class, 'payblePaymentSearch']);

















/********************** Central Provident Fund  *********************************/

// Opening Balance 
Route::get('/openingbanalace_create', [\App\Http\Controllers\CPFController::class, 'openingBlnCre']);
Route::get('/openingbalance', [\App\Http\Controllers\CPFController::class, 'openingBalance']);
Route::post('/openingbanalace', [\App\Http\Controllers\CPFController::class, 'openingbanalaceSaveUpdate'])->name('openingbanalaceSaveUpdate');
Route::get('/editopeningbalance/{id}', [\App\Http\Controllers\CPFController::class, 'editServiceInfo']);
Route::get('/deleteopeningbalance/{id}', [\App\Http\Controllers\CPFController::class, 'deleteOpeningBalance']);



// Sub Opening Balance
Route::get('/subopeningbanalace_create', [\App\Http\Controllers\CPFController::class, 'subOpeningBlnCre']);
Route::get('/getemporsupplier', [\App\Http\Controllers\CPFController::class, 'getemporsupplier']);
Route::get('/subopeningbalance', [\App\Http\Controllers\CPFController::class, 'subopeningBalance']);
Route::post('/subopeningbanalace', [\App\Http\Controllers\CPFController::class, 'subopeningbanalaceSaveUpdate'])->name('subopeningbanalaceSaveUpdate');
Route::get('/editsubopeningbalance/{id}', [\App\Http\Controllers\CPFController::class, 'editSubServiceInfo']);
Route::get('/deletesubopeningbalance/{id}', [\App\Http\Controllers\CPFController::class, 'deleteSubOpeningBalance']);



// FDR Statement Report
Route::get('/fdrStatementReport', [\App\Http\Controllers\CPFController::class, 'fdrStatementReport']);
Route::get('/viewpdfgenerate', [\App\Http\Controllers\CPFController::class, 'viewpdfgenerate']);
Route::get('fdrStatementReport-pdf', [\App\Http\Controllers\CPFController::class, 'generateFDRPDF']);