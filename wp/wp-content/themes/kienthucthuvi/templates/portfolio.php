<?php
/*
 Template Name: Portfolio
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/wp-content/themes/kienthucthuvi/assets/images/portfolio/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/wp-content/themes/kienthucthuvi/assets/images/portfolio/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/wp-content/themes/kienthucthuvi/assets/css/_portfolio.css" type="text/css" media="all">
  <link rel="stylesheet" href="/wp-content/themes/kienthucthuvi/css/mouse.css" type="text/css" media="all">
  <title>Nguyen Khuong 's portfolio</title>
</head>

<body>
  <div class="portfolio">
    <div class="mouse__effect">
      <canvas class="banner_canvas" id="canvas_banner"></canvas>
      <div class="top-title wow fadeInUp" onmousemove="color_hover(event)"></div>
    </div>
    <div class="portfolio__header">
      <img src="/wp-content/themes/kienthucthuvi/assets/svg/portfolio-logo.svg" />
      <ul class="portfolio__header-list">
        <li class="portfolio__header-item">
          <a href="#about">
            About
          </a>
        </li>
        <li class="portfolio__header-item">
          <a href="#experience">
            Experience
          </a>
        </li>
        <li class="portfolio__header-item">
          <a href="#work">
            Work
          </a>
        </li>
        <li class="portfolio__header-item">
          <a href="#contact">
            Contact
          </a>
        </li>
      </ul>
    </div>
    <div class="portfolio__wrapper">
      <div class="portfolio__hello">
        Hi, my name is
      </div>
      <h1 class="portfolio__name" aria-label="Nguyen Dang Khuong">
        Nguyen Dang Khuong
      </h1>
      <div class="portfolio__name portfolio__slogan">
        I build things for the web.
      </div>
      <h3 class="portfolio__explain">
        I 'm a software engineer specializing in building (and occasionally designing) exceptional digital experiences. Currently, I’m focused on building accessible, human-centered products at Upstatement.
      </h3>
      <a href="#contact" class="portfolio__contact-btn">
        Contact me
      </a>
    </div>
    <div class="portfolio__mouse">
      <div class="portfolio__mouse-scroll"></div>
    </div>
  </div>

  <div class="portfolio__about" id="about">
    <div class="portfolio__container">
      <h2 class="portfolio__title">About Me</h2>
      <div class="portfolio__about-wrapper">
        <div class="portfolio__about-description">
          Since Adobe Flash was a complete innovation, alongside with CSS 1.0 and HTML 4.01 as standards of the current web I've been passionate about web.
          For over a decade I had many opportunities to work in a vast spectrum of web technologies what let me gather a significant amount of various experience. Working for companies and individuals around the globe I met and learnt from amazing and ambitious people.
          I currently work remotely with a selected freelance client base being open for new opportunities.
        </div>
        <div class="portfolio__skill-chart">
          <canvas width="500" height="500" id="myCanvas">
            <ul>
              <li><a data-weight="25" href="https://en.wikipedia.org/wiki/HTML" target="_blank">HTML</a></li>
              <li><a data-weight="25" href="https://en.wikipedia.org/wiki/Cascading_Style_Sheets" target="_blank">CSS</a></li>
              <li><a data-weight="25" href="https://en.wikipedia.org/wiki/JavaScript" target="_blank">ES5/ES6</a></li>
              <li><a data-weight="25" href="https://en.wikipedia.org/wiki/JavaScript" target="_blank">TypeScript</a></li>
              <li><a data-weight="24" href="https://en.wikipedia.org/wiki/Representational_state_transfer" target="_blank">REST</a></li>
              <li><a data-weight="14" href="https://en.wikipedia.org/wiki/JSON" target="_blank">JSON</a></li>
              <li><a data-weight="13" href="https://en.wikipedia.org/wiki/XML" target="_blank">Next</a></li>
              <li><a data-weight="14" href="https://en.wikipedia.org/wiki/Data_science" target="_blank">Photoshop</a></li>
              <li><a data-weight="26" href="https://en.wikipedia.org/wiki/WordPress" target="_blank">Wordpress</a></li>
              <li><a data-weight="26" href="https://en.wikipedia.org/wiki/PHP" target="_blank">PHP</a></li>
              <li><a data-weight="26" href="https://en.wikipedia.org/wiki/Python_(programming_language)" target="_blank">Figma</a></li>
              <li><a data-weight="21" href="https://en.wikipedia.org/wiki/Node.js" target="_blank">Node JS</a></li>
              <li><a data-weight="17" href="https://en.wikipedia.org/wiki/Git" target="_blank">Git</a></li>
              <li><a data-weight="17" href="" target="_blank">_lodash</a></li>
              <li><a data-weight="23" href="https://en.wikipedia.org/wiki/Bootstrap_(front-end_framework)" target="_blank">Bootstrap</a></li>
              <li><a data-weight="15" href="https://en.wikipedia.org/wiki/Sass_(stylesheet_language)" target="_blank">SASS</a></li>
              <li><a data-weight="24" href="https://reactjs.org/" target="_blank" style="color: white">ReactJS</a></li>
              <li><a data-weight="12" href="https://en.wikipedia.org/wiki/JQuery" target="_blank">jQuery</a></li>
              <li><a data-weight="26" href="http://mongoosejs.com/" target="_blank">SQL</a></li>
              <li><a data-weight="19" href="http://gulpjs.com/" target="_blank">Gulp</a></li>
              <li><a data-weight="19" href="https://www.npmjs.com/" target="_blank">npm</a></li>
              <li><a data-weight="19" href="https://en.wikipedia.org/wiki/BEM" target="_blank">BEM</a></li>
            </ul>
          </canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="portfolio__experience" id="experience">
    <div class="portfolio__container">
      <h2 class="portfolio__title">Where I've worked</h2>
    </div>
  </div>
  <div class="portfolio__work" id="work">
    <div class="portfolio__container">
      <h2 class="portfolio__title">Where I've worked</h2>
    </div>
  </div>
  <div class="portfolio__contact" id="contact">
    <div class="portfolio__container">
      <h2 class="portfolio__title">Contact</h2>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js" integrity="sha512-6ORWJX/LrnSjBzwefdNUyLCMTIsGoNP6NftMy2UAm1JBm6PRZCO1d7OHBStWpVFZLO+RerTvqX/Z9mBFfCJZ4A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="/wp-content/themes/kienthucthuvi/js/mouse.js"></script>
  <script src="/wp-content/themes/kienthucthuvi/js/tagcanvas.min.js"></script>
  <script src="/wp-content/themes/kienthucthuvi/js/blast.min.js"></script>
  <script src="/wp-content/themes/kienthucthuvi/js/app.js"></script>
</body>

</html>