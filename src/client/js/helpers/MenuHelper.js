'use strict';

class MenuHelper {
    static bindNavItem(navItem) {
        navItem.addEventListener('click', () => {
            MenuHelper.focusItem(navItem.dataset.id);

            closeWidgets();
        });
    }

    static focusItem(id) {
        let galleryItem = document.querySelector('.menu-gallery .menu-item#_' + id);

        galleryItem.focus();
    }

    static bindNavItems() {
        let navItems = document.querySelectorAll('.menu-page .menu-nav .menu-item');

        for(let i = 0; i < navItems.length; i++) {
            MenuHelper.bindNavItem(navItems[i]);
        }
    }
}

window.MenuHelper = MenuHelper;
