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