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
$nomeCompleto = $dadosSessao->usuario->nome . ' ' . $dadosSessao->usuario->sobrenome;





?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma Luthi</title>
 
    <script src="js/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="js/aula.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="stylesheet" href="css/aula.css">
    
    
</head>
<body>
<div id="nomeUsuario" style="display: none"><?php echo $nomeCompleto; ?></div>
<div class="overlay--modal">
    <div class="modal--conclusao--modulo">
        <div class="imagem--destaque"></div>
        <div class="conteudo--modal">
            <div id="fechar-modal">
                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 13 13" fill="none">
                    <path d="M12 12L1 1" stroke="#292929" stroke-width="2" stroke-linecap="round"/>
                    <path d="M12 12L1 1" stroke="#292929" stroke-width="2" stroke-linecap="round"/>
                    <path d="M1 12L12 1" stroke="#292929" stroke-width="2" stroke-linecap="round"/>
                    <path d="M1 12L12 1" stroke="#292929" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </div>
            <div class="barra-progresso">
                <div class="barra-progresso--andamento">
                </div>
            </div>

            <div class="texto--modal">
                <div class="texto--modal--titulo">Parabéns!</div>
                <div class="texto--modal--destaque">Mais um passo dado na direção correta!</div>
                <div class="texto--modal--p">Aproveite suas novas habilidades e mostre seu trabalho nas redes sociais marcando a Luthi!</div>
                <div class="texto--modal--destaque">Estamos ansiosos para ver!</div>
                <div class="texto--modal--social">
                <div class="texto--modal--social--nome">@luthi</div>
                <div class="texto--modal--social--icones">
                    <a href="#" class="href"><img src="img/facebook.svg" alt=""></a>
                    <a href="#" class="href"><img src="img/instagram.svg" alt=""></a>
                    <a href="#" class="href"><img src="img/linkedin.svg" alt=""></a>
                </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div id="idCurso" style="display: none"><?php echo $curso ?></div>
<div id="idUsuario" style="display: none"><?php echo $idUsuario ?></div>

<nav id="cabecalho" class=""></nav>

<div id="geral">
    <a href="meus-servicos.php" class="voltar">
        <img src="img/seta-voltar.svg" style="width: 25px; height: auto;">
        <span class="voltar--txt">FECHAR AULA</span>
    </a>


    <div class="area--titulo flex-row flex-start-center" style="position: relative;">
        <div class="imagem">
            
        </div>    
        <div class="area--descricao">
            <h1 id="titulo-h1">Curso</h1>
            <p>Professor: <span id="professor" class="subheader"></span></p>
        </div>

        <div class="barra-progresso" style="position: absolute; left: 0; bottom: 0; width: 100%; height: 10px; background-color: lightgrey">
            <div class="barra-progresso--andamento" style="position: absolute; left: 0; bottom: 0; width: 0; height: 10px; background-color: #01c986; transition-property: width; transition-duration: 1s;">
            </div>
        </div>
        
    </div>


    <div class="area--material">
    <!-- Área com duas colunas (Módulos) e (Aulas) -->

        <div id="modulos">
            <!-- Área de seleção de módulos -->
            <div class="modulos--cabecalho">
                <span>MÓDULOS</span>
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
                    <div class="icone-modulo-completo" style="opacity: 0; transform: scale(1.4); transition-property: all; transition-duration: 0.2s;">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect x="0.5" y="0.5" width="15" height="15" rx="7.5" stroke="#565656"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4716 4.86194C12.5966 4.98696 12.6668 5.1565 12.6668 5.33327C12.6668 5.51005 12.5966 5.67959 12.4716 5.80461L7.13827 11.1379C7.01325 11.2629 6.84371 11.3331 6.66694 11.3331C6.49016 11.3331 6.32062 11.2629 6.19561 11.1379L3.52894 8.47127C3.4075 8.34554 3.3403 8.17714 3.34182 8.00234C3.34334 7.82754 3.41345 7.66033 3.53706 7.53673C3.66066 7.41312 3.82787 7.34301 4.00267 7.34149C4.17747 7.33997 4.34587 7.40717 4.4716 7.52861L6.66694 9.72394L11.5289 4.86194C11.654 4.73696 11.8235 4.66675 12.0003 4.66675C12.177 4.66675 12.3466 4.73696 12.4716 4.86194Z" fill="#565656"/>
                        </svg>
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
                                <button data-link="" title="Qualidade inferior e menor consumo de dados" class="qualidade video480">SD (480p)</button>
                                <button data-link="" title="Qualidade superior e maior consumo de dados" class="qualidade video720 active">HD (720p)</button>
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

            
            <div class="aviso-modulo-concluido">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.5" y="0.5" width="15" height="15" rx="7.5" stroke="#565656"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4716 4.86194C12.5966 4.98696 12.6668 5.1565 12.6668 5.33327C12.6668 5.51005 12.5966 5.67959 12.4716 5.80461L7.13827 11.1379C7.01325 11.2629 6.84371 11.3331 6.66694 11.3331C6.49016 11.3331 6.32062 11.2629 6.19561 11.1379L3.52894 8.47127C3.4075 8.34554 3.3403 8.17714 3.34182 8.00234C3.34334 7.82754 3.41345 7.66033 3.53706 7.53673C3.66066 7.41312 3.82787 7.34301 4.00267 7.34149C4.17747 7.33997 4.34587 7.40717 4.4716 7.52861L6.66694 9.72394L11.5289 4.86194C11.654 4.73696 11.8235 4.66675 12.0003 4.66675C12.177 4.66675 12.3466 4.73696 12.4716 4.86194Z" fill="#565656"/>
                </svg>
                <span>Módulo concluído.</span>
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
                    <div id="mensagemErroForm" style="color: red;"></div> 
                    
                </div>
            </div>

            <div class="aviso-necessidade-modulo-anterior" style="padding-block: 20px;">
                É necessário concluir o módulo anterior antes de concluir o atual.
            </div>

            
        <!-- Fim da área de aulas (coluna) -->
        </div>


    </div>


<!-- Fim da Área com duas colunas (Módulos) e (Aulas) -->
</div>





<style>
    

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

    .modulos--links{
        position: relative;
    }

    .modulos--links.active svg rect{
        stroke: white;
    }
    .modulos--links.active svg path{
        fill: white;
    }

    .icone-modulo-completo{
        margin: 0;
        padding: 0;
        position: absolute;
        bottom: 5px;
        right: 5px;
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
        margin-bottom: 10px;
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

    .barra-progresso{
        position: absolute; 
        left: 0; top: 0; 
        width: 100%; height: 20px; 
        background-color: lightgrey;
        border-radius: 0 10px 0 0;
    }

    .barra-progresso--andamento{
        position: absolute; 
        left: 0; bottom: 0; 
        width: 0; height: 100%; 
        background-color: #01c986; 
        transition-property: width; 
        transition-duration: 1s;
        transition-delay: 1.5s;
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

    .aviso-modulo-concluido{
        display: flex;
        justify-content: left;
        align-items: center;
        gap: 5px;
    }

    .overlay--modal{
        position: fixed;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.8);
        top: 0;
        left: 0;
        display: block;
        padding-top: 140px;
        z-index: 1;
        overflow: auto;
        transform: translateY(2000);
        opacity: 0;
        pointer-events: none;
        max-height: 0;
        
    }

    .modal--conclusao--modulo{
        background-color: white;
        border-radius: 10px;
        border: 1px solid #C2C2C2;
        margin: auto;
        width: 700px;
        max-width: 95%;
        height: 450px;
        max-height: 80%;
        display: flex;
        transform: scale(0.1) translateY(1000px);
        transition-property: all;
        transition-delay: 0.1s;
        transition-duration: 0.5s;
    }
    .overlay--modal.aberto{
        opacity: 1;
        pointer-events:unset;
        max-height: unset;
        transform: translateY(0);
    }
    .overlay--modal.aberto .modal--conclusao--modulo{
        transform: scale(1) translateY(0);
    }



    .modal--conclusao--modulo > *{
        flex: 1;
        position: relative
    }
    .conteudo--modal{
        display: flex;
        padding: 1rem;
        position: relative;
    }

    #fechar-modal{
        position: absolute;
        top: 30px;
        right: 15px;
        z-index: 20;
        cursor: pointer;
    }

    .imagem--destaque{
        padding: 10px;
        border-radius: 10px 0 0 10px;
        background-image: url(img/baloes.jpg);
        background-size: cover;
        background-position: center center;
        background-clip: padding-box;
    }

    .texto--modal{
        color: #292929;
        text-align: center;
        display: flex;
        align-items: center;
        font-weight: 300;
        font-size: 1em;
        justify-content: space-between;
        flex-direction: column;
        gap: 1.3em;
        justify-self: center;
        align-self: center;
        margin-top: 20px;
    }
    .texto--modal--titulo{
        font-size: 2em;
        font-weight: 700;
    }
    .texto--modal--destaque{
        font-size: 1.25em;
        line-height: 1.125em;
        font-weight: 400;
    }
    .texto--modal--p{
        line-height: 1.44em;
    }
    .texto--modal--social--nome{
        font-size: 1.2em;
        font-weight: 400;
        margin-bottom: .6em;
        margin-top: 2em;
    }

    @media screen and (max-width: 600px) {
        .texto--modal{
            font-size: 12px;
            margin-top: 3rem;
        }
        .modal--conclusao--modulo{
            flex-direction: column;
            
        }
        .imagem--destaque{
            border-radius: 10px 10px 0 0;
        }
        .barra-progresso{
            border-radius: 0;
        }
        #fechar-modal{
            width: 36px;
            height: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .campos.flex-row{
            flex-direction: column;
        }
    }

</style>


</body>
</html>