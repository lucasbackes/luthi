<?php

$idUsuario = $_POST['id_usuario'];
$idCurso = $_POST['id_curso'];

// echo $idUsuario;
// echo $idCurso;

?>


<!DOCTYPE html>
<html lang="ptBR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificado de conclusão de curso</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="js/certificado.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body id="corpo">

<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $idUsuario ?>">
<input type="hidden" name="idCurso" id="idCurso" value="<?php echo $idCurso ?>">
    
<img class="absoluto logoTopo" src="img/certificado/logo-topo.png" alt="">

<div class="absoluto curso">
    <span>CERTIFICADO DE CONCLUSÃO DE CURSO</span>
    <div class="nomeCurso"></div>
</div>

<div class="absoluto formando">
    <span>CONDECIDO A</span>
    <div class="nomeFormando"></div>
</div>

<div class="absoluto rodape">
    <div class="esquerda">
        <img class="assinatura" src="img/certificado/assinatura.png" alt=""><br>
        Fundadores <br>
        Luthi Tecnologias Educacionais
    </div>
    <div class="direita">
        <img class="qrcode" src="img/certificado/qr-code--modelo.png" alt=""><br>
        Carga horária: <span class="cargaHoraria"></span>h <br>
        Concluído em <span class="dataConclusao"></span>
    </div>
</div>

<style>

:root{
    --corDoTexto: #1C1C1C;
}

html, body{
    margin: 0;
    padding: 0;
    height: 21cm;
    width: 29.7cm;
}

body{
    /* border: 1px solid gray; */
    background-image: url('img/certificado/fundo.png');
    background-size: contain;
    background-repeat: no-repeat;
    background-position: 0 0;
    text-align: center;
    position: relative;
    font-family: 'Poppins';
    /* display: flex; */
    /* flex-direction: column; */
    /* justify-content: center; */
    /* align-items: center; */
}

.absoluto{
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    color: var(--corDoTexto);
    display: none;
}
.logoTopo{
    top: 3.4cm;
}
.curso{
    top: 8.3cm;
    font-size: .9rem;
    font-weight: 300;
}
.nomeCurso{
    padding-top: 0.5cm;
    font-size: 2.5rem;
    font-weight: bold;
    padding-inline: 3cm;
}
.formando{
    top: 13cm;
    font-size: .9rem;
    font-weight: 300;

}
.nomeFormando{
    padding-top: 0.5cm;
    font-size: 1.5rem;
    font-weight: bold;
    padding-inline: 3cm;
}
.rodape{
    justify-content: space-between;
    align-items: flex-end;
    bottom: 2.57cm;
    font-size: 0.7rem;
    color: #353535;
    font-weight: 300;
    text-align: left;
    padding-inline: 3.1cm;
}
.assinatura{
    max-width: 6cm;
}
.direita{
    text-align: right;
}


@media print {
    *{margin: 0; padding: 0;}
    @page {
        size: A4 landscape; margin: 0mm;
    }
    html, body{
        height: 100%;
   } 
}




</style>

</body>
</html>