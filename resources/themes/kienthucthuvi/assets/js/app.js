/**
 * vewport-extraを有効にする場合はインストールしてコメントアウトを削除
 * npm i viewport-extra
 */

// import './module/viewport'

// import Slider from './module/slider'
import Menu from './module/menu'
import Search from './module/search'
import NavMenu from './module/navigation'
import NotFound from './module/notfound'
import ScrollTop from './module/scroll-top'

window.addEventListener('load', function () {
    new Menu()
    new Search()
    new NavMenu()
    new NotFound()
    new ScrollTop()
});
