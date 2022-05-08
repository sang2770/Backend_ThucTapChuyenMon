<?php

namespace App\Http\Controllers;

use App\Models\tb_color;
use App\Models\tb_product;
use App\Models\tb_productcolor;
use App\Models\tb_productsize;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // ?Name=?Category=?PriceFrom=?PriceTo=?
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            // $ListProduct=tb_product;
            $product=tb_product::filter($request)->paginate($limit, [
                '*'
            ], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $product['data'], 'pagination' => [
                "page" => $product['current_page'],
                "limit" => $limit,
                "TotalPage" => $product['last_page']
            ]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
            
        }
    }

    //lọc danh sách theo danh mục category
    public function show(Request $request, $id)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $product=tb_product::join('tb_category', 'tb_category.id_category', '=', 'tb_product.id_category')->select("*")->where('id_category', $id)->paginate($limit, [
                'id_product', 'rate', 'availability', 'descriptions', 'name', 'price', 'discount', 'image', 'tb_category.name_category'
            ], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $product['data'], 'pagination' => [
                "page" => $product['current_page'],
                "limit" => $limit,
                "TotalPage" => $product['last_page']
            ]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    //lọc sản phẩm theo id sp
    public function showItems($id)
    {
        try {
            $product=tb_product::join('tb_category', 'tb_category.id_category', '=', 'tb_product.id_category')->select('*')->where('id_product', '=', $id)->get();
            return response()->json(['status' => "Success", 'data' => $product]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
            
        }
    }

    public function create($Input){
        try {
            return [
                'rate'          => '5',
                'availability'  => $Input['availability'],
                'descriptions'  => $Input['descriptions'],
                'name'          => $Input['name'],
                'price'         => $Input['price'],
                'discount'      => $Input['discount'],
                'image'         => $Input['image'],
                'id_category'   => $Input['id_category'],
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    // SELECT * FROM TABLE WHERE ID = (SELECT MAX(ID) FROM TABLE)
    public function createSize($Input){
        try {
            $idP = tb_product::max('id_product');

            return [
                'id_product'    => $idP,
                'id_size'       => $Input['id_size'],
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function createColor($Input){
        try {
            $idP = tb_product::max('id_product');

            return [
                'id_product'    => $idP,
                'id_color'       => $Input['id_color'],
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function insertColPro(Request $request){
        try {
            $color = $this->createColor($request->all());
            tb_productcolor::insert($color);
            return response()->json(['status' => "Success", 'data' => $color]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    public function insertSizePro(Request $request){
        try {
            $size = $this->createSize($request->all());
            tb_productsize::insert($size);

            return response()->json(['status' => "Success", 'data' => $size]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }
    
    //thêm từng sp
    public function Store(Request $request)
    {
        try {
            $item = $this->create($request->all());
            tb_product::insert($item);
            
            return response()->json(['status' => "Success", 'data' => ["product" => $item]]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    //delete color product
    public function deleteColPro($idP)
    {
        try {
            if(tb_productcolor::where('id_product', $idP)->exists()){
                tb_productcolor::where('id_product', $idP)->delete();
                return response()->json(['status' => "Success"]);
            }else{
                return response()->json(['status' => "Failed"]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e]);
        }
    }

    //delete size product
    public function deleteSizePro($idP)
    {
        try {
            if(tb_productsize::where('id_product', $idP)->exists()){
                tb_productsize::where('id_product', $idP)->delete();
                return response()->json(['status' => "Success"]);
            }else{
                return response()->json(['status' => "Failed"]);
            }
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e]);
        }
    }

    //update
    public function edit($id){
        $edit = tb_product::findOrFail($id);
        return $edit;
    }

    public function infoUpdate($Input){
        try {
            return [
                'rate'          => '5',
                'availability'  => $Input['availability'],
                'descriptions'  => $Input['descriptions'],
                'name'          => $Input['name'],
                'numberpro'     => $Input['numberpro'],
                'price'         => $Input['price'],
                'discount'      => $Input['discount'],
                'image'         => $Input['image'],
                'id_category'   => $Input['id_category'],
            ];
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            if(tb_product::where('id_product', $id)->exists()){
                $task = $this->edit($id);
                $input = $this->infoUpdate($request->all());
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
        if(tb_product::where('id_product', $id)->exists()){
            tb_product::where('id_product', $id)->delete();
            return response()->json(['status' => "Success"]);
        }
        else{
            return response()->json(['status' => "Failed"]);
        }
    }

    //update size product
    public function updatetSizePro(Request $request, $id){
        try {
            tb_productsize::insert([
                'id_product' => $id,
                'id_size'    => $request->id_size,
            ]);
            return response()->json(['status' => "Success"]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }

    //update color product
    public function updatetColPro(Request $request, $id){
        try {
            tb_productcolor::insert([
                'id_product' => $id,
                'id_color'    => $request->id_color,
            ]);
            return response()->json(['status' => "Success"]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed"]);
        }
    }
}
