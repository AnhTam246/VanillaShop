<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use App\Product;
use Session;

class CommentController extends Controller
{
    //User
    public function postComment(Request $res) {
        if(Session::has('logined')) {
            $this->validate(
                $res,
                [
                    'comment_title' => 'bail|max:70',
                    'comment_content' => 'bail|required|max:500'
                ],
                [
                    'comment_title.max' => 'Tiêu đề bình luận không được dài quá 70 kí tự',
                    'comment_content.required' => 'Nội dung bình luận không được để trống',
                    'comment_content.max' => 'Nội dung bình luận không được dài quá 500 kí tự',
                ]
            );
            //Get id customer login
            $idCust = Session::get('logined');

            //Get user login
            $user_cment = User::where('cust_id', $idCust)->first();
            //Get username user login
            $username_cment = $user_cment->username;

            //Get user login
            $product_cment = Product::where('product_id', $res->idProduct)->first();
            //Get username user login
            $product_name_cment = $product_cment->product_title;

            //Create new comment
            $newComment = new Comment;
            $newComment->cment_title = $res->comment_title;
            $newComment->cment_content = $res->comment_content;
            $newComment->cment_point = $res->star;
            $newComment->cust_id = $idCust;
            $newComment->product_id = $res->idProduct;
            $newComment->user_cment = $username_cment;
            $newComment->product_cment = $product_name_cment;
            $newComment->save();

            return back()->with('comment_success', 'Cảm ơn quý khách đã bình luận về sản phẩm này!!!');
        } else {
            return back()->with('comment_fail', 'Vui lòng đăng nhập để bình luận về sản phẩm này!!!');
        }
    }

    //Admin
    public function getListComment() {
        $comments = Comment::where('cment_status', 1)->get();
        return view('admin.comment.listComment', compact('comments'));
    }

    public function getReplyComment($id) {
        $comment = Comment::where('cment_id', $id)->first();
        return view('admin.comment.replyComment', compact('comment'));
    }

    public function postReplyComment(Request $res) {
        $this->validate(
            $res,
            [
                'reply_cment' => 'bail|max:500',
            ],
            [
                'reply_cment.max' => 'Nội dung trả lời không được dài quá 500 kí tự',
            ]
        );
        Comment::where('cment_id', $res->cment_id)
                ->update([
                    'reply_cment'=>$res->reply_cment
                ]);

        return back()->with('reply_success', 'Trả lời bình luận thành công!!!');
    }

    public function deleteComment($id) {
        Comment::where('cment_id', $id)
                ->update([
                    'cment_status'=> 0
                ]);

        return back()->with('delete_success', 'Đã xóa bình luận!!!');
    }

    public function getCommentDeleted() {
        $comments = Comment::where('cment_status', 0)->get();
        return view('admin.comment.commentDeleted', compact('comments'));
    }

    public function undoComment($id) {
        Comment::where('cment_id', $id)
        ->update([
            'cment_status'=> 1
        ]);

        return back()->with('undo_success', 'Đã hoàn tác bình luận!!!');
    }

    public function permanentlyDeleteComment($id) {
        Comment::where('cment_id', $id)->delete();

        return back()->with('permanently_delete_success', 'Đã xóa vĩnh viễn bình luận!!!');
    }
}