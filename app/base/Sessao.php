<?php

class Sessao
{
    public function __construct(){
        if (!session_id()) {
            session_start();
        }
    }

    public function criar(string $chave, object $valor): Sessao
    {
        $_SESSION[$chave] = (is_array($valor) ? (object) $valor : $valor);
        return $this;
    }

    public function limpar($chave): Sessao
    {
        unset($_SESSION[$chave]);
        return $this;
    }

    public function carregar(): ?object
    {
        return(object) $_SESSION;
    }

    public function checar(string $chave): bool
    {
        return isset($_SESSION[$chave]);
    }

    public function deletar(): Sessao
    {
        session_destroy();
        return $this;
    }
}


?>