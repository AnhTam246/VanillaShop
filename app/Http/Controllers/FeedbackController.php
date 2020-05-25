<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\User;
use Session;
use App\Feedback;
class FeedbackController extends Controller
{ 
    public function getListFeedback() {
        $feedback = Feedback::where('fb_status', 1)->get();
        $custFbs = Customer::all();
        return view('admin.feedback.listFeedback',compact('feedback', 'custFbs'));
        
    }

    public function getDelete($fb_id)
    {
        Feedback::where('fb_id',$fb_id)
                ->update([
                    'fb_status'=>0,
                ]);
        return back()->with('delete_cust_success','Xóa phản hồi thành công');
    }

    
    public function getFeedback() {
        return view('user.pages.store');
    }
    public function postFeedback(Request $req){
        if(Session::has('logined')){
            $this->validate($req,
            [
                'feedtitle'=>'required',               
                'feedcontent'=>'required',
            ],
            [
                'feedtitle.required'=>'vui lòng chọn chủ đề',               
                'feedcontent.required'=>'vui lòng nhập nội dung',
            ]);

            $cust_id = Session::get('logined');
            $feed = new Feedback();       
            $feed->fb_title = $req->feedtitle;      
            $feed->fb_content = $req->feedcontent;
            $feed->cust_id = $cust_id;
            $feed->save();
        
            return redirect()->back()->with('thanhcong','Gửi phản hồi thành công');
        }
        else {
            return redirect()->back()->with('feedback_fail','Vui lòng đăng nhập để gửi phản hồi');
        }
       
   }
}