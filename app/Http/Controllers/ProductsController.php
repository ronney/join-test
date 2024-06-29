<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class ProductsController extends Controller
{
     /**
    * Display a listing of the resource.
    */
   public function index()
   {
     $products =  Product::with('category:id_categoria_produto,nome_categoria')->orderBy('nome_produto','ASC')->get();
     return response()->json($products, 200);
   }
//
   /**
    * Store a newly created resource in storage.
    */
   public function store(Request $request)
   {
       $msg = '';
       $description = '';
       $code = 200;
       DB::beginTransaction();
       try {
            $product = Product::create($request->all());
            $msg = ['message'=>'Registro cadastrado com sucesso!'];
            DB::commit();
       } catch (Exception $e) {
            DB::rollback();
            $code = 500;
            $msg = ['message'=>'Erro ao cadastradar registro! '.$e->getMessage()];
       }

       return response()->json($msg, 200);
   }

   /**
    * Display the specified resource.
    */
   public function show(int $id)
   {
        $product =  Product::where('id_produto',$id)->first();
        return response()->json($product, 200);
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(Request $request, int $id)
   {    $msg = '';
        $description = '';
        $code = 200;
        DB::beginTransaction();
        try {
            $product = Product::where('id_produto',$id)->update($request->all());
            $msg = ['message'=>'Registro editado com sucesso!'];
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $code = 500;
            $msg = ['message'=>'Erro ao editar o registro! '.$e->getMessage()];
        }
        return response()->json($msg,  $code);
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(int $id)
   {
        $msg = '';
        $description = '';
        $code = 200;
        DB::beginTransaction();
        try {
            $product = Product::where('id_produto',$id)->delete();
            $msg = ['message'=>'Registro apagado!'];
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $code = 500;
            $msg = ['message'=>'Erro ao apagar o registro! '.$e->getMessage()];
        }
        return response()->json($msg,  $code);

   }
}
