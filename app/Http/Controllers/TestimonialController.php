<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Testimonial;
use App\Models\Country;
use App\Models\Hospital;
use App\Models\Treatmeant;

class TestimonialController extends Controller
{
    public function testimonials(){
        $data['title']="Testimonial";
        $data['testimonial']=Testimonial::whereNot('status',2)->get();
        return view('admin/testimonial',$data);
    }
    public function addTestimonial(Request $request){
        $data['title']="Testimonial";
        $id=base64_decode($request->key);
        $data['data']=Testimonial::find($id);
        $data['treatmeant']=Treatmeant::where('status',1)->get();
        $data['hospital']=Hospital::where('status',1)->get();
        $data['country']=Country::all();
        return view('admin/addTestimonial',$data);
    }
    public function insert_testimonials(Request $request){

        if($request->testi_image !=''){
            $imageName = time().'.'.$request->testi_image->extension();      
            $request->testi_image->move(public_path('images/testimonial'), $imageName);    
        }
        else{
            $imageName=$request->old_image;
        }
        
        if($request->id==''){
            $testi=new Testimonial;
            $testi->image=$imageName;
            $testi->name=$request->name;
            $testi->treatment_id=implode(',', $request->treatmeant);
            $testi->hospital_id=$request->hospital_id;
            $testi->country_id=$request->country;
            $testi->message=$request->messages;
            $testi->save();
            echo "done";
        }else{
            $testi=Testimonial::find($request->id);
            $testi->image=$imageName;
            $testi->name=$request->name;
            $testi->treatment_id=implode(',', $request->treatmeant);
            $testi->hospital_id=$request->hospital_id;
            $testi->country_id=$request->country;
            $testi->message=$request->messages;
            $testi->save();
            echo "udone";
        }
    }
    public function testimonial_status(Request $request){
        $key=base64_decode($request->key);
        $hosp = Testimonial::find($key);
        if($hosp->status==1){
            $status=0;
        }
        else{
            $status=1;
        }
        $hosp->status = $status;
        $hosp->save();
        return redirect()->back()->with('success','Testimonial Status Changed');
    }
    public function delete_testimonial(Request $request){
        $id = $request->id;
        $hosp = Testimonial::find($id);
        $hosp->status = 2;
        $hosp->save();
    }
    public function testimonialDetail(Request $request){
        $id=base64_decode($request->key);
        $data['title']="Testimonial";
        $data['testimonial']=DB::table('testimonials as testi')
                    ->select('testi.*','hosp.id as hospitalId','hosp.hosp_name','country.id as countryId','country.name as county_name')
                    ->join('hospitals as hosp','hosp.id','=','testi.hospital_id')
                    ->join('countries as country','country.id','=','testi.country_id')
                    ->where('testi.id',$id)
                    ->first();
        return view('admin/testimonialDetail',$data);
    }
}
