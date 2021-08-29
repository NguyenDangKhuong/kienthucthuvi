const menuItems = document.querySelectorAll('.menu__item')
// let dropdownIsOpen = false

export default class Menu {
  constructor() {
    //dropdown menu
    if (menuItems.length) {
      menuItems.forEach(menuItem => {
        const target = menuItem.childNodes[1]
        menuItem.addEventListener('click', () => {
          target.classList.contains('menu__multi-level') && target.classList.add('menu__dropdown--show')
          target.classList.contains('menu__end-level') && target.classList.add('menu__dropdown--show')
          // if (target) {
          //   if (target.classList.contains('menu__multi-level')) {
          //     // dropdownIsOpen = false
          //   } else {
          //     // dropdownIsOpen = true
          //   }
          // }
        })
      })
    }

    // window.addEventListener('mouseup', event => {
    //   if (dropdownIsOpen) {
    //     menuItems.forEach(menuItem => {
    //       const currentList = menuItem.nextSibling
    //       let targetIsDropdown = currentList == event.target

    //       if (menuItem == event.target) {
    //         return
    //       }

    //       if (!targetIsDropdown && !currentList.contains(event.target)) {
    //         currentList.classList.remove('menu__dropdown--show')
    //       }
    //     })
    //   }
    // })
  }
}
