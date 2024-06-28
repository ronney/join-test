<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

class CategoriesController extends Controller
{
    /**
    * Display a listing of the resource.
    */
   public function index()
   {
     $categories =  Category::orderBy('nome_categoria','ASC')->get();
     return response()->json($categories, 200);
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
            $category = Category::create($request->all());
            $msg = ['message'=>'Registro cadastrado com sucesso! '];
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $code = 500;
            $msg = ['message'=>'Erro ao cadastradar registro! '.$e->getMessage()];
        }

       return response()->json($msg, $code);
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
    $msg = '';
        $description = '';
        $code = 200;
        DB::beginTransaction();
        try {
            $category = Category::where('id_categoria_produto',$id)->update($request->all());
            $msg = ['message'=>'Registro editado com sucesso!'];
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $code = 500;
            $msg = ['message'=>'Erro ao editar o registro! '.$e->getMessage()];
        }
        return response()->json($msg, $code);
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
            $category = Category::where('id_categoria_produto',$id)->delete();
            $msg = ['message'=>'Registro apagado!'];
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            $code = 500;
            $msg = ['message'=>'Erro ao apagar o registro! '.$e->getMessage()];
        }
        return response()->json($msg, $code);

   }
}
