<?php

require_once('base/Conexao.php');
require_once('model/BuscaConteudo.php');
require_once('base/Sessao.php');

$sessao = new Sessao();

// $sessao->deletar();

// Verifica se o usuário já está logado
// Se sim, direciona para pagina de serviços
// Senão, aguarda informações de login
if($sessao->checar('usuario')){
    header("Location: meus-servicos.php");
    exit();
} 




// $sessao->criar('usuario', ['id' => 10, 'nome' => 'Lucas Backes']);

// var_dump($sessao->carregar()->usuario->nome); // Lucas Backes
// echo '<hr>';
// var_dump($sessao->checar('usuario')); //true
// echo '<hr>';
// $sessao->limpar('usuario');
// var_dump($sessao->checar('usuario')); //false

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Luthi</title>
 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.18.0/js/md5.min.js"></script>
    
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    
</head>
<body>

<nav id="cabecalho" class=""></nav>

<div id="geral">

    <div id="telaLogin" class="login--panel">
        <div class="login--title">Login</div>
        <div class="login--campos">
            <input type="text" name="usuario" id="usuario" placeholder="Usuário">
            <input type="password" class="pr-password" name="senha" id="senha" placeholder="Senha">
            <div class="aviso-login">Usuário ou senha inválidos.</div>
        </div>
        <button id="entrar" class="entrar">
            Entrar
        </button>
        <button id="esqueciSenha" class="esqueci">
            Esqueci minha senha
        </button>
    </div>

    <div id="telaEsqueci" class="login--panel atras">
        <div class="area--titulo-login">
            <div class="login--title">Recuperar senha</div>
            <div class="subtitulo--login">Você receberá um código no seu email.</div>
        </div>
        <div class="login--campos">
            <input type="email" name="email1" id="email1" placeholder="Endereço de email">
            <input type="email" name="email2" id="email2" placeholder="Confirme seu email">
            <div class="aviso-login">Endereços informados não são iguais ou são inválidos</div>
        </div>
        <button id="iniciar-recuperacao" class="entrar">
            Iniciar recuperação de senha
        </button>
        <button id="voltarParaLogin" class="esqueci">
            Voltar
        </button>
    </div>

    
    <div id="telaInserirCodigo" class="login--panel atras">
        <div class="area--titulo-login">
            <div class="login--title">Informe o código</div>
            <div class="subtitulo--login">Foi enviado um email contendo um código de uso único para o endereço informado.</div>
            <div class="subtitulo--login">Lembre-se de verificar sua caixa de spam caso não encontre a mensagem em sua caixa de entrada o email.</div>
        </div>
        <div class="login--campos">
            <input type="number" name="codigo" id="campoCodigo">
            <div class="aviso-login">Endereços informados não são iguais ou são inválidos</div>
        </div>
        <button id="confirmarCodigo" class="entrar">
            Confirmar código
        </button>
        <button id="voltarParaEsqueci" class="esqueci">
            Voltar
        </button>
    </div>

    <div id="telaNovaSenha" class="login--panel atras">
        <div class="area--titulo-login">
            <div class="login--title">Digite a nova senha</div>
            <div class="subtitulo--login">Sabemos que é complicado, mas lembre-se que a segurança de seus dados depende de uma senha forte!</div>
        </div>
        <div class="login--campos">
            <input type="password" class="new-password" name="senhaNova1" id="senhaNova1" placeholder="Nova senha">
            <input type="password" name="senhaNova2" id="senhaNova2" placeholder="Confirmar senha">
                <ul class="requisitos-minimos">
                    <li class="restricao rQuantidade">entre 8 e 16 dígitos</li>
                    <li class="restricao rMaiuscula">uma letra maiúscula</li>
                    <li class="restricao rNumero">um número</li> 
                    <li class="restricao rEspecial">um caractere especial</li>
                    <li class="restricao rIguais">senhas iguais</li>
                </ul>
            <div class="aviso-login">Ops! Verifique os criérios acima!</div>
        </div>
        <button id="enviarNovaSenha" class="entrar">
            Cadastrar nova senha
        </button>
        <button id="voltarParaCodigo" class="esqueci">
            Voltar
        </button>
    </div>

    <div id="telaSenhaAlterada" class="login--panel atras">
        <div class="area--titulo-login">
            <div class="login--title">Senha alterada</div>
            <div class="subtitulo--login">A alteração de senha foi realizada com sucesso!</div>
        </div>
        
        <button id="senhaAlterada" class="entrar">
            Realizar login
        </button>
    </div>


</div>


<script src="js/index.js"></script>
</body>
</html>