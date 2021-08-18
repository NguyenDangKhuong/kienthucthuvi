const $sliderItem = document.querySelectorAll('.project__item')
const $prevBtn = document.querySelector('.project__prev')
const $nextBtn = document.querySelector('.project__next')
const sliderLength = $sliderItem.length

export default class Menu {
  constructor() {
    init()

    $prevBtn.addEventListener('click', () => {
      $sliderItem.forEach(item => {
        item.className += ' project__item-transition project__item-right'
      })

      setTimeout(function () {
        prev()
        resetPos()
      }, 500)
    })

    $nextBtn.addEventListener('click', function () {
      $sliderItem.forEach(item => {
        item.className += ' project__item-transition project__item-left'
      })

      setTimeout(function () {
        next()
        resetPos()
      }, 300)
    })
  }
}

function resetPos() {
  $sliderItem.forEach(item => {
    item.classList.remove(
      'project__item-transition',
      'project__item-left',
      'project__item-right'
    )
  })
}

function init() {
  $sliderItem.forEach((item, index) => {
    item.style.order = index + 1
  })
}

function prev() {
  $sliderItem.forEach(item => {
    const currentItem = parseInt(item.style.order)
    if (currentItem < sliderLength) {
      item.style.order = currentItem + 1
    } else {
      item.style.order = 1
    }
  })
}

function next() {
  $sliderItem.forEach(item => {
    const currentItem = parseInt(item.style.order)
    if (currentItem > 1) {
      item.style.order = currentItem - 1
    } else {
      item.style.order = sliderLength
    }
  })
}
