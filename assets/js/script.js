/* ===[Start Language Swicher]=== */
let langSwichBtns = document.querySelectorAll('.lang-switcher');

langSwichBtns.forEach((langSwichBtn) => {
    langSwichBtn.addEventListener('click', function(){
        console.log(this.children.length);
    });
});

console.log("Hello");

window.addEventListener('DOMContentLoaded', function(){
    console.log("Hello");
});
/* ===[End Language Swicher]=== */