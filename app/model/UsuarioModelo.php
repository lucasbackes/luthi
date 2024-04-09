<?php

require_once('../base/Conexao.php');

class UsuarioModelo
{
    public function buscaUsuario($login, $password)
    {
        $query = "SELECT id, nome, sobrenome, email, tipo FROM `usuarios` WHERE `email` = '$login' AND `senha` = '$password'";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();

        // var_dump($resultado);

        $resultadoJson = json_encode($resultado);

        return $resultadoJson;
        
    }
}

?>