<?php

namespace App\Http\Controllers;

use App\Models\tb_cart;
use App\Models\tb_order;
use App\Models\tb_orderdetail;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Http\Request;

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
    public function show($id){
        try {
            $order=tb_orderdetail::join('tb_product', 'tb_product.id_product', '=', 'tb_order_details.id_product')
            ->select('*')
            ->where('id_order', $id)->get();
            return response()->json(['status' => "Success", 'data' => $order]);
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
                'id_user'  => $Input["id_user"],
            ];
        }catch (\Throwable $th) {
            throw $th;
        }
    }

    public function Store(Request $request){
        try {
            $item = $this->create($request->all());

            tb_order::insert($item);
            return response()->json(['status' => "Success", 'data' => ["order" => $item]]);
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
}
