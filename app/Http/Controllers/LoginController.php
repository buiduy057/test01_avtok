<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function getDangnhap(){
        return view('login');
    }
    public function dangnhap(Request $request){
    	$username = $request->name;
        $password = $request->password;    
		if(Auth::attempt(['name'=>$username, 'password'=>$password])){
           return redirect('list-phone-number');
        } else {
            return redirect('dangnhap');
        }
    }
    public function index(Request $request){
    	$data = User::all();
    	return response()->json($data);
    }
}
