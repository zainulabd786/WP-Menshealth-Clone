jQuery(document).ready(function ($) {
  // serch open
  $('.nav-search-button').click(function (e) {
    e.preventDefault();
    $('.search-overlay').toggleClass('search-open');
  });
  // search close
  $('.search-overlay-close-button').click(function (e) {
    e.preventDefault();
    $('.search-overlay').removeClass('search-open');
  });
  // side menu open
  $('.menu-toggler').click(function (e) {
    e.preventDefault();
    $('body').toggleClass('menu-open');
  });
  // menu close
  $('.close-menu').click(function (e) {
    e.preventDefault();
    $('body').removeClass('menu-open');
  });
  // check on scroll and fixed header
  if ($('#header-container').has('.cover-story-wrapper').length) {
    let storyHeight = $('.cover-story-wrapper').outerHeight();
    $('#main-navbar').css({
      top: 'auto',
      left: 'auto',
      position: 'absolute'
    });
    $(window).scroll(function () {
      let scroll = $(window).scrollTop();
      if (scroll >= storyHeight) {
        $('#main-navbar').css({
          top: 0,
          left: 0,
          position: 'fixed'
        });
        $('#main-navbar').addClass('fixed-menu');
      } else {
        $('#main-navbar').css({
          top: 'auto',
          left: 'auto',
          position: 'absolute'
        });
        $('#main-navbar').removeClass('fixed-menu');
      }
    });
  }
  // sidebar submenu
  $('.sidebar-menu .menu-item-has-children').each(function () {
    var _this = $(this);

    $(this).children('a').after('<span class="indicator-arrows py-2 px-3 float-right"><i class="fas fa-angle-right"></i></span>');
  });
  $('.indicator-arrows').click(function () {
    $(this).parent().siblings().children('span').removeClass('arrow-up');
    $(this).toggleClass('arrow-up');
    $(this).parent().siblings().children('ul').slideUp();
    $(this).next('ul').slideToggle();
  });
});


/*******************Get Header height and set padding on body***********************/
let onResize = function () {
  let getHeaderHeigt = $('#main-navbar').outerHeight();
  $('.body-container-wrapper').css('padding-top', getHeaderHeigt)
}
$(window, document).on('resize ready load', onResize);