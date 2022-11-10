<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;

class UserFeedbackController extends Controller
{
    //FEEDBACK MEMBER
    public function postFeedback(Request $request, $id)
    {

        $account_id = $request->input('account_id');
        $feedback = $request->input('feedback');
        $created_date = $request->input('created_date');

        $fb = DB::table('feedback')
            ->insert([
                'id' => null,
                'product_id' => $id,
                'account_id' => $account_id,
                'created_date' => $created_date,
                'comment' => $feedback,
                'staff' => null,
                'reply' => null
            ]);

        return redirect('productDetail/'.$id);
    }

    //FEEDBACK HISTORY MEMBER
    public function feedbackHistory($id){

        $f = DB::table('feedback')
        ->where('account_id', intval($id))
        ->orderByRaw('id DESC')
        ->paginate(6);

        $pf = Product::all();

        return view('user.profile.feedbackHistory')->with(['feedback'=>$f, 'productfb'=>$pf]);
    }
}
