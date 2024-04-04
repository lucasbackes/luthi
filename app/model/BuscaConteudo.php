<?php

require_once('base/Conexao.php');

class BuscaConteudo
{
    public function busca()
    {
        $query = "SELECT * FROM `cursos`";
        $stmt = Conexao::getInstancia()->query($query);
        $resultado = $stmt->fetchAll();

        // var_dump($resultado);

        return $resultado;
        
    }
}



?>