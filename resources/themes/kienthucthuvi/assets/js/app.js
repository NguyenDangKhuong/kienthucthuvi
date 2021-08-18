/**
 * vewport-extraを有効にする場合はインストールしてコメントアウトを削除
 * npm i viewport-extra
 */

// import './module/viewport'

// import Slider from './module/slider'
import Menu from './module/menu'

window.addEventListener('load', function () {
    new Menu()
});



// document.getElementById('header-id').onclick = function () {
//     const $body = document.getElementById('body');
//     $body.classList.toggle('show-menu');
// }