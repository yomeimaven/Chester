<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\ProductSales;
use App\Models\StockTable;
use Session;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function SubmitAddDevice(Request $request)
    {
        try {
            Device::insert([
                'Device_Id' => $request-> DeviceId,
                'Device_Name' => $request-> DeviceName,
                'Owner' => $request-> OwnerName,
                'Date_Registered' => date('Y-d-m'),
                'status' => 'pending'
            ]);
            StockTable::create([
                'Device_Id' => $request-> DeviceId,
            ]);
            Session::flash('success', 'Device Added Successfuly!');
            return back();
        } catch (Exception $e) {
            dd($e->getMessage());
        }

        // return response()->json([

        //     'data' => $request->all()

        // ]);

    }
    public function RemoveDevice(Request $request)
    {
        $delDevice = Device::find($request->id)->delete();
        if ($delDevice) {
            Session::flash('success', 'Deleted Successfuly');
            return back();
        }
    }

    public function IndividualDeviceReport(Request $request)
    {
        $deviceName = Device::where('Device_Id', $request->Device_Id)->first();
        $stock = StockTable::where('Device_Id', $request->Device_Id)->first();

        return view('individualDeviceReport', [
            'NavActive' => 'DeviceList',
            'Device_Id' => $request->Device_Id,
            'DeviceName' => $deviceName,
            'Stock' => $stock
        ]);

    }

    public function UserDevice(Request $request)
    {
        return view('DeviceReport');
    }

    public function Restock(Request $request)
    {
        try {
            $Update = StockTable::where('Device_id', $request->Device_Id)->update([
                'Container1' => $request->Container1,
                'Container2' => $request->Container2,
            ]);
            Session::flash('success', 'Restock Success!');
            return back();
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function approve(Request $request){

        Device::where('id', $request->id)->update([

            'status' => 'approve'

        ]);

        Session::flash('success', 'New Device Approve!');
        return back();

    }

    public function decline(Request $request) {

        Device::where('id', $request->id)->delete();

        Session::flash('success', 'New Device Declined!');
        return back();
        // echo  "hello";
    }
}
