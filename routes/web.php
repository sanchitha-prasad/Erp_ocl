<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VenderController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\suppliercontroller;
use App\Http\Controllers\LocalizationController;

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
    return redirect('login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles','RoleController');

    Route::resource('users','usercontroller');

    Route::resource('home','HomeController');
   

});

Route::get('/Dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Dashboard/department', [App\Http\Controllers\HomeController::class, 'department'])->name('dashboard.department');
Route::get('/Dashboard/employee', [App\Http\Controllers\HomeController::class, 'employee'])->name('dashboard.employee');
Route::get('/Dashboard/user', [App\Http\Controllers\HomeController::class, 'user'])->name('dashboard.user');
Route::get('/Dashboard/customer', [App\Http\Controllers\HomeController::class, 'customer'])->name('dashboard.customer');
Route::get('/Dashboard/supplier', [App\Http\Controllers\HomeController::class, 'supplier'])->name('dashboard.supplier');
Route::get('/Dashboard/deliver', [App\Http\Controllers\HomeController::class, 'deliver'])->name('dashboard.deliver');
Route::get('/Dashboard/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('dashboard.profile');
Route::get('/Dashboard/vender', [App\Http\Controllers\HomeController::class, 'vender'])->name('dashboard.vender');
// department
Route::post('/add/department', [App\Http\Controllers\DepartmentController::class, 'AddDepartment'])->name('add.department');
Route::post('/update/department', [App\Http\Controllers\DepartmentController::class, 'UpdateDepartment'])->name('update.department');
Route::post('/department/remove', [App\Http\Controllers\DepartmentController::class, 'RemoveDepartment'])->name('remove.department');
// Employee
Route::post('/add/employee', [App\Http\Controllers\EmployeeController::class, 'AddEmploye'])->name('add.employee');
Route::post('/update/employee', [App\Http\Controllers\EmployeeController::class, 'UpdateEmployee'])->name('update.employee');
Route::post('/employee/remove', [App\Http\Controllers\EmployeeController::class, 'RemoveEmployee'])->name('remove.employee');
Route::post('/upload/file/employee', [App\Http\Controllers\EmployeeController::class, 'uploadfile']);
Route::post('/employee/file',[App\Http\Controllers\EmployeeController::class, 'fileemployee']);
Route::post('/employee/file/remove',[App\Http\Controllers\EmployeeController::class, 'Removeemployeefile']);

//supplier
Route::post('/add/supplier', [App\Http\Controllers\suppliercontroller::class, 'AddSupplier'])->name('add.supplier');
Route::post('/update/supplier', [App\Http\Controllers\suppliercontroller::class, 'UpdateSupplier'])->name('update.supplier');
Route::post('/supplier/remove', [App\Http\Controllers\suppliercontroller::class, 'RemoveSupplier'])->name('remove.supplier');

Route::get('lang/{lang}',[App\Http\Controllers\LocalizationController::class, 'index'])->name('lang.switch');

//user
Route::post('/add/user', [App\Http\Controllers\usercontroller::class, 'AddUser'])->name('add.user');
Route::post('/update/user', [App\Http\Controllers\usercontroller::class, 'UpdateUser'])->name('update.user');
Route::post('/user/remove', [App\Http\Controllers\usercontroller::class, 'RemoveUser'])->name('remove.user');

//customer
Route::post('/add/customer', [App\Http\Controllers\CustomerController::class, 'AddCustomer'])->name('add.customer');
Route::post('/update/customer', [App\Http\Controllers\CustomerController::class, 'UpdateCustomer']);
Route::get('/customer/remove/{id}', [App\Http\Controllers\CustomerController::class, 'RemoveCustomer']);
Route::post('/customer/file',[App\Http\Controllers\CustomerController::class, 'filecustomer']);
Route::post('/customer/file/remove',[App\Http\Controllers\CustomerController::class, 'Removecustomerfile']);
Route::post('/upload/file/customer', [App\Http\Controllers\CustomerController::class, 'uploadfile']);

//vender
Route::post('/add/vender', [App\Http\Controllers\VenderController::class, 'Addvender']);
Route::post('/update/vender', [App\Http\Controllers\VenderController::class, 'Updatevender']);
Route::get('/vender/remove/{id}', [App\Http\Controllers\VenderController::class, 'Removevender']);
Route::post('/upload/file/vender', [App\Http\Controllers\VenderController::class, 'uploadfile']);
Route::post('/vender/file',[App\Http\Controllers\VenderController::class, 'filevender']);
Route::post('/vender/file/remove',[App\Http\Controllers\VenderController::class, 'Removevendefile']);

