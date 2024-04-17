$('#cabecalho').load('cabecalho.php');

let dadosUsuario = {};
let idUsuario = 0;
const regexMail = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;


$(document).ready(function () {

    $('.aviso-login').hide();

    $('#voltarParaLogin').on('click', function(e){
        e.preventDefault();
        $('#telaLogin').removeClass('atras');
        $('#telaEsqueci').addClass('atras');
    });

    $('#voltarParaEsqueci').on('click', function(e){
        e.preventDefault();
        $('#telaInserirCodigo').addClass('atras');
        $('#telaEsqueci').removeClass('atras');
    });

    $('#voltarParaCodigo').on('click', function(e){
        e.preventDefault();
        $('#telaNovaSenha').addClass('atras');
        $('#telaInserirCodigo').removeClass('atras');
    });

    $('#senhaAlterada').on('click', function(e){
        e.preventDefault();
        $('#telaSenhaAlterada').addClass('atras');
        $('#telaLogin').removeClass('atras');
    });


    

    function usuarioInvalido(){
        $('.aviso-login').show();
        $('.login--panel').addClass('shake');
    }

  

    $('#cabecalho').on('click', '.menu--icon', function () {
        console.log('click menu--icon');
        $('#cabecalho').addClass('mobile--open');
    });

    $('#cabecalho').on('click', '.close--mobile--menu', function () {
        $('#cabecalho').removeClass('mobile--open');
        console.log('tchau');
    });

    $('#esqueciSenha').on('click', function (e) {
        e.preventDefault;
        $('#telaLogin').addClass('atras');
        $('#telaEsqueci').removeClass('atras');
        
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
            console.log('Endereços de email válidos e iguais!');
            $.post("model/RecuperarSenhas.php", 
            {
                'email':email1,
                'operacao': 'verificarExistencia'
            },
            function (dadosUsuario) {
                idUsuario = $.parseJSON(dadosUsuario);
                console.log(idUsuario);
                $('#telaEsqueci').addClass('atras');
                $('#telaInserirCodigo').removeClass('atras');
            }
            );
            
        }
        
    });


    
    $('#confirmarCodigo').on('click', function(e){
        e.preventDefault;
        $('.aviso-login').hide();
        $('.login--panel').removeClass('shake');
        let codigoInformado = $('#campoCodigo').val();
        console.log('idGlobal: ' + idUsuario);
            $.post("model/RecuperarSenhas.php", 
            {
                'codigoInformado':codigoInformado,
                'id':idUsuario,
                'operacao': 'verificarCodigo'
            },
            function (verificacaoCodigo) {
                console.log('Código informado: ' + codigoInformado)
                console.log(verificacaoCodigo);
                if(verificacaoCodigo == "ok"){
                    console.log('código correto!')
                    $('#telaInserirCodigo').addClass('atras');
                    $('#telaNovaSenha').removeClass('atras');
                }else{
                    console.log('código inválido');
                }
                
            })
        
    });

    var pwdLength = /^.{8,16}$/;
    var pwdUpper = /[A-Z]+/;
    var pwdNumber = /[0-9]+/;
    var pwdSpecial = /[!@#$%^&()'[\]"?+-/*={}.,;:_]+/;
    var criterio1 = false;
    var criterio2 = false;
    var criterio3 = false;
    var criterio4 = false;
    
    $('#senhaNova1').keyup(function (e) {       
        var s = $('#senhaNova1').val();
        var s2 = $('#senhaNova2').val();
        var iguais = s === s2;  
        if (pwdLength.test(s)) {
            $('.rQuantidade').addClass('atendida');
            criterio1 = true;
        } else {
            $('.rQuantidade').removeClass('atendida');
            criterio1 = false;
        }
        if (pwdUpper.test(s)) {
            $('.rMaiuscula').addClass('atendida');
            criterio2 = true;
        } else {
            $('.rMaiuscula').removeClass('atendida');
            criterio2 = false;
        }
        if (pwdNumber.test(s)) {
            $('.rNumero').addClass('atendida');
            criterio3 = true;
        } else {
            $('.rNumero').removeClass('atendida');
            criterio3 = false;
        }
        if (pwdSpecial.test(s)) {
            $('.rEspecial').addClass('atendida');
            criterio4 = true;
        } else {
            $('.rEspecial').removeClass('atendida');
            criterio4 = false;
        }
        if (iguais) {
            $('.rIguais').addClass('atendida');
        } else {
            $('.rIguais').removeClass('atendida');
        }
    });

    $('#senhaNova2').keyup(function (e) {
        var s = $('#senhaNova1').val();
        var s2 = $('#senhaNova2').val();
        var iguais = s === s2;  
        if (iguais) {
            $('.rIguais').addClass('atendida');
        } else {
            $('.rIguais').removeClass('atendida');
        }
    });

    $('#enviarNovaSenha').on('click', function(e){
        e.preventDefault;
        $('.aviso-login').hide();
        $('.login--panel').removeClass('shake');
        var s = $('#senhaNova1').val();
        var s2 = $('#senhaNova2').val();
        var iguais = s === s2;
        let md5Pass = md5(s);
        if(iguais && criterio1 && criterio2 && criterio3 && criterio4){
            $.post("model/RecuperarSenhas.php", 
            {
                'id':idUsuario,
                'operacao': 'enviarNovaSenha',
                'senha':md5Pass
            },
            function (resultado) {
                console.log("alterada a senha? " + resultado)
                if(resultado == "ok"){
                    console.log('Senha alterada')
                    $('#telaSenhaAlterada').removeClass('atras');
                    $('#telaNovaSenha').addClass('atras');
                }else{
                    console.log('Erro ao alterar senha');
                }
                
            })
        }else{
            $('.aviso-login').show();
            $('.login--panel').addClass('shake');
        }
        
    });


    

       

});
