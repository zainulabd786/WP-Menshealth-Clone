jQuery(document).ready(function ($) {
  console.log(za_theme_opts)
  if(za_theme_opts['show-header-post'] == "0"){ /*makes logo bigger if header post is disabled*/
    $(".cover-story-logo .custom-logo").css("maxHeight", "150px")
  }
  /*Floating Video*/
  try{
        var $window = $( window ); // 1. Window Object.
        var $featuredMedia = $( "#featured-video" ); // 1. The Video Container.
        var $featuredVideo = $( "#featured-video video" ); // 2. The Youtube Video.
         
        var player; // 3. Youtube player object.
        var top = $featuredMedia.offset().top; // 4. The video position from the top of the document;
        var offset = Math.floor( top + ( $featuredMedia.outerHeight() / 2 ) ); //5. offset.

      $window
      .on( "resize", function() {
         top = $featuredMedia.offset().top;
         offset = Math.floor( top + ( $featuredMedia.outerHeight() / 2 ) );
      } )
       
      .on( "scroll", function() {
         $featuredMedia.toggleClass( "is-sticky",
           $window.scrollTop() > offset && $featuredMedia.find(".mejs-playpause-button").hasClass( "mejs-pause" )
         );
      } );
    } catch(e){
      console.log(e)
    }
  /*Floating Video*/

  /*Sticky Add on inner pages*/
  $window.on("scroll", function(){
    let addheight = $(".add-container").outerHeight();
    if($window.scrollTop() > addheight){
      $(".add-container").addClass("stick-add");
    } else{
      $(".add-container").removeClass("stick-add");
    }

    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(".read-next-wrapper").offset().top;
    var elemBottom = elemTop + $(".read-next-wrapper").height();
    if((elemBottom <= docViewBottom) ){
      $(".add-container").removeClass("stick-add");
    } 
   /* console.log($window.scrollTop(), addOffset)
    if(initAddOffset == $window.scrollTop()){
      $(".add-container").removeClass("stick-add");
    }*/
  })
  /*Sticky Add on inner pages*/

  $("#wp-custom-header img").length == 0 && $(".cover-story-wrapper").addClass("cover-100-vh")

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