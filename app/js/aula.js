$('#cabecalho').load('cabecalho.html');

conteudoAulas = {};

//Função para popular dados
function popularAulas(data){
    
    // Área que cria as DIV para as aulas.
    // Duas divs (aula1 e aula2) são criadas por padrão no html
    // Quando são mais de duas aulas, é criado dinamicamente com o código abaixo
    const totalAulas = Object.keys(data.modulo1.aulas).length;
    let clones = totalAulas - 2; // total de aulas menos as duas que são criadas por padrão
    console.log(clones);
    for (let i = 0; i < clones; i++) {
        let clone = $('#aula2').clone(true);
        let aulaAtual = 2 + i;
        let idClone = 3 + i;
        clone.prop('id', 'aula'+idClone);
        $('#aula' + aulaAtual).after(clone);
        // console.log('i = ' + i);
    }

    //Inserindo o conteúdo das aulas
    for (let i = 1; i <= totalAulas; i++) {
        let aulaAtual = '#aula' + i;
        console.log(aulaAtual);
        $(aulaAtual + ' .aula--identificador .aula-id--svg').text('AULA ' + i);
        $(aulaAtual + ' .aula--titulo').html(data.modulo1.aulas[i-1].titulo);
        $(aulaAtual + ' .descricao--aula').text(data.modulo1.aulas[i-1].resumo);
        $(aulaAtual + ' .videoaula-link').attr('src', data.modulo1.aulas[i-1].link_video);
        // $(aulaAtual + ' .videoaula-link')[0].load();
        $(aulaAtual + ' .link--pdf').attr('href', data.modulo1.aulas[i-1].link_pdf);
        
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
       


    //Rotina para buscar os dados e chamar a função de popular dados
    $.getJSON('test_data/conteudo1.json',{
    }).done(
        function(data){
            popularAulas(data);
    });

});
