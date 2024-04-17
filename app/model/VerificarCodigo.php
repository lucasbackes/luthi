<?php

require_once('../base/Conexao.php');
require_once('UsuarioModelo.php');

$codigo = $_POST['codigo'];
$id = $_POST['id'];

$idUsuario = (new UsuarioModelo())->verificaSeExisteUsuario($email, "gerarCodigo");

echo $idUsuario;

?>