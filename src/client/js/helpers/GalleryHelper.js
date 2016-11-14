'use strict';

class GalleryHelper {
    static bindImages() {
        let images = document.querySelectorAll('section img, section .image');

        function onClick(e) {
            e.stopPropagation();

            let src = this.getAttribute('src');

            if(!src) {
                src = this.style.backgroundImage;
                
                src = src.replace('url(','').replace(')','').replace(/\"/gi, "");
            }
            
            GalleryHelper.openModal(src);            
        }

        if(images) {
            for(let i = 0; i < images.length; i++) {
                let image = images[i];

                image.removeEventListener('click', onClick, false);
                image.addEventListener('click', onClick, false);
            }
        }
    }

    static openModal(src) {
        // Render elements
        let modalBackdrop = document.createElement('div');
        modalBackdrop.className = 'modal-backdrop';
        
        let modal = document.createElement('div');
        modal.className = 'modal';
        
        let modalContent = document.createElement('div');
        modalContent.className = 'modal-content';
        
        let modalBody = document.createElement('img');
        modalBody.className = 'modal-body';
        modalBody.setAttribute('src', src);
        
        // Set up event listeners
        modalBackdrop.addEventListener('click', () => {
            modalBackdrop.classList.toggle('active', false);
            
            setTimeout(() => {
                if(modalBackdrop && modalBackdrop.parentElement) {
                    modalBackdrop.parentElement.removeChild(modalBackdrop);
                }
            }, 500);
        });

        // Parent elements
        modalBackdrop.appendChild(modal);
        modal.appendChild(modalContent);
        modalContent.appendChild(modalBody);
        document.body.appendChild(modalBackdrop);

        // Wait a while and set active class
        setTimeout(() => {
            modalBackdrop.classList.toggle('active', true);
        }, 50);

        return modal;
    }
}

window.GalleryHelper = GalleryHelper;
