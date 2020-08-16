$(document).on('click','.close-error',function(){
    $(".rezultat").fadeOut();
})

function checkIfVisible() {
    setInterval(function () {
        setTimeout(() => {
            $(".rezultat").fadeOut();
        }, 5000);
        checkIfVisible();
    }, 1000);
}

checkIfVisible();