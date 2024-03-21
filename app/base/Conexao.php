<?php

require_once('configuracao.php');

use PDO;
use PDOException;


class Conexao
{
    private static $instancia;

    public static function getInstancia():PDO
    {
        
        if(empty(self::$instancia)){

            try {
                
                self::$instancia = new PDO(
                    'mysql:host='.DB_HOST.';port='.DB_PORTA.';
                    dbname='.DB_NOME, DB_USER, DB_PASS, [

                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        PDO::ATTR_CASE => PDO::CASE_NATURAL

                    ]
                );


            } catch (PDOException $err) {
                die("Erro: ".$err->getMessage());
                
            }

            return self::$instancia;
        }
    }
}


?>