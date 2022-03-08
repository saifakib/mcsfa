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



//loan management



// Professional Information
Route::get('/professionalinfo', [\App\Http\Controllers\MisController::class, 'professionalinfomanage']);
Route::post('/professionalinfo', [\App\Http\Controllers\MisController::class, 'professionsaveupdate'])->name('professionsaveupdate');
Route::get('/getallthebankbranch', [\App\Http\Controllers\MisController::class, 'getallthebankbranch']);
Route::get('/editprofessionalinfo/{id}', [\App\Http\Controllers\MisController::class, 'editProfessionalInfo']);
Route::get('/deleteprofessionalinfo/{id}', [\App\Http\Controllers\MisController::class, 'deleteProfessionalInfo']);
Route::get('/professionalinfo/{id}', [\App\Http\Controllers\MisController::class, 'getSingleProfessionalInfo']);



// Personal Info
Route::get('/personalinfo', [\App\Http\Controllers\MisController::class, 'personalinfomanage']);


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
