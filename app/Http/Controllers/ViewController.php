<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\TotalSalesChart;
use App\Models\ProductSales;
use App\Models\Device;
use App\Models\User;
use App\Services\ChartService;
use Session;

class ViewController extends Controller
{
    //Admin
    public function AdminDashboard()
    {

        return view('Admin.AdminDashboard', [
            'NavActive' => 'DashboardNav'
        ]);

    }
    public function AdminUserList()
    {
        return view('Admin.UserList', [
            'NavActive' => 'UserNav'
        ]);

    }

    public function DeviceManagement()
    {
        $data = Device::all();

        return view('DeviceManagement', [
            'data' => $data,
            'NavActive' => 'DeviceManagement'
        ]);
    }

    public function ViewUserDevice(Request $request){
        $data = Device::where('Owner', $request->DeviceOwner)->get();

        return view('DeviceManagement', [
            'data' => $data,
            'NavActive' => 'DeviceManagement'
        ]);
    }
    // End Admin

    //Client
    public function ClientDashboard()
    {
        return view('Client.ClientDashboard', [
            'NavActive' => 'ClientDashboard'
        ]);
    }
    public function AboutUs()
    {
        return view('Client.AboutUs', [
            'NavActive' => 'AboutUs'
        ]);
    }
    public function ContactUs()
    {
        return view('Client.ContactUs', [
            'NavActive' => 'ContactUs'
        ]);
    }
    public function ClientDeviceManagement()
    {
        $data = Device::where('Owner', session()->get('Name'))->get();

        return view('DeviceManagement', [
            'data' => $data,
            'NavActive' => 'DeviceManagement'
        ]);
    }

    public function requestlist(){

        return view('requestlist',[

            'data' => Device::where('status', 'pending')->get(),
            'NavActive' => 'requestlist'

        ]);

    }
}
