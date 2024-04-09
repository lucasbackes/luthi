<?php
require_once('../base/Conexao.php');
require_once('UsuarioModelo.php');

$user = $_POST['user'];
$passwordJS = $_POST['password'];
$passwordHash = password_hash($passwordJS, PASSWORD_DEFAULT);

$dadosUsuario = (new UsuarioModelo())->buscaUsuario($user, $passwordHash);

// $dadosUsuario = (new UsuarioModelo())->buscaUsuario('lucasbackes@gmail.com', '123456');

// echo $dadosUsuario;

echo $passwordHash;

// GERANDO HASHS DIFERENTES A CADA TENTATIVA DE LOGIN??

// return $dadosUsuario;


?>