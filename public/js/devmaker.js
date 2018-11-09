$( document ).ready(function(){
  $('.dropdown-toggle').dropdown()

  $( "#registre_se" ).click(function() {
      $( "#container-registrar" ).toggle( "slow", function() {
        $("#container-logar").hide("slow");
      });

  });

  $( '#voltar-ini' ).click(function() {
    $( "#container-logar" ).toggle( "slow", function() {
      $("#container-registrar").hide("slow");
    });
  });

  $('#btn-registrar').click(function(){

    var texto = 0;
    var nome = "";
    var email = "";
    var senha = "";

    if(!$('#nome-reg').val()){
      nome = "o nome,";
      texto = 1;
    }
    if(!$('#email-reg').val()){
      email = "o email,";
      texto = 1;
    }
    if(!$('#pass-reg').val()){
      senha = "a senha";
      texto = 1;
    }
    if (texto != 0){
      swal("Erro!", "Falta informar "+nome+" "+email+" "+senha , "error");
    }else{
      var sEmail	= $("#email-reg").val();
  		// filtros
  		var emailFilter=/^.+@.+\..{2,}$/;
  		var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
  		// condição
  		if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
  			swal("Erro!", "Email informado não é válido", "error");
  		}else{
        nome = $('#nome-reg').val();
        email = $('#email-reg').val();
        senha = MD5($('#pass-reg').val());

        $.get("/registro", {
            nome : nome, email : email, senha : senha
        }, function(msg){
            if(msg['id_usuario']){
              swal("Sucesso!", "Cadastro realizado com sucesso!", "success").then((value) => {
                $('#nome-reg').val('');
                $('#email-reg').val('');
                $('#pass-reg').val('');
                $( "#container-logar" ).toggle( "slow", function() {
                  $("#container-registrar").hide("slow");
                });
              });
            }else if(msg == 0){
              swal("Erro!", "Email informado já está cadastrado", "error");
            }
        })
  		}
    }

  });

  $('#btn-entrar').click(function(){
    var texto = 0;
    var email = "";
    var senha = "";

    if(!$('#email').val()){
      email = "o email,";
      texto = 1;
    }
    if(!$('#pass').val()){
      senha = "a senha";
      texto = 1;
    }
    if (texto != 0){
      swal("Erro!", "Falta informar "+email+" "+senha , "error");
    }else{
      var sEmail	= $("#email").val();
      // filtros
      var emailFilter=/^.+@.+\..{2,}$/;
      var illegalChars= /[\(\)\<\>\,\;\:\\\/\"\[\]]/
      // condição
      if(!(emailFilter.test(sEmail))||sEmail.match(illegalChars)){
        swal("Erro!", "Email informado não é válido", "error");
      }else{
        email = $('#email').val();
        senha = MD5($('#pass').val());

        $.get("/login", {
            email : email, senha : senha
        }, function(msg){
            console.log(msg);
            if(msg['id_usuario']){
              window.location.href = "/sistema";
            }else if(msg == 0){
              swal("Erro!", "Email ou senha informados não conferem!", "error");
            }
        })
      }
    }

  });

  $('#btn-sair').click(function(){
    $.get("/sair", {
      usuario : $('#usuario_logado').val()
    }, function(msg){
      if(msg == 1){
        window.location.href = "/";
      }
    })
  });

  $('#trocar-senha').click(function() {
    var texto = 0;
    var senha = "";
    var senha_n = "";

    if(!$('#pass-change').val()){
      senha = "a senha,";
      texto = 1;
    }
    if(!$('#pass-change-new').val()){
      senha_n = "a nova senha,";
      texto = 1;
    }
    if (texto != 0){
      swal("Erro!", "Falta informar "+senha+" "+senha_n , "error");
    }else{
      senha = MD5($('#pass-change').val());
      senha_n = MD5($('#pass-change-new').val());

      $.get("/trocar_senha", {
          senha : senha, senha_n : senha_n, id: $('#usuario_logado').val()
      }, function(msg){
        if(msg == 0){
          swal("Erro!", "A senha atual informada não confere!", "error");
        }else{
          swal("Sucesso!", "Senha trocada com sucesso!", "success");
          $('#pass-change').val('');
          $('#pass-change-new').val('');
          $('#modaltrocasenha').modal('hide');

        }
      })
    }
  });

  $('#add-post').click(function(){
    var texto = 0;
    var titulo = "";
    var conteudo = "";

    if(!$('#header-post').val()){
      titulo = "o título,";
      texto = 1;
    }
    if(!$('#content-post').val()){
      conteudo = "o conteúdo,";
      texto = 1;
    }
    if (texto != 0){
      swal("Erro!", "Falta informar "+titulo+" "+conteudo , "error");
    }else{
      titulo = $('#header-post').val();
      conteudo = $('#content-post').val();

      $.get("/novo_post", {
          titulo : titulo, conteudo : conteudo, usuario : $('#usuario_logado').val(), nome_usuario: $('#nome_usuario').val()
      }, function(msg){
        if(msg == 1){
          swal("Sucesso!", "Post adicionado com sucesso!", "success").then((value) => {
            $('#header-post').val('');
            $('#content-post').val('');
            window.location.href = "/sistema";
          });
        }
      })
    }

  });

});

function favoritar(id){
  $.get("/favoritar_post", {
      post : id, fav_por_id : $('#usuario_logado').val(), fav_por_nome : $('#nome_usuario').val()
    }, function(msg){
      if(msg == 0){
        swal("Erro!", "Post não existe para esta ação!", "error");
      }else{
        swal("Sucesso!", "Post curtido com sucesso!", "success").then((value) => {
          window.location.href = "/sistema";
        });
      }
    })
}

function unfav(id){
  $.get("/unfav_post", {
      post : id, fav_por_id : $('#usuario_logado').val(), fav_por_nome : $('#nome_usuario').val()
    }, function(msg){
      if(msg == 0){
        swal("Erro!", "Post não existe para esta ação!", "error");
      }else{
        swal("Sucesso!", "Post descurtido com sucesso!", "success").then((value) => {
          window.location.href = "/sistema";
        });
      }
    })
}
