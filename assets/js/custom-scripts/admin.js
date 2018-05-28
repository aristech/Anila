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
      var targetPrev  = "#logo-prev";
    } else {
      var targetValue = "#header-image";
      var targetPrev  = "#header-image-prev";
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: "Choose picture",
      button: {
        text: "Choose a picture"
      },
      multiple: false
    });

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
  // var mediaUploader;
  
  // $(".btn-upload").on("click", function(e) {
  //   e.preventDefault();
  //   if (mediaUploader) {
  //     mediaUploader.open();
  //     return;
  //   }

  //   if (e.target.id == "upload-button") {
  //     var targetValue = "#profile-picture";
  //     var targetPrev  = "#logo-prev";
  //   } else {
  //     var targetValue = "#header-image";
  //     var targetPrev  = "#header-image-prev";
  //   }

  //   mediaUploader = wp.media.frames.file_frame = wp.media({
  //     title: "Choose picture",
  //     button: {
  //       text: "Choose a picture"
  //     },
  //     multiple: true
  //   });

  //   mediaUploader.on("select", function() {
  //     raw = mediaUploader
  //       .state()
  //       .get("selection");

  //       var attachment = raw.map( function( attachment ) {
  //               attachment = attachment.toJSON();
  //               console.log(attachment.url);
  //           }).join();
  //     // $(targetValue).val(attachment.url);
  //     // $(targetPrev).attr("src", attachment.url);
  //     //$("#logo-prev").attr("src", attachment.url);
  //     //console.log(attachment.url);
  //   });
  //   mediaUploader.open();
  // });

  // $(".btn-remove").on("click", function(e) {
  //   if (e.target.id == "remove-picture") {
  //     var targetValue = "#profile-picture";
  //   } else {
  //     var targetValue = "#header-image";
  //   }

  //   e.preventDefault();
  //   var answer = confirm("Are you sure?");
  //   if (answer == true) {
  //     $(targetValue).val("");
  //     $(".general-form").submit();
  //   }
  //   return;
  // });


  /* CUSTOM CSS */
  var updateCSS = function() {
    $("#anila_css").val(editor.getSession().getValue());
  };
  $("#save-custom-css").submit(updateCSS);

  $(".chb").change(function() {
    $(".chb").prop("checked", false);
    $(this).prop("checked", true);
  });
});
var editor = ace.edit("customCss");
editor.setTheme("ace/theme/monokai");
editor.session.setMode("ace/mode/css");
