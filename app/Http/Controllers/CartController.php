<?php

namespace App\Http\Controllers;

use App\Models\tb_cart;
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
            $item=tb_cart::where("id_product", $request['id_product'])->first();
            if($item)
            {
                tb_cart::where("id_product", $request['id_product'])->update([
                    'number'=> $item->number+1
                ]);
            }else{
                $item = $this->create($request->all());
                tb_cart::insert($item);
            }
            $item=tb_cart::where("id_product", $request['id_product'])->first();
            
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
                tb_cart::where('id_user', $request->id_user)
                ->where('id_product', $request->id_product)
                ->update(['number' => $request->number]);
                return response()->json(['status' => "Success"]);
            }else{
                return response()->json(['status' => "Failed"]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e]);
        }
    }
}
