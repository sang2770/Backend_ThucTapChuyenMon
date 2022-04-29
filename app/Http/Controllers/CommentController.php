<?php

namespace App\Http\Controllers;

use App\Models\tb_comment;
use App\Models\tb_product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    // Danh Sach + Phan Trang
    public function index(Request $request, $id)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $wish=tb_comment::join("tb_user", "tb_user.id_user", "=", "tb_comment.id_user")
            ->join("tb_product", "tb_product.id_product", "=", "tb_comment.id_product")
            ->where("tb_product.id_product", $id)
            ->paginate($limit, [
                'id_comment',
                'time',
                'content',
                'tb_product.rate',
                'tb_comment.id_user',
                'tb_user.name',
            ], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $wish['data'], 'pagination' => [
                "page" => $wish['current_page'],
                "limit" => $limit,
                "TotalPage" => $wish['last_page']
            ]]);
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e->getMessage()]);
        }
        
    }
    // Them
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id_product'=>'required',
            'id_user'=>'required',
            'content'=>'required',
        ]);

        if($validator->fails()){
            return response()->json(['status'=>"Failed", "Err_Message"=>Arr::first(Arr::flatten($validator->errors()->get('*')))]);
        }
        try {
            $date=Carbon::now();
            tb_comment::create([
                'id_product'=>$request['id_product'],
                'id_user'=>$request['id_user'],
                'content'=>$request['content'],
                'time'=>$date,
                'rate'=>$request['rate']?$request['rate']:1
            ]);
            $rate=tb_comment::where("id_product",$request['id_product'])->get()->toArray();
            $total=0;
            foreach ($rate as $key => $value) {
               $total+=$value['rate'];
            }
            $total=round($total/count($rate), 1);
            tb_product::find($request['id_product'])->update(['rate' => $total]);;

        return response()->json(['status'=>"Success"]);
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e->getMessage()]);
        }

    }

}
