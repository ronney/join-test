<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tb_produto';
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
       'id_produto','nome_produto','categoria_produto_id','valor_produto','data_cadastro'
   ];

   public function category()
   {
       return $this->belongsTo(Category::class,'categoria_produto_id','id_categoria_produto');
   }

   public function getDataCadastroAttribute($value)
   {
       return date('d/m/Y', strtotime($value));
   }
   public function getValorProdutoAttribute($value)
   {
       return number_format($value,2,",",".");
   }
}
