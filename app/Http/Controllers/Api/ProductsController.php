<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function products(){

        $products = Product::orderBy('id', 'desc')->get();

        return response()->json($products);
    }

    public function product(Request $request){

        //validate
        $validateUser = Validator::make($request->all(), 
        [
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|numeric',
        ]);

        if($validateUser->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Error de validación!',
                'errors' => $validateUser->errors()
            ], 401);
        }
        
        try {
            if($request->id){ //update user
                $product = Product::findOrFail($request->id);
                $product->fill($request->all());
                $product->save();
            }else{ //create new user
                $product = new Product();
                $product->fill($request->all());
                $product->save();
            }
            
            return response()->json($product);

        } catch (\Throwable $th) {
             return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
        
    }


    public function show($id){
        
        $product = Product::findOrFail($id);

        return response()->json($product);
    }

    public function delete($id){
        
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json('eliminado');
    }

    public function search($text){
        
        $products = Product::where('nombre', 'LIKE', '%'.$text.'%')
                            ->orWhere('sku','LIKE', '%'.$text.'%')
                            ->get();
       
        return response()->json($products);
    }

    //end controller
}
