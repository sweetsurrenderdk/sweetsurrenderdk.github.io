require('./helpers/DebugHelper');
require('./helpers/MenuHelper');
require('./helpers/FacebookHelper');

// Globals
window.toggleWidget = function toggleWidget(name) {
    if(document.body.dataset.activeWidget == name) {
        closeWidgets();
    } else {
        document.body.dataset.activeWidget = name;
    }
}

window.closeWidgets = function closeWidgets() {
    document.body.dataset.activeWidget = '';
}

// Init
FacebookHelper.populateCalendar();
MenuHelper.bindNavItems();
