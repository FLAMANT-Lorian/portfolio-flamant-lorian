(function () {
    const slider = {
        sliderContainer: document.querySelector('.school__steps__container'),
        sliderSpanElements: document.querySelectorAll('.slider__btn .btn'),
        init() {
            this.addEventListeners();
        },
        addEventListeners() {
            this.sliderSpanElements.forEach((sliderSpanElement) => {
                sliderSpanElement.addEventListener('click', evt => {
                    evt.preventDefault();
                    this.changeButtonState(evt);
                    this.scrollTo(evt);
                })
            })
        },
        changeButtonState(evt) {
            const currentSliderBtn = document.querySelector('.slider__btn .btn--active');
            currentSliderBtn.className = "btn";
            evt.currentTarget.classList.add('btn--active');
        },
        scrollTo(evt) {
            const targetElement = document.getElementById(evt.currentTarget.dataset.target);
            targetElement.scrollIntoView({
                behavior: "smooth",
                block: "nearest",
                inline: "center"
            });
        },
    }
    slider.init();
})();