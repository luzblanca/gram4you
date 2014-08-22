
function toggleCallbackForm() {
    $("#callback_overlay").fadeToggle();
    $("#callback_form").fadeToggle();
    $("#callback_form").find(".post_result").fadeOut();
}

$(document).ready(function() {
  var toggleForm = function () { toggleCallbackForm(); }

  $('img').on('dragstart', function(event) { event.preventDefault(); });
  
  $('.form_name').watermark("имя");
  $('.form_phone').watermark("телефон");
  $('.form_phone').mask("+7 (999) 999-9999");

  $('.header > #callback').click(toggleForm);
  $('#callback_overlay').click(toggleForm);
  $('#close_callback_form').click(toggleForm);

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
        setTimeout(toggleForm, 3000);
    });
  });
});
