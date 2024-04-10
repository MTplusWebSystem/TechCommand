
import { 
    click_services_desktop,
    click_services_mobile, 
    click_animation_mobile,
    back_view_service
 } from  "./listening-events.js";

const sv_click_desktop = document.getElementById("view-services")
const sv_click_mobile = document.getElementById("view-menu")

const back_view = document.getElementById("back")

back_view.addEventListener("click", back_view_service);
sv_click_desktop.addEventListener("click", click_services_desktop )
sv_click_mobile.addEventListener("click", click_animation_mobile )
sv_click_mobile.addEventListener("click", click_services_mobile )
