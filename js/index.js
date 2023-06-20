$('#cabecalho').load('cabecalho.html');

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