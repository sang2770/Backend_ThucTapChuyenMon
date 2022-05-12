<?php

namespace App\Http\Controllers;

use App\Models\tb_category;
use Faker\Extension\Extension;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        try {
            $category=tb_category::select('*')->get();
            return response()->json(['status' => "Success", 'data' => $category]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }
    public function show(){
        try {
            $product=tb_category::select('*')->get();
            return response()->json(['status' => "Success", 'data' => $product]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed", 'err' => $e]);
            
        }
    }
    public function Store(Request $request){
        try {
            tb_category::insert($request->all());
            return response()->json(['status' => "Success"]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function Destroy($id)
    {
        if(tb_category::where('id_category', $id)->exists()){
            tb_category::where('id_category', $id)->delete();
            return response()->json(['status' => "Success"]);
        }
        else{
            return response()->json(['status' => "Failed"]);
        }
    }
}
