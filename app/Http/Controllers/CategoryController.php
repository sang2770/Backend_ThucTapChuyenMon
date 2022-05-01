<?php

namespace App\Http\Controllers;

use App\Models\tb_category;
use Faker\Extension\Extension;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(){
        try {
            $product=tb_category::select('*')->get();
            return response()->json(['status' => "Success", 'data' => $product]);
        } catch (Extension $e) {
            return response()->json(['status' => "Failed", 'err' => $e]);
            
        }
    }
}
