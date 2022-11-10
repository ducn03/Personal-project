<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserOrderHistoryController extends Controller
{
    public function orderHistory($id)
    {
        //LẤY THÔNG TIN LỊCH SỬ ĐÃ ORDER CHO MEMBER ĐÃ ĐN
        $o = DB::table('order')
            ->where('member_id', intval($id))
            // đảo ngược mảng
            ->orderByRaw('id DESC')
            ->paginate(6);

        //LẤY THÔNG TIN SẢN PHẨM ĐÃ ĐƯỢC ORDER
        //KHÔNG PHẢI THEO ID VÌ TA SẼ @IF BÊN TRANG KIA
        $oi = DB::table('order_item')
            ->join('product', 'order_item.product_id', '=', 'product.id')
            ->get();

        return view('user.profile.orderHistory')->with(['o' => $o, 'oi' => $oi]);
    }

    //XOÁ ĐƠN HÀNG
    public function orderDelete($id)
    {
        $od = DB::table('order_item')
            ->where('order_id', intval($id))
            ->delete();
        $od2 = DB::table('order')
            ->where('id', intval($id))
            ->delete();

        return redirect('user_2/orderHistory/' . session('user_2')->id)->with('alert', 'You have successfully canceled your order!');
    }
}
