jQuery(document).ready(function($) {

  /* PRELOADER */
  $(window).on("load", function() {
    $(".preloader").fadeOut(500);
  });

  $(".menu-item-has-children.dropdown").hover(
    function() {
      $(this)
        .find(".dropdown-menu")
        .stop(true, true)
        .delay(200)
        .fadeIn(500);
    },
    function() {
      $(this)
        .find(".dropdown-menu")
        .stop(true, true)
        .delay(200)
        .fadeOut(500);
    }
  );

  /* MENU UNDERLINE */
  $('.menu-item').mouseover( function() {
    // $('.active').removeClass('active');
    // $(this).addClass('active');
    var top = $(this).height() - 15;
    var left = $(this).offset().left + 25;
    var width = $(this).width();
    $('#marker').stop().animate( { top: top, left: left, width: width }, 1000 );
  });
  $(".menu-item").mouseleave(function () {
    var top = $('.current_page_item.active').height() - 15;
    var left = $('.current_page_item.active').offset().left + 25;
    var width = $('.current_page_item.active').width();
    $('#marker').stop().animate( { top: top, left: left, width: width }, 1000 );
  });
  //$('.current_page_item.active').trigger('mouseleave');
  $('#marker').fadeIn();

   /* PARALLAX */
  function parallaxIt() {

    // create variables
    var $fwindow = $(window);
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // on window scroll event
    $fwindow.on('scroll resize', function() {
      scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    });

    // for each of content parallax element
    $('[data-type="content"]').each(function (index, e) {
      var $contentObj = $(this);
      var fgOffset = parseInt($contentObj.offset().top);
      var yPos;
      var speed = ($contentObj.data('speed') || 1 );

      $fwindow.on('scroll resize', function (){
        yPos = fgOffset - scrollTop / speed;

        $contentObj.css('top', yPos);
      });
    });

    // for each of background parallax element
    $('[data-type="background"]').each(function(){
      var $backgroundObj = $(this);
      var bgOffset = parseInt($backgroundObj.offset().top);
      var yPos;
      var coords;
      var speed = ($backgroundObj.data('speed') || 0 );

      $fwindow.on('scroll resize', function() {
        yPos = - ((scrollTop - bgOffset) / speed);
        coords = '0% '+ yPos + 'px';

        $backgroundObj.css({ backgroundPosition: coords });
      });
    });

    // triggers winodw scroll for refresh
    $fwindow.trigger('scroll');
  };

  parallaxIt();

  /* SIDEBAR */
  if ($(window).width() < 577) {
    $('.with-side').removeClass('with-side');
    $('.jumbotron').css('backgroundSize', '100%');
 }

   /* hamburger */

  $('#hamburger').click(function() {
    $(this).toggleClass('is-active');
    if($(this).css("margin-right") == "1px")
    {
        $('.sidebar').animate({"width": '-=100%'});
        $(".sidebar").removeClass("open");
        $(this).animate({"margin-right": '-=1'});
    }
    else
    {
        $('.sidebar').animate({"width": '+=100%'});
        $(this).animate({"margin-right": '+=1'});
        $(".sidebar").addClass("open");
    }


  });

  /*  Smooth scroll */
  if (window.addEventListener) window.addEventListener('DOMMouseScroll', wheel, false);
window.onmousewheel = document.onmousewheel = wheel;

function wheel(event) {
    var delta = 0;
    if (event.wheelDelta) delta = event.wheelDelta / 120;
    else if (event.detail) delta = -event.detail / 3;

    handle(delta);
    if (event.preventDefault) event.preventDefault();
    event.returnValue = false;
}

var goUp = true;
var end = null;
var interval = null;

function handle(delta) {
	var animationInterval = 20; //lower is faster
  var scrollSpeed = 20; //lower is faster

	if (end == null) {
  	end = $(window).scrollTop();
  }
  end -= 20 * delta;
  goUp = delta > 0;

  if (interval == null) {
    interval = setInterval(function () {
      var scrollTop = $(window).scrollTop();
      var step = Math.round((end - scrollTop) / scrollSpeed);
      if (scrollTop <= 0 ||
          scrollTop >= $(window).prop("scrollHeight") - $(window).height() ||
          goUp && step > -1 ||
          !goUp && step < 1 ) {
        clearInterval(interval);
        interval = null;
        end = null;
      }
      $(window).scrollTop(scrollTop + step );
    }, animationInterval);
  }
}

  /* SLICK SLIDER */
  $('.home-slider').slick({
    autoplay: true,
    autoplaySpeed: 8000,
    dots: false,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    lazyLoad: 'ondemand',
    lazyLoadBuffer: 0,
    fade: true,
    cssEase: 'linear',
    pauseOnHover: false,
    prevArrow: $('.s-control.slick-prev'),
    nextArrow: $('.s-control.slick-next')
  });

});
