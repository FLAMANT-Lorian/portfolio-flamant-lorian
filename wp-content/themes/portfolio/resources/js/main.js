document.documentElement.classList.add('js-enabled');
const inputElt = document.querySelector('.bgm--checkbox');

inputElt.addEventListener('change', function () {
    if (inputElt.checked) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = 'initial';
    }
});