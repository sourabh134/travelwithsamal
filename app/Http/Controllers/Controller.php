<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Tearmpolicy;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function tearmCondition(Request $request){
        $data['title']="Tearm & Condition";
        $data['data']=Tearmpolicy::find(1);

        return view('admin/tearmCondition',$data);
    }
    public function saveTearmCondition(Request $request){

        $tc=Tearmpolicy::find($request->id);
        $tc->heading=$request->heading;
        $tc->content=$request->contents;
        $tc->save();
        echo "done";
    }
    public function privacyPolicy(){
        $data['title']="Privacy & Policy";
        $data['data']=Tearmpolicy::find(2);
        return view('admin/privacyPolicy',$data);
    }
    public function savePrivacyPolicy(Request $request){
        $pp=Tearmpolicy::find($request->id);
        $pp->heading=$request->heading;
        $pp->content=$request->contents;
        $pp->save();
        echo "done";
    }
}
