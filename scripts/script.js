$(document).ready(function(){
  var sizeBackgroundImages = function() {
    var windowWidth = window.innerWidth;
    var windowHeight = window.innerHeight;

    var imageRatio = 1920/1080;

    if (windowWidth/windowHeight > imageRatio) {
      console.log('top');
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

  sizeBackgroundImages();

  $('.main-carousel').slick({
    dots: false,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    nextArrow: false,
    prevArrow: false
  });

  $('.main-carousel').on('click', function() {
    $(this).slick("slickNext");
  });

  $(window).resize(function() { 
    sizeBackgroundImages();
  });
});
