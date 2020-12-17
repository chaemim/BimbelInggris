<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function registeruser()
    {
        return view('auth.registeruser');
    }

    public function simpanregister(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);

        User::create([
            'name'  => $request->name ,
            'email'  => $request->email ,
            'password'  => Hash::make($request->password) ,
            'ttl'  => $request->ttl ,
            'alamat'  => $request->alamat ,
            'telepon'  => $request->telepon ,
            'roles_id'  => $request->role_id ,
        ]);

        Session::flash('success_message','Anda telah terdaftar. Silahkan Login terlebih dahulu!');
        return redirect('/login');
    }

    public function profil()
    {
        $user= User::where('id' , Auth::user()->id)->first();
        return view('user.profil' , compact('user'));
    }

    public function gantipassword(Request $request)
    {
         $validated = $request->validate([
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
        $user = User::where('id' , Auth::user()->id)->first();

        if (Hash::check($request->password_lama , $user->password)) {
             User::where('id' , Auth::user()->id)->update([
            'password' => Hash::make($request->password)
        ]);
        Session::flash('success_message','Password telah berhasil diubah');
        }else{
         Session::flash('danger_message','Password lama yang anda masukan salah');
        }

        return redirect('/profil');
    }
}
