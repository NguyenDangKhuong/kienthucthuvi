const sliderItem = document.querySelectorAll('.comment-sidebar__item')
const sliderLength = sliderItem.length

export default class Slider {
  constructor() {
    init()

    setInterval(() => {
      sliderItem.forEach(item => {
        item.className +=
          ' comment-sidebar__item-transition comment-sidebar__item-transform'
      })
      setTimeout(function () {
        prev()
        resetPos()
      }, 500)
    }, 4000)
  }
}

function resetPos() {
  sliderItem.forEach(item => {
    item.classList.remove(
      'comment-sidebar__item-transition',
      'comment-sidebar__item-transform'
    )
  })
}

function init() {
  sliderItem.forEach((item, index) => {
    item.style.order = index + 1
  })
}

function prev() {
  sliderItem.forEach(item => {
    const currentItem = parseInt(item.style.order)
    if (currentItem < sliderLength) {
      item.style.order = currentItem + 1
    } else {
      item.style.order = 1
    }
  })
}
