<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCustomerController extends Controller
{
    public function viewCustomer()
    {
        //LẤY THÔNG TIN KHÁCH HÀNG
        $c = DB::table('account')
            ->where('role', intval(1))
            ->get();
        return view('admin.customer.viewCustomer')->with(['customer' => $c]);
    }

    public function deleteCustomer($id)
    {
        $c = DB::table('account')
            ->where('id', intval($id))
            ->delete();
        return redirect('admin/viewCustomer');
    }

    public function lockCustomer($email)
    {
        //LẤY ACTIVE CỦA KHÁCH HÀNG ĐỂ DÙNG CHO 2 BẢNG DƯỚI
        $customer = DB::table('account')
            ->where('email', $email)
            ->first();

            //KHOÁ ACCOUNT
        if ($customer->active == 1) {
            $c = DB::table('account')
                ->where('email', $email)
                ->update([
                    'active' => 2
                ]);
            return redirect('admin/viewCustomer');
        }

        //MỞ KHOÁ ACCOUNT
        if ($customer->active == 2) {
            $c = DB::table('account')
                ->where('email', $email)
                ->update([
                    'active' => 1
                ]);
            return redirect('admin/viewCustomer');
        }
    }
}
