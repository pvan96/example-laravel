<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showLoginView()
    {
        if (Auth::check()) {
            return redirect()->route('categories.list');
        }
        return view('pages.user.login');
    }

    // type-hint
    // $categoryService la 1 instance cua class CategoryService
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('categories.list');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('showLoginView');
    }
}
