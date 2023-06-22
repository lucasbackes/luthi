$('#cabecalho').load('cabecalho.html');
$('#rodape').load('rodape.html');

let el = document.querySelector(".planos");
let x = 0, y = 0, top1 = 0, left = 0;

let draggingFunction = (e) => {
    document.addEventListener('pointerup', () => {
        document.removeEventListener("pointermove", draggingFunction);
    });

    el.scrollLeft = left - e.pageX + x;
    el.scrollTop = top1 - e.pageY + y;
};

el.addEventListener('pointerdown', (e) => {
    e.preventDefault();

    y = e.pageY;
    x = e.pageX;
    top1 = el.scrollTop;
    left = el.scrollLeft;

    document.addEventListener('pointermove', draggingFunction);
});


let cards = document.querySelector(".cards--cursos");
let cardx = 0, cardy = 0, top2= 0, left2 = 0;

let cardDraggingFunction = (ev) => {
    document.addEventListener('pointerup', () => {
        document.removeEventListener("pointermove", cardDraggingFunction);
    });

    cards.scrollLeft = left2 - ev.pageX + cardx;
    cards.scrollTop = top2 - ev.pageY + cardy;
};

cards.addEventListener('pointerdown', (ev) => {
    ev.preventDefault();

    cardy = ev.pageY;
    cardx = ev.pageX;
    top2= cards.scrollTop;
    left2 = cards.scrollLeft;

    document.addEventListener('pointermove', cardDraggingFunction);
});


$(document).ready(function () {

    console.log('carregou jq');

    const larguraPlano = document.querySelector('.plano').offsetWidth;
    const offsetPlanos = larguraPlano - 16;
    const divPlanos = document.querySelector('.planos');
    divPlanos.scrollLeft = offsetPlanos;
    

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
