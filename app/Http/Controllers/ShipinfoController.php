<?php

namespace App\Http\Controllers;

use App\Models\tb_shipinfo;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Http\Request;

class ShipinfoController extends Controller
{
    //lấy danh sách theo id user
    public function show(Request $request, $id)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $shipinfo=tb_shipinfo::where('id_user', '=', $id)->paginate($limit, [
                '*'
            ], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $shipinfo['data'], 'pagination' => [
                "page" => $shipinfo['current_page'],
                "limit" => $limit,
                "TotalPage" => $shipinfo['last_page']
            ]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function create($Input){
        try {
            return [
                'shipname'  => $Input["shipname"],
                'phone'  => $Input["phone"],
                'address'  => $Input["address"],
                'isdefault'  => $Input["isdefault"],
                'id_user'  => $Input["id_user"],
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function Store(Request $request)
    {
        try {
            $item = $this->create($request->all());

            tb_shipinfo::insert($item);
            return response()->json(['status' => "Success", 'data' => ["shipinfo" => $item]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    //update
    public function edit($id){
        $edit = tb_shipinfo::findOrFail($id);
        return $edit;
    }

    public function update(Request $request, $id)
    {
        try {
            if(tb_shipinfo::where('id_ship', $id)->exists()){
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

    //delete
    public function Destroy($id){
        if(tb_shipinfo::where('id_ship', $id)->exists()){
            tb_shipinfo::where('id_ship', $id)->delete();
            return response()->json(['status' => "Success"]);
        }
        else{
            return response()->json(['status' => "Failed"]);
        }
    }
}
