$(document).on('click','.close-error',function(){
    $(".rezultat").fadeOut();
})

$(document).on('click', '.btn', function() {
    setTimeout(() => {
        $(".rezultat").fadeOut();
    }, 5000);
})

window.addEventListener("keypress", e => {
    var key = e.which || e.keyCode;
    if (key === 13) {
        setTimeout(() => {
            $(".rezultat").fadeOut();
        }, 5000);
    }
});