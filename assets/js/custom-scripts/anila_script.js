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
  $(".menu-item").mouseover(function() {
    // $('.active').removeClass('active');
    // $(this).addClass('active');
    var top = $(this).height() - 15;
    var left = $(this).offset().left + 25;
    var width = $(this).width();
    $("#marker")
      .stop()
      .animate({ top: top, left: left, width: width }, 1000);
  });
  $(".menu-item").mouseleave(function() {
    var top = $(".current_page_item.active").height() - 15;
    var left = $(".current_page_item.active").offset().left + 25;
    var width = $(".current_page_item.active").width();
    $("#marker")
      .stop()
      .animate({ top: top, left: left, width: width }, 1000);
  });
  //$('.current_page_item.active').trigger('mouseleave');
  $("#marker").fadeIn();

  /* PARALLAX */
  function parallaxIt() {
    // create variables
    var $fwindow = $(window);
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

    // on window scroll event
    $fwindow.on("scroll resize", function() {
      scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    });

    // for each of content parallax element
    $('[data-type="content"]').each(function(index, e) {
      var $contentObj = $(this);
      var fgOffset = parseInt($contentObj.offset().top);
      var yPos;
      var speed = $contentObj.data("speed") || 1;

      $fwindow.on("scroll resize", function() {
        yPos = fgOffset - scrollTop / speed;

        $contentObj.css("top", yPos);
      });
    });

    // for each of background parallax element
    $('[data-type="background"]').each(function() {
      var $backgroundObj = $(this);
      var bgOffset = parseInt($backgroundObj.offset().top);
      var yPos;
      var coords;
      var speed = $backgroundObj.data("speed") || 0;

      $fwindow.on("scroll resize", function() {
        yPos = -((scrollTop - bgOffset) / speed);
        coords = "0% " + yPos + "px";

        $backgroundObj.css({ backgroundPosition: coords });
      });
    });

    // triggers winodw scroll for refresh
    $fwindow.trigger("scroll");
  }

  parallaxIt();

  /* SIDEBAR */
  if ($(window).width() < 577) {
    $(".with-side").removeClass("with-side");
    $(".jumbotron").css("backgroundSize", "100%");
  }

  /* hamburger */

  $("#hamburger").click(function() {
    $(this).toggleClass("is-active");
    if ($(this).css("margin-right") == "1px") {
      $(".sidebar").animate({ width: "-=100%" });
      $(".sidebar").removeClass("open");
      $(this).animate({ "margin-right": "-=1" });
    } else {
      $(".sidebar").animate({ width: "+=100%" });
      $(this).animate({ "margin-right": "+=1" });
      $(".sidebar").addClass("open");
    }
  });

  /*  Smooth scroll */
  if (window.addEventListener)
    window.addEventListener("DOMMouseScroll", wheel, false);
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
      interval = setInterval(function() {
        var scrollTop = $(window).scrollTop();
        var step = Math.round((end - scrollTop) / scrollSpeed);
        if (
          scrollTop <= 0 ||
          scrollTop >= $(window).prop("scrollHeight") - $(window).height() ||
          (goUp && step > -1) ||
          (!goUp && step < 1)
        ) {
          clearInterval(interval);
          interval = null;
          end = null;
        }
        $(window).scrollTop(scrollTop + step);
      }, animationInterval);
    }
  }

  /* SLICK SLIDER */
  $(".home-slider").slick({
    autoplay: true,
    autoplaySpeed: 8000,
    dots: false,
    infinite: true,
    speed: 1000,
    fade: true,
    cssEase: "linear",
    lazyLoad: "ondemand",
    lazyLoadBuffer: 0,
    fade: true,
    cssEase: "linear",
    pauseOnHover: false,
    prevArrow: $(".s-control.slick-prev"),
    nextArrow: $(".s-control.slick-next")
  });

  /* DATEPICKER */
  ("use strict");
  function getField(id) {
    var el = $("#" + id + "-picker");
    return el.length ? el : null;
  }

  $(".fa-calendar.in").click(function() {
    var el = document.getElementById("checkin-picker");
    $(el).focus();
  });

  $(".fa-calendar.out").click(function() {
    var el = document.getElementById("checkout-picker");
    $(el).focus();
  });

  function pickerSetup(id, date) {
    var el = getField(id);
    if (el !== null) {
      var checkin = id === "checkin";
      el.datepicker({
        altField: el.get(0).form[id],
        altFormat: "yy-mm-dd",
        dateFormat: "d M yy",
        onSelect: function() {
          if (checkin && getField("checkout") !== null) {
            var constraint = new Date(el.datepicker("getDate"));
            constraint.setDate(constraint.getDate() + 1);
            getField("checkout").datepicker("option", "minDate", constraint);
          }
        },
        numberOfMonths: 2,
        mandatory: true,
        firstDay: 1,
        minDate: checkin ? 0 : 1,
        maxDate: "+2y"
      });
      el.datepicker("setDate", date);
    }
  }

  pickerSetup("checkin", "+0");
  pickerSetup("checkout", "+1");

  /* FORM CONTROL */
  var checkin;
  var checkout;

  $("#checkinout").on("submit", function(e) {
    e.preventDefault();
    var form = $(this);
    checkin = form.find("#checkin-picker").val();
    checkout = form.find("#checkout-picker").val();
    adults = form.find("#wh-adults").val();
    children = form.find("#wh-children").val();
  });

  $("#modal-contact").on("submit", function(e) {
    e.preventDefault();
    var form = $(this);
    var name = form.find("#recipient-name").val(),
      email = form.find("#recipient-email").val(),
      message = form.find("#message-text").val(),
      ajaxurl = form.data("url");

    if (name === "" || email == "" || message == "") {
      console.log(adults + " Required inputs are empty " + children);
      return;
    }

    $.ajax({
      url: ajaxurl,
      type: "post",
      data: {
        checkin: checkin,
        checkout: checkout,
        adults: adults,
        children: children,
        name: name,
        email: email,
        message: message,
        action: "anila_save_contact"
      },
      error: function(response) {
        console.log(response);
      },
      success: function(response) {
        if (response == 0) {
          console.log("Unable to save your message, Please try again later");
        } else {
          console.log("Message saved, thank you!");
          $("#contactModal").modal("toggle");
        }
      }
    });
  });
});
