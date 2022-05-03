<?php

namespace App\Http\Controllers;

use App\Models\tb_cart;
use App\Models\tb_order;
use App\Models\tb_orderdetail;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class OderController extends Controller
{
    public function index(Request $request){
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $order=tb_order::join('tb_shipinfo', 'tb_shipinfo.id_ship', '=', 'tb_order.id_ship')
            ->select('*')
            ->paginate($limit, ['*'], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $order['data'], 'pagination' => [
                "page" => $order['current_page'],
                "limit" => $limit,
                "TotalPage" => $order['last_page']
            ]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }
    public function FilterID(Request $request, $id){
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $order=tb_order::join('tb_shipinfo', 'tb_shipinfo.id_ship', '=', 'tb_order.id_ship')
            ->select('*')
            ->Where('tb_shipinfo.phone', 'like', '%'.$id.'%')
            ->paginate($limit, ['*'], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $order['data'], 'pagination' => [
                "page" => $order['current_page'],
                "limit" => $limit,
                "TotalPage" => $order['last_page']
            ]]);
            return response()->json(['status' => "Success", 'data' => $order]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }
    public function show(Request $request, $id){
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $order=tb_orderdetail::join('tb_product', 'tb_product.id_product', '=', 'tb_order_details.id_product')
            ->select('*')
            ->where('id_order', $id)
            ->paginate($limit, ['*'], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $order['data'], 'pagination' => [
                "page" => $order['current_page'],
                "limit" => $limit,
                "TotalPage" => $order['last_page']
            ]]);
            return response()->json(['status' => "Success", 'data' => $order]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function listOrder(Request $request, $idU){
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $order=tb_order::join('tb_shipinfo', 'tb_shipinfo.id_ship', '=', 'tb_order.id_ship')
            ->join('tb_user', 'tb_shipinfo.id_user', '=', 'tb_user.id_user')->select('*')
            ->where('tb_user.id_user', $idU)
            ->paginate($limit, ['*'], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $order['data'], 'pagination' => [
                "page" => $order['current_page'],
                "limit" => $limit,
                "TotalPage" => $order['last_page']
            ]]);
            return response()->json(['status' => "Success", 'data' => $order['data']]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function create($Input){
        try{
            return [
                'address'  => $Input["address"],
                'status'  => $Input["status"],
                'time'  => $Input["time"],
                'id_ship'  => $Input["id_ship"],
            ];
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function Store(Request $request){
        try {
            $item = $this->create($request->all());
            tb_order::insert($item);
            $idP = tb_order::max('id_order');
            return response()->json(['status' => "Success", 'data' => $idP]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    //update
    public function edit($id){
        $edit = tb_order::findOrFail($id);
        return $edit;
    }

    public function update(Request $request, $id)
    {
        try {
            if(tb_order::where('id_order', $id)->exists()){
                $task = $this->edit($id);
                $input = $this->create($request->all());
                $task->fill($input)->save();
                return response()->json(['status' => "Success"]);
            }else{
                return response()->json(['status' => "Failed"]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e]);
        }
    }

     // Them
     public function storeProductInOrder(Request $request)
     {
         $validator = Validator::make($request->all(),[
             'id_product'=>'required',
             'id_order'=>'required',
             'number'=>'required',
             'price'=>'required',
             'color'=>'required',
             'size'=>'required'
         ]);
 
         if($validator->fails()){
             return response()->json(['status'=>"Failed", "Err_Message"=>Arr::first(Arr::flatten($validator->errors()->get('*')))]);
         }
         try {
             tb_orderdetail::create([
                'id_product'=>$request["id_product"],
                'id_order'=>$request["id_order"],
                'number'=>$request["number"],
                'price'=>$request["price"],
                'color'=>$request["color"],
                'size'=>$request["size"]
             ]);
         return response()->json(['status'=>"Success"]);
         } catch (Exception $e) {
             return response()->json(['status' => "Failed", 'Err_Message' => $e->getMessage()]);
         }
 
     }
}
