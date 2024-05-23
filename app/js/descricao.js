$('#cabecalho').load('cabecalho.php');

$(document).ready(function () {

    id = $('#idCurso').html();
    let enderecoBase = 'img/cursos/';
    

   $('.botao-card-cursos').on('click', function () {
        window.location = 'aula.php?curso='+id;
    });
   

    $('#cabecalho').on('click', '.menu--icon', function () {
        console.log('click menu--icon');
        $('#cabecalho').addClass('mobile--open');
    });

    $('#cabecalho').on('click', '.close--mobile--menu', function () {
        $('#cabecalho').removeClass('mobile--open');
        console.log('tchau');
    });


    $.post("model/BuscarDescricao.php", 
        {
            'id' : id,
            'operacao' : 'descricao'
        },
        function (resposta) {
            cursos = $.parseJSON(resposta);
            // let cursos = resposta.nome;
            console.log(cursos[0].nome);
            $('h1').html(cursos[0].nome);
            $('.carga').html(cursos[0].carga_horaria);
            $('.professor').html(cursos[0].professor);
            $('.descricaoCurso').html(cursos[0].descricao);
            $('.imagem').css('background-image', 'url('+ enderecoBase + id +'.png)');
            
            
            // console.log(resposta);
            // tratarCursos(cursos);
        }
    );

       

});