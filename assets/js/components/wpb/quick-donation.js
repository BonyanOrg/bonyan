window.addEventListener('DOMContentLoaded', function () {
    let quickDonationPriceBtns = document.querySelectorAll('.quick-donation-amount--item:not(.other-amount)');
    let quickDonationOtherBtns = document.querySelector('.quick-donation-amount--item.other-amount');
    // let quickDonateBtn = document.querySelector('.quick-donation-btn');

    // Handle prices buttons
    quickDonationPriceBtns?.forEach((quickDonationPriceBtn) => {

        quickDonationPriceBtn.addEventListener('click', function () {
            
            let quickDonationBtn = this.closest('.quick-donation--amount').querySelector('.donation-btn, .donation-action');

            document.querySelectorAll('.quick-donation-amount--item').forEach((qdp) => {

                qdp.classList.remove('selected-price');

            });

            quickDonationOtherBtns.querySelector('input').value = '';

            this.classList.add('selected-price');

            quickDonationBtn.setAttribute('data-amount', this.getAttribute('data-price_value'));

        });

    });


    // Handle Other amount button
    quickDonationOtherBtns?.addEventListener('click', function(){

        document.querySelectorAll('.quick-donation-amount--item').forEach((qdp) => {

            qdp.classList.remove('selected-price');

        });

        this.querySelector('input').focus();

        this.classList.add('selected-price');

    });

    quickDonationOtherBtns?.querySelector('input').addEventListener('input', function(e){
        let quickDonationBtn = this.closest('.quick-donation--amount').querySelector('.donation-btn, .donation-action');
        
        this.setAttribute('title', `The price is: ${this.value}`);

        this.parentElement.setAttribute('data-price-value', this.value);

        quickDonationBtn.setAttribute('data-amount', this.value);

    });

});