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

    public function verificaSeExisteUsuario($login, $operacao)
    {
        $db = Conexao::getInstancia();
        $query = "SELECT id, email, tipo, codigo FROM `usuarios` WHERE `email` = '$login'";
        $stmt = $db->query($query);
        $resultado = $stmt->fetchAll();

        if ($resultado[0]->email == $login){
            if ($operacao == "gerarCodigo"){
                $codigoGerado = random_int(100000, 999999);
                $query2 = "UPDATE `usuarios` SET `codigo` = $codigoGerado WHERE `email` = '$login'";
                $stmt2 = $db->query($query2);   
            }
            return $resultado[0]->id;
        }else{
            return 0;
        }
    }

    public function buscaCodigo($id, $codigoInformado)
    {
        $db = Conexao::getInstancia();
        $query = "SELECT id, codigo FROM `usuarios` WHERE `id` = '$id'";
        $stmt = $db->query($query);
        $resultado = $stmt->fetchAll();

        if ($resultado[0]->codigo == $codigoInformado) {
            return "ok";
        }else{
            return "codigoInvalido";
        }
    }

    public function alteraSenha($id, $hashJS)
    {
        $passwordHash = password_hash($hashJS, PASSWORD_DEFAULT);
        $db = Conexao::getInstancia();
        $query = "UPDATE `usuarios` SET `senha` = '$passwordHash', `codigo` = 0 WHERE `id` = $id AND `codigo` != 0";
        $stmt = $db->query($query);   
        return "ok";
    }

    public function buscaCursosDoUsuario($id)
    {
        $db = Conexao::getInstancia();
        $query = "SELECT c.id, c.nome, uc.andamento, uc.data_conclusao FROM cursos c INNER JOIN usuarios_cursos uc ON uc.id_curso = c.id WHERE uc.id_usuario = $id";
        $stmt = $db->query($query);
        $resultado = $stmt->fetchAll();

        $resultadoJson = json_encode($resultado);
        return json_encode($resultadoJson);
    }

    public function verificaPermissaoNoCurso($id, $id_curso)
    {
        $db = Conexao::getInstancia();
        // $query = "SELECT `id_usuario`, `id_curso` FROM `usuarios_cursos` WHERE `id_usuario` = '$id' AND `id_curso` = '$id_curso'";
        $query = "SELECT COUNT(*) FROM usuarios_cursos WHERE `id_usuario` = '$id' AND `id_curso` = '$id_curso'";
        $stmt = $db->query($query);
        $resultado = $stmt->fetchColumn();
        echo $resultado;
    }

    public function buscaAndamentoNoCurso($id, $id_curso)
    {
        $db = Conexao::getInstancia();
        $query = "SELECT `andamento` FROM usuarios_cursos WHERE `id_usuario` = '$id' AND `id_curso` = '$id_curso'";
        $stmt = $db->query($query);
        $resultado = $stmt->fetchColumn();
        echo $resultado;
    }

    public function atualizaAndamento($id, $id_curso, $valorNovo)
    {
        $db = Conexao::getInstancia();
        $query = "UPDATE `usuarios_cursos` SET `andamento` = '$valorNovo' WHERE `id_usuario` = $id AND `id_curso` = '$id_curso'";
        $stmt = $db->query($query);   
        return "ok";
    }
    

    

    


}

?>