'use strict';

class FormHelper {
    static apiCall(url, data) {
        return new Promise((resolve, reject) => {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
            xhr.setRequestHeader('Access-Control-Allow-Origin', location.protocol + '://' + location.hostname);

            xhr.send();
            
            xhr.onreadystatechange = () => {
                let DONE = 4;
                let OK = 200;
                let NOT_MODIFIED = 304;
                
                if (xhr.readyState === DONE) {
                    if(xhr.status == OK || xhr.status == NOT_MODIFIED) {
                        let response = xhr.responseText;

                        if(response && response != 'OK') {
                            try {
                                response = JSON.parse(response);
                            
                            } catch(e) {
                                debug.log('Response: ' + response, this)
                                debug.warning(e, this)

                            }
                        }

                        resolve(response);

                    } else {
                        reject(new Error(xhr.responseText));
                    
                    }
                }
            }
        });
    }

    static bindForm(form) {
        form.addEventListener('submit', (e) => {
            e.preventDefault();

            if(form.dataset.disabled) {
                return;
            }

            let serialized = {};

            for(let i = 0; i < form.elements.length; i++) {
                let element = form.elements[i];

                if(element.name) {
                    serialized[element.name] = element.value;
                }
            }

            form.querySelector('input[type="submit"').setAttribute('disabled', true);
            form.dataset.disabled = true;

            debug.log('Submitting form data...', this);
            
            FormHelper.apiCall(/*form.getAttribute('action')*/'http://jsonplaceholder.typicode.com/posts', serialized)
            .then(() => {
                debug.log('Success!', this);
                form.querySelector('input[type="submit"').setAttribute('disabled', false);
                form.dataset.disabled = false;
            })
            .catch((e) => {
                form.dataset.disabled = false;
                alert(e);
            });
        });
    }

    static init() {
        let forms = document.querySelectorAll('form');

        for(let i = 0; i < forms.length; i++) {
            this.bindForm(forms[i]);
        }
    }
}

window.FormHelper = FormHelper;
