<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // xử lí đăng kí 
    public function register(Request $request)
    {
        $phone_number = $request->input('phone_number');
        $password = $request->input('password');

        // kiểm tra đầu vào 
        if (DB::table('user')->where('phone_number', '=', $phone_number)->exists()) {
            // nếu tồn tại thì thông báo 
            return response()->json([
                "message" => "Phone number is existed"
            ], 400);
        } else {
            // nếu không thì lưu 
            $hash_pass = Hash::make($password);
            DB::table('user')->insert([
                'name' => $phone_number,
                'phone_number' => $phone_number, 
                'password' => $hash_pass,
                'token' => ''
            ]);
            return response()->json([
                "message" => "Register id successfull"
            ]);
        }
    }
}
