<?php

require_once('base/Conexao.php');
require_once('base/Sessao.php');

$sessao = new Sessao();

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="css/geral.css">
    <link rel="stylesheet" href="css/cabecalho.css">
    <link rel="stylesheet" href="css/meus-servicos.css">
</head>
<body>
<div id="idUsuario" style="display: none"><?php echo $idUsuario ?></div>

<nav id="cabecalho" class=""></nav>

<div id="geral">
    <!-- <a href="index.html" class="voltar">
        <img src="img/seta-voltar.svg">
        voltar
    </a> -->

    <div id="titulo-h1" class="flex-row flex-start-center">
        <svg width="59" height="56" viewBox="0 0 59 56" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M58.7503 21.0125C58.4463 20.0808 57.8753 19.259 57.1081 18.6492C56.3409 18.0394 55.4115 17.6684 54.4353 17.5825L40.1853 16.35L34.6103 3.06499C34.2268 2.16156 33.5858 1.39096 32.7674 0.849261C31.949 0.307559 30.9892 0.0187073 30.0078 0.0187073C29.0263 0.0187073 28.0665 0.307559 27.2481 0.849261C26.4297 1.39096 25.7888 2.16156 25.4053 3.06499L19.8228 16.35L5.57276 17.5825C4.59123 17.6638 3.65556 18.0331 2.88316 18.6442C2.11076 19.2552 1.53602 20.0808 1.23107 21.0173C0.926116 21.9538 0.90453 22.9595 1.16902 23.9082C1.43351 24.8569 1.97229 25.7064 2.71776 26.35L13.5478 35.8L10.2978 49.86C10.0749 50.8174 10.1391 51.8193 10.4825 52.7403C10.8259 53.6614 11.4332 54.4608 12.2285 55.0387C13.0237 55.6165 13.9716 55.9471 14.9537 55.9891C15.9358 56.0312 16.9086 55.7828 17.7503 55.275L30.0003 47.835L42.2503 55.275C43.0919 55.782 44.0643 56.0297 45.046 55.9873C46.0276 55.9448 46.975 55.6141 47.7698 55.0364C48.5646 54.4587 49.1716 53.6597 49.5149 52.7391C49.8582 51.8184 49.9227 50.817 49.7003 49.86L46.4503 35.8L57.2803 26.35C58.0237 25.704 58.5599 24.8528 58.8214 23.9033C59.0829 22.9537 59.0582 21.948 58.7503 21.0125ZM42.0628 31.6675C41.3771 32.264 40.8671 33.0361 40.5874 33.9007C40.3077 34.7654 40.2689 35.69 40.4753 36.575L43.3228 48.905L32.5878 42.385C31.8082 41.9103 30.913 41.6592 30.0003 41.6592C29.0875 41.6592 28.1923 41.9103 27.4128 42.385L16.6778 48.905L19.5253 36.575C19.7316 35.69 19.6929 34.7654 19.4132 33.9007C19.1334 33.0361 18.6234 32.264 17.9378 31.6675L8.41526 23.36L20.9503 22.275C21.858 22.1973 22.727 21.872 23.4627 21.3347C24.1984 20.7974 24.7726 20.0685 25.1228 19.2275L30.0003 7.60499L34.8778 19.2275C35.228 20.0685 35.8022 20.7974 36.5379 21.3347C37.2736 21.872 38.1426 22.1973 39.0503 22.275L51.5853 23.36L42.0628 31.6675Z" fill="#FF6B6B"/>
        </svg>
        <h1>Meus serviços e cursos</h1>            
    </div>

    <section id="em-andamento">
        <h2>Meus cursos em andamento</h2>
        <div class="cards flex-row flex-start-center">
            <template id="templateAndamento">
                <div class="card">
                    <div class="topo-card"></div>
                    <div class="conteudo-card">
                        <div class="titulo-card">title</div>
                        <button class="btn botao-card-cursos abrir">
                            <p>Abrir</p>
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3536 4.35355C13.5488 4.15829 13.5488 3.84171 13.3536 3.64645L10.1716 0.464466C9.97631 0.269204 9.65973 0.269204 9.46447 0.464466C9.2692 0.659728 9.2692 0.976311 9.46447 1.17157L12.2929 4L9.46447 6.82843C9.2692 7.02369 9.2692 7.34027 9.46447 7.53553C9.65973 7.7308 9.97631 7.7308 10.1716 7.53553L13.3536 4.35355ZM0 4.5L13 4.5V3.5L0 3.5L0 4.5Z" fill="#292929"/>
                            </svg>
                    </button>
                    </div>
                </div>
            </template>
        </div>
    </section>

    <section id="disponiveis">
        <h2>Outros cursos que possuo</h2>
        <div class="cards flex-row flex-start-center">
            <template id="templateDisponiveis">
                <div class="card">
                    <div class="topo-card"></div>
                    <div class="conteudo-card">
                        <div class="titulo-card">title</div>
                        <button class="btn botao-card-cursos abrir">
                            <p>Iniciar</p>
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3536 4.35355C13.5488 4.15829 13.5488 3.84171 13.3536 3.64645L10.1716 0.464466C9.97631 0.269204 9.65973 0.269204 9.46447 0.464466C9.2692 0.659728 9.2692 0.976311 9.46447 1.17157L12.2929 4L9.46447 6.82843C9.2692 7.02369 9.2692 7.34027 9.46447 7.53553C9.65973 7.7308 9.97631 7.7308 10.1716 7.53553L13.3536 4.35355ZM0 4.5L13 4.5V3.5L0 3.5L0 4.5Z" fill="#292929"/>
                            </svg>
                        </button>
                        <a href="#" class="link-mais">Mais informações</a>
                    </div>
                </div>
            </template>
            
            
            <a href="#" class="btn ver-todos-cursos">
                Ver todos
                <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.3536 4.35355C13.5488 4.15829 13.5488 3.84171 13.3536 3.64645L10.1716 0.464466C9.97631 0.269204 9.65973 0.269204 9.46447 0.464466C9.2692 0.659728 9.2692 0.976311 9.46447 1.17157L12.2929 4L9.46447 6.82843C9.2692 7.02369 9.2692 7.34027 9.46447 7.53553C9.65973 7.7308 9.97631 7.7308 10.1716 7.53553L13.3536 4.35355ZM0 4.5L13 4.5V3.5L0 3.5L0 4.5Z" fill="#292929"/>                </svg>
            </a>
        </div>
    </section>


    <section id="assinaturas" style="display: none">
        <h2>Minhas assinaturas</h2>
        <div class="cards flex-row flex-start-center">
            <div id="cardAssinaturas1" class="card">
                <div class="topo-card"></div>
                <div class="conteudo-card">
                    <div class="area-titulo-assinatura">
                        <div class="subtitulo">CONSULTORIA</div>
                        <div class="titulo-card">Atendimento Individual</div>
                    </div>
                    <div class="area-checklist">
                        <div class="flex-row flex-start-center item-checklist">
                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.54228 0.875613L3.97917 5.43873L2.74939 4.20895C2.49368 3.95324 2.16767 3.83333 1.8125 3.83333C1.45733 3.83333 1.13132 3.95324 0.875613 4.20895C0.619904 4.46465 0.5 4.79066 0.5 5.14583C0.5 5.50101 0.619904 5.82701 0.875613 6.08272L3.04228 8.24939C3.2964 8.50351 3.61567 8.64583 3.97917 8.64583C4.34267 8.64583 4.66193 8.50351 4.91605 8.24939L10.4161 2.74939C10.6718 2.49368 10.7917 2.16768 10.7917 1.8125C10.7917 1.45732 10.6718 1.13132 10.4161 0.875613C10.1603 0.619904 9.83434 0.5 9.47917 0.5C9.12399 0.5 8.79799 0.619904 8.54228 0.875613Z" fill="#6BFF7A" stroke="#5ECC69"/>
                            </svg>
                            <div class="item-checklist-text">
                                até 23-09/24
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn botao-card-cursos">
                        <p>Detalhes</p>
                        <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.3536 4.35355C13.5488 4.15829 13.5488 3.84171 13.3536 3.64645L10.1716 0.464466C9.97631 0.269204 9.65973 0.269204 9.46447 0.464466C9.2692 0.659728 9.2692 0.976311 9.46447 1.17157L12.2929 4L9.46447 6.82843C9.2692 7.02369 9.2692 7.34027 9.46447 7.53553C9.65973 7.7308 9.97631 7.7308 10.1716 7.53553L13.3536 4.35355ZM0 4.5L13 4.5V3.5L0 3.5L0 4.5Z" fill="#292929"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div id="cardAssinaturas2" class="card">
                <div class="topo-card"></div>
                <div class="conteudo-card">
                    <div class="area-titulo-assinatura">
                        <div class="subtitulo">PLANO</div>
                        <div class="titulo-card">Comprometido</div>
                    </div>
                    <div class="area-checklist">
                        <div class="flex-row flex-start-center item-checklist">
                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.54228 0.875613L3.97917 5.43873L2.74939 4.20895C2.49368 3.95324 2.16767 3.83333 1.8125 3.83333C1.45733 3.83333 1.13132 3.95324 0.875613 4.20895C0.619904 4.46465 0.5 4.79066 0.5 5.14583C0.5 5.50101 0.619904 5.82701 0.875613 6.08272L3.04228 8.24939C3.2964 8.50351 3.61567 8.64583 3.97917 8.64583C4.34267 8.64583 4.66193 8.50351 4.91605 8.24939L10.4161 2.74939C10.6718 2.49368 10.7917 2.16768 10.7917 1.8125C10.7917 1.45732 10.6718 1.13132 10.4161 0.875613C10.1603 0.619904 9.83434 0.5 9.47917 0.5C9.12399 0.5 8.79799 0.619904 8.54228 0.875613Z" fill="#6BFF7A" stroke="#5ECC69"/>
                            </svg>
                            <div class="item-checklist-text">
                                até 23-09/24
                            </div>
                        </div>
                        <div class="flex-row flex-start-center item-checklist">
                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.54228 0.875613L3.97917 5.43873L2.74939 4.20895C2.49368 3.95324 2.16767 3.83333 1.8125 3.83333C1.45733 3.83333 1.13132 3.95324 0.875613 4.20895C0.619904 4.46465 0.5 4.79066 0.5 5.14583C0.5 5.50101 0.619904 5.82701 0.875613 6.08272L3.04228 8.24939C3.2964 8.50351 3.61567 8.64583 3.97917 8.64583C4.34267 8.64583 4.66193 8.50351 4.91605 8.24939L10.4161 2.74939C10.6718 2.49368 10.7917 2.16768 10.7917 1.8125C10.7917 1.45732 10.6718 1.13132 10.4161 0.875613C10.1603 0.619904 9.83434 0.5 9.47917 0.5C9.12399 0.5 8.79799 0.619904 8.54228 0.875613Z" fill="#6BFF7A" stroke="#5ECC69"/>
                            </svg>
                            <div class="item-checklist-text">
                                1h de de consultoria em grupo por mês
                            </div>
                        </div>
                        <div class="flex-row flex-start-center item-checklist">
                            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8.54228 0.875613L3.97917 5.43873L2.74939 4.20895C2.49368 3.95324 2.16767 3.83333 1.8125 3.83333C1.45733 3.83333 1.13132 3.95324 0.875613 4.20895C0.619904 4.46465 0.5 4.79066 0.5 5.14583C0.5 5.50101 0.619904 5.82701 0.875613 6.08272L3.04228 8.24939C3.2964 8.50351 3.61567 8.64583 3.97917 8.64583C4.34267 8.64583 4.66193 8.50351 4.91605 8.24939L10.4161 2.74939C10.6718 2.49368 10.7917 2.16768 10.7917 1.8125C10.7917 1.45732 10.6718 1.13132 10.4161 0.875613C10.1603 0.619904 9.83434 0.5 9.47917 0.5C9.12399 0.5 8.79799 0.619904 8.54228 0.875613Z" fill="#6BFF7A" stroke="#5ECC69"/>
                            </svg>
                            <div class="item-checklist-text">
                                Renovação automática
                            </div>
                        </div>
                        
                    </div>
                    
                    <a href="" class="btn botao-card-cursos">
                        <p>Detalhes</p>
                        <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.3536 4.35355C13.5488 4.15829 13.5488 3.84171 13.3536 3.64645L10.1716 0.464466C9.97631 0.269204 9.65973 0.269204 9.46447 0.464466C9.2692 0.659728 9.2692 0.976311 9.46447 1.17157L12.2929 4L9.46447 6.82843C9.2692 7.02369 9.2692 7.34027 9.46447 7.53553C9.65973 7.7308 9.97631 7.7308 10.1716 7.53553L13.3536 4.35355ZM0 4.5L13 4.5V3.5L0 3.5L0 4.5Z" fill="#292929"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section id="cursos-concluidos">
        <h2>Cursos concluídos</h2>
        <div class="lista-historico">
            <template id="templateConcluidos">
                <div class="contratacao">title > date</div>
            </template>
        </div>
    </section>

    <section id="historico" style="display: none">
        <h2>Histórico de contratações</h2>
        <div class="lista-historico">
            <div class="contratacao">
                ASSINATURA > Consultoria > Atendimento em grupo misto [Vigência: 23/05/2023 a 22/07/2023]
            </div>
            <div class="contratacao">
                ASSINATURA > Plano > Intro [Vigência: 23/05/2023 a 22/07/2023]
            </div>
        </div>
    </section>

    


</div>


<script src="js/meus-servicos.js"></script>
</body>
</html>