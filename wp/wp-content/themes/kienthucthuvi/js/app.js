const options = {
  textColour: '#08FDD8',
  outlineThickness: 0.5,
  outlineColour: '#FE0853',
  maxSpeed: 0.06,
  freezeActive: true,
  shuffleTags: true,
  shape: 'sphere',
  zoom: 0.8,
  noSelect: true,
  textFont: null,
  pinchZoom: true,
  wheelZoom: false,
  freezeDecel: true,
  fadeIn: 3000,
  initial: [0.3, -0.1],
  depth: 1.1
}

window.onload = function () {
  //skill chart
  try {
    TagCanvas.Start('myCanvas', '', options)
  } catch (e) {
    // something went wrong, hide the canvas container
    document.getElementById('myCanvasContainer').style.display = 'none'
  }

  //name char animate
  $.when(
    $('.portfolio__name').blast({
      delimiter: 'character',
      tag: 'span',
      customClass: 'portfolio__char-animation'
    })
  ).done(() => {
    const characters = document.querySelectorAll('.portfolio__char-animation')
    console.log(characters)
    if (characters.length) {
      characters.forEach(item => {
        item.addEventListener('mouseover', () => {
          item.classList.add('animated')
          item.classList.add('rubberBand')
        })
        item.addEventListener('mouseout', () => {
          item.classList.remove('animated')
          item.classList.remove('rubberBand')
        })
      })
    }
  })
}
