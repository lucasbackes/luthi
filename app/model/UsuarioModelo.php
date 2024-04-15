<?php

require_once('../base/Conexao.php');
require_once('../base/Sessao.php');



class UsuarioModelo
{
    public function buscaUsuario($login, $password)
    {

        $query = "SELECT id, nome, sobrenome, email, tipo, senha FROM `usuarios` WHERE `email` = '$login'";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();


        if (password_verify($password, $resultado[0]->senha)) {
            $sessao = new Sessao();
            $resultado[0]->senha = "";
            $resposta = $resultado[0];
            $sessao->criar('usuario', $resposta);
            
        }else{
            $resposta = "erro";
        }


        $resultadoJson = json_encode($resposta);
        return $resultadoJson;
        
    }


}

?>