$('#cabecalho').load('cabecalho.html');

let linkCurso = 'test_data/conteudo1.json';

let dadosCompletos = {};
let nomeCurso = "";
let qtdeModulos = 1;
let idModuloAtual = 1;
let objModuloAtual = "data.modulos.modulo" + idModuloAtual;
console.log('modulo: ' + objModuloAtual);


//Rotina para buscar os dados e chamar a função de popular dados
function geraConteudo(){
    $.getJSON(linkCurso,{
    }).done(
        function(data){
            dadosCompletos = data;
            popularModulos(data);
            popularAulas(data);
    });
}

function popularModulos(data) {
    qtdeModulos = Object.keys(data.modulos).length;
    console.log("modulos: " + qtdeModulos);
    let posicaoVetor = idModuloAtual - 1;
    objModuloAtual = "data.modulos[" + posicaoVetor + "].modulo"+idModuloAtual+".aulas";
    // console.log('objModuloAtual inicial: ' + objModuloAtual);

    nomeCurso = data.curso;
    $("#titulo-h1").text(nomeCurso);
    nomeProfessor = data.professor;
    $("#professor").text(nomeProfessor);

    let clones = qtdeModulos - 1;
    console.log('clones de modulo: ' + clones);
    
    for (let i = 0; i < clones; i++) {
        let clone = $('#modulo1').clone(true);
        let moduloAtual = 1 + i;
        let idClone = 2 + i;
        clone.prop('id', 'modulo'+idClone);
        clone.attr('data-modulo-id', idClone);
        $('#modulo' + moduloAtual).after(clone);
        $('#modulo' + idClone + ' .modulos--liks--numero').text('2');
        $('#modulo' + idClone).removeClass('active');
    }
    
}



//Função para popular dados
function popularAulas(data){

    
    // Área que cria as DIV para as aulas.
    // Duas divs (aula1 e aula2) são criadas por padrão no html
    // Quando são mais de duas aulas, é criado dinamicamente com o código abaixo
       
   
    const totalAulas = Object.keys(eval(objModuloAtual)).length;

    console.log('totalAulas: ' + totalAulas);
    
    let clones = totalAulas - 2; // total de aulas menos as duas que são criadas por padrão
    console.log('clones necessários: ' + clones);

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
        console.log(aulaAtual);
        $(aulaAtual + ' .aula--identificador .aula-id--svg').text('AULA ' + i);
        $(aulaAtual + ' .aula--titulo').html((eval(objModuloAtual))[i-1].titulo);
        $(aulaAtual + ' .descricao--aula').text((eval(objModuloAtual))[i-1].resumo);
        $(aulaAtual + ' .videoaula-link').attr('src', (eval(objModuloAtual))[i-1].link_video_720);
        // $(aulaAtual + ' .videoaula-link')[0].load();
        $(aulaAtual + ' .link--pdf').attr('href', (eval(objModuloAtual))[i-1].link_pdf);
        let qteLinks = (eval(objModuloAtual))[i-1].outros_links.quantidade_links;
        console.log('qte:' + qteLinks);
        // Estrutura abaixo monta os links úteis de acordo com a quantidade de links no JSON
        for (let j = 0; j < qteLinks; j++) {
            let tagIcone = '';
            let tagArquivo = '';
            console.log('j: ' + j);
            console.log((eval(objModuloAtual))[i-1].outros_links.links[j].tipo);
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

}



$(document).ready(function () {

    // console.log('carregou jq');
  
    $('#cabecalho').on('click', '.menu--icon', function () {
        console.log('click menu--icon');
        $('#cabecalho').addClass('mobile--open');
    });

    $('#cabecalho').on('click', '.close--mobile--menu', function () {
        $('#cabecalho').removeClass('mobile--open');
        console.log('tchau');
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
        console.log(videoElement);
        console.log(videoElement[0].currentTime);
        
               
        if (!$(this).hasClass('active')){
            let tempoVideo = videoElement[0].currentTime;
            console.log('tempo1: ' + tempoVideo);
            $(videoElement).attr('src', $(this).data('link'));
            $(videoElement)[0].load();
            videoElement[0].currentTime = tempoVideo;
            console.log('tempo2: ' + tempoVideo);
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
        popularAulas(dadosCompletos);
        
    });

    geraConteudo();
    

});
