
$(document).ready(function() {
  $('#request_name').watermark("имя");
  $('#request_phone').watermark("телефон");
  $('#request_phone').mask("+7 (999) 999-9999");
});

String.prototype.format = function() {
    var s = this,
        i = arguments.length;
    while (i--) {
        s = s.replace(new RegExp('\\{' + i + '\\}', 'gm'), arguments[i]);
    }
    return s;
};

function sendCallback() {
  var requestSubject = 'Заказать звонок'
  var requestBody = 'Здравствуйте!\nМеня зовут {0}\nПерезвоните мне, пожалуйста, на номер {1}'
  sendMail(requestSubject, requestBody.format($('#callback_name').val(), $('#callback_phone').val()));
}

function sendRequest() {
  var requestSubject = 'Запись на семинар'
  var requestBody = 'Здравствуйте!\nМеня зовут {0}\nЯ хочу записаться на семинар по английскому языку.\nМой номер телефона {1}'
  sendMail(requestSubject, requestBody.format($('#request_name').val(), $('#request_phone').val()));
}

function sendMail(subject, body) {
    var link =  "mailto:gram.for.you@gmail.com" +
                "?subject=" + subject + "&body=" + body;
    window.location.href = encodeURI(link);
}
