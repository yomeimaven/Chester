<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\DeviceController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;

//Account Management
Route::get('/', function () {

    if (session()->get('designation') == 'Administrator') {
        return redirect('AdminDasboard');
    } elseif (session()->get('designation') == 'Client') {
        return redirect('ClientDasboard');
    } else {
        return view('login');
    }


})->name('Login');
//End Account Managemnt

//Universal Route
Route::post('LoginVerification', [AccountController::class, 'LoginVerification'])->name('LoginVerification');
Route::get('Logout', [AccountController::class, 'Logout'])->name('Logout');
Route::get('checkPassword', [AjaxController::class, 'checkPassword']);
Route::get('IndividualDeviceReport', [DeviceController::class, 'IndividualDeviceReport'])->name('IndividualDeviceReport');
Route::get('IndividualChart', [AjaxController::class, 'IndividualChart'])->name('IndividualChart');
Route::post('Restock', [DeviceController::class, 'Restock'])->name('Restock');
Route::get('RemoveDevice', [DeviceController::class, 'RemoveDevice'])->name('RemoveDevice');
Route::post('SubmitAddDevice', [DeviceController::class, 'SubmitAddDevice'])->name('SubmitAddDevice');


//


//Admin Protected
Route::middleware([AdminMiddleware::class])->group(function () {
    //User Management
    Route::get('AdminDashboard', [ViewController::class, 'AdminDashboard'])->name('AdminDashboard');
    Route::get('AdminUserList', [ViewController::class, 'AdminUserList'])->name('AdminUserList');
    Route::post('SubmitAddUser', [AccountController::class, 'SubmitAddUser'])->name('SubmitAddUser');
    Route::any('BanUser', [AccountController::class, 'BanUser'])->name('BanUser');
    Route::any('UnbanUser', [AccountController::class, 'UnbanUser'])->name('UnbanUser');
    Route::post('ChangePassword', [AccountController::class, 'ChangePassword'])->name('ChangePassword');
    //Device Route
    Route::get('DeviceManagement', [ViewController::class, 'DeviceManagement'])->name('DeviceManagement');
    Route::get('UserDevice', [DeviceController::class, 'UserDevice'])->name('UserDevice');
    Route::get('ViewUserDevice', [ViewController::class, 'ViewUserDevice'])->name('ViewUserDevice');
    Route::get('requestlist', [ViewController::class, 'requestlist'])->name('requestlist');
    Route::get('approve', [DeviceController::class, 'approve'])->name('approve');
    Route::get('decline', [DeviceController::class, 'decline'])->name('decline');
    //Ajax Request
    Route::get('usernameCheck', [AjaxController::class, 'usernameCheck'])->name('usernameCheck');
    Route::get('checkDeviceId', [AjaxController::class, 'checkDeviceId'])->name('checkDeviceId');
    Route::get('getOwnerName', [AjaxController::class, 'getOwnerName'])->name('getOwnerName');
    Route::get('AdminChart', [AjaxController::class, 'AdminChart'])->name('AdminChart');

});

//Client Protected
Route::middleware([ClientMiddleware::class])->group(function () {
    //Route
    Route::get('ClientDashboard', [ViewController::class,'ClientDashboard'])->name('ClientDashboard');
    Route::get('AboutUs', [ViewController::class,'AboutUs'])->name('AboutUs');
    Route::get('ContactUs', [ViewController::class,'ContactUs'])->name('ContactUs');

    //Devics
    Route::get('ClientDeviceManagement', [ViewController::class, 'ClientDeviceManagement'])->name('ClientDeviceManagement');

    //ajax
    Route::get('ClientChart', [AjaxController::class, 'ClientChart'])->name('ClientChart');
});
