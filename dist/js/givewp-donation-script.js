jQuery(document).ready(function ($) {
    var getAmount = giveGetQueryVariable('amount');
    var getComment = giveGetQueryVariable('comment');
    var getQurbaniDetails = giveGetQueryVariable('qurbani_details');
    console.log(JSON.parse(decodeURIComponent(getQurbaniDetails)));
    var levelBtnContainer = document.getElementById('give-donation-level-button-wrap');
    var amount = '1.00';
    if (getAmount !== false) {
        amount = getAmount;
    }
    if ($('#give-amount').length > 0) {
        $('#give-amount').val(amount).focus().trigger('blur');
        var give_form = document?.querySelector(".give-form");
        if (give_form) {

            let attributeValue = give_form.getAttribute("data-give_cs_base_amounts");

            // Parse the attribute value as JSON
            let parsedValue = JSON.parse(attributeValue);
            if (parsedValue !== null) {

                // Update the "custom" value
                parsedValue.custom = parseInt(amount);

                // Convert the updated value back to a string
                let updatedValue = JSON.stringify(parsedValue);

                // Set the updated attribute value
                give_form.setAttribute("data-give_cs_base_amounts", updatedValue);
            }
        }
    }
    // Add Comment If The Donation Is A Quick Donation
    if (getComment != 'null' && getComment != '' && getComment !== false) {
        $('#give-comment').val(decodeURI(getComment)).focus().trigger('blur');
    }

    //{{_Start Preparing Qurbani Table_}}
    var qurbaniTableData = JSON.parse(decodeURIComponent(getQurbaniDetails));
    var qurbaniTable = document.getElementById("donation-details");

    if (qurbaniTableData) {
        // Define headers based on language direction
        var headers = document.dir ? ['أسم المجموعة', 'الكمية', 'العدد', 'المجموع'] : ['Group Name', 'Amount', 'Quantity', 'Total'];

        // Create the table header row
        var headerRow = document.createElement("tr");

        // Create table header cells
        headers.forEach(function (key) {
            var th = document.createElement("th");
            th.textContent = key;
            headerRow.appendChild(th);
        });

        // Append the header row to the table
        qurbaniTable.appendChild(headerRow);

        // Create table body rows and cells
        qurbaniTableData.forEach(function (rowData) {
            var row = document.createElement("tr");

            Object.values(rowData).forEach(function (value, index, array) {
                var cell = document.createElement("td");

                if (value.length === 0) {
                    value = "0";
                }

                if (index === 0 && array.length > 1) {
                    // Add the value from index 1 to the value at index 0
                    value += '<br>' + array[1];
                }

                if (index === 1) { // if countries row (ignore)
                    return;
                }

                if (index === 2 || index === Object.values(rowData).length - 1) {
                    // Check if it's the second column Amount
                    // Add Dollar to the value in the second column
                    value = "$ " + value;
                }

                cell.innerHTML = value.replace(/\+/g, ' '); // Replace the + with spaces
                row.appendChild(cell);
            });

            // Append each row to the table
            qurbaniTable.appendChild(row);
        });

        // Add a row with a value in the last column
        var lastRow = document.createElement("tr");
        var beforeLastCell = document.createElement("td");
        var lastCell = document.createElement("td");

        beforeLastCell.setAttribute("colspan", "2");
        beforeLastCell.classList.add("before-total-cell");
        lastCell.textContent = "$ " + amount;
        lastCell.classList.add("total-cell");
        lastCell.setAttribute("colspan", "2");

        lastRow.appendChild(beforeLastCell);
        lastRow.appendChild(lastCell);
        qurbaniTable.appendChild(lastRow);

        qurbaniTable.style.display = "block";

        // Disable All Buttons And Inputs
        levelBtnContainer.setAttribute('style', 'display:none !important');
        let buttons = document.querySelectorAll(".give-donation-level-btn");
        buttons.forEach((button) => {
            button.disabled = true;
        });
        let input = document.querySelector(".give-text-input");
        input.readOnly = true;
    }
    //{{_End Preparing Qurbani Table_}}

    // Fill Qurbani Data To Retrieve It Later
    let decodeURI = decodeURIComponent(getQurbaniDetails);
    // Convert to arabic
    decodeURI = decodeURI.replace(/\\u([\d\w]{4})/gi, function (match, grp) {
        return String.fromCharCode(parseInt(grp, 16));
    });
    decodeURI = decodeURI.replace(/\+/g, ' '); // Replace the + with spaces
    document.getElementById('qurbani-data').textContent = decodeURI;
});

function giveGetQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        if (pair[0] == variable) {
            return pair[1];
        }
    }
    return (false);
}