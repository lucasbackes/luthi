<?php

require_once('base/Conexao.php');
require_once('model/BuscaConteudo.php');
require_once('base/Sessao.php');

$sessao = new Sessao();

$curso = $_GET['curso'];

$dadosSessao = $sessao->carregar();

if(!$sessao->checar('usuario')){
    header("Location: index.php");
    exit();
} 

$idUsuario = $dadosSessao->usuario->id;


?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Luthi</title>
 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="stylesheet" href="css/aula.css">
    
</head>
<body>
<div id="idCurso" style="display: none"><?php echo $curso ?></div>
<div id="idUsuario" style="display: none"><?php echo $idUsuario ?></div>

<nav id="cabecalho" class=""></nav>

<div id="geral">
    <a href="meus-servicos.php" class="voltar">
        <img src="img/seta-voltar.svg" style="width: 25px; height: auto;">
        <span class="voltar--txt">FECHAR AULA</span>
    </a>


    <div class="area--titulo flex-row flex-start-center">
        <div class="imagem">
            
        </div>    
        <div class="area--descricao">
            <h1 id="titulo-h1">Curso</h1>
            <p>Professor: <span id="professor" class="subheader"></span></p>
        </div>
    </div>


    <div class="area--material">
    <!-- Área com duas colunas (Módulos) e (Aulas) -->

        <div id="modulos">
            <!-- Área de seleção de módulos -->
            <div class="modulos--cabecalho">
                MÓDULOS
                <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.0599 9.05989C8.77865 9.34079 8.3974 9.49857 7.9999 9.49857C7.6024 9.49857 7.22115 9.34079 6.9399 9.05989L1.2819 3.40389C1.00064 3.12249 0.84268 2.74089 0.842773 2.34304C0.842867 1.94518 1.00101 1.56365 1.2824 1.28239C1.56379 1.00113 1.9454 0.843168 2.34325 0.843262C2.74111 0.843356 3.12264 1.00149 3.4039 1.28289L7.9999 5.87889L12.5959 1.28289C12.8787 1.00952 13.2575 0.858143 13.6508 0.861374C14.0441 0.864605 14.4204 1.02218 14.6986 1.30016C14.9769 1.57815 15.1348 1.95429 15.1384 2.34759C15.142 2.74088 14.991 3.11986 14.7179 3.40289L9.0609 9.06089L9.0599 9.05989Z" fill="white"/>
                </svg>
            </div>

            <div class="modulos--seletores">
                <button id="modulo1" data-modulo-id="1" class="modulos--links active">
                    <div class="modulos--liks--numero">
                        1
                    </div>
                    <div class="modulos--liks--titulo">
                        Aguardando título
                    </div>
                </button>

            </div>
        </div>


        <div id="aulas">
            <div id="aula1" class="aula active">
                <div class="aula--identificador">
                    <span class="aula-id--svg">AULA 1</span>
                    
                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.0599 9.05989C8.77865 9.34079 8.3974 9.49857 7.9999 9.49857C7.6024 9.49857 7.22115 9.34079 6.9399 9.05989L1.2819 3.40389C1.00064 3.12249 0.84268 2.74089 0.842773 2.34304C0.842867 1.94518 1.00101 1.56365 1.2824 1.28239C1.56379 1.00113 1.9454 0.843168 2.34325 0.843262C2.74111 0.843356 3.12264 1.00149 3.4039 1.28289L7.9999 5.87889L12.5959 1.28289C12.8787 1.00952 13.2575 0.858143 13.6508 0.861374C14.0441 0.864605 14.4204 1.02218 14.6986 1.30016C14.9769 1.57815 15.1348 1.95429 15.1384 2.34759C15.142 2.74088 14.991 3.11986 14.7179 3.40289L9.0609 9.06089L9.0599 9.05989Z" fill="white"/>
                    </svg>
                </div>
                <div class="aula--conteudo">

                    <div class="aula--basicos">
                        <h2 class="aula--titulo">
                            Aguardando título da aula...
                        </h2>
                        <p class="descricao--aula">
                            Aguardando descrição...
                        </p>
                    </div>
                    <div class="aula--principal">
                        <div class="videoaula titulo--e--conteudo">
                            <h3>Videoaula</h3>
                            <video class="videoaula-link" src="" poster="img/poster.jpg" controls></video>
                            <div class="links-qualidade">
                                <button data-link="" class="qualidade video480">SD (480p)</button>
                                <button data-link="" class="qualidade video720 active">HD (720p)</button>
                            </div>
                        </div>
                        <div class="anexo--pdf titulo--e--conteudo">
                            <h3>Anexo em PDF</h3>
                            <a href="#" target="_blank" class="link--pdf">
                                <img src="img/icon--pdf.png">
                            </a>
                        </div>
                    </div>
                    <div class="aula--outros titulo--e--conteudo">
                        <h3>Arquivos e links úteis</h3>
                        <div class="links--e-arquivos">
                            
                        </div>
                    </div>
                
                </div>
                
            </div>

            <div id="aula2" class="aula">
                <div class="aula--identificador">
                    <span class="aula-id--svg">AULA 2</span>
                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.0599 9.05989C8.77865 9.34079 8.3974 9.49857 7.9999 9.49857C7.6024 9.49857 7.22115 9.34079 6.9399 9.05989L1.2819 3.40389C1.00064 3.12249 0.84268 2.74089 0.842773 2.34304C0.842867 1.94518 1.00101 1.56365 1.2824 1.28239C1.56379 1.00113 1.9454 0.843168 2.34325 0.843262C2.74111 0.843356 3.12264 1.00149 3.4039 1.28289L7.9999 5.87889L12.5959 1.28289C12.8787 1.00952 13.2575 0.858143 13.6508 0.861374C14.0441 0.864605 14.4204 1.02218 14.6986 1.30016C14.9769 1.57815 15.1348 1.95429 15.1384 2.34759C15.142 2.74088 14.991 3.11986 14.7179 3.40289L9.0609 9.06089L9.0599 9.05989Z" fill="white"/>
                    </svg>
                </div>
                <div class="aula--conteudo">

                    <h2 class="aula--titulo">
                        Aguardando título...
                    </h2>
                    <p class="descricao--aula">
                        Aguardando descrição...
                    </p>
                    <div class="aula--principal">
                        <div class="videoaula titulo--e--conteudo">
                            <h3>Videoaula</h3>
                            <video class="videoaula-link" src="" poster="img/poster.jpg" controls></video>
                            <div class="links-qualidade">
                                <button data-link="" class="qualidade video480">SD (480p)</button>
                                <button data-link="" class="qualidade video720 active">HD (720p)</button>
                            </div>
                        </div>
                        <div class="anexo--pdf titulo--e--conteudo">
                            <h3>Anexo em PDF</h3>
                            <a href="#" target="_blank" class="link--pdf">
                                <img src="img/icon--pdf.png">
                            </a>
                        </div>
                    </div>
                    <div class="aula--outros titulo--e--conteudo">
                        <h3>Arquivos e links úteis</h3>
                        <div class="links--e-arquivos">
                            
                        </div>
                    </div>
                
                </div>
                
            </div>

            
            <div class="declaracao-conclusao-modulo flex-column">
            <!-- Área que declaração de conslusão do módulo -->
                <div class="cabecalho--decalaracao">
                    <h2 class="titulo--declaracao">Declaração de conclusão de módulo</h2>
                    <div class="subtitulo--declaracao">Realize a autodeclaração abaixo para confirmar que concluiu o módulo atual.</div>
                </div>

                <div class="texto--declaracao">
                    Ao preencher seu nome completo e clicar em “concluir módulo”, você declara, sob as penas da lei, que concluiu 
                    o módulo atual, tendo assistido as aulas e realizado as atividades propostas.
                </div>

                <div class="formulario--declaracao">
                    <div class="label--declaracao">Nome completo:</div>
                    <div class="campos flex-row">
                    <input class="form" type="text" name="nome-completo" id="nome-completo">
                    <button class="form concluir-modulo">Concluir módulo</button>
                    </div>
                    
                </div>
            </div>

            <div class="aviso-necessidade-modulo-anterior" style="padding-block: 20px;">
                É necessário concluir o módulo anterior antes de concluir o atual.
            </div>

            <div class="aviso-modulo-concluido">
                Módulo concluído.
            </div>
        <!-- Fim da área de aulas (coluna) -->
        </div>


    </div>


<!-- Fim da Área com duas colunas (Módulos) e (Aulas) -->
</div>




<style>
    .area--titulo{
        background-color: white; width: 100%; gap: 80px; border: 1px solid #AAA; border-radius: 5px;
    }
    .imagem{
        width: 250px;
        height: 250px;
        max-width: 250px;
        background-image: url('img/cursos/placeholder.png');
        background-position: center center;
        background-size: cover;
    }
    h1, .titulo--declaracao{
        color: var(--title);
        font-size: 2.25rem;
        font-weight: bold;
        line-height: 1;
        padding-bottom: 10px;
    }

    .flex-column{
        display: flex;
        flex-direction: column;
    }

    .declaracao-conclusao-modulo{
        font-size: 1,25rem;
        line-height: 1.3;
        gap: 2.25rem;
        padding: 2rem;
        border: 1px #6BB8FF dashed;
        border-radius: 10px;
        background-color: white;
        margin-bottom: 80px;
    }

    .titulo--declaracao{
        font-size: 1.8rem;
    }

    .subtitulo--declaracao{
        color: #646464;
    }
    .campos{
        gap: 10px;
    }

    .label--declaracao{
        margin-bottom: 10px;
    }

    .form{
        padding: 10px;
        border-radius: 5px;
        border: 1px #292929 solid;
        font-size: 1.125rem;
    }

    .concluir-modulo{
        background-color: #6BB8FF;
        cursor: pointer;
        padding-inline: 20px;
        font-size: 1rem;
    }

    .concluir-modulo:focus, .concluir-modulo:hover{
        background-color: #47A6FE;
        transform: scale(1.05);
    }



</style>

<script src="js/aula.js"></script>
</body>
</html>