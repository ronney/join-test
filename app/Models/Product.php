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
}
