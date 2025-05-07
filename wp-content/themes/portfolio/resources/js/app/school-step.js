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