const burgerBtn = document.getElementById('burgerBtn');
const navMenu = document.getElementById('navMenu');
const overlay = document.getElementById('overlay');
const menuItems = document.querySelectorAll('.menu');

/**
 * activation/deactivation of .active and body scrolling
 */
function toggleMenu() {
    burgerBtn.classList.toggle('active');
    navMenu.classList.toggle('active');
    overlay.classList.toggle('active');

    document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : '';
}

/**
 * closing the burger
 */
function closeMenu() {
    burgerBtn.classList.remove('active');
    navMenu.classList.remove('active');
    overlay.classList.remove('active');
    document.body.style.overflow = '';
}

burgerBtn.addEventListener('click', toggleMenu);

overlay.addEventListener('click', closeMenu);

/**
 * click on menu items (close the menu)
 */
menuItems.forEach(item => {
    item.addEventListener('click', () => {
        closeMenu();
        //TODO smooth transition to sections
        console.log('Clicked:', item.textContent);
    });
});

/**
 * closing the menu by Escape
 */
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && navMenu.classList.contains('active')) {
        closeMenu();
    }
});

