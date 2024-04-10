let open_mobile = 0

export function click_services_desktop(){
    const view_options =document.querySelector(".add-services-a");
    view_options.style.display = "flex"; 
}

export function back_view_service(){
    const view_options =document.querySelector(".add-services-a");
    view_options.style.display = "none";
}

export function click_services_mobile(){
    const view_options =document.querySelector("#menu-list");
    view_options.style.display = "flex"
    if (open_mobile === 0){
        view_options.style.display = "flex"
        open_mobile++
    }else{
        view_options.style.display = "none"
        open_mobile = 0
        const bar1 = document.getElementById("bar1");
        bar1.style.position = "relative";
        bar1.style.transform = "rotate(0deg)";
        const bar3 = document.getElementById("bar3");
        bar3.style.position = "relative";
        bar3.style.transform = "rotate(0deg)";
        const bar2 = document.getElementById("bar2");
        bar2.style.display = "flex";
    }
}


export function click_animation_mobile(){
    const bar1 = document.getElementById("bar1");
    bar1.style.position = "absolute";
    bar1.style.transform = "rotate(45deg)";
    const bar2 = document.getElementById("bar2");
    bar2.style.display = "none";
    const bar3 = document.getElementById("bar3");
    bar3.style.position = "absolute";
    bar3.style.transform = "rotate(-45deg)";
}