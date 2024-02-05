<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Language;
class CategoryController extends Controller
{
    public function category(){
        $admin_id = Session::get('id');
        $data['title'] = "Category";
        $data['admin']=Admin::find($admin_id);
        $data['data'] = Category::where('status','!=',2)->get();
        return view('admin.category',$data);
    }
    public function addCategory(Request $request){
        $admin_id = Session::get('id');
        $data['title'] = "Category";
        $data['admin']=Admin::find($admin_id);
        $id = base64_decode($request->key);
        $data['data'] = Category::find($id);
        return view('admin.addCategory',$data);
    }

    public function insert_category(Request $request){
        if($request->id==""){
            $check_name = Category::where('name',$request->name)->count();
            if($check_name==0){                
                $category = new Category;
                $category->name = $request->name;
                $category->status = 1;
                $category->save();
                echo 1;
            }else{
                echo 2;
            }              
        }else{
           $check_name = Category::where('name',$request->name)->count();
            if($check_name==0){                
                $category = new Category;
                $category = Category::find($request->id);
                $category->name = $request->name;
                $category->save();
                echo 1;
            }else{
                echo 2;
            }             

        }
    }
    public function delete_category(Request $request){
        $id = $request->id;
        $category = Category::find($id);
        $category->status = 2;
        $category->save();
    }

    public function change_category_status(Request $request){
        $id = $request->id;
        $status = $request->status;
        $category = Category::find($id);
        $category->status = $status;
        $category->save();
    }
}
