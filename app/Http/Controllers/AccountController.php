<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;



class AccountController extends Controller
{
    public function LoginVerification(Request $request){
        $remember = $request->has('remember');
        if (Auth::attempt(['username' => $request->UserName, 'password' => $request->Password], $remember)){
            $data = User::find(Auth::id());
            session()->put([
                'Name' => $data-> name,
                'Designation' => $data-> designation,
                'Status' => $data->status
            ]);
            if($data-> designation == 'Administrator'){
                return to_route('AdminDashboard');
            }else{
                return to_route('ClientDashboard');
            }
        }else{
            Session::flash('error', 'The provided credentials do not match our records.');
            return back();
        }
    }

    public function Logout(){
        Auth::logout();
        session()->flush();
        return redirect('/');
    }

    //Add User
    public function SubmitAddUser(Request $request){
        try{
            User::insert([
                'name' => $request-> Name,
                'username' => $request-> Username,
                'password' => Hash::make($request-> Password),
                'address' => $request-> Address,
                'contact' => $request-> Contact,
                'designation' => "Client",
                'status' => "Active",
                'date_registered' => date('Y-d-m')
            ]);
            Session::flash('success', 'Add User Successfuly');
            return back();
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function BanUser(Request $request){
        try{
            $BanUser = User::find($request->id);
            $BanUser["status"] = "Restricted";
            $BanUser->save();
            Session::flash('success', 'User has been Restricted!');
            return back();
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
    public function UnbanUser(Request $request){
        try{
            $BanUser = User::find($request->id);
            $BanUser["status"] = "Active";
            $BanUser->save();
            Session::flash('success', 'User Unrestricted Successfuly');
            return back();
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }

    public function ChangePassword(Request $request){
        $data = User::where('name', $request->Name)->update([
            'password' => Hash::make($request->Npassword)
        ]);

        if($data){
            Auth::logout();
            session()->flush();
            return redirect('/');
        }

    }
}
