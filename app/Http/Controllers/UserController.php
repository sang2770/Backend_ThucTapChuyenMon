<?php

namespace App\Http\Controllers;

use App\Models\tb_user;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Danh Sach + Phan Trang
    public function index(Request $request)
    {
        $limit = $request->query('limit');
        $page = $request->query('page');
        try {
            $listUser=tb_user::filter($request)->paginate($limit, [
                'id_user',
                'name',
                'email'
            ], 'page', $page)->toArray();
            return response()->json(['status' => "Success", 'data' => $listUser['data'], 'pagination' => [
                "page" => $listUser['current_page'],
                "limit" => $limit,
                "TotalPage" => $listUser['last_page']
            ]]);
        } catch (Exception $e) {
            return response()->json(['status' => "Failed", 'Err_Message' => $e->getMessage()]);
        }
        
    }

}
