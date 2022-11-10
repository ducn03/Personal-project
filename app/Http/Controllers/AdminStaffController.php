<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminStaffController extends Controller
{
    public function viewStaff()
    {
        //LẤY THÔNG TIN NHÂN VIÊN TRỪ TT CỦA QUẢN TRỊ
        $s = DB::table('account')
            ->where('role', intval(2))
            ->get();
        return view('admin.staff.viewStaff')->with(['staff' => $s]);
    }

    public function createStaff()
    {
        //VÀO TRANG ĐỂ THÊM NHÂN VIÊN
        return view('admin.staff.createStaff');
    }

    public function postStaffCreate(Request $request)
    {
        //QUY TRÌNH TẠO THÊM ACCOUNT NHÂN VIÊN
        $fullname = $request->input('fullname');
        $address = $request->input('address');
        $email = $request->input('email');
        $tel = $request->input('tel');
        $password = $request->input('password');
        $passwordConfirm = $request->input('passwordConfirm');
        if ($password != $passwordConfirm) {
            return redirect('/admin/createStaff')->with('message', 'Password does not match confirm password !');;
        }
        $role = 2;
        $active = 1;

        // IMAGE1
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("asset/admin/images/avatar", $imageName);
        } else {
            $imageName = null;
        }

        $s = DB::table('account')
            ->insert([
                'fullname' => $fullname,
                'password' => $password,
                'address' => $address,
                'email' => $email,
                'tel' => $tel,
                'role' => $role,
                'picture' => $imageName,
                'active' => $active
            ]);

        return redirect('/admin/viewStaff');
    }

    public function updateStaff($email)
    {
        $s = DB::table('account')
            ->where('email', $email)
            ->first();
        return view('admin.staff.updateStaff')->with(['staff' => $s]);
    }

    public function postStaffUpdate(Request $request, $email)
    {
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $tel = $request->input('tel');
        $address = $request->input('address');
        $role = $request->input('role');

        // AVATAR
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/updateStaff/' . $email)->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("asset/admin/images/avatar", $imageName);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = DB::table('account')
                ->where('email', intval($email))
                ->first();
            $imageName = $p->picture;
        }

        if ($role == 2) {
            $s = DB::table('account')
                ->where('email', $email)
                ->update([
                    'email' => $email,
                    'fullname' => $fullname,
                    'tel' => $tel,
                    'address' => $address,
                    'role' => $role
                ]);
        }
        if ($role == null) {
            $s = DB::table('account')
                ->where('email', $email)
                ->update([
                    'email' => $email,
                    'fullname' => $fullname,
                    'tel' => $tel,
                    'address' => $address,
                ]);
        }
        return redirect('admin/viewStaff');
    }

    public function deleteStaff($email)
    {
        $s = DB::table('account')
            ->where('email', $email)
            ->delete();
        return redirect('admin/viewStaff');
    }

    public function lockStaff($email)
    {
        //LẤY ACTIVE CỦA NHÂN VIÊN ĐỂ DÙNG CHO 2 BẢNG DƯỚI
        $staff = DB::table('account')
            ->where('email', $email)
            ->first();

            //KHOÁ ACCOUNT
        if ($staff->active == 1) {
            $s = DB::table('account')
                ->where('email', $email)
                ->update([
                    'active' => 2
                ]);
            return redirect('admin/viewStaff');
        }

        //MỞ KHOÁ ACCOUNT
        if ($staff->active == 2) {
            $s = DB::table('account')
                ->where('email', $email)
                ->update([
                    'active' => 1
                ]);
            return redirect('admin/viewStaff');
        }
    }
}
