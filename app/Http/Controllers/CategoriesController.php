<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
    $categories =  Category::all();
     return response()->json($categories, 200);
   }
//
   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $category = Category::create($request->all());
       $msg = ['message'=>'Registro cadastrado com sucesso!'];

       return response()->json($msg, 200);
   }

   /**
    * Display the specified resource.
    */
   public function show(int $id)
   {
        $category =  Category::where('id_categoria_produto',$id)->first();
        return response()->json($category, 200);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, int $id)
   {
        $category = Category::where('id_categoria_produto',$id)->update($request->all());
        $msg = ['message'=>'Registro editado com sucesso!'];
        return response()->json($msg, 200);
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(int $id)
   {
        $category = Category::where('id_categoria_produto',$id)->delete();
        $msg = ['message'=>'Registro apagado!'];
        return response()->json($msg, 200);

   }
}
