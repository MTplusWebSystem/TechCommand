function Load_Data(){
    $.ajax({
        url: '../../core-php/load_data.php',
        method: 'POST', 
        data: {start: true}, 
        success: function(response) {
            var data = JSON.parse(response);
            document.getElementById("logo-name").textContent = data[0].logo_name;
        },
        error: function(error) {
            console.error(error);
        }
    });
}


