## User Stories  Eraldo Greinert Junior

### Sobre a User Stories

- Linguagem: PHP '7.1.15'
- Framework PHP: Laravel '5.7'
- Banco de dados: Mysql '5.6.36'


### Requisitos

- Como um usuário anônimo, devo me registrar para me tornar um usuário registrado (nome, e-mail e senha).
- Como um usuário anônimo, devo ser capaz de me logar e deslogar do sistema (e-mail e senha).
- Como um usuário registrado, devo ser capaz de alterar minha senha.
- Como um usuário registrado, devo ser capaz de criar posts (titulo, descrição).
- Como um usuário registrado, devo ser capaz de favoritar posts meus e de outros usuarios.
- Como um usuário registrado, devo ser capaz de listar os posts que eu favoritei.

### Utilização

- PHP (Laravel)
- MYSQL
- COMPOSER


### Montar o ambiente

Com o projeto em seu ambiente local, primeiramente deverá ser feito o download das dependencias do framework laravel através do comando "composer update", executando no diretório raiz do projeto.
*Lembrando que é necessario estar instalado composer na maquina e o PHP > 7.0.
***
Link download composer: https://getcomposer.org/download/
***
Devemos criar um arquivo .env (na raiz), para definirmos as configurações. (se já não haver)

Copiar o arquivo .env.example, alterar para .env ***(Deve ser com o .(ponto) no inicio (.env))*** e editar os seguintes campos:

-DB_DATABASE = Com o nome da sua database.

-DB_USERNAME = Usuario do seu banco de dados.

-DB_PASSWORD = Senha do seu banco.

-APP_DEBUG = Ativar modo debug (Vamos deixa-lo ativado).


Exemplo (utilizado por mim, só retirei minha APP_KEY, pois é pessoal):
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=devmaker
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

Para o framework funcionar corretamente devemos criar uma chave "APP_KEY=" usando o comando "php artisan key:generate" na raiz do projeto.

Exemplo:
```

C:\xampp\htdocs\devmaker>php artisan key:generate
Application key [base64:EsgHdjbWs4gKZZbsNADkX1u1BMTJVJpJfdSBZpyCBG4=] set successfully.

```

Agora vamos ao BD.


Crie uma database com o mesmo nome que foi inserido no "DB_DATABASE" do arquivo .env.
Crie as tabelas com suas respectivas columas igual encontradas nas MODAIS do projeto.

Tabela_usuarios:

id_usuario - INT(11)
nome_usuario - VARCHAR(200)
email_usuario - VARCHAR(200)
senha_usuario - VARCHAR(200)

Tabela tb_posts:

id_posts - INT(11)
id_usuario - INT(11)
nome_usuario - VARCHAR(200)
titulo_posts - TEXT
descricao_posts - TEXT
post_fav - INT(1)
post_fav_ids - TEXT
post_fav_nomes - TEXT

```

Agora vamos acessar o projeto via web: (verifique antes se as configurações para acessar localhost estão OK, no windows)
***localhost***


```

Observações: 

1- Neste requisito: "Como um usuário registrado, devo ser capaz de listar os posts que eu favoritei." 
   fiz de forma diferente, o sistema mostra todos os que eu favoritei, liberando um botão vermelho que funciona para
   descurtir o post em questão, função a mais só por "perfumaria".
   
2- Projeto com todas requisições testadas e OK. Qualquer problema ou dúvida, entrar em contato.   