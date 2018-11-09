<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class devmakerMDL extends Model
{
    //seleciona a tabela tb_usuarios
    protected $table = 'tb_usuarios';

    //campos da tabela
    protected $fillable = [
          "id_usuario",
          "nome_usuario",
          "email_usuario",
          "senha_usuario"
    ];

    //desativando CREATED e UPDATED
    public $timestamps = false;

    //alterando o nome da chave primaria
    protected $primaryKey = 'id_usuario';
}
