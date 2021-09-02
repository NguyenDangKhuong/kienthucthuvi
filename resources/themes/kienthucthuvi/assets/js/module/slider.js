const sliderItem = document.querySelectorAll('.related__item')
const prevBtn = document.querySelector('.related__prev')
const nextBtn = document.querySelector('.related__next')
const sliderLength = sliderItem.length

export default class Slider {
  constructor() {
    init()

    prevBtn && prevBtn.addEventListener('click', () => {
      sliderItem.forEach(item => {
        item.className += ' related__item-transition related__item-right'
      })

      setTimeout(function () {
        prev()
        resetPos()
      }, 500)
    })

    nextBtn && nextBtn.addEventListener('click', function () {
      sliderItem.forEach(item => {
        item.className += ' related__item-transition related__item-left'
      })

      setTimeout(function () {
        next()
        resetPos()
      }, 300)
    })

    setInterval(() => {
      sliderItem.forEach(item => {
        item.className += ' related__item-transition related__item-left'
      })
      setTimeout(function () {
        next()
        resetPos()
      }, 300)
    }, 4000)
  }
}

function resetPos() {
  sliderItem.forEach(item => {
    item.classList.remove(
      'related__item-transition',
      'related__item-left',
      'related__item-right'
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

function next() {
  sliderItem.forEach(item => {
    const currentItem = parseInt(item.style.order)
    if (currentItem > 1) {
      item.style.order = currentItem - 1
    } else {
      item.style.order = sliderLength
    }
  })
}
