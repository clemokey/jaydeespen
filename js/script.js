$(document).ready(function(){
$('#userForm').on('submit', function(e){
        e.preventDefault();
//I had an issue that the forms were submitted in geometrical progression after the next submit. 
// This solved the problem.
        e.stopImmediatePropagation();
    // show that something is loading
    $('#response').html("<b>Loading data...</b>");

    // Call ajax for pass data to other place
    $.ajax({
    type: 'POST',
    url: 'controller.php',
    data: $(this).serialize() // getting filed value in serialize form
    })
    .done(function(data){ // if getting done then call.

    // show the response
    $('#response').html(data);

    })
    .fail(function() { // if fail then getting message

    // just in case posting your form failed
    alert( "Posting failed." );

    });

    // to prevent refreshing the whole page page
    return false;