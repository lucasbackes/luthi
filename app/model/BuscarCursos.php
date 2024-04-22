<?php

require_once('../base/Conexao.php');
require_once('UsuarioModelo.php');
require_once('../base/Sessao.php');

$operacao = $_POST['operacao'];

$sessao = new Sessao();
$dadosSessao = $sessao->carregar();
$idUsuario = $dadosSessao->usuario->id;



if ($operacao == "cursosDoUsuario") {
    $resultado = (new UsuarioModelo())->buscaCursosDoUsuario($idUsuario);
    // var_dump($resultado);
    print_r($resultado);
    // echo "ok";
}


?>