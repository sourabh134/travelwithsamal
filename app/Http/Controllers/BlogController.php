<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blogs(){
        $data['title']="Blog";
        $data['blogs']=Blog::whereNot('status',2)->get();
        return view('admin/blogs',$data);
    }
    public function addBlog(Request $request){
        $data['title']="Blog";
        $id=base64_decode($request->key);
        $data['data']=Blog::find($id);
        return view('admin/addBlog',$data);
    }
    public function insert_blog(Request $request){
        if($request->blog_image !=''){
            $imageName = time().'.'.$request->blog_image->extension();      
            $request->blog_image->move(public_path('images/blog'), $imageName);    
        }else{
            $imageName=$request->old_image;
        }
        if($request->id ==''){
            $blog=new Blog;
            $blog->image=$imageName;
            $blog->heading=$request->heading;
            $blog->content=$request->contents;
            $blog->save();
            echo "done";
        }else{
            $blog=Blog::find($request->id);
            $blog->image=$imageName;
            $blog->heading=$request->heading;
            $blog->content=$request->contents;
            $blog->save();
            echo "udone";
        }
    }
    public function blog_status(Request $request){
        $id=base64_decode($request->key);
        $blog=Blog::find($id);
        if($blog->status==1){
            $status=0;
        }else{
            $status=1;
        }
        $blog->status=$status;
        $blog->save();
        return redirect()->back()->with('success','Blog Status Changed');
    }
    public function blogDetail(Request $request){
        $id=base64_decode($request->key);
        $data['title']="Blog Detail";
        $data['blog']=Blog::find($id);
        return view('admin/blogDetail',$data);
    }
    public function delete_blog(Request $request){
        $id = $request->id;
        $hosp = Blog::find($id);
        $hosp->status = 2;
        $hosp->save();
    }
}
