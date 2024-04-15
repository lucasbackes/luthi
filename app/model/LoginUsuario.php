<?php
require_once('../base/Conexao.php');
require_once('UsuarioModelo.php');

$user = $_POST['user'];
$passwordJS = $_POST['password'];
$passwordHash = password_hash($passwordJS, PASSWORD_DEFAULT);

$dadosUsuario = (new UsuarioModelo())->buscaUsuario($user, $passwordJS);

echo $dadosUsuario;


?>