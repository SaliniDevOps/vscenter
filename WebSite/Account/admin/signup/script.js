// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("viewServicesBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Add event listener to the "Add-M" button
document.getElementById("addServiceBtn").onclick = function() {
    var serviceTypeSelect = document.getElementById("serviceTypeSelect");
    var selectedService = serviceTypeSelect.options[serviceTypeSelect.selectedIndex].text;

    if (selectedService !== "Select Type") {
        var table = document.getElementById("servicesTable").getElementsByTagName('tbody')[0];
        var newRow = table.insertRow(table.rows.length);

        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);

        cell1.innerHTML = selectedService;
        cell2.innerHTML = '<span class="delete-btn" onclick="deleteRow(this)"><i class="ri-delete-bin-6-line"></i></span>';
    }
}

// Function to delete a row from the table
function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("servicesTable").deleteRow(i);
}