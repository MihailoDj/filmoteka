document.querySelector('.btn-back-to-top').addEventListener('click', () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});

window.onscroll = function () { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
        document.querySelector('.btn-back-to-top').style.display = "block";
    } else {
        document.querySelector('.btn-back-to-top').style.display = "none";
    }
}