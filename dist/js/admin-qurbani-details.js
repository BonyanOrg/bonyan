var tableData = JSON.parse(qurbaniObject.qurbani_details);
tableData = JSON.parse(tableData);
console.log(tableData);
var table = document.getElementById("donation-details");
var headers = ['Group Name', 'Amount', 'Quantity', 'Total'];
// Create the table header row         
var headerRow = document.createElement("tr");
// Create table header cells         
headers.forEach(function (key) {
    var th = document.createElement("th");
    th.textContent = key;
    headerRow.appendChild(th);
});
// Append the header row to the table         
table.appendChild(headerRow);
// Create table body rows and cells    
if (Array.isArray(tableData)) {
    tableData.forEach(function (rowData) {
        var row = document.createElement("tr");
        Object.values(rowData).forEach(function (value, index, array) {
            var cell = document.createElement("td");
            if (index === 0 && array.length > 1) {
                // Add the value from index 1 to the value at index 0
                value += '<br>' + array[1];
            }
            if (index === 1) { // if countries row (ignore) 
                return;
            }
            if (index === 2 || index === Object.values(rowData).length - 1) {// Check if it's the second column Amount
                // Add something to the value in the second column
                value = "$ " + value;
            }
            cell.innerHTML = value.replace(/\+/g, ' '); // Replace the + with spaces
            row.appendChild(cell);
        });
        // Append each row to the table             
        table.appendChild(row);
    });
}