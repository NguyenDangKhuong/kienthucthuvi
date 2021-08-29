const scrollTopBtn = document.querySelector('.scroll-top')
const header= document.querySelector('.header__container')


export default class ScrollTop {
  constructor() {
    scrollTopBtn.addEventListener('click', () => {
      window.scrollTo(0, 0)
    })
    document.addEventListener('scroll', function () {
      window.scrollY > 200
        ? scrollTopBtn.classList.add('scroll-top--show')
        : scrollTopBtn.classList.remove('scroll-top--show')

      // thinner header
      window.scrollY > 0
       ? header.classList.add('header__container--thinner')
       : header.classList.remove('header__container--thinner')
      // get bottom position
      //   if (document.body.clientHeight == window.pageYOffset + window.innerHeight) {
      //     scrollTopBtn.classList.add('scroll-top--show')
      //   }
    })
  }
}
