<?php

require_once('../base/Conexao.php');
require_once('UsuarioModelo.php');

$email = $_POST['email'];
$operacao = $_POST['operacao'];
$codigoInformado = $_POST['codigoInformado'];
$id = $_POST['id'];
$hashJS = $_POST['senha'];

if ($operacao == "verificarExistencia") {
    $idUsuario = (new UsuarioModelo())->verificaSeExisteUsuario($email, "gerarCodigo");
    echo $idUsuario;
} elseif ($operacao == "verificarCodigo"){
    $verificacaoCodigo = (new UsuarioModelo())->buscaCodigo($id, $codigoInformado);
    echo $verificacaoCodigo;
} elseif ($operacao == "enviarNovaSenha"){
    $retorno = (new UsuarioModelo())->alteraSenha($id, $hashJS);
    echo $retorno;
}


?>