const searchBtn = document.querySelector('.header__search-icon')
const searchInput = document.querySelector('.header__search-input')
const searchForm = document.querySelector('.header__search-form')
const searchWrapper = document.querySelector('.header__search-wrapper')

export default class Search {
  constructor() {
    searchBtn.addEventListener('click', () => {
      searchInput.classList.toggle('header__search-input--show')
      searchForm.classList.toggle('header__search-form--show')
      searchWrapper.classList.toggle('header__search-wrapper--show')
    })
  }
}
