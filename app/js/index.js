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

    $('#entrar').on('click', function(e){
        e.preventDefault;
        let user = $('#usuario').val();
        let pass = $('#senha').val();
        let md5Pass = md5(pass);
        // console.log(user);
        // console.log(md5Pass);
        $.post("model/LoginUsuario.php", 
            {
                'user':user,
                'password':md5Pass
            },
            function (data) {
                console.log(data);
                
            }
        );
    })

    $('#esqueci').on('click', function(e){
        e.preventDefault;
        let user = $('#usuario').val();
        let pass = $('#senha').val();
        let md5Pass = md5(pass);
        console.log(md5Pass);
    })



    

       

});
