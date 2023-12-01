import { scrollToId } from './utils';

class MainMenu {
    constructor() {

        const menu = document.getElementById('header-menu');
        const items = menu.querySelectorAll(".main-menu__link");
        const logo = document.getElementById('logo');
        const top = document.getElementById('top');

        const menuToggle = document.getElementById('menu-toggle');
        const header = document.getElementById('header');

        window.addEventListener('load', () => {
            clickListener();
            toggleMobileMenu();
        });

        function clickListener() {
            for (var i = 0; i < items.length; i++) {
                let el = items[i];
                el.addEventListener('click', (event) => {
                    event.preventDefault();
                    const target = el.getAttribute('href');
                    menuToggle.classList.remove('menu-open');
                    menu.classList.remove('menu-opened');
                    header.classList.remove('bgr-active');
                    scrollToId(target);
                });
            }

            logo.addEventListener('click', (event) => {
                scrollToId(top);
            })
        }

        function toggleMobileMenu() {
            menuToggle.addEventListener('click', (event) => {
                event.preventDefault();
                menuToggle.classList.toggle('menu-open');
                menu.classList.toggle('menu-opened');
                header.classList.toggle('bgr-active');
            });
        }

    }
}

export default MainMenu;