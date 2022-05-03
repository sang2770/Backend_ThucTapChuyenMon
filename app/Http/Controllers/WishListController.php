<?php

namespace App\Http\Controllers;

use App\Models\tb_wishlist;
use App\Models\wishlistdetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
class WishListController extends Controller
{
    // Danh Sach + Phan Trang
    public function index(Request $request, $id)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $check=tb_wishlist::join("tb_user", "tb_user.id_user", "=", "tb_wishlist.id_user")->where('tb_user.id_user', $id)->first();
            if(!$check)
            {
            return response()->json(['status'=>"Failed", "Err_Message"=>"Not Found"]);
            }
            $wish=tb_wishlist::join("tb_user", "tb_user.id_user", "=", "tb_wishlist.id_user")
            ->join('tb_wishlist_details', 'tb_wishlist_details.id_wishlist', '=', 'tb_wishlist.id_wishlist')
            ->join("tb_product", "tb_product.id_product", "=", "tb_wishlist_details.id_product")
            ->where('tb_user.id_user', $id)
            ->paginate($limit, [
                'tb_product.id_product',
                'tb_product.rate',
                'tb_product.availability',
                'tb_product.descriptions',
                'tb_product.name',
                'tb_product.price',
                'tb_product.discount',
                'tb_product.image',
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
            'id_user'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(['status'=>"Failed", "Err_Message"=>Arr::first(Arr::flatten($validator->errors()->get('*')))]);
        }
        try {
            $user=tb_wishlist::where('id_user', $request['id_user'])->first();
            if(!$user)
            {
                
                $wish=tb_wishlist::create([
                    'id_user'=>$request['id_user']
                ]);
                $idWish=$wish->id_wishlist;
            }else{
                $idWish=$user->id_wishlist;
            }
        wishlistdetails::create([
            'id_product'=>$request['id_product'],
            'id_wishlist'=>$idWish
        ]);
        return response()->json(['status'=>"Success"]);
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e->getMessage()]);
        }

    }

    // Xoa product trong wishlist
    public function destroy(Request $request, $idUser, $idPro)
    {
        try {
            $wish=wishlistdetails::join('tb_wishlist', 'tb_wishlist_details.id_wishlist', '=', 'tb_wishlist.id_wishlist')
            ->join("tb_user", "tb_user.id_user", "=", "tb_wishlist.id_user")
            ->join("tb_product", "tb_product.id_product", "=", "tb_wishlist_details.id_product")
            ->where('tb_user.id_user',$idUser)->where('tb_wishlist_details.id_product', $idPro);
            if($wish->exists())
            {
                $wish->delete();
                return response()->json(['status'=>"Success"]);
            }
            return response()->json(['status'=>"Failed", "Err_Message"=>"Not Found"]);
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e->getMessage()]);
        }
    }

}
