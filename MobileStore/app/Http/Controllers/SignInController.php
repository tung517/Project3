<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignInController extends Controller
{
    //

    public function sign_in(Request $request)
    {
        $phone_number = $request->input('phone_number');
        $password = $request->input('password');
        // kiểm tra 
        if (DB::table('user')
            ->where('phone_number', '=', $phone_number)
            ->exists()
        ) {
            $hash_pass = DB::table('user')->select('password')
                ->where('phone_number', '=', $phone_number)->get()->pluck('password');
            $check = Hash::check($password, $hash_pass[0]);
            if ($check) {
                $token_string = $phone_number . $password . now();
                $token = Hash::make($token_string);
                DB::table('user')
                    ->where('phone_number', '=', $phone_number)
                    ->update(array('token' => $token));

                return response()->json([
                    "token" => $token
                ], 200);
            } else {
                return response()->json([
                    "message" => "Password is wrong"
                ], 400);
            }
        } else {
            return response()->json([
                "message" => "Account not exists"
            ], 400);
        }
    }

    public function sign_out(Request $request)
    {
        $token = $request->input('token');
        if (isset($token)) {
            DB::table('user')->where('token', '=', $token)->update(array('token' => ''));
            return response()->json([
                "message" => "Your are log out"
            ], 200);
        } else {
            return response()->json([
                "message" => "Fail"
            ], 400);
        }
    }
}
