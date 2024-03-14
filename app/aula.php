<?php

require_once('base/Conexao.php');
require_once('model/BuscaConteudo.php');
require_once('base/Sessao.php');

$sessao = new Sessao();
$sessao->criar('usuario', ['id' => 10, 'nome' => 'Lucas Backes']);

var_dump($sessao->carregar()->usuario->nome);
echo '<hr>';
var_dump($sessao->checar('usuario'));
echo '<hr>';
$sessao->limpar('usuario');

var_dump($sessao->checar('usuario'));


// $cursos = (new BuscaConteudo())->busca();

// foreach ($cursos as $curso) {
//     echo $curso->nome.'<br>';
// }

// $curso = $_GET['curso'];


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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="stylesheet" href="css/aula.css">
</head>
<body>

<nav id="cabecalho" class=""></nav>

<div id="geral">
    <a href="meus-servicos.html" class="voltar">
        <img src="img/seta-voltar.svg" style="width: 25px; height: auto;">
        <span class="voltar--txt">VOLTAR</span>
        
    </a>

    <div class="area--titulo">
        <h1 id="titulo-h1">
            Curso
        </h1>
        <div id="professor" class="subheader">
            Professor
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
                        Primeiros passos com o Pictoblox
                    </div>
                </button>

            </div>
        </div>


        <div id="aulas">
            <div id="aula1" class="aula active">
                <div class="aula--identificador">
                    AULA 1
                    <svg width="16" height="10" viewBox="0 0 16 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.0599 9.05989C8.77865 9.34079 8.3974 9.49857 7.9999 9.49857C7.6024 9.49857 7.22115 9.34079 6.9399 9.05989L1.2819 3.40389C1.00064 3.12249 0.84268 2.74089 0.842773 2.34304C0.842867 1.94518 1.00101 1.56365 1.2824 1.28239C1.56379 1.00113 1.9454 0.843168 2.34325 0.843262C2.74111 0.843356 3.12264 1.00149 3.4039 1.28289L7.9999 5.87889L12.5959 1.28289C12.8787 1.00952 13.2575 0.858143 13.6508 0.861374C14.0441 0.864605 14.4204 1.02218 14.6986 1.30016C14.9769 1.57815 15.1348 1.95429 15.1384 2.34759C15.142 2.74088 14.991 3.11986 14.7179 3.40289L9.0609 9.06089L9.0599 9.05989Z" fill="white"/>
                    </svg>
                </div>
                <div class="aula--conteudo">

                    <div class="aula--basicos">
                        <h2 class="aula--titulo">
                            Aguardando conteúdo
                        </h2>
                        <p class="descricao--aula">
                            Lorem ipsum dolor sit amet consectetur. Quis risus quam viverra bibendum fusce eu eleifend. Mauris odio ultrices molestie lectus blandit at amet. Curabitur arcu ultrices egestas enim. Viverra sagittis felis arcu libero. Et ultrices placerat tristique etiam est vel ultrices. Morbi tempus eleifend.
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
                        Montando minha primeira cena
                    </h2>
                    <p class="descricao--aula">
                        Lorem ipsum dolor sit amet consectetur. Quis risus quam viverra bibendum fusce eu eleifend. Mauris odio ultrices molestie lectus blandit at amet. Curabitur arcu ultrices egestas enim. Viverra sagittis felis arcu libero. Et ultrices placerat tristique etiam est vel ultrices. Morbi tempus eleifend.
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
        </div>


    </div>



</div>


<script src="js/aula.js"></script>
</body>
</html>