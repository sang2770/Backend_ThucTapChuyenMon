<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_admin',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails()){
            return response()->json(['status'=>"Failed", "Err_Message"=>Arr::first(Arr::flatten($validator->errors()->get('*')))]);    
        }

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
         ]);
        $result = ['status' => 'Success', 'data'=>$user];
        return response()
            ->json($result);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            // Bad Request
            return response()->json($validator->getMessageBag(), 400);
        }
        // Check Email
        $user = Admin::where('email', $request['email'])->firstOrFail();
        // Check pass
        if(!$user || !Hash::check($request['password'], $user->password))
        {
            return ['status' => 'Failed',"Err_Message"=>"Tài khoản hoặc mật khẩu không đúng"];
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        $result = ['status' => 'Success', 'Token_access' => $token, 'Token_type' => "Bearer ", 'user' => $user];
        return response()->json($result);
    }

    // logout
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return response()->json(['status'=>"Success"]);
        } catch (Exception $e) {
            return response()->json(['status'=>"Failed"]);
        }
    }

    // Get User
    public function user(Request $request)
    {
        $user = $request->user();
        if($user)
        {
            $result = ['status' => 'Success',  'user' => $user];
            return response()->json($result);
        }else{
            return response()->json(["status"=>"Failed"]);
        }

    }

    // change pass
    public function changePass(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'id_admin' => 'required',
            'Old' => 'required',
            'New' => 'required',

        ]);
        if ($validator->fails()) {
            // Bad Request
            return response()->json($validator->getMessageBag(), 400);
        }
        try {
            $Id = $request->id_admin;
            $New =  Hash::make($request->New);
            $user = Admin::where('id_admin', $Id)->first();
            // var_dump($user);
            if (!$user) {
                return response()->json(['status' => 'Failed', 'Err_Message' => "Not Found"]);
            } elseif (!Hash::check($request->Old, $user->password)) {
                return response()->json(['status' => 'Failed', 'Err_Message' => "Mật khẩu không chính xác!"]);
            } else {
                Admin::where("id_admin", $Id)->update(['password' => $New]);
                $request->user()->currentAccessToken()->delete();
                return response()->json(['status' => 'Success']);
            }
        } catch (Exception $e) {
            return response()->json(['status' => 'Failed', 'Err_Message' => $e->getMessage()]);
        }
    }
}
