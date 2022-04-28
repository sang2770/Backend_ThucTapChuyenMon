<?php

namespace App\Http\Controllers;

use App\Models\tb_color;
use App\Models\tb_product;
use App\Models\tb_productcolor;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Http\Request;
use Throwable;

class ColorController extends Controller
{
    public function index(Request $request)
    {
        try {
            $color=tb_color::select('*')->get();
            return response()->json(['status' => "Success", 'data' => $color]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function show($id){
        try {
            $color=tb_color::join('tb_productcolor', 'tb_productcolor.id_color', '=', 'tb_color.id_color')
            ->select('*')
            ->where('tb_productcolor.id_product', $id)
            ->get();
            return response()->json(['status' => "Success", 'data' => $color]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function create($Input){
        try{
            return [
                'name_color' => $Input["name_color"],
            ];
        }catch(Throwable $th){
            return  $th;
        }
    }

    public function Store(Request $request){
        try {
            $item = $this->create($request->all());

            tb_color::insert($item);
            return response()->json(['status' => "Success", 'data' => ["color" => $item]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function Destroy($id)
    {
        if(tb_color::where('id_color', $id)->exists()){
            tb_color::where('id_color', $id)->delete();
            return response()->json(['status' => "Success"]);
        }
        else{
            return response()->json(['status' => "Failed"]);
        }
    }
}
