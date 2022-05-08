<?php

namespace App\Http\Controllers;

use App\Models\tb_cart;
use App\Models\tb_product;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request, $id){
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $cart=tb_cart::join('tb_product', 'tb_product.id_product', '=', 'tb_cart.id_product')
            ->select('*')
            ->where('id_user', $id)
            ->paginate($limit, [
                '*'
            ], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $cart['data'], 'pagination' => [
                "page" => $cart['current_page'],
                "limit" => $limit,
                "TotalPage" => $cart['last_page']
            ]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }
    public function create($Input){
        try{

            return [
                'id_user'    => $Input['id_user'],
                'id_product' => $Input['id_product'],
                'number'     => $Input['number'],
                'color'     => $Input['color'],
                'size'     => $Input['size']
            ];
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function Store(Request $request){
        try {
            $item=tb_cart::where("id_user",$request['id_user'] )->where("id_product", $request['id_product'])->first();
            $pro = tb_product::select("numberpro")->where("id_product", $request['id_product'])->first();
            //var_dump($pro['numberpro']);
            if($item)
            {
                tb_cart::where("id_user",$request['id_user'] )->where("id_product", $request['id_product'])->update([
                    'number'=> $item->number+$request['number']
                ]);
                tb_product::where("id_product",  $request['id_product'])->update(['numberpro' => $pro->numberpro - $request['number']]);
            }else{
                $item = $this->create($request->all());
                tb_cart::insert($item);
                tb_product::where("id_product",  $request['id_product'])->update(['numberpro' => $pro->numberpro - $request['number']]);
            }
            $item=tb_cart::where("id_user",$request['id_user'] )->where("id_product", $request['id_product'])->first();
            
            return response()->json(['status' => "Success", 'data' => ["cart" => $item]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function Destroy(Request $request){
        if(tb_cart::where('id_user', '=', $request->id_user)->where('id_product', '=', $request->id_product)->exists()){
            tb_cart::where('id_user', '=', $request->id_user)->where('id_product', '=', $request->id_product)->delete();
            return response()->json(['status' => "Success"]);
        }
        else{
            return response()->json(['status' => "Failed"]);
        }
    }
    
    public function Destroy2($idU, $idP){
        if(tb_cart::where('id_user', '=', $idU)->where('id_product', '=', $idP)->exists()){
            tb_cart::where('id_user', '=', $idU)->where('id_product', '=', $idP)->delete();
            return response()->json(['status' => "Success"]);
        }
        else{
            return response()->json(['status' => "Failed"]);
        }
    }

    public function updateCart(Request $request)
    {
        try {
            if(tb_cart::where('id_user', $request->id_user)->where('id_product', $request->id_product)->exists()){
                $pro = tb_product::select("numberpro")->where("id_product", $request->id_product)->first();
                $cart = tb_cart::select("number")->where('id_user', $request->id_user)
                ->where('id_product', $request->id_product)->first();
                
                tb_cart::where('id_user', $request->id_user)
                ->where('id_product', $request->id_product)
                ->update(['number' => $request->number]);

                tb_product::where("id_product",  $request->id_product)
                ->update(['numberpro' => $pro->numberpro + $cart['number']  - $request->number]);

                return response()->json(['status' => "Success"]);
            }else{
                return response()->json(['status' => "Failed"]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e]);
        }
    }

    public function DeleteAll($idUser){
        if(tb_cart::where('id_user', '=', $idUser)->exists()){
            tb_cart::where('id_user', '=', $idUser)->delete();
            return response()->json(['status' => "Success"]);
        }
        else{
            return response()->json(['status' => "Failed"]);
        }
    }

    public function countListCart($idUser){
        try {
            $count = tb_cart::where('id_user', $idUser)->get();
            $count = $count->count();
        return response()->json(['status'=>"Success", 'data' => $count]);
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e->getMessage()]);
        }
    }
}
