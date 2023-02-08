/* ===[Start Language Swicher]=== */
window.addEventListener('DOMContentLoaded', function () {
    let langSwichBtns = document.querySelectorAll('.lang-switcher button');
    
    langSwichBtns.forEach((langSwichBtn) => {
        langSwichBtn.addEventListener('click', function(){
            this.parentElement.classList.toggle('active');
        });  
    });

    window.addEventListener('click', function(e){
        // Close Language Swicher
        if(!e.target.parentElement.classList.contains('lang-switcher')) {
            let switcherDropdowns = document.querySelectorAll('.lang-switcher--dropdown');
            
            switcherDropdowns.forEach((switcherDropdown) => {
                switcherDropdown.parentElement.classList.remove('active');
            });
        }
    });
});
/* ===[End Language Swicher]=== */