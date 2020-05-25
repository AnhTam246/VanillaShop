<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller{

    public function getNews() {
        $newss = News::all();
        return view('user.pages.news',compact('newss'));
    }

    public function getNewsHomepage() {
        $newss = News::all();
        return view('user.pages.homepage',compact('newss'));
    }
    public function getNewDetail($n_id) {
        $newss = News::where('n_id', $n_id)->first();
        return view('user.pages.newDetail',compact('newss'));
    }
    public function getListNews() {
        $newss = News::all();
        return view('admin.news.listNews',compact('newss'));
    }


    public function getEditNews($n_id) {
        $newss = News::find($n_id);
        return view('admin.news.editNews',compact('newss'));
    }
    public function postEditNews(Request $request, $n_id) {
        $newss =  News::find($n_id);
      
           $newss ->n_title = $request ->n_title;
           $newss ->n_intro = $request ->n_intro;
           $newss ->n_content = $request ->n_content;

           if($request->hasFile('n_image')) {
            $file = $request->file('n_image');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return back()->with('Lỗi', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("user_asset/images/news/", $imageName);
            $newss->n_image = $imageName;
        } 

        $newss ->save();
        return back()->with('edit_news_success','Chỉnh sửa thành công');
    }


    public function deleteNews($id){
        $newss = News::where('n_id',$id);
        $newss->delete();
        return back()->with('delete_news_success','Xóa thành công');
    }

    public function getAddNews() {
        return view('admin.news.addNews');
    }

    public function postAddNews(Request $request) {
        $news = $request->all();
        

        $news = new News;
        $news->n_title = $request->n_title;
        $news->n_content = $request->n_content;
        $news->n_intro = $request->n_intro;

        if($request->hasFile('n_image')) {
            $file = $request->file('n_image');
            $extension = $file->getClientOriginalExtension();
            if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return back()->with('Lỗi', 'Bạn chỉ được chọn file có đuôi jpg, png, jpeg');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("user_asset/images/news/", $imageName);
            $news->n_image = $imageName;
        } else {
            $imageName = null; 
        }


        $news->save();
        return back()->with('create_news_success','Đã tạo bản tin thành công');
    }
    
    public function getNewsId($id) {

    }
}