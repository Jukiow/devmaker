@include('layouts.header')

<div class="limiter">
	<div class="container-login100">
		<div class="wrap-posts100" id="container-logar">
      	<img class="img-logo" src="/imgs/dev-maker.png" alt="DEVMAKER" style="width: 122px; float: left;">
				<span class="posts100-form-title p-b-26">
					Olá, {{$arr_usuario['nome_usuario']}}
          <input type="hidden" id="usuario_logado" value="{{$arr_usuario['id_usuario']}}">
          <input type="hidden" id="nome_usuario" value="{{$arr_usuario['nome_usuario']}}">
          <div class="btn-group" style="margin-left: 15px;">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-cog"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
              <button class="dropdown-item" id="btn-trocar-senha" type="button"  data-toggle="modal" data-target="#modaltrocasenha">Trocar senha</button>
              <button class="dropdown-item" id="btn-sair" type="button">Sair</button>
            </div>
          </div>
				</span>
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <hr>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <span class="post-ttl">Posts:</span>
            <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#modaladdpost">
              <i class="fas fa-plus-circle"></i>
            </button>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-12">
            <div class="posts-container">
              @foreach ($posts as $index => $value)
                @if($value['post_fav'])
                  <div class="card bg-light mb-12" style="border-color:red;">
                @else
                  <div class="card bg-light mb-12">
                @endif
                  <div class="card-header">
                    @php
                      $arr_favs = explode(',',$value['post_fav_ids']);
                      $arr_noms = explode(',',$value['post_fav_nomes']);
                    @endphp

                    @if (!$arr_favs[0])
                      @php
                        $contador = 0;
                        $meu_like = 0;
                      @endphp
                    @else
                      @php
                        $meu_like = 0;
                        $contador = count($arr_favs);
                        foreach ($arr_favs as $key_f => $value_f){
                          if($value_f == $arr_usuario['id_usuario']){
                            $meu_like = 1;
                          }
                        }
                      @endphp
                    @endif
                    @if ($meu_like != 1)
                      <button type="button" value="{{$value['id_posts']}}" class="btn btn-success" id="btn-favoritar-{{$value['id_posts']}}" onclick="favoritar({{$value['id_posts']}})" style="float: right;">
                        <i class="far fa-heart"></i>
                      </button>
                    @else
                      <button type="button" value="{{$value['id_posts']}}" class="btn btn-danger" id="btn-unfav-{{$value['id_posts']}}" onclick="unfav({{$value['id_posts']}})" style="float: right;">
                        <i class="fas fa-times"></i>
                      </button>
                    @endif
                    <span>Criado por: {{$value['nome_usuario']}}</span>
                    <h5 style="display: block; max-width: 80%;">{{$value['titulo_posts']}}</h5>
                  </div>
                  <div class="card-body">
                    <p class="card-text">{{$value['descricao_posts']}}</p>
                  </div>
                  @if ($value['post_fav'] == 1)
                  <div class="card-footer">
                    <span style="font-weight:bold">Favorito por: {{$value['post_fav_nomes']}}</span>
                  </div>
                  @endif
                </div>
              @endforeach
            </div>
          </div>
        </div>
		</div>
	</div>
</div>

<!--modal para modificar senha -->
@include('layouts.modal-senha')

<!--modal para adicionar posts -->
@include('layouts.modal-add')

<!--modal para ver favoritos -->
