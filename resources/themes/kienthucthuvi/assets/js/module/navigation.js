const hamburger = document.querySelector('.header__menu-btn')
const headerNavigation = document.querySelector('.header__navigation')
const closeMenu = document.querySelector('.navigation__icon')
const outsideMenu = document.querySelector('.navigation__body-veil')

export default class Menu {
  constructor() {
    showMenu(hamburger)
    showMenu(closeMenu)
    showMenu(outsideMenu)
  }
}

function showMenu (element) {
  element.addEventListener('click', () => {
    hamburger.classList.toggle('header__menu-btn--show')
    headerNavigation.classList.toggle('header__navigation--show')
    outsideMenu.classList.toggle('navigation__body-veil--show')
  })
}
