<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class AdminProductController extends Controller
{

    public function index(){

        $ds = DB::table('product')->get();

        return view('admin.product.viewProduct')->with(['products' => $ds]);
    }

    public function create(){


        return view('admin.product.createProduct');
    }

    public function postCreate(Request $request){

        // LẤY DỮ LIỆU TỪ FORM
        $product = $request->all();

        // CHECK

        // IMAGE1
        if ($request->hasFile('image_1')) {
            $file = $request->file('image_1');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName1 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName1);
        } else {
            $imageName1 = null;
        }

        // IMAGE2
        if ($request->hasFile('image_2')) {
            $file = $request->file('image_2');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName2 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName2);
        } else {
            $imageName2 = null;
        }

        //IMAGE3
        if ($request->hasFile('image_3')) {
            $file = $request->file('image_3');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName3 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName3);
        } else {
            $imageName3 = null;
        }

        // IMAGE4
        if ($request->hasFile('image_4')) {
            $file = $request->file('image_4');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName4 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName4);
        } else {
            $imageName4 = null;
        }

        // IMAGE5
        if ($request->hasFile('image_5')) {
            $file = $request->file('image_5');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('')->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName5 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName5);
        } else {
            $imageName5 = null;
        }

        // ADD PRODUCT

        DB::table('product')->insert([
            'id' => null,
            'name' => $product['name'],
            'price' => $product['price'],
            'description' => $product['description'],
            'category_id' => intval($product['category_id']),
            'image_1' => $imageName1,
            'image_2' => $imageName2,
            'image_3' => $imageName3,
            'image_4' => $imageName4,
            'image_5' => $imageName5,
            'inventory_qty' => $product['inventory_qty']
        ]);


        return redirect()->action([AdminProductController::class, 'index']);
    }

    public function update($id){

        $p = DB::table('product')
            ->where('id', intval($id))
            ->first();

        return view('admin.product.updateProduct')->with(['products'=>$p]);
    }

    public function postUpdate(Request $request, $id){

        // LẤY DỮ LIỆU TỪ FORM
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        $category_id = $request->input('category_id');

        // xử lý upload hình vào thư mục
        // IMAGE_1
        if ($request->hasFile('image_1')) {
            $file = $request->file('image_1');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/updateProduct/'.$id)->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName1 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName1);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = DB::table('product')
                ->where('id', intval($id))
                ->first();
            $imageName1 = $p->image_1;
        }

        // IMAGE_2
        if ($request->hasFile('image_2')) {
            $file = $request->file('image_2');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/updateProduct/'.$id)->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName2 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName2);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = DB::table('product')
                ->where('id', intval($id))
                ->first();
            $imageName2 = $p->image_2;
        }

        // IMAGE_3
        if ($request->hasFile('image_3')) {
            $file = $request->file('image_3');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/updateProduct/'.$id)->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName3 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName3);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = DB::table('product')
                ->where('id', intval($id))
                ->first();
            $imageName3 = $p->image_3;
        }

        // IMAGE_4
        if ($request->hasFile('image_4')) {
            $file = $request->file('image_4');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/updateProduct/'.$id)->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName4 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName4);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = DB::table('product')
                ->where('id', intval($id))
                ->first();
            $imageName4 = $p->image_4;
        }

        // IMAGE_5
        if ($request->hasFile('image_5')) {
            $file = $request->file('image_5');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('admin/updateProduct/'.$id)->with('loi', 'Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $imageName5 = $file->getClientOriginalName();
            $file->move("asset/admin/images/product", $imageName5);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = DB::table('product')
                ->where('id', intval($id))
                ->first();
            $imageName5 = $p->image_5;
        }

        $inventory_qty = $request->input('inventory_qty');

        $p = DB::table('product')
        ->where('id', intval($id))
        ->update([
            'name' => $name,
            'price' => $price,
            'description' => $description,
            'category_id' => intval($category_id),
            'image_1' => $imageName1,
            'image_2' => $imageName2,
            'image_3' => $imageName3,
            'image_4' => $imageName4,
            'image_5' => $imageName5,
            'inventory_qty' => $inventory_qty
        ]);

        return redirect()->action([AdminProductController::class, 'index']);
    }

}
