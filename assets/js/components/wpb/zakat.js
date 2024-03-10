let gold = 0;
let silver = 0;
let cashInHand = 0;
let cashInBank = 0;
let businessInvestments = 0;
let investmentCertificates = 0;
let bankDeposit = 0;
let shares = 0;

function goldHandler(e) {
    if (isNaN(e.value)) {
        return;
    }

    gold = +e.value;
}

function silverHandler(e) {
    if (isNaN(e.value)) {
        return;
    }

    silver = +e.value;
}

function cashInHandHandler(e) {
    if (isNaN(e.value)) {
        return;
    }

    cashInHand = +e.value;
}

function cashInBankHandler(e) {
    if (isNaN(e.value)) {
        return;
    }

    cashInBank = +e.value;
}

function businessInvestmentsHandler(e) {
    if (isNaN(e.value)) {
        return;
    }

    businessInvestments = +e.value;
}

function investmentCertificatesHandler(e) {
    if (isNaN(e.value)) {
        return;
    }

    investmentCertificates = +e.value;
}

function bankDepositHandler(e) {
    if (isNaN(e.value)) {
        return;
    }

    bankDeposit = +e.value;
}

function sharesHandler(e) {
    if (isNaN(e.value)) {
        return;
    }

    shares = +e.value;
}

// Check if total amount is lower than nisab and throw info to the user on submit
function isLowerThanNisab(event, e) {
    event.preventDefault();

    let donationButtonInformation = e.querySelector('button');
    let dataAmountBeforeSubmit = parseFloat(donationButtonInformation.getAttribute('data-user-nisab'));
    let dataNisabBeforeSubmit = donationButtonInformation.getAttribute('data-nisab');


    if (dataAmountBeforeSubmit < dataNisabBeforeSubmit) {
        getDir !== 'rtl' ? toastr.info("Note that the total amount is smaller than <strong><u>nisab</u></strong>") : toastr.info("ملاحظة المجموع أقل من <strong><u>النصاب</u></strong>");
    }
}

window.addEventListener('DOMContentLoaded', function () {
    let values = document.querySelectorAll('.zakat-input-item');
    let totalAmount = document.querySelector('.calculated-zakat-amount span');
    let donateBtnAmount = document.getElementById('zakat-donation-btn');

    values.forEach((value) => {
        value.addEventListener('keyup', function () {

            let total = (gold + silver + cashInHand + cashInBank + businessInvestments + investmentCertificates + bankDeposit + shares) * 0.025;
            let nisab = (gold + silver + cashInHand + cashInBank + businessInvestments + investmentCertificates + bankDeposit + shares);
            let finalResult = total.toFixed(3) * 1;
            totalAmount.innerHTML = Math.round(finalResult);
            let amountToDonate = Math.round(finalResult);
            amountToDonate = amountToDonate !== 0 ? amountToDonate : 50;
            donateBtnAmount.setAttribute('data-amount', amountToDonate);
            donateBtnAmount.setAttribute('data-user-nisab', nisab);
            if (donateBtnAmount.classList.contains('fund_raise_up-btn')) {
                // Get the current href value
                var currentHref = donateBtnAmount.getAttribute('href');

                // Modify the href to change the 'amount' parameter
                var newHref = currentHref.replace(/(\?|&)amount=[^&]*/, '$1amount=' + amountToDonate);

                // Update the href attribute with the new value
                donateBtnAmount.setAttribute('href', newHref);
            }
        });
    });
});