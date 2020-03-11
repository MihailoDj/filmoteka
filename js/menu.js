document.querySelector('.menu').addEventListener('click', () => {
    document.querySelector('.btn-close').style.display = 'block';
    document.querySelector('.side-nav').style.width = '250px';
});

document.querySelector('.btn-close').addEventListener('click', () => {
    document.querySelector('.btn-close').style.display = 'none';
    document.querySelector('.side-nav').style.width = '0';
});

window.addEventListener("click", e => {
    if (e.clientX > 250) {
        document.querySelector('.side-nav').style.width = '0';
    }
});