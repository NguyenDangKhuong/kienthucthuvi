// const $hamburger = document.getElementById('hamburger');
// const $headerMenu = document.getElementById('header-menu');
let dropdownIsOpen = false

export default class Menu {
  constructor() {
    const dropdownsButtons = document.querySelectorAll('.dropdown-toggle')
    if (dropdownsButtons.length) {
      dropdownsButtons.forEach(dropdown => {
        let target = dropdown.nextSibling
        dropdown.addEventListener('click', () => {
          if (target) {
            if (target.classList.contains('show')) {
              target.classList.remove('show')
              dropdownIsOpen = false
            } else {
              target.classList.add('show')
              dropdownIsOpen = true
            }
          }
        })
      })
    }

    window.addEventListener('mouseup', event => {
      if (dropdownIsOpen) {
        dropdownsButtons.forEach(dropdownItem => {
          const currentList = dropdownItem.nextSibling
          let targetIsDropdown = currentList == event.target

          if (dropdownItem == event.target) {
            return
          }

          if (!targetIsDropdown && !currentList.contains(event.target)) {
            currentList.classList.remove('show')
          }
        })
      }
    })
  }
}

// function handleSmallScreens() {
//   document.querySelector('.navbar-toggler')
//     .addEventListener('click', () => {
//     let navbarMenu = document.querySelector('.navbar-menu')

//     if (navbarMenu.style.display === 'flex') {
//       navbarMenu.style.display = 'none'
//       return
//     }

//     navbarMenu.style.display = 'flex'
//   })
// }

// handleSmallScreens()

// export default function menu() {
//     const hambuger = document.querySelector('.js-hamburger'),
//     navWrapper = document.querySelector('.js-nav-wrap'),
//     navClose = document.querySelector('.js-nav-close')
//     hambuger.addEventListener('click', function (e) {
//       e.preventDefault()
//       navWrapper.classList.add('is-open')
//     })
//     navClose.addEventListener('click', function(e) {
//       e.preventDefault()
//       navWrapper.classList.remove('is-open')
//     })
//   }

// var $hamburger = $(".hamburger");
// $hamburger.on("click", function(e) {
//   $hamburger.toggleClass("is-active");
//   $("hamburger--elastic").click(function() {
//     $("#menuHidden").hide();
//   });
//   $("hamburger--elastic").click(function() {
//     $("#menuHidden").show();
//   });
// });

// export default function menu() {
//   const hamburger = document.querySelector('.hamburger')
//   const hamburgerInner = document.querySelector('.hamburger-list-container')
//   const body = document.querySelector('body')

//   hamburger.addEventListener('click', event => {
//     event.preventDefault()
//     if (hamburger.classList.contains('is-active')) {
//       hamburger.classList.remove('is-active')
//       hamburgerInner.classList.remove('is-active')
//       body.classList.remove('scroll-stop')
//     } else {
//       void hamburger.offsetWidth;
//       void hamburgerInner.offsetWidth;
//       hamburger.classList.add('is-active')
//       hamburgerInner.classList.add('is-active')
//       body.classList.add('scroll-stop')
//     }
//   })
// }
