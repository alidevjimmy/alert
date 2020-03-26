<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.index');
    }

    public function loginForm()
    {
        if (!auth()->guard('admin')->check()) {
            return view('auth.login');
        }
        return redirect(route('admin.index'));

    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
           'email' => 'required',
           'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt($validatedData , $request->get('remember'))) {
            return redirect(route('admin.index'));
        }
        return back()->withErrors([
            'email' => 'پسورد یا رمز عبور نامعتبر است'
        ]);
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect(route('login.form'));
    }

    public function changePassForm()
    {
        return view('admin.pages.changePass');
    }
    public function changePass(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);
        $user = auth()->guard('admin')->user();
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect(route('admin.index'))->with([
            'status' => 'success',
            'message' => 'رمز عبور با موفقیت تغییر کرد'
        ]);
    }
}
