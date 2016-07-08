'use strict';

class MenuHelper {
    static bindNavItem(navItem) {
        navItem.addEventListener('click', () => {
            var galleryItem = document.querySelector('.menu-gallery .menu-item#_' + navItem.dataset.id);

            galleryItem.focus();
            closeWidgets();
        });
    }

    static bindNavItems() {
        let navItems = document.querySelectorAll('.menu-page .menu-nav .menu-item');

        for(let i = 0; i < navItems.length; i++) {
            MenuHelper.bindNavItem(navItems[i]);
        }
    }
}

window.MenuHelper = MenuHelper;
