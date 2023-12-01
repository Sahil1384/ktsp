class StickyHeader {
    constructor() {

        const header = document.getElementById('header');

        window.addEventListener('load', () => {
            sticky();
        });
        window.addEventListener('scroll', () => {
            sticky();
        });

        function sticky() {
            if (window.scrollY > 100 && !header.classList.contains('header__sticky')) {
                header.classList.add('header__sticky');
            } else {
                if (header.classList.contains('header__sticky') && window.scrollY < 2) {
                    header.classList.remove('header__sticky');
                }
            }
        }
    }
}

export default StickyHeader;