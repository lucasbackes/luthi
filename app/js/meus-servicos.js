$('#cabecalho').load('cabecalho.php');

$(document).ready(function () {

    idUsuario = $('#idUsuario').html();
    let enderecoBase = 'img/cursos/';

    function insereCursoAndamento(id, nome) {
        template = $($('#templateAndamento').html()).clone(true, true);
        $(template).find('.btn').attr('data-id', id);
        $(template).find('.titulo-card').html(nome);
        $(template).find('.topo-card').css('background-image', 'url('+ enderecoBase + id +'.png)');
        $('#templateAndamento').before($(template));
    }

    function insereCursoDisponivel(id, nome) {
        template = $($('#templateDisponiveis').html()).clone(true, true);
        $(template).find('.btn').attr('data-id', id);
        $(template).find('.titulo-card').html(nome);
        $(template).find('.topo-card').css('background-image', 'url('+ enderecoBase + id +'.png)');
        $(template).find('.link-mais').attr('href','descricao.php?curso='+id);
        
        $('#templateDisponiveis').before($(template));
    }

    function insereCursoConcluido(id, nome, data_conclusao) {
        template = $($('#templateConcluidos').html()).clone(true, true);
        
        cursoConcluido = nome + ' > ' + 'concluído em ' + data_conclusao + ' > <a href="certificado.php?curso='+id+'">[ver certificado]</a>';
        
        // console.log(cursoConcluido);
       
        $(template).html(cursoConcluido);
        
        $('#templateConcluidos').before($(template));
    }


    function tratarCursos(cursos) {  
        for (let i = 0; i < Object.keys(cursos).length; i++) {
            estadoCurso = cursos[i].andamento;
            if (estadoCurso > 0 && estadoCurso < 100 ) {
                console.log(cursos[i].nome);
                insereCursoAndamento(cursos[i].id, cursos[i].nome);
            }else if (estadoCurso == 0){
                insereCursoDisponivel(cursos[i].id, cursos[i].nome);
            }else if (estadoCurso == 100){
                // console.log('curso concluido: ' + cursos[i].nome + ' em ' + cursos[i].data_conclusao);
                insereCursoConcluido(cursos[i].id, cursos[i].nome, cursos[i].data_conclusao);
            }
        }
    }

    $('#em-andamento').on('click', 'button.abrir', function () {
        id_curso = $(this).attr('data-id');
        window.location = 'aula.php?curso='+id_curso;
    });

    $('#disponiveis').on('click', 'button.abrir', function () {
        id_curso = $(this).attr('data-id');
        window.location = 'aula.php?curso='+id_curso;
    });

      
    

     

    $('#cabecalho').on('click', '.menu--icon', function () {
        console.log('click menu--icon');
        $('#cabecalho').addClass('mobile--open');
    });

    $('#cabecalho').on('click', '.close--mobile--menu', function () {
        $('#cabecalho').removeClass('mobile--open');
        console.log('tchau');
    });

    $.post("model/BuscarCursos.php", 
        {
            'operacao':'cursosDoUsuario'
        },
        function (resposta) {
            cursos = $.parseJSON($.parseJSON( resposta ));
            console.log('Cursos: ' + Object.keys(cursos).length);
            console.log(cursos);
            tratarCursos(cursos);
        }
    );

       

});
