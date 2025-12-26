<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // MEMUNCULKAN LOGIN 
    public function showLogin()
    {
        return view('auth.login');
    }

    // BAGIAN REGISTER 
    public function showRegister()
    {
        return view('auth.register');
    }

//    LOGIN
  public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($credentials)) {
        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    $request->session()->regenerate();

    $user = Auth::user();


    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('pengunjung.dashboard');
}


//    register
   public function register(Request $request)
{
   $request->validate([
    'name'     => 'required|string|max:100',
    'email'    => 'required|email|unique:users,email',
    'password' => 'required|min:6',
    'type'     => 'required|in:vip,regular',
    'phone'    => 'required|string|max:15', 
]);
// untuk menambahkan admin secara manual  
// php artisan tinker

// use App\Models\User;
// > use Illuminate\Support\Facades\Hash;
// >
// > User::create([
//      'name' => 'Admin Name',
//      'email' => 'admin@example.com',
//      'password' => Hash::make('password_admin'),
//      'role' => 'admin',
//      'phone' => '08123456789',
//  ]);

    $user = User::create([
    'name'     => $request->name,
    'email'    => $request->email,
    'password' => Hash::make($request->password),
    'phone'    => $request->phone, 
    'role'     => 'pengunjung',
]);
    Ticket::create([
    'user_id'     => $user->id,
    'ticket_code' => 'KNSR-' . strtoupper(Str::random(6)),
    'type'        => $request->type,
    'status'      => 'waiting',
    'ordered_at'  => now(), 
]);

    Auth::login($user);

    return redirect()->route('pengunjung.dashboard')
        ->with('success', 'Tiket berhasil dipesan');
}


// logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
