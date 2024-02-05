<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Brand;

class BrandController extends Controller
{
    public function brands(){
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        $data['data'] = Brand::where('status','!=',2)->get();        
        return view('admin.brands', $data);
    }
    public function addBrand(Request $request){
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        $data['category'] = Category::where('status','!=',2)->get();
        $id = base64_decode($request->key);
        $data['data'] = Brand::find($id);
        return view('admin.addBrand', $data);
    }

    public function insert_brand(Request $request){
        if($request->id==""){
            $check_name = Brand::where('name',$request->name)->count();
            if($check_name==0){ 
                //image upload
                $imageName = time().'.'.$request->image->extension();      
                $request->image->move(public_path('images'), $imageName);               
                $brand = new Brand;
                $brand->name = $request->name;
                $brand->categoryID = $request->category;
                $brand->logo = $imageName;
                $brand->description = $request->info;
                $brand->website = $request->website;
                $brand->youtube = $request->youtube;
                $brand->twitter = $request->twitter;
                $brand->linkedin = $request->linkedin;
                $brand->facebook = $request->facebook;
                $brand->instagram = $request->instagram;
                $brand->status = 1;
                $brand->save();
                echo 1;
            }else{
                echo 2;
            }              
        }else{
            $check_name = Brand::where('name',$request->name)->where('id',$request->id);
            if($check_name->count() >= 1 && $request->id != $check_name->first()->id){
                echo 2;
            }else{
                if($request->image!=''){
                    $imageName = time().'.'.$request->image->extension();      
                    $request->image->move(public_path('images'), $imageName);
                }else{
                    $imageName = '';
                }
                $brand = new Brand;
                $brand = Brand::find($request->id);
                $brand->name = $request->name;
                $brand->categoryID = $request->category;
                $brand->description = $request->info;
                $brand->website = $request->website;
                $brand->youtube = $request->youtube;
                $brand->twitter = $request->twitter;
                $brand->linkedin = $request->linkedin;
                $brand->facebook = $request->facebook;
                $brand->instagram = $request->instagram;
                if($imageName!=''){
                    $brand->logo = $imageName;
                }                
                $brand->save();
                echo 1;
            }             

        }
    }
    public function delete_brand(Request $request){
        $id = $request->id;
        $category = Brand::find($id);
        $category->status = 2;
        $category->save();
    }
    public function change_brand_status(Request $request){
        $id = $request->id;
        $status = $request->status;
        $category = Brand::find($id);
        $category->status = $status;
        $category->save();
    }
    public function add_popular_brand(Request $request){
        $id = $request->id;
        $status = $request->status;
        $category = Brand::find($id);
        $category->popular = $status;
        $category->save();
    }

    public function popularBrands(Request $request){
        $admin_id = session::get('id');
        $data['admin']=Admin::find($admin_id);
        $data['data'] = Brand::where('status','!=',2)->where('popular',1)->orderBy('position','ASC')->get();
        return view('admin.popularBrands', $data);
    }
    
    public function updateBrandOrder(Request $request){
        $arr=$request->allData;
        $num=0;
        for($i=0;$i<count($arr);$i++)
        {
            $brand = Brand::find($arr[$i]);
            $brand->position = $num=$num+1;
            $brand->update();
        } 
    }

    public function add_allbrand(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://carapi.app/api/makes?sort=&make=&year=',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Accept: application/json'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

}
