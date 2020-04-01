<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\UserRegister;
use App\Http\Controllers\Controller;
use App\User;
use App\Verification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'required'
        ]);
        $user = User::create([
            'phone' => $request->phone
        ]);
        return event(new UserRegister($user));
    }

    public function checkCode(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'phone' => 'required'
        ]);
        $user = User::where('phone', $request->phone)->latest()->first();
        if ($user) {
            $code = Verification::where('user_id', $user->id)->where('code', $request->code)->where('used' , false)->first();
            if ($code) {
                if ($token = JWTAuth::attempt(['phone' => $user->phone, 'password' => 'password'], ['exp' => Carbon::now()->addYear(3)->timestamp])) {
                    $code->update([
                        'used' => true
                    ]);
                    return response()->json([
                        'token' => $token,
                    ]);
                }
                return response()->json([
                    'token' => null
                ]);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'کد تایید نادرست است',
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'شماره یافت نشد'
        ]);
    }

}
