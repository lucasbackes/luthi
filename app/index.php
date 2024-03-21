<?php

require_once('base/Conexao.php');
require_once('model/BuscaConteudo.php');
require_once('base/Sessao.php');

$sessao = new Sessao();


// Verifica se o usuário já está logado
// Se sim, direciona para pagina de serviços
// Senão, aguarda informações de login
if($sessao->checar('usuario')){
    header("Location: meus-servicos.php");
    exit();
} 




// $sessao->criar('usuario', ['id' => 10, 'nome' => 'Lucas Backes']);

// var_dump($sessao->carregar()->usuario->nome); // Lucas Backes
// echo '<hr>';
// var_dump($sessao->checar('usuario')); //true
// echo '<hr>';
// $sessao->limpar('usuario');
// var_dump($sessao->checar('usuario')); //false

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Luthi</title>
 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cabecalho.css">
</head>
<body>

<nav id="cabecalho" class=""></nav>

<div id="geral">

    <div class="login--panel">
        <div class="login--title">Login</div>
        <div class="login--campos">
            <input type="text" name="usuario" id="usuario" placeholder="Usuário">
            <input type="password" name="senha" id="senha" placeholder="Senha">
        </div>
        <button id="entrar" class="entrar">
            Entrar
        </button>
        <a href="" class="esqueci">Esqueci minha senha</a>
    </div>


</div>


<script src="js/index.js"></script>
</body>
</html>