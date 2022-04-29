<?php

namespace App\Http\Controllers;

use App\Models\tb_systeminfo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class InfoController extends Controller
{
    // Danh Sach thông tin
    public function index(Request $request)
    {
        try {
            $list=tb_systeminfo::first()->toArray();
            return response()->json(['status' => "Success", 'data' =>$list]);
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e->getMessage()]);
        }
        
    }
    // Them
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id_shop'=>'required',
            'nameshop'=>'required',
            'hotline'=>'required',
            'aboutus'=>'required',
        ]);
        if($validator->fails()){
            return response()->json(['status'=>"Failed", "Err_Message"=>Arr::first(Arr::flatten($validator->errors()->get('*')))]);
        }
        try {
            tb_systeminfo::find($request['id_shop'])
            ->update(['nameshop'=>$request['nameshop'],'hotline'=>$request['hotline'],'aboutus'=>$request['aboutus']]);
            return response()->json(['status'=>"Success"]);
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e->getMessage()]);
        }

    }
}
