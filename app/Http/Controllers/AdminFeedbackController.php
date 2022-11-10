<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminFeedbackController extends Controller
{
    public function viewFeedback(){

        $f = DB::table('feedback')
        ->orderByRaw('id DESC')
        ->paginate(6);

        return view('admin.feedback.viewFeedback')->with(['feedback'=>$f]);
    }


    public function replyFeedback($id){

        $f = DB::table('feedback')
        ->where('id', intval($id))
        ->first();

        $pf = DB::table('product')
        ->where('id', intval($f->product_id))
        ->first();

        return view('admin.feedback.replyFeedback')->with(['f'=>$f, 'pf'=>$pf]);

    }

    public function postReplyFeedback(Request $request, $id){

        $staff = $request->input('staff');
        $reply = $request->input('reply');
        $created_DateRep = $request->input('created_DateRep');

        $f = DB::table('feedback')
        ->where('id', intval($id))
        ->update([
            'staff' => $staff,
            'reply' => $reply,
            'created_DateRep' => $created_DateRep
        ]);

        return redirect('admin/viewFeedback');

    }

    public function deleteFeedback($id){
        $f = DB::table('feedback')
        ->where('id', intval($id))
        ->delete();
        return redirect('admin/viewFeedback');
    }

}
