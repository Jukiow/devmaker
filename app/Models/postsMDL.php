<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class postsMDL extends Model
{
    //seleciona a tabela tb_usuarios
    protected $table = 'tb_posts';

    //campos da tabela
    protected $fillable = [
          "id_posts",
          "id_usuario",
          "nome_usuario",
          "titulo_posts",
          "descricao_posts",
          "post_fav",
          "post_fav_ids",
          "post_fav_nomes"

    ];

    //desativando CREATED e UPDATED
    public $timestamps = false;

    //alterando o nome da chave primaria
    protected $primaryKey = 'id_posts';
}
