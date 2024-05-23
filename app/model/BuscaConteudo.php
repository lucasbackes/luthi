<?php

// require_once('base/Conexao.php');


// $operacao = $_POST['operacao'];
// $id = $POST['id'];

class BuscaConteudo
{
    public function busca()
    {
        $query = "SELECT * FROM `cursos`";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();

        // var_dump($resultado);

        $resultadoJson = json_encode($resultado);
        return $resultadoJson;

        // return "oi";
        
    }

    public function buscaDescricao($id_curso)
    {
        $query = "SELECT * FROM `cursos` WHERE `id` = '$id_curso'";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();

        // var_dump($resultado);
        $resultadoJson = json_encode($resultado);
        return $resultadoJson;

        
    }

    public function buscaConteudoAulas($id_curso)
    {
        $query = "SELECT conteudo FROM `aulas` WHERE `id_curso` = '$id_curso'";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();

        // var_dump($resultado);
        $resultadoJson = json_encode($resultado);
        return $resultadoJson;
        

        
    }
    




}


?>