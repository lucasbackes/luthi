$('#cabecalho').load('cabecalho.html');
$('#rodape').load('rodape.html');

let el = document.querySelector(".cards--cursos");
let x = 0, y = 0, top1 = 0, left = 0;

let draggingFunction = (e) => {
    document.addEventListener('mouseup', () => {
        document.removeEventListener("mousemove", draggingFunction);
    });

    el.scrollLeft = left - e.pageX + x;
    el.scrollTop = top1 - e.pageY + y;
};

el.addEventListener('mousedown', (e) => {
    e.preventDefault();

    y = e.pageY;
    x = e.pageX;
    top1 = el.scrollTop;
    left = el.scrollLeft;

    document.addEventListener('mousemove', draggingFunction);
});


let el2 = document.querySelector(".planos");
let x2 = 0, y2 = 0, top2 = 0, left2 = 0;

let draggingFunction2 = (e2) => {
    document.addEventListener('mouseup', () => {
        document.removeEventListener("mousemove", draggingFunction2);
    });

    el2.scrollLeft = left2 - e2.pageX + x2;
    el2.scrollTop = top2 - e2.pageY + y2;
};

el2.addEventListener('mousedown', (e2) => {
    e2.preventDefault();

    y2 = e2.pageY;
    x2 = e2.pageX;
    top2 = el2.scrollTop;
    left2 = el2.scrollLeft;

    document.addEventListener('mousemove', draggingFunction2);
});


$(document).ready(function () {
    console.log('carregou jquery');
    $('.menu--icon').on('click', function () {
        console.log('click menu--icon');
        $('#cabecalho').addClass('mobile--open');
    });
    $('.close--mobile--menu').on('click', function () {
        $('#cabecalho').removeClass('mobile--open');
        console.log('tchau');
    });
    $('#menuIcon').on('click', function () {
        console.log('click menuIcon')
    });
    

});