<?php

require_once('base/Conexao.php');
require_once('base/Sessao.php');

$sessao = new Sessao();

if ($_POST['operacao'] == "sair"){
    $sessao->deletar();
    echo "okay";
}

$dadosSessao = $sessao->carregar();

$nomeUsuario = $dadosSessao->nome;

echo $nomeUsuario;

?>


<div id="logoTopo" class="logo">
    <img src="img/logo-color.svg" alt="Logo da Luthi">
</div>


<div class="menu--links--container">

<?php
if($sessao->checar('usuario')){
?>

    <img src="img/icon--close.svg" class="close--mobile--menu" alt="">

    <div class="menu--links dropdown">
        <a href="#" class="menu--link active menu--title dropbtn">
            <div class="menu--aluno--icon">
                <svg width="19" height="16" viewBox="0 0 19 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.5 0L0 5.18182L3.45455 7.06455V12.2464L9.5 15.5455L15.5455 12.2464V7.06455L17.2727 6.12318V12.0909H19V5.18182L9.5 0ZM15.39 5.18182L9.5 8.39455L3.61 5.18182L9.5 1.96909L15.39 5.18182ZM13.8182 11.2273L9.5 13.5764L5.18182 11.2273V8.00591L9.5 10.3636L13.8182 8.00591V11.2273Z" fill="#616161"/>
                </svg>
            </div>
            <div id ="nomeUsuario" class="menu--aluno-nome">
                User
            </div>
        </a>

        <div class="dropdown-content">
            <a href="#" class="menu--sub--item">Meus dados</a>
            <a href="meus-servicos" class="menu--sub--item">Meus serviços e cursos</a>
            <a onclick="sair()" href="#" class="menu--sub--item">Sair</a>
        </div>
    </div>

<?php } ?>
</div>



<div id="menuIcon" class="menu--icon">
    <img src="img/icon--menu--mobile.svg" alt="">
</div>


<script>

function sair() {  
    $.post('cabecalho.php',
        {
            'operacao':'sair',
        },
        function () {
            window.location.reload();
        }
    );
}



</script>