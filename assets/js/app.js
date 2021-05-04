
function form_toggle (){
    $(".add_form").toggle();
}


function edit(){
    $(".add_form").css("display","none");
    $(".edit_form").css("display","block");
    $(".save").css("display","block");
    $(".delete").css("display","none");
    $(".cancel").css("display","inline-block");


}

window.onload = function() {
    var reloading = sessionStorage.getItem("reloading");
    if (reloading) {
        sessionStorage.removeItem("reloading");
        edit();
    }
}

function reloadP() {
    sessionStorage.setItem("reloading", "true");
    document.location.reload();
}





