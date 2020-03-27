<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Token;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenController extends Controller
{
    public function sendToken(Request $request)
    {
        $validatedData = $request->validate([
            'token' => 'required'
        ]);
        Token::firstOrCreate($validatedData);
        return response()->json([
            'status' => 'success',
            'message' => 'token inserted',
            'code' => Response::HTTP_CREATED
        ]);
    }
}
