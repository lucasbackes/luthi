<?php

require_once('../base/Conexao.php');
require_once('UsuarioModelo.php');
require_once('../base/Sessao.php');
require_once('BuscaConteudo.php');


$operacao = $_POST['operacao'];
$id_curso = $_POST['id'];
$valorNovo = $_POST['valorNovo'];

$sessao = new Sessao();
$dadosSessao = $sessao->carregar();
$id = $dadosSessao->usuario->id;



if ($operacao == "cursosDoUsuario") {
    $resultado = (new UsuarioModelo())->buscaCursosDoUsuario($id);
    // var_dump($resultado);
    print_r($resultado);
    // echo "ok";
}

if ($operacao == "descricaoCurso") {
    $resultado = (new BuscaConteudo())->buscaDescricao($id_curso);
    // var_dump($resultado);
    print_r($resultado);
    // echo "ok";
}

if ($operacao == "conteudoDoCurso") {
    $resultado = (new BuscaConteudo())->buscaConteudoAulas($id_curso);
    // var_dump($resultado);
    print_r($resultado);
    // echo $id_curso;
    
}

if ($operacao == "permissaoNoCurso") {
    $resultado = (new UsuarioModelo())->verificaPermissaoNoCurso($id, $id_curso);
    // var_dump($resultado);
    // print_r($resultado);
    print_r($resultado[0]);
    // echo "ok";
}

if ($operacao == "buscaAndamentoNoCurso") {
    $resultado = (new UsuarioModelo())->buscaAndamentoNoCurso($id, $id_curso);
    // var_dump($resultado);
    // print_r($resultado);
    print_r($resultado[0]);
    // echo "ok";
}

if ($operacao == "atualizaAndamento") {
    $resultado = (new UsuarioModelo())->atualizaAndamento($id, $id_curso, $valorNovo);
    // var_dump($resultado);
    // print_r($resultado);
    print_r($resultado[0]);
    // echo "ok";
}




?>