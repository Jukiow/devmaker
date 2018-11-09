<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\devmakerMDL;
use App\Models\postsMDL;

class devmakerCTRL extends Controller{

    public function index(){
        // $cards = devmakerMDL::get()->toArray();
        // $contador = $this->countStatus();
        // $arr_envio = array("contador" => $contador);
        return view('login');
    }

    public function sistema(){

        $sessao = session()->get('usuario_logado');
        $posts = postsMDL::get()->toArray();

        // dd($posts);

        $arr_envio = array(
          "arr_usuario" => $sessao,
          "posts" => $posts
        );

        return view('sistema',$arr_envio);
    }

    public function sair(){

        session()->forget('usuario_logado');
        return response()->json(1);
    }

    public function registro(){
      $adicionando = new devmakerMDL();

      //verificar se já há esse e-mail cadastrado
      $cadastro = devmakerMDL::where('email_usuario',$_GET['email'])->get()->toArray();
      if(isset($cadastro[0])){
        return response()->json(0);
      }else{
        $arr_envio = array('nome_usuario' => $_GET['nome'], 'email_usuario' => $_GET['email'], 'senha_usuario' => $_GET['senha']);
        $adicionando->fill($arr_envio);
        $adicionando->save();
        return response()->json($adicionando);
      }
    }

    public function login(){

      $arr_envio = array(
        'email_usuario' => $_GET['email'],
        'senha_usuario' => $_GET['senha']
      );

      $verificadora = devmakerMDL::where($arr_envio)->get()->toArray();

      if(!isset($verificadora[0])){
        return response()->json(0);
      }else{
        $arr_dados = array('id_usuario' => $verificadora[0]['id_usuario'] ,'nome_usuario' => $verificadora[0]['nome_usuario']);
        session()->put('usuario_logado',$arr_dados);
        return response()->json($verificadora[0]);
      }
    }

    public function trocar(){
      $arr_proc = array('id_usuario' => $_GET['id'], 'senha_usuario' => $_GET['senha']);
      $editando = devmakerMDL::find($_GET['id']);
      $verificadora = devmakerMDL::where($arr_proc)->get()->toArray();

      if(!isset($verificadora[0])){
        return response()->json(0);
      }else{
        $arr_dados = array('senha_usuario' => $_GET['senha_n']);
        $editando->fill($arr_dados);
        $editando->save();
        return response()->json(1);
      }

    }

    public function novoPost(){
      $adicionando = new postsMDL();
      $arr_envio = array('titulo_posts' => $_GET['titulo'], 'descricao_posts' => $_GET['conteudo'], 'id_usuario' => $_GET['usuario'], 'nome_usuario' => $_GET['nome_usuario']);
      $adicionando->fill($arr_envio);
      $adicionando->save();
      return response()->json(1);
    }

    public function favPost(){
      $arr_proc = array('id_posts' => $_GET['post']);
      $editando = postsMDL::where($arr_proc)->get()->toArray();
      $valores = postsMDL::find($_GET['post']);

      if(!$editando[0]['post_fav']){
        $arr_dados = array('post_fav' => 1, 'post_fav_ids' => $_GET['fav_por_id'], 'post_fav_nomes' => $_GET['fav_por_nome']);
        $valores->fill($arr_dados);
        $valores->save();
        return response()->json($editando);
      }else{

        $count_ids = explode(',',$editando[0]['post_fav_ids']);
        $count_nomes = explode(',',$editando[0]['post_fav_nomes']);

        if(count($count_ids) >= 1){
          foreach ($count_ids as $key => $value) {
            if ($value === reset($count_ids)){
              $var_ids = str_replace(" ","",$value);
            }else{
              $var_ids = $var_ids.", ".str_replace(" ","",$value);
            }
          }
          foreach ($count_nomes as $key => $value) {
            if ($value === reset($count_nomes)){
              $var_nomes = str_replace(" ","",$value);
            }else{
              $var_nomes = $var_nomes.", ".str_replace(" ","",$value);
            }
          }
          $var_ids = $var_ids.", ".$_GET['fav_por_id'];
          $var_nomes = $var_nomes.", ".$_GET['fav_por_nome'];
        }else{
          $var_ids = $_GET['fav_por_id'];
          $var_nomes = $_GET['fav_por_nome'];
        }

        $arr_dados = array('post_fav_ids' => $var_ids, 'post_fav_nomes' => $var_nomes);
        $valores->fill($arr_dados);
        $valores->save();
        return response()->json($editando);

      }
    }

    public function unfavPost(){

      $arr_proc = array('id_posts' => $_GET['post']);
      $editando = postsMDL::where($arr_proc)->get()->toArray();
      $valores = postsMDL::find($_GET['post']);

      $exp_dados = explode(",",$editando[0]['post_fav_ids']);
      foreach ($exp_dados as $key => $value) {
        $exp_dados[$key] = trim($value);
      }

      $existe_array = array_search($_GET['fav_por_id'],$exp_dados);
      if($existe_array == 0){
        $arr_dados = array('post_fav' => 0 , 'post_fav_ids' => '', 'post_fav_nomes' => '');
        $valores->fill($arr_dados);
        $valores->save();
        return response()->json($editando);
      }else{
        if($existe_array != ""){
          array_splice($exp_dados, 1, $existe_array);
          foreach ($exp_dados as $key => $value) {
            reset($exp_dados);
            if ($key === key($exp_dados)){
              $var_ids = $value;
            }else{
              $var_ids = $var_ids.", ".$value;
            }
          }
        }else{
          return response()->json(0);
        }

        $exp_dados_nomes = explode(",",$editando[0]['post_fav_nomes']);
        foreach ($exp_dados_nomes as $key => $value) {
          $exp_dados_nomes[$key] = trim($value);
        }

        $existe_array = array_search($_GET['fav_por_nome'],$exp_dados_nomes);

        if($existe_array != ""){
          array_splice($exp_dados_nomes, 1, $existe_array);
          foreach ($exp_dados_nomes as $key => $value) {
            reset($exp_dados_nomes);
            if ($key === key($exp_dados_nomes)){
              $var_nomes = $value;
            }else{
              $var_nomes = $var_nomes.", ".$value;
            }
          }
        }else{
          return response()->json(0);
        }
      }
      $arr_dados = array('post_fav_ids' => $var_ids, 'post_fav_nomes' => $var_nomes);
      $valores->fill($arr_dados);
      $valores->save();
      return response()->json($editando);
    }
}
