<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Mail\SendMail;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    //TẤT CẢ SẢN PHẨM
    public function allProduct()
    {

        $ds = DB::table('product')->paginate(9);
        return view('user.product.allProduct')->with(['products' => $ds]);
    }

    //SẢN PHẨM THEO THỂ LOẠI
    public function categoryProduct($category_id)
    {
        $ds = DB::table('product')
            ->where('category_id', intval($category_id))
            ->paginate(9);

        // LẤY THÔNG TIN TIÊU ĐỀ CHO THỂ LOẠI
        $title = DB::table('category')
            ->where('id', intval($category_id))
            ->first();

        return view('user.product.categoryProduct')->with(['products' => $ds, 'tle' => $title]);
    }

    //SẢN PHẨM CHI TIẾT
    public function productDetail($id)
    {

        $ds = DB::table('product')
            ->where('id', $id)
            ->first();

        //DỮ LIỆU ĐỂ SHOW FEEDBACK
        $fb = DB::table('feedback')
            ->where('product_id', intval($id))
            ->join('account', 'feedback.account_id', '=', "account.id")
            ->paginate(1);

        //LẤY DỮ LIỆU KT NULL HƠI CHỐNG CHẾ
        $fbn = DB::table('feedback')
            ->where('product_id', intval($id))
            ->first();

        return view('user.product.productDetail')->with(['products' => $ds, 'fb' => $fb, 'fbn'=>$fbn]);
    }

    //SEARCH NAME ALL PRODUCTS
    public function srAllProductName(Request $request)
    {


        $srName = $request->input('srName');

        $ds = DB::table('product')
            ->where('name', 'LIKE', '%' . $srName . '%')
            ->paginate(9);

        return view('user.product.allProduct')->with(['products' => $ds]);
    }

    //SEARCH FILTER ALL PRODUCTS
    public function srAllProductFilter(Request $request)
    {
        $filter = $request->input('filter');

        if ($filter == 'high') {
            $ds = DB::table('product')
                ->orderByRaw('price DESC')
                ->paginate(9);
        } else {
            $ds = DB::table('product')
                ->orderByRaw('price ASC')
                ->paginate(9);
        }

        return view('user.product.allProduct')->with(['products' => $ds]);
    }

    //SEARCH PRICE ALL PRODUCTS
    public function srAllProductPrice(Request $request)
    {
        $price1 = $request->input('price1');
        $price2 = $request->input('price2');
        if ($price1 == null && $price2 == null) {
            //PRICE1 && PRICE2 == NULL THÌ LẤY TOÀN BỘ SP
            $ds = DB::table('product')
                // ->where('category_id', intval($category_id))
                ->paginate(9);

            // $title = DB::table('category')
            // ->where('id', intval($category_id))
            // ->get();


            // $title = DB::table('category')
            //     ->where('id', intval($category_id))
            //     ->first();

            return view('user.product.allProduct')->with(['products' => $ds]);
        } else {
            //THÔNG TIN SP LỌC THEO GIÁ
            $ds = DB::table('product')
                ->whereBetween('price', [$price1, $price2])
                // ->where('category_id', intval($category_id))
                ->paginate(9);;

            // $title = DB::table('category')
            //     ->where('id', intval($category_id))
            //     ->first();

            return view('user.product.allProduct')->with(['products' => $ds]);
        }
    }


    //SEARCH NAME CATEGORY PRODUCTS
    public function srCategoryProductName(Request $request, $category_id)
    {

        $srName = $request->input('srName');

        $ds = DB::table('product')
            ->where('category_id', $category_id)
            ->where('name', 'LIKE', '%' . $srName . '%')
            ->paginate(9);

        // LẤY THÔNG TIN TIÊU ĐỀ CHO THỂ LOẠI
        $title = DB::table('category')
            ->where('id', intval($category_id))
            ->first();

        return view('user.product.categoryProduct')->with(['products' => $ds, 'tle' => $title]);
    }

    //SEARCH FILTER CATEGORY PRODUCTS
    public function srCategoryProductFilter(Request $request, $category_id)
    {

        $filter = $request->input('filter');

        if ($filter == 'high') {
            $ds = DB::table('product')
                ->where('category_id', $category_id)
                ->orderByRaw('price DESC')
                ->paginate(9);
        } else {
            $ds = DB::table('product')
                ->where('category_id', $category_id)
                ->orderByRaw('price ASC')
                ->paginate(9);
        }

        // LẤY THÔNG TIN TIÊU ĐỀ CHO THỂ LOẠI
        $title = DB::table('category')
            ->where('id', intval($category_id))
            ->first();


        return view('user.product.categoryProduct')->with(['products' => $ds, 'tle' => $title]);
    }

    //SEARCH PRICE ALL PRODUCTS
    public function srCategoryProductPrice(Request $request, $category_id)
    {
        $price1 = $request->input('price1');
        $price2 = $request->input('price2');
        if ($price1 == null && $price2 == null) {
            //PRICE1 && PRICE2 == NULL THÌ LẤY TOÀN BỘ SP
            $ds = DB::table('product')
                ->where('category_id', intval($category_id))
                ->paginate(9);

            // $title = DB::table('category')
            // ->where('id', intval($category_id))
            // ->get();


            $title = DB::table('category')
                ->where('id', intval($category_id))
                ->first();

            return view('user.product.categoryProduct')->with(['products' => $ds, 'tle ' => $title]);
        } else {
            //THÔNG TIN SP LỌC THEO GIÁ
            $ds = DB::table('product')
                ->whereBetween('price', [$price1, $price2])
                ->where('category_id', intval($category_id))
                ->paginate(9);;

            $title = DB::table('category')
                ->where('id', intval($category_id))
                ->first();

            return view('user.product.categoryProduct')->with(['products' => $ds, 'tle' => $title]);
        }
    }

    //SHOPPING-CART

    public function cart()
    {
        return view('user.cart');
    }


    public function addToCart($id)
    {
        $product = Product::find($id);

        if (!$product) {

            abort(404);
        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image_1
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image_1
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }


    //SEND MAIL !!!
    public function storeOrder(Request $request)
    {
        // KIỂM TRA GIỎ HÀNG TRC KHI ORDER NẾU CHƯA CÓ THÌ CHO OUT
        if ($request->session()->has('cart') == false) {
            return redirect('/');
        } elseif (count(session("cart")) == 0) {
            return redirect('/');
        }

        //LẤY TOÀN BỘ DỮ LIỆU VÀ THÊM VÀO BẢNG
        $data = $request->all();
        $order = Order::create($data);

        //THÊM THÔNG TIN VÀO BẢNG ORDER_ITEM
        if ($order) {

            $cart = session()->get('cart');

            foreach ($cart as $id => $detail) {
                $order_item = new OrderDetail;

                $order_item->order_id = $order->id;
                $order_item->product_id = $id;
                $order_item->qty = $detail['quantity'];
                $order_item->price = $detail['price'];
                $order_item->amt = $detail['price'] * $detail['quantity'];

                $r = $order_item->save();
            }
            //echo "Tạo mới don hang thành công <br>";

            //LẤY TÊN E-MAIL ĐỂ GỬI MAIL
            $email = $request->input('shipping_email');
            // THÔNG TIN ĐỂ GỬI MAIL
            $data_mail = array(
                'name'      =>  $request->input('name'),
                'shipping_address'   =>  $request->input('shipping_address'),
                'payment_term' => $request->input('payment_term'),
            );
            // GỬI MAIL
            Mail::to('' . $email)->send(new SendMail($data_mail));
            //KHI THANH TOÁN XONG THÌ 'OF COURSE' KHÔNG CÒN GÌ TRONG GIỎ HÀNG RỒI
            session()->forget('cart');
            return redirect('/home');
        } else {
            echo "Tạo mới don hang bi Loi:  không thành công !";
        }
    }
}
