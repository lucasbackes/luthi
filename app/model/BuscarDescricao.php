<?php
require_once('../base/Conexao.php');
require_once('BuscaConteudo.php');

$id = $_POST['id'];
$operacao = $_POST['operacao'];

if ($operacao == 'descricao'){
    $resposta = (new BuscaConteudo())->buscaDescricao($id);

}

echo $resposta;


?>