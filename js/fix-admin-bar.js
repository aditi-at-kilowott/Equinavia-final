document.addEventListener('DOMContentLoaded', function() {
    // Fixes the 'role="group"' error on <li> elements
    const adminBarListItems = document.querySelectorAll('li[role="group"]');
    adminBarListItems.forEach(item => {
        item.removeAttribute('role');
    });

    // Fixes the 'aria-required-children' error on <ul> elements
    const adminBarMenus = document.querySelectorAll('ul[role="menu"]');
    adminBarMenus.forEach(menu => {
        menu.removeAttribute('role');
    });

    // Fixes the 'Required ARIA parents role not present' error on <a> elements
    const menuItems = document.querySelectorAll('a[role="menuitem"]');
    menuItems.forEach(item => {
        item.removeAttribute('role');
    });
    
    // Fixes the 'Required ARIA parents role not present' error on <div> elements
    const emptyItems = document.querySelectorAll('div[role="menuitem"]');
    emptyItems.forEach(item => {
        item.removeAttribute('role');
    });
});