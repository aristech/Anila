jQuery(document).ready(function($) {
  /* GLABAL IMAGE UPLOADER */
  var mediaUploader;

  $(".btn-upload").on("click", function(e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }

    if (e.target.id == "upload-button") {
      var targetValue = "#profile-picture";
      var targetPrev = "#logo-prev";
    } else {
      var targetValue = "#header-image";
      var targetPrev = "#header-image-prev";
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: "Choose picture",
      button: {
        text: "Choose a picture"
      },
      multiple: false
    });
    mediaUploader.off("select");
    mediaUploader.on("select", function() {
      attachment = mediaUploader
        .state()
        .get("selection")
        .first()
        .toJSON();
      $(targetValue).val(attachment.url);
      $(targetPrev).attr("src", attachment.url);
      //$("#logo-prev").attr("src", attachment.url);
      //console.log(attachment);
    });
    mediaUploader.open();
  });

  $(".btn-remove").on("click", function(e) {
    if (e.target.id == "remove-picture") {
      var targetValue = "#profile-picture";
    } else {
      var targetValue = "#header-image";
    }

    e.preventDefault();
    var answer = confirm("Are you sure?");
    if (answer == true) {
      $(targetValue).val("");
      $(".general-form").submit();
    }
    return;
  });

  /* Slider Gallery */
  var mUploader;

  $("#upload-button-slider").on("click", function(e) {
    e.preventDefault();
    if (mUploader) {
      mUploader.open();
      return;
    }

    mUploader = wp.media.frames.file_frame = wp.media({
      frame: "select",
      title: "Choose Multiple Slider Images by Holding the Control Key",
      button: {
        text: "Choose a picture"
      },
      multiple: true
    });
    mUploader.off("select");
    mUploader.on("select", function() {
      raw = mUploader.state().get("selection");
      var imageIdArray = [];
      var imageTitleArray = [];
      var imageSubTitleArray = [];

      attachment = raw
        .map(function(attachment) {
          attachment = attachment.toJSON();
          // console.log(attachment);
        })
        .join();
      raw.each(function(attachment) {
        imageIdArray.push(attachment.attributes.id);
      });
      $("#slider-image").val(imageIdArray);
    });
    mUploader.open();
  });

  $(".btn-remove").on("click", function(e) {
    var targetValue = "#slider-image";

    e.preventDefault();
    var answer = confirm("Are you sure?");
    if (answer == true) {
      $(targetValue).val("");
      $(".general-form").submit();
    }
    return;
  });

  /* CUSTOM CSS */
  var updateCSS = function() {
    $("#anila_css").val(editor.getSession().getValue());
  };
  $("#save-custom-css").submit(updateCSS);

  $(".chb").change(function() {
    $(".chb").prop("checked", false);
    $(this).prop("checked", true);
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
        numberOfMonths: 1,
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

  var blogUrl = "/wp-json/wp/v2/anila_contact";
  blogUrl = blogUrl.substring(blogUrl.indexOf("wp-json") - 1);
  var myJson = new Object();
  $.getJSON(blogUrl, function(data) {
    $.each(data, function(i, item) {
      var ud = data[i].metadata._contact_checkin_value_key;
      var ds = moment(ud, "DD MMM YYYY").format("YYYY-MM-DD");
      myJson.start = ds;
      console.log(ds);
    });​
  });

  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    }, // buttons for switching between views
    editable: true,

    views: {
      month: {
        // name of view
        titleFormat: "DD, MM, YYYY"
        // other view-specific options here
      },
      week: {
        // name of view
        titleFormat: "DD, MM, YYYY",
        defaultView: "month",
        slotDuration: "04:00:00"
      }
    },
    dayClick: function(date, jsEvent, view) {
      console.log("clicked on " + date.format());
    },
    events: function(start, end, timezone, callback) {
      $.getJSON(blogUrl, function(data) {
        var events = [];
        $.each(data, function(i, item) {
          var ud = data[i].metadata._contact_checkin_value_key;
          var ds = moment(ud, "DD MMM YYYY").format("YYYY-MM-DD");
          myJson.start = ds;
          events.push({
            title: 'titlee',
            start: ds // will be parsed
          });
        });​
        callback(events);
      });
    }


    // events: [
    //   {
    //     title  : 'event1',
    //     start  : myJson.start
    //   }
    // ]

  });
});
var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/css");
