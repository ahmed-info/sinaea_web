<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Models\CallUs;
use App\Models\ExternalCategory;
use App\Models\Social;
use App\Models\Department;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Controllers\DashboardController;
class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // for login admin
        return view('auth.login2');
    }

    public function userCreate(): View
    {
        // for login user
        $callUs = CallUs::first();
        $social = Social::first();
        $departments = Department::all();
        $categories = Category::all();
        $brands = Brand::all();
        $externalCategories = ExternalCategory::all();
        return view('auth.userlogin', compact('callUs','social','departments','categories','brands','externalCategories'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        $authUserEmail = Auth::user()->email;
       // return $authUserEmail;
        if($authUserEmail == 'ahmed1@gmail.com'){

            return redirect()->intended(route('dashboard', false));
        }else{
            return redirect()->intended(route('shopcart', false));
        }

    }

    public function userstore(UserLoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        $authUserEmail = Auth::user()->email;
       // return $authUserEmail;
        if($authUserEmail == 'ahmed1@gmail.com'){

            return redirect()->intended(route('dashboard', false));
        }else{
            return redirect()->intended(route('shopcart', false));
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
