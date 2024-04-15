$('#cabecalho').load('cabecalho.php');

let dadosUsuario = {};

const regexMail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;


$(document).ready(function () {

    $('.aviso-login').hide();

    function usuarioInvalido(){
        $('.aviso-login').show();
        $('.login--panel').addClass('shake');
    }


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
        $('.aviso-login').hide();
        $('.login--panel').removeClass('shake');
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
            function (dadosUsuario) {
                dadosObjeto = $.parseJSON(dadosUsuario);
                console.log(dadosObjeto);

                if(dadosObjeto == "erro"){
                    console.log("Usuário ou senha inválido");
                    usuarioInvalido();
                }else{
                    window.location.reload();
                }
                
            }
        );
    });

    $('#esqueci').on('click', function(e){
        e.preventDefault;
        let user = $('#usuario').val();
        let pass = $('#senha').val();
        let md5Pass = md5(pass);
        console.log(md5Pass);
    });

    $('#iniciar-recuperacao').on('click', function(e){
        e.preventDefault;
        $('.aviso-login').hide();
        $('.login--panel').removeClass('shake');
        let email1 = $('#email1').val();
        let email2 = $('#email2').val();
        const isMail = regexMail.test(email1);
        const isMatch = email1 === email2;
        if (!isMail) {
            usuarioInvalido();
        }else if (!isMatch){
            usuarioInvalido();
        } else {
            console.log('Endereços de email válidos e iguais!')
        }
        
    });
    



    

       

});
