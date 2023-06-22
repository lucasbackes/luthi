$('#cabecalho').load('cabecalho.html');
$('#rodape').load('rodape.html');

let el = document.querySelector(".cards--cursos");
let x = 0, y = 0, top1 = 0, left = 0;

let draggingFunction = (e) => {
    document.addEventListener('pointerup', () => {
        document.removeEventListener("pointermove", draggingFunction);
    });

    el.scrollLeft = left - e.pageX + x;
    el.scrollTop = top1 - e.pageY + y;
};

el.addEventListener('pointerdown', (e) => {
    // e.preventDefault();

    y = e.pageY;
    x = e.pageX;
    top1 = el.scrollTop;
    left = el.scrollLeft;

    document.addEventListener('pointermove', draggingFunction);
});





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

    $('#comeceAgora').on('click', function () {
        console.log('click cta');
    });
       

});
