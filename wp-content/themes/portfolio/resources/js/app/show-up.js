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