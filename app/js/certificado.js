function verificaFormacao(){
    $.post("model/BuscarCursos.php", 
        {
            'operacao':'verificaFormacao',
            'id':idCurso,
            'id_usuario':idUsuario
        },
        function (resposta) {
            curso = $.parseJSON($.parseJSON( resposta ));
            console.log(curso);
            if (curso.andamento >=100) {
                console.log("Formado");
                insereDados(curso);
                $('.absoluto').css('display', 'block');    
                $('.rodape').css('display', 'flex'); 
                
            }
            else{
                $('#corpo').append('<div style="width: 100%; height: 100%; display: flex; justify-content: center; align-items: center">Certificado não encontrado.</div>')
                console.log("não encontrado");
            }
            
        }
    );
}

function insereDados(curso) {  
    $(".nomeCurso").html(curso.cursoNome);
    $(".nomeFormando").html(curso.nome + ' ' + curso.sobrenome);
    $(".cargaHoraria").html(curso.carga_horaria);
    $(".dataConclusao").html(curso.data_conclusao);
    
    
}

$(document).ready(function () {

idCurso = $('#idCurso').val();
idUsuario = $('#idUsuario').val();



verificaFormacao();



});