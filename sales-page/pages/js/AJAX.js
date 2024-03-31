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
function Click_Active_Menu() {
    console.log("click");
    const bar1 = document.getElementsByClassName("bar1")[0];
    const bar2 = document.getElementsByClassName("bar2")[0];
    bar1.style.transform = "rotate(55deg)";
    bar1.style.position = "absolute";
    bar2.style.transform = "rotate(-55deg)";
    bar2.style.position = "absolute";
    const rm_bar = document.getElementsByClassName("bar3")[0];
    rm_bar.style.display = "none";
}

