<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginAdmin extends Controller
{

    public function checkLoginAdmin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $user = DB::table('account')->where('email', $email)->first();
        //NẾU EMAIL KHÔNG NULL VÀ PASSWORD GIỐNG THÌ LƯU LẠI GIÁ TRỊ VÀO SS
        if ($user != null && $user->password == $password && $user->role == 3) {
            //ADMIN
            // $request->session()->push('user', $user);
            session(['admin' => $user]);

            //CHẶN KHI TÀI KHOẢN BỊ KHOÁ
            if (session('admin')->active == 2) {
                $request->session()->forget('admin');
                return redirect('signIn')->with('message', 'Sorry, your account is currently locked!');
            }

            return redirect("admin/dashboard");
        } else if($user != null && $user->password == $password && $user->role == 2){
            //STAFF
            session(['admin' => $user]);

            //CHẶN KHI TÀI KHOẢN BỊ KHOÁ
            if (session('admin')->active == 2) {
                $request->session()->forget('admin');
                return redirect('signIn')->with('message', 'Sorry, your account is currently locked!');
            }
            return redirect("admin/dashboard");
        } else if($user != null && $user->password == $password && $user->role == 1){
            //USER

            session(['user_2' => $user]);

            //CHẶN KHI TÀI KHOẢN BỊ KHOÁ
            if (session('user_2')->active == 2) {
                $request->session()->forget('user_2');
                return redirect('signIn')->with('message', 'Sorry, your account is currently locked!');
            }
            return redirect("/home");
        } else {
            return redirect('signIn')->with('message', 'Login Fail.');
        }
    }

    public function logoutAdmin(Request $request)
    {
        //$request->session()->invalidate();
        $request->session()->forget('admin');
        return redirect('signIn');
    }

    public function logoutUser(Request $request)
    {
        //$request->session()->invalidate();
        $request->session()->forget('user_2');
        return redirect('/home');
    }


}
