<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\CallUs;
use App\Models\Social;
use App\Models\Department;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ExternalCategory;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function userCreate(): View
    {
        $callUs = CallUs::first();
        $social = Social::first();
        $departments = Department::all();
        $categories = Category::all();
        $brands = Brand::all();
        $externalCategories = ExternalCategory::all();
        return view('auth.userregister', compact('callUs','social','categories','departments','brands','externalCategories'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    public function userstore(Request $request)
    {
        //return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric', 'starts_with:07', 'digits:11', 'unique:'.User::class],
            'password' => ['required','max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('shopcart', absolute: false));
    }
}
