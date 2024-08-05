<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Closure;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'token', // Thêm vào đây
    ];
    public $email = '';

    public $username = '';

    public $fullname = '';

    public $token = '';
    public $password = '';
    // protected $routeMiddleware = [
    //     // ...
    //     'auth.check' => \App\Http\Middleware\CheckAuthenticated::class,
    // ];

    public function index()
    {
        return view('authentications.signIn');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('authentications.signUp');
    }
    public function login(Request $request)
    {
        // Validate the login form data
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'max:255'],
        ]);

        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication passed, redirect to the homepage
            return redirect()->intended(route('trang-chu.index'));
        }

        // Authentication failed, return error
        return redirect(route('trang-chu.index', absolute: false));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'max:255'],
            'fullname' => ['required', 'string', 'max:255'],
        ]);

        $users = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'fullname' => $request->fullname,
        ]);



        Auth::login($users);

        return redirect(route('trang-chu.index', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('profiles.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('authentications.signIn')->with('error', 'Bạn cần đăng nhập để truy cập trang này.');
        }

        return $next($request);
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect('/tai-khoan')->withErrors(['msg' => 'Unable to login using Google. Please try again.']);
        }

        // Check if the user already exists in your database
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            // If the user exists, log them in
            Auth::login($user);
        } else {
            // If the user does not exist, create a new user
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'password' => Hash::make(Str::random(16)), // You can use a random password or any other logic
                // Add other fields as necessary
            ]);
            Auth::login($user);
        }

        return redirect()->intended('trang-chu.index'); // Redirect to the intended page or home
    }
    
}
