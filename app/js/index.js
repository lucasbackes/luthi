$('#cabecalho').load('cabecalho.html');





$(document).ready(function () {

    console.log('carregou jq');
  

    $('#cabecalho').on('click', '.menu--icon', function () {
        console.log('click menu--icon');
        $('#cabecalho').addClass('mobile--open');
    });

    $('#cabecalho').on('click', '.close--mobile--menu', function () {
        $('#cabecalho').removeClass('mobile--open');
        console.log('tchau');
    });

    $('#entrar').on('click', function(){
        let user = $('#usuario').val();
        console.log(user);
        console.log('entrar');
    })

       

});
