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
(function () {
    const showUp = {
        animateElements: document.querySelectorAll('[data-showUp="true"]'),

        init() {
            this.addHiddenClass();
            this.observers = new IntersectionObserver((entries) => {
                this.show(entries);
            });
            this.observeElement();
        },

        show(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.remove('hidden');
                    entry.target.classList.add('showUp');
                }
            })
        },

        observeElement() {
            this.animateElements.forEach((element) => {
                this.observers.observe(element);
            });
        },

        addHiddenClass() {
            this.animateElements.forEach(animateElement => {
                animateElement.classList.add('hidden');
            })
        }
    }
    showUp.init();
})();
(function () {
    const schoolStep = {
        schoolStepsElement: document.querySelectorAll('.single__step'),
        wHeight: window.innerHeight,

        init() {
            this.addEventListeners();
        },
        addEventListeners() {
            addEventListener('scroll', () => {
                this.detectPosition();
            });
            addEventListener('resize', () => {
                this.resizeWindowHeight();
            });
        },
        detectPosition() {
            this.schoolStepsElement.forEach(schoolStep => {
                if (this.wHeight / 2 > schoolStep.getBoundingClientRect().top &&
                    this.wHeight / 2 < schoolStep.getBoundingClientRect().bottom) {
                    schoolStep.classList.add('active');
                } else {
                    schoolStep.classList.remove('active');
                }
            });
        },
        resizeWindowHeight() {
            this.wHeight = window.innerHeight;
        }
    }
    schoolStep.init();
})();
(function () {
    const projectCard = {
        cardElements: document.querySelectorAll('.project__card'),

        init() {
            this.cardElements.forEach(card => {
                card.addEventListener('mouseover', () => {
                    this.checkState(card);
                });
                card.addEventListener('mouseout', () => {
                    this.resetState();
                });
            });
        },
        checkState(card) {
            this.notCardHoverElements = document.querySelectorAll('.project__card:not(:hover)');
            this.notCardHoverElements.forEach(notCardHoverElement => {
                notCardHoverElement.classList.add('not__hover');
            });
        },
        resetState() {
            this.cardElements.forEach(card => {
                card.classList.remove('not__hover');
            })
        }
    }
    projectCard.init();
})();
document.documentElement.classList.add('js-enabled');
const inputElt = document.querySelector('.bgm--checkbox');

inputElt.addEventListener('change', function () {
    if (inputElt.checked) {
        document.body.style.overflow = 'hidden';
    } else {
        document.body.style.overflow = 'initial';
    }
});