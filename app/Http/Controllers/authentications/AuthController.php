<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {    
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => ['required', 'string', 'min:8', 'regex:/[a-z]/', 'regex:/[0-9]/'],
            ]);
    
            $credentials = $request->only('email', 'password');
    
            $email = $request->input("email");

            $user = DB::connection('mysql')->table('users')
                ->where('email', $request->input('email'))
                ->first();
            
            if (!$user) {
                return response()->json(['error' => 'Email tidak ditemukan'], 404);
            }

            if (Hash::check($request->input('password'), $user->password)) {
                $this->getUserInfo($email);
                session(['login_time' => now()]); 
                // dd(session('userData'));
                return redirect()->route('admin-dashboard');
            } else {
                return back()->withErrors(['password' => 'Password salah']);
            }

        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            dd($errorMessage);
            return back()->withErrors(['email' => 'Gagal login, silahkan cek email atau password anda']);
        }
    }

    public function getUserInfo ($email) {
        $data = DB::connection('mysql')->select('
            select 
                p.id "idPegawai", 
                p.nama "namaPegawai", 
                mcd.nama_cabang "cabangDpf", 
                md.nama_divisi "namaDivisi", 
                u.email 
            from 
                t_riwayat_pegawai trp 
                join pegawai p on p.id = trp.id_pegawai 
                join m_cabang_dpf mcd on mcd.id = trp.id_cabang_dpf 
                join m_divisi md on md.id = trp.id_divisi 
                join users u on u.id = trp.id_pegawai 
            where 
                u.email = ?;
        ',
            [$email]
        );  
        
        session(['userData' => $data[0]]);
    }

}
