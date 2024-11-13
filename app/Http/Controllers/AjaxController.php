<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Device;
use App\Models\ProductSales;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Http;

class AjaxController extends Controller
{
    //Admin
    public function usernameCheck(Request $request)
    {
        $Username = User::where('username', $request->username)->first();

        if ($Username) {
            return response()->json(['exist' => true]);
        } else {
            return response()->json(['exist' => false]);
        }
    }
    public function checkDeviceId(Request $request)
    {
        $DeviceIdChecker = Device::where('Device_Id', $request-> DeviceId)->first();

        if ($DeviceIdChecker) {
            return response()->json(['exist' => true]);
        } else {
            return response()->json(['exist' => false]);
        }
    }
    public function getOwnerName()
    {
        $data = User::distinct('name')
        ->where('designation', 'Client')
        ->select('name')->get();

        return response()->json(['data' => $data]);
    }

    public function checkPassword(Request $request)
    {
        $data = User::where('name', $request->Name)->first();
        if (Hash::check($request->Password, $data["password"])) {
            return response()->json(['result' => true]);
        } else {
            return response()->json(['result' => false]);
        }
    }



    public function AdminChart()
    {
        $sales = ProductSales::selectRaw('MONTH(created_at) as month, SUM(Price) as total')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Initialize array with default values
        $monthlySalesData = array_fill(1, 12, 0); // Months 1-12 with 0

        foreach ($sales as $sale) {
            $monthlySalesData[$sale->month] = $sale->total;
        }
        $monthlySalesData = array_values($monthlySalesData);
        return response()->json(['result' => $monthlySalesData]);
    }

    public function IndividualChart(Request $request)
    {
        $sales = ProductSales::selectRaw('MONTH(created_at) as month, Container, SUM(Price) as total')
        ->where('Device_id', $request->Device_Id)
        ->groupBy('month', 'Container')
        ->orderBy('month')
        ->get();


        // Initialize array with default values
        $monthlySalesData1 = array_fill(1, 12, 0); // Months 1-12 with 0
        $monthlySalesData2 = array_fill(1, 12, 0); // Months 1-12 with 0

        //Populate the array with actual sales data
        foreach ($sales as $sale) {
            if ($sale->Container == "Container1") {
                $monthlySalesData1[$sale->month] = $sale->total; // Fill the corresponding month
            } else {
                $monthlySalesData2[$sale->month] = $sale->total; // Fill the corresponding month
            }
        }
        //Zero base index
        $monthlySalesData1 = array_values($monthlySalesData1);
        $monthlySalesData2 = array_values($monthlySalesData2);


        return response()->json([
            'dataset1' => $monthlySalesData1,
            'dataset2' => $monthlySalesData2,
        ]);

    }
    //EndAdmin

    //Client
    public function ClientChart(Request $request)
    {
        $sales = ProductSales::selectRaw('MONTH(product_sales.created_at) as month, SUM(product_sales.Price) as total')
        ->join('devices', 'product_sales.Device_id', '=', 'devices.Device_Id')
        ->where('devices.Owner', $request->Name)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Initialize array with default values
        $monthlySalesData = array_fill(1, 12, 0); // Months 1-12 with 0

        foreach ($sales as $sale) {
            $monthlySalesData[$sale->month] = $sale->total;
        }
        $monthlySalesData = array_values($monthlySalesData);
        return response()->json(['result' => $monthlySalesData]);
    }

    //Universal
    public function sendOtp(Request $request){
        $data = User::where('username', $request->username)->first();
        if(!$data){
            return response()->json([
                'MsgEmail'=>true
            ]);
        }else{
            $otp = substr(str_shuffle('0123456789'), 0, 4);

        //Send Sms
        $deviceId = ENV('TEXTBEE_DEVICE_ID'); // Replace with your device ID
        $apiKey = ENV('TEXTBEE_API_KEY'); // Replace with your API key
        $url = "https://api.textbee.dev/api/v1/gateway/devices/$deviceId/sendSMS";
  
        $response = Http::withHeaders([
            'x-api-key' => $apiKey,
            'Content-Type' => 'application/json',
        ])->post($url, [
            'recipients' => ['+63'.$data->contact], // Replace with the actual recipient number
            'message' => 'Your OTP is: '.$otp,
        ]);
  
        // Check for successful response
        if ($response->successful()) {
            return response()->json(['message' => 'SMS sent successfully!', 'data' => $response->json(), 'OTP' => $otp]);
        } else {
            return response()->json(['message' => 'Failed to send SMS.', 'error' => $response->body()], $response->status());
        }
    }


    }

}
