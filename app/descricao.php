<?php

require_once('base/Conexao.php');
require_once('model/BuscaConteudo.php');
require_once('base/Sessao.php');

$sessao = new Sessao();

$curso = $_GET['curso'];

$dadosSessao = $sessao->carregar();

if(!$sessao->checar('usuario')){
    header("Location: index.php");
    exit();
} 

$idUsuario = $dadosSessao->usuario->id;


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
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="stylesheet" href="css/meus-servicos.css">
</head>
<body>
<div id="idCurso" style="display: none"><?php echo $curso ?></div>

<nav id="cabecalho" class=""></nav>

<div id="geral">
    <a href="meus-servicos.php" class="voltar">
        <img src="img/seta-voltar.svg">
        voltar
    </a>


    <div class="topo flex-row flex-start-center">
        <div class="imagem">
            
        </div>    
        <div class="infoTopo">
            <h1>Curso</h1>
            <p>Carga horária: <span class="carga"></span>h</p>
            <p>Professor: <span class="professor"></span></p>

        </div>
    </div>

    <div class="sobre">
        <h2 style="padding-bottom: 20px;"> Sobre o curso </h2>

        <p class="descricaoCurso"></p>

        <button class="btn botao-card-cursos" style="margin-top: 20px; width: auto; background-color: white; border-color: #b1b1b1; padding: 15px; cursor: pointer">
            <p>Acessar o curso</p>
            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.3536 4.35355C13.5488 4.15829 13.5488 3.84171 13.3536 3.64645L10.1716 0.464466C9.97631 0.269204 9.65973 0.269204 9.46447 0.464466C9.2692 0.659728 9.2692 0.976311 9.46447 1.17157L12.2929 4L9.46447 6.82843C9.2692 7.02369 9.2692 7.34027 9.46447 7.53553C9.65973 7.7308 9.97631 7.7308 10.1716 7.53553L13.3536 4.35355ZM0 4.5L13 4.5V3.5L0 3.5L0 4.5Z" fill="#292929"/>
            </svg>
        </button>
    </div>
    



</div>


<script src="js/descricao.js"></script>

<style>
    .topo{
        background-color: white; width: 100%; gap: 80px; border: 1px solid #AAA; border-radius: 5px;
    }
    .imagem{
        width: 250px;
        height: 250px;
        max-width: 250px;
        background-image: url('img/cursos/placeholder.png');
        background-position: center center;
        background-size: cover;
    }

    h1{
        color: var(--title);
        font-size: 2.25rem;
        font-weight: bold;
        line-height: 1;
        padding-bottom: 10px;
    }



</style>


</body>
</html>