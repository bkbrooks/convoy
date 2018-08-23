$(document).ready(function(){
  var windowWidth = window.innerWidth;
  var windowHeight = window.innerHeight;
  var orientation = windowHeight > windowWidth ? 'portrait' : 'landscape';

  var sizeBackgroundImages = function() {
    if (orientation == 'landscape') {
      var imageRatio = 1920/1080;

      if (windowWidth/windowHeight > imageRatio) {
        var actualHeight = windowWidth / imageRatio;
        var percentHeight = (1 - (windowHeight / actualHeight)) / 0.02;
        $('.main-carousel img').css('height', 'auto');
        $('.main-carousel img').css('width', '100%');
        $('.main-carousel img').css('left', 'auto');
        $('.main-carousel img').css('top', '-' + percentHeight + '%');
      } else {
        var actualWidth = windowHeight * imageRatio;
        var percentWidth = (1 - (windowWidth / actualWidth)) / 0.02;
        $('.main-carousel img').css('height', '100%');
        $('.main-carousel img').css('width', 'auto');
        $('.main-carousel img').css('top', 'auto');
        $('.main-carousel img').css('left', '-' + percentWidth + '%');
      } 
    } else {
      var imageRatio = 800/1200;

      if (windowWidth/windowHeight > imageRatio) {
        var actualHeight = windowWidth / imageRatio;
        var percentHeight = (1 - (windowHeight / actualHeight)) / 0.02;
        $('.main-carousel img').css('height', 'auto');
        $('.main-carousel img').css('width', '100%');
        $('.main-carousel img').css('left', 'auto');
        $('.main-carousel img').css('top', '-' + percentHeight + '%');
      } else {
        var actualWidth = windowHeight * imageRatio;
        var percentWidth = (1 - (windowWidth / actualWidth)) / 0.02;
        $('.main-carousel img').css('height', '100%');
        $('.main-carousel img').css('width', 'auto');
        $('.main-carousel img').css('top', 'auto');
        $('.main-carousel img').css('left', '-' + percentWidth + '%');
      } 
    }
  }

  sizeBackgroundImages();

  $('.main-carousel').on('lazyLoaded', function() {
    $(".main").fadeIn(1000);
    $(".spinner").fadeOut(1000);
  });

  $('.main-carousel').slick({
    dots: false,
    infinite: true,
    speed: 1000,
    fade: true,
    cssEase: 'linear',
    nextArrow: false,
    prevArrow: false,
    autoplay: true,
    autoplaySpeed: 5000,
    pauseOnFocus: false,
    pauseOnHover: false,
    lazyLoad: 'ondemand'
  });

  $('.main-carousel').slick('slickFilter', '.' + orientation);

  $('.main-carousel').on('click', function() {
    $(this).slick("slickNext");
  });

  $(window).on('resize', function() {
    windowWidth = window.innerWidth;
    windowHeight = window.innerHeight;

    var oldOrientation = orientation
    orientation = windowHeight > windowWidth ? 'portrait' : 'landscape';

    if (orientation != oldOrientation) {
      $('.main-carousel').slick('slickUnfilter');
      $('.main-carousel').slick('slickFilter', '.' + orientation);  
    }

    sizeBackgroundImages();
  });
});
