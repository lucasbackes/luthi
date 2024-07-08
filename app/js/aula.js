

// to do:
// Calcular o andamento real baseado no total de aulas do curso completo
// Fazer rotina de atualização do andamento - considerar a abertura da aula como tendo sido assistida
// Exibir barra de progresso no topo
// Puxar a imagem do curso no topo da página




let dadosCompletos = {};
let nomeCurso = "";
let qtdeModulos = 1;
let qtdeAulas = 0;
let idModuloAtual = 1;
let objModuloAtual = "data.modulos.modulo" + idModuloAtual;
let caminhoModuloAtual = "";
let totalAulas = 0;
let enderecoBase = 'img/cursos/';
let andamento = 0;
let percentualConcluido = 0;




$(document).ready(function () {

    $('#cabecalho').load('cabecalho.php');
    
    if ($(window).width() <= 1280){
        $('.modulos--seletores').hide();    
    }
    
    

// Identifica o id do curso
let id = $('#idCurso').html();
let idUsuario = $('#idUsuario').html();
let nomeCompleto = $('#nomeUsuario').html();
// console.log('modulo: ' + objModuloAtual);
// let linkCurso = 'test_data/conteudo1.json';

function abreModalProgresso(){
    console.log('overlay!');
    $('.overlay--modal').addClass('aberto');
    $('.overlay--modal .barra-progresso--andamento').width((percentualConcluido + '%'));
    
}

//Rotina para buscar os dados e chamar a função de popular dados
function geraConteudo(conteudo){
    console.log("geraConteudo chamada");
    dadosCompletos = conteudo[0].conteudo;
    // console.log(dadosCompletos);
    popularModulos($.parseJSON(dadosCompletos));

    // Vai para o módulo que o aluno está estudando
    $('.modulos--links').removeClass('active');
    idModuloAtual = +andamento + 1;
    $('#modulo' + idModuloAtual).addClass('active');
    $('.item--outros').remove();
    $('.clone').remove();
    let posicaoVetor = idModuloAtual -1;
    objModuloAtual = "data.modulos[" + posicaoVetor + "]" +".modulo" + idModuloAtual + ".aulas";
    console.log('objModuloAtual: ' + objModuloAtual);
    console.log('idModuloAtual: ' + idModuloAtual);

    // console.log(dadosCompletos);
    popularAulas($.parseJSON(dadosCompletos));


}

function popularModulos(data) {
    console.log("popularModulos chamada");
    qtdeModulos = Object.keys(data.modulos).length;

    // console.log("modulos: " + qtdeModulos);
    let posicaoVetor = idModuloAtual - 1;
    objModuloAtual = "data.modulos[" + posicaoVetor + "].modulo"+idModuloAtual+".aulas";
    caminhoModuloAtual = "data.modulos[" + posicaoVetor + "].modulo";
    console.log(caminhoModuloAtual);
    // console.log('objModuloAtual inicial: ' + objModuloAtual);

    //  Preenche dados básicos do curso
    nomeCurso = data.curso;
    // console.log(nomeCurso);
    $("#titulo-h1").text(nomeCurso);
    nomeProfessor = data.professor;
    $("#professor").text(nomeProfessor);
    $('.imagem').css('background-image', 'url('+ enderecoBase + id +'.png)');


    // Calcula total de aulas no curso para avaliar andamento
    for (let i = 0; i < qtdeModulos; i++) {
        let j = i+1;
        let temp = 'data.modulos['+i+']'+'.modulo'+j+'.aulas';
        qtdeAulas = qtdeAulas + Object.keys(eval(temp)).length;
    }
    console.log("Total de aulas no curso todo: " + qtdeAulas);

    percentualConcluido = 100 / qtdeAulas * andamento;
    $('.area--titulo .barra-progresso--andamento').width((percentualConcluido + '%'));
    console.log('Percentual concluído: ' + percentualConcluido);
    

    let clones = qtdeModulos - 1;
    // console.log('clones de modulo: ' + clones);
    
    // Carrega título do módulo 1
    $('#modulo1' + ' .modulos--liks--titulo').text((eval(caminhoModuloAtual + '1')).modulo_nome);

    
    // Faz os clones do botão seletor de módulo
    for (let i = 0; i < clones; i++) {
        let clone = $('#modulo1').clone(true);
        let moduloAtual = 1 + i;
        let idClone = 2 + i;
        caminhoModuloAtual = "data.modulos[" + moduloAtual + "].modulo";
        clone.prop('id', 'modulo'+idClone);
        clone.attr('data-modulo-id', idClone);
        $('#modulo' + moduloAtual).after(clone);
        $('#modulo' + idClone + ' .modulos--liks--numero').text(idClone);
        $('#modulo' + idClone + ' .modulos--liks--titulo').text((eval(caminhoModuloAtual + idClone)).modulo_nome);
        $('#modulo' + idClone).removeClass('active');
        console.log(caminhoModuloAtual + idClone);

        if ((parseInt(andamento)) === idClone){
            console.log('idClone: ' + idClone + ' :: modulo-concluido-check :: andamento: ' + (parseInt(andamento) + 1));
            $('#modulo' + idClone + ' .icone-modulo-completo').show();
        }
    }

    // Verifica se módulo 1 já foi concluído e coloca o "check" caso tenha sido
    // Verificação fica DEPOIS do loop "for" para evitar que o "check" seja clonado
    if (1 <= (parseInt(andamento) + 1)){
        // console.log('modulo-concluido-check');
        $('#modulo1 .icone-modulo-completo').show();
    }

    let delay = 0.4;
    for (let i = 1; i <= andamento; i++) {
        delay += 0.4;
        $('#modulo' + i + ' .icone-modulo-completo').css('opacity', '1');
        $('#modulo' + i + ' .icone-modulo-completo').css('transform', 'scale(1)');
        $('#modulo' + i + ' .icone-modulo-completo').css('transition-delay', (delay + 's'));
        
    }
    
    
}



//Função para popular dados
function popularAulas(data){
    console.log("popularAulas chamada");
    
    // Área que cria as DIV para as aulas.
    // Duas divs (aula1 e aula2) são criadas por padrão no html
    // Quando são mais de duas aulas, é criado dinamicamente com o código abaixo
    
    // console.log('objModuloAtual: ' + objModuloAtual);
    // console.log(data);
    totalAulas = Object.keys(eval(objModuloAtual)).length;
    // console.log('totalAulas: ' + totalAulas);
    
    let clones = totalAulas - 2; // total de aulas menos as duas que são criadas por padrão
    // console.log('clones necessários: ' + clones);

    for (let i = 0; i < clones; i++) {
        let clone = $('#aula2').clone(true);
        let aulaAtual = 2 + i;
        let idClone = 3 + i;
        clone.prop('id', 'aula'+idClone);
        clone.addClass('clone');
        $('#aula' + aulaAtual).after(clone);
        // console.log('i = ' + i);
    }

    //Inserindo o conteúdo das aulas
    for (let i = 1; i <= totalAulas; i++) {
        let aulaAtual = '#aula' + i;
        // console.log(aulaAtual);
        $(aulaAtual + ' .aula--identificador .aula-id--svg').text('AULA ' + i + ' - ' + (eval(objModuloAtual))[i-1].titulo);
        $(aulaAtual + ' .aula--titulo').html((eval(objModuloAtual))[i-1].titulo);
        $(aulaAtual + ' .descricao--aula').text((eval(objModuloAtual))[i-1].resumo);
        $(aulaAtual + ' .videoaula-link').attr('src', (eval(objModuloAtual))[i-1].link_video_720);
        // $(aulaAtual + ' .videoaula-link')[0].load();
        $(aulaAtual + ' .link--pdf').attr('href', (eval(objModuloAtual))[i-1].link_pdf);
        let qteLinks = (eval(objModuloAtual))[i-1].outros_links.quantidade_links;
        // console.log('qte:' + qteLinks);
        // Estrutura abaixo monta os links úteis de acordo com a quantidade de links no JSON
        for (let j = 0; j < qteLinks; j++) {
            let tagIcone = '';
            let tagArquivo = '';
            // console.log('j: ' + j);
            // console.log((eval(objModuloAtual))[i-1].outros_links.links[j].tipo);
            if((eval(objModuloAtual))[i-1].outros_links.links[j].tipo == 'download'){
                tagIcone = '<img src="img/icon-download-file.svg">';
            }else if((eval(objModuloAtual))[i-1].outros_links.links[j].tipo == 'link'){
                tagIcone = '<img src="img/icon-links.svg">';
            }
            let linkEndereco = '<a href="' + (eval(objModuloAtual))[i-1].outros_links.links[j].link + '" target="_blank" class="item--outros">';
            let textoLink = (eval(objModuloAtual))[i-1].outros_links.links[j].texto;
            $(aulaAtual + ' .links--e-arquivos').append(linkEndereco + tagArquivo + tagIcone + textoLink + "</a>");            
        }
            $(aulaAtual + ' .video480').attr('data-link', (eval(objModuloAtual))[i-1].link_video_480);
            $(aulaAtual + ' .video720').attr('data-link', (eval(objModuloAtual))[i-1].link_video_720);       
    }

    console.log('idModuloAtual: ' + idModuloAtual);
    console.log('andamento: ' + andamento);
    console.log('andamento + 1: ' + (parseInt(andamento) + 1));

    $('.declaracao-conclusao-modulo').hide();
    $('.aviso-necessidade-modulo-anterior').hide();
    $('.aviso-modulo-concluido').hide();
    if (idModuloAtual == (parseInt(andamento) + 1)){
        $('.declaracao-conclusao-modulo').show();
        $('.aviso-necessidade-modulo-anterior').hide();
        $('.aviso-modulo-concluido').hide();
        console.log('iguais');
    }
    if (idModuloAtual > (parseInt(andamento) + 1)){
        $('.declaracao-conclusao-modulo').hide();
        $('.aviso-necessidade-modulo-anterior').show();
        $('.aviso-modulo-concluido').hide();
    }
    if (idModuloAtual < (parseInt(andamento) + 1)){
        $('.declaracao-conclusao-modulo').hide();
        $('.aviso-necessidade-modulo-anterior').hide();
        $('.aviso-modulo-concluido').show();
    }


}

function semPermissao(){
    $(".area--titulo").remove();
    $(".area--material").remove();
    $("a").remove();
    $("#geral").append('<h1 style="font-size: 2rem; font-weight: bold">Oooops!</h1>'+
    '<div style="padding-bottom: 20px;">Você não possui permissão para acessar este curso.</div>'+
    '<button class="voltar" style="border: 0; cursor: pointer;" onclick="history.back();">'+
        '<img src="img/seta-voltar.svg" style="width: 25px; height: auto;">'+
        '<span class="voltar--txt">VOLTAR</span>'+
    '</button>');
}


function verificaPermissao(){
    $.post("model/BuscarCursos.php", 
        {
            'id' : id,
            'idUsuario' : idUsuario,
            'operacao':'permissaoNoCurso'
        },
        function (resposta) {
            // cursos = $.parseJSON($.parseJSON( resposta ));
            // console.log('Cursos: ' + Object.keys(cursos).length);
            console.log(resposta);
            
            if (resposta >= 1) {
                buscaAndamentoNoCurso();
                buscaConteudo();    
            } else{
                semPermissao();
            }

            
        }
    );
}

function atualizarAndamento(valorNovo){
    $.post("model/BuscarCursos.php", 
        {
            'id' : id,
            'idUsuario' : idUsuario,
            'valorNovo' : valorNovo,
            'operacao':'atualizaAndamento'
        },
        function (resposta) {
            
            if (resposta == 'o'){
                console.log('ok');
                // $('.aviso-modulo-concluido').show();
                // $('.declaracao-conclusao-modulo').hide();
                $('html').scrollTop(0);
                abreModalProgresso();
            }else{
                console.log('Erro ao atualizar informações do andamento do curso');
            }
            

        }
    );
}

function buscaAndamentoNoCurso(){
    $.post("model/BuscarCursos.php", 
        {
            'id' : id,
            'idUsuario' : idUsuario,
            'operacao':'buscaAndamentoNoCurso'
        },
        function (andamento_recebido) {
            // conteudo = $.parseJSON(resposta);
            // let cursos = resposta.nome;
            andamento = andamento_recebido;
            console.log("andamento: " + andamento);
            // console.log(conteudo);

            if (andamento < 0){
                atualizarAndamento(0);
            }

        }
    );
}

function buscaConteudo() {  
    console.log("buscaConteudo chamada");
    var buscarMaterial = $.post("model/BuscarCursos.php", 
        {
            'id' : id,
            'operacao':'conteudoDoCurso'
        },
        function (resposta) {
            conteudo = $.parseJSON(resposta);
            geraConteudo(conteudo);
        }
    );

    buscarMaterial.fail(function(){
        console.log("erro ao buscar conteúdo");
    });
}

    $('.icone-modulo-completo').hide();
    

    $('.declaracao-conclusao-modulo').hide();
    $('.aviso-necessidade-modulo-anterior').hide();

    $('.concluir-modulo').on('click', function(){
        if (nomeCompleto == $('#nome-completo').val()){
            atualizarAndamento(idModuloAtual);
        }
        else{
            console.log('Nomes não são iguais');
            $('#mensagemErroForm').html('Nome digitado não é igual ao do cadastro.');
        }
        
    });
 
    $('#cabecalho').on('click', '.menu--icon', function () {
        // console.log('click menu--icon');
        $('#cabecalho').addClass('mobile--open');
    });

    $('#cabecalho').on('click', '.close--mobile--menu', function () {
        $('#cabecalho').removeClass('mobile--open');
        // console.log('tchau');
    });

    $('.modulos--cabecalho').on('click', function(){
        $('.modulos--seletores').toggle();
    });

    $('.aula').on('click', '.aula--identificador', function () {
        // console.log($(this).parent());
        $(this).parent().toggleClass('active');
    });
       
    $('.videoaula').on('click', '.qualidade', (function (e) { 
        e.preventDefault();

        let divParent = $(this).parent().parent();
        let videoElement = (divParent.find('video'));
        // console.log(videoElement);
        // console.log(videoElement[0].currentTime);
        
               
        if (!$(this).hasClass('active')){
            let tempoVideo = videoElement[0].currentTime;
            // console.log('tempo1: ' + tempoVideo);
            $(videoElement).attr('src', $(this).data('link'));
            $(videoElement)[0].load();
            videoElement[0].currentTime = tempoVideo;
            // console.log('tempo2: ' + tempoVideo);
            $(divParent).find('.qualidade').removeClass('active');
            $(this).addClass('active');
        }
        
    }));

    $('.modulos--links').on('click', function () {

        $('.modulos--links').removeClass('active');
        $(this).addClass('active');

        $('.item--outros').remove();
        $('.clone').remove();

        idModuloAtual = $(this).attr('data-modulo-id');
        let posicaoVetor = idModuloAtual -1;
        objModuloAtual = "data.modulos[" + posicaoVetor + "]" +".modulo" + idModuloAtual + ".aulas";
        console.log('objModuloAtual: ' + objModuloAtual);
        console.log('idModuloAtual: ' + idModuloAtual);
        // console.log(dadosCompletos);
        popularAulas($.parseJSON(dadosCompletos));

        if ($(window).width() <= 1280){
            $('.modulos--seletores').toggle();
        }
        
    });

    $('#fechar-modal').on('click', function (e) {
        e.preventDefault;
        $('.overlay--modal').removeClass('aberto');
        $('.overlay--modal .barra-progresso--andamento').addClass('grande');
        location.reload();
    });

    

    // Busca conteudo das aulas
    
        verificaPermissao();
        
   


});
