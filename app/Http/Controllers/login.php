<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class login extends Controller
{
    public function signUp(){

        return view('user.login.sign-up');
    }

    public function signIn(Request $request){

         //KIỂM TRA ĐIỀU KIỆN BỊ THỪA NHƯNG LƯỜI SỬA
        //NẾU ĐĂNG NHẬP RỒI THÌ KHI VÀO TRANG LOGIN CHO AMIN
        //SẼ BỊ ĐẨY VÀO TRANG DASHBOARD
        if (session()->has('admin')) {
            $user = $request->session()->get('admin');

            return redirect('admin/dashboard');
        }
        // NẾU CHƯA ĐĂNG NHẬP THÌ TRẢ VỀ TRANG LOGIN CHO ADMIN
        return view('user.login.sign-in');
    }

    public function postSignUp(Request $request){

        // lấy tên
        $name = $request->input('name');
        // lấy email
        $email = $request->input('email');

        // nếu k null thì mail trùng
        $checkM = DB::table('account')
            ->where('email', $email)
            ->first();

        //KIỂM TRA THÔNG TIN XEM CÓ TRÙNG MAIL KHÔNG
        if ($checkM) {
            return redirect('signUp')->with('loi', 'Username available !');
        }

        // lấy password
        $password = $request->input('password');
        //lấy mk xác nhận
        $password_confirm = $request->input('password_confirm');

        // KIỂM TRA PASSWORD CÓ ĐÚNG K
        if($password != $password_confirm){
            return redirect('signUp')->with('loi', 'The password is not the same as the confirmation password !');
        }

        //lấy sdt và địa chỉ
        $tel = $request->input('tel');
        $address = $request->input('address');

        //kiểm tra ảnh
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('signUp')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("asset/user/member_img", $imageName);
        } else {
            $imageName = null;
        }

        //mặc định trạng thái và quyền là user
        $active = 1;
        $role = 1;

        // Thực hiện đk (Add vào database)
        DB::table('account')->insert([
            'id'    => null,
            'email' => $email,
            'password' => $password,
            'picture' => $imageName,
            'fullname' => $name,
            'tel' => $tel,
            'address' => $address,
            'active' => $active,
            'role' => $role
        ]);

        return redirect()->action([login::class, 'signIn']);
    }
}
