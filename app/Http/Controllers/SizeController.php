<?php

namespace App\Http\Controllers;

use App\Models\tb_productsize;
use App\Models\tb_size;
use Faker\Extension\Extension;
use Illuminate\Http\Request;
use Throwable;

class SizeController extends Controller
{
    public function index(Request $request)
    {
        try {
            $size=tb_size::select('*')->get();
            return response()->json(['status' => "Success", 'data' => $size]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function show($id){
        try {
            $color=tb_size::join('tb_productsize', 'tb_productsize.id_size', '=', 'tb_size.id_size')
            ->select('*')
            ->where('tb_productsize.id_product', $id)
            ->get();
            return response()->json(['status' => "Success", 'data' => $color]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function create($Input){
        try{
            return [
                'size' => $Input["size"],
            ];
        }catch(Throwable $th){
            return  $th;
        }
    }

    public function Store(Request $request){
        try {
            $item = $this->create($request->all());

            tb_size::insert($item);
            return response()->json(['status' => "Success", 'data' => ["size" => $item]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function Destroy($id)
    {
        if(tb_size::where('id_size', $id)->exists()){
            tb_size::where('id_size', $id)->delete();
            return response()->json(['status' => "Success"]);
        }
        else{
            return response()->json(['status' => "Failed"]);
        }
    }
}
