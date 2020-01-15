$('#designation_input').hide();
    
// CREATING BLANK DESIGNATION INPUT
var blank_designation = '';
$(document).ready(function () {
    blank_designation = $('#designation_input').html();
});

function add_designation() {
    $("#designation").append(blank_designation);
}

// REMOVING DESIGNATION INPUT
function deleteParentElement(n) {
    n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
}