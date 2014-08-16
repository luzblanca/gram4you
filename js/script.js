
$(document).ready(function() {
  $('.form_name').watermark("имя");
  $('.form_phone').watermark("телефон");
  $('.form_phone').mask("+7 (999) 999-9999");
  $("form").on("submit", function(event) {
    event.preventDefault();    
    var form = this;

    $.post("send.php", $(form).serialize(),  function(response) {
      // clear form
      $(form).find("input[name=name]").val("");
      $(form).find("input[name=phone]").val("");
      // show result
      $('#post_result_text').html(response);
      $('#post_result').show().fadeTo('slow', 0.5).fadeTo('slow', 1.0);
      $('html, body').animate({ scrollTop: $("#post_result").offset().top }, 400);
    });
  });
});