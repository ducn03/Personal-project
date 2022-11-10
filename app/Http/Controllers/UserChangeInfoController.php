<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UserProfileController;

class UserChangeInfoController extends Controller
{
    public function changeInfo($id){

        //LẤY THÔNG TIN MEMBER THEO ID KHI ĐÃ ĐN
        $user = DB::table('account')
            ->where('id', $id)->first();

        return view('user.profile.changeInfo', ['user'=>$user]);
    }

    public function postChangeInfo(Request $request, $id){

        // LẤY DỮ LIỆU TỪ FORM
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $tel = $request->input('tel');
        $address = $request->input('address');

        // xử lý upload hình vào thư mục
        // IMAGE_1
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/updateProduct/'.$id)->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("asset/user/member_img", $imageName);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = DB::table('account')
                ->where('id', intval($id))
                ->first();
            $imageName = $p->picture;
        }

        $p = DB::table('account')
        ->where('id', intval($id))
        ->update([
            'fullname' => $fullname,
            'email' => $email,
            'picture' => $imageName,
            'tel' => $tel,
            'address' => $address
        ]);

        $request->session()->forget('user_2');
        $user = DB::table('account')->where('id', $id)->first();
        session(['user_2' => $user]);

     return view('user.profile.info');
    }
}
