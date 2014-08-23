
function showCallbackForm() {
    $("#callback_overlay").fadeIn();
    $("#callback_form").fadeIn();
}

function hideCallbackForm() {
    $("#callback_overlay").fadeOut();
    $("#callback_form").fadeOut();
}

$(document).ready(function() {
  var showForm = function () { showCallbackForm(); }
  var hideForm = function () { hideCallbackForm(); }

  $('img').on('dragstart', function(event) { event.preventDefault(); });
  
  $('.form_name').watermark("имя");
  $('.form_phone').watermark("телефон");
  $('.form_phone').mask("+7 (999) 999-9999");

  $('.header > #callback').click(showForm);
  $('#callback_overlay').click(hideForm);
  $('#close_callback_form').click(hideForm);

  $("form").on("submit", function(event) {
    event.preventDefault();
    var form = $(this);

    $.post("send.php", form.serialize(),  function(response) {
      
      // clear form
      form.find("input[name=name]").val("");
      form.find("input[name=phone]").val("");

      // show result
      form.find(".post_result").html(response);
      form.find(".post_result").show().fadeTo('slow', 0.5).fadeTo('slow', 1.0);

      if ($("#callback_form").is(':visible') && (response.indexOf("Ошибка:") != 0))
        setTimeout(hideForm, 2500);
    });
  });
});
