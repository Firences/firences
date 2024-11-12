<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{

    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }
    public function actionlogin(Request $request)
    {
        $user      = $request->input('user');
        $password   = $request->input('password');

        if(Auth::guard('web')->attempt(['user' => $user, 'password' => $password])) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Login Gagal!'
            ], 401);
        }

    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $user = $request->input('user');
        $password     = $request->input('password');
        $nama = $request->input('nama');
        $alamat = $request->input('alamat');
        $telepon = $request->input('telepon');
        $sim = $request->input('sim');
        $users2 = '';
        $users = DB::table('users')->where('user', $user)->get();       
        foreach ($users as $users1) {
            $users2 = $users1->user;
        }
        if($users2<>'') {
            return response()->json([
                'success' => false,
                'message' => 'User sudah ada'
            ], 201);
        } else {            
            DB::table('users')->insert([
                'user'=>$request->user,
                'password'=>Hash::make($password),
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'telepon' => $request->telepon,
                'sim'=>$sim
            ]);
            if($user) {
                return response()->json([
                    'success' => true,
                    'message' => 'Register Berhasil!'
                ], 201);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Register Gagal!'
                ], 400);
            }
        }
    }

    public function setting()
    {
        return view('setting');
    }
    public function updatesetting(Request $request)
    {
        $user=Auth::user()->user;
        // Validasi data
        $request->validate(
            [
                'nama' => 'required',
                'alamat' => 'required',
                'telepon' => 'required|numeric',
                'sim' => 'required|numeric',
            ],
            [
                'nama.required' => 'nama wajib diisi',
                'alamat.required' => 'alamat wajib diisi',
                'telepon.required' => 'telepon wajib diisi',
                'sim.required' => 'sim wajib diisi',
            ]
        );

        DB::table('users')->where('user',$user)->update([
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'telepon' => $request->telepon,
            'sim' => $request->sim,
        ]);

        return redirect('home');
    }
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}