'use strict';

let token = '927807870680835|0b5445c0ab8a3689ed727ab5bed0da1c';

class FacebookHelper {
    static apiCall(url, query) {
        return new Promise((resolve, reject) => {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'https://graph.facebook.com/sweetsurrenderdk/' + url + '?access_token=' + token + query);
            xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');

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

    static populateCalendar() {
        let eventsElement = document.querySelector('.calendar-container .calendar-events');
        let eventElementTemplate = eventsElement.querySelector('.calendar-event');

        let autoLinker = new Autolinker();

        FacebookHelper.apiCall('events', '&fields=cover,name,start_time,end_time,description')
        .then((response) => {
            document.querySelector('.icon-calendar-new-events').innerHTML = response.data.length;

            for(let i = 0; i < response.data.length; i++) {
                let evt = response.data[i];
                let eventElement = eventElementTemplate.cloneNode(true);
                let description = evt.description;
                
                let start = new Date(evt.start_time);
                let end = new Date(evt.end_time);   

                eventElement.dataset.id = evt.id;

                if(evt.cover) {
                    console.log(evt.cover);
                    eventElement.querySelector('.cover').setAttribute('src', evt.cover.source);
                }

                description = autoLinker.link(description);

                eventElement.querySelector('.name').innerHTML = evt.name;
                eventElement.querySelector('.date').innerHTML = start.getDate() + '/' + (start.getMonth() + 1) + '/' + start.getFullYear();
                eventElement.querySelector('.description').innerHTML = description;
                
                let hours = eventElement.querySelector('.hours');
                
                hours.innerHTML = '';
               
                if(!isNaN(start.getHours())) {
                    if(start.getHours().toString().length != 2) {
                        hours.innerHTML += '0' + start.getHours();
                    } else {
                        hours.innerHTML += start.getHours();
                    }
                   
                    if(start.getMinutes().toString().length != 2) {
                        hours.innerHTML += ':0' + start.getMinutes();
                    } else {
                        hours.innerHTML += ':' + start.getMinutes();
                    }

                    if(!isNaN(end.getHours())) {
                        if(end.getHours().toString().length != 2) {
                            hours.innerHTML += ' - 0' + end.getHours();
                        } else {
                            hours.innerHTML += ' - ' + end.getHours();
                        }

                        if(end.getMinutes().toString().length != 2) {
                            hours.innerHTML += ':0' + end.getMinutes();
                        } else {
                            hours.innerHTML += ':' + end.getMinutes();
                        }
                    }
                }
                
                let link = eventElement.querySelector('.fb-link');
                
                link.setAttribute('href', link.getAttribute('href') + evt.id);

                eventsElement.appendChild(eventElement);
            }

            eventElementTemplate.parentElement.removeChild(eventElementTemplate);
        })
        .catch((e) => {
            console.log(e);
        });
    }
}

window.FacebookHelper = FacebookHelper;
