<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    public function info($id){

        //LẤY THÔNG TIN MEMBER THEO ID KHI ĐÃ ĐN
        $user = DB::table('account')
            ->where('id', $id)->first();
        return view('user.profile.info', ['user'=>$user]);
    }

    //Change password
    public function changePass($id){

        $user = DB::table('account')
            ->where('id', $id)->first();

        return view('user.profile.changePass')->with(['user' => $user]);
    }

    public function postChangePass(Request $request, $id)
    {

        //LẤY THÔNG TIN MEMBER ĐỂ SO SÁNH
        $user = DB::table('account')
            ->where('id', $id)->first();

        $old_pass = $request->input('old_pass');
        //PASS CŨ KHÔNG GIỐNG THÌ FLASH VỀ TRANG ... VÀ TRẢ THONG BÁO FAIL
        if ($old_pass != $user->password) {
            return redirect('user_2/changePass/' . $id)->with('passF', 'Change password Fail. Because old_pass not true!');
        }

        $new_pass = $request->input('new_pass');
        $confirm_pass = $request->input('confirm_pass');


        if ($confirm_pass != $new_pass) {
            return redirect('user_2/changePass/' . $id)->with('passF', 'Change password Fail. Because confirm_pass no coincidences new_pass!');
        }
        // NẾU MẬT KHẨU MỚI HOẶC NHẬP LẠI MẬT KHẨU == NULL THÌ CHO FLASH VỀ TRANG ... TRẢ THÔNG BÁO F
        if ($confirm_pass == null || $new_pass == null) {
            return redirect('user_2/changePass/' . $id)->with('passF', 'Change password Fail. Because confirm_pass = null OR new_pass = null');
        }

        $p = DB::table('account')
            ->where('id', intval($id))
            ->update([
                'password' => $new_pass
            ]);

        return redirect('user_2/changePass/' . $id)->with('passT', 'Change password success!');
    }
}
