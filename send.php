
<?php

$action = htmlspecialchars($_POST['action']);
$name   = htmlspecialchars($_POST['name']);
$phone  = htmlspecialchars($_POST['phone']);
$phrase = htmlspecialchars($_POST['phrase']);
$referer = htmlspecialchars($_POST['referer']);
$campaign = htmlspecialchars($_POST['campaign']);

if (empty($action))
    exit("Ошибка: неизвестное действие");
if (empty($name))
    exit("Ошибка: введите имя");
if (empty($phone))
    exit("Ошибка: введите телефон");

$to = 'gram.for.you@gmail.com';

$subject = "Уведомление: " . $action;

$headers = 'From: gram4you.ru <noreply@gram4you.ru>' . "\r\n";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";

$message = '
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Отправка заявки</title>
    </head>
    <body>
      <p>Действие: ' . $action . '</p>
      <p>Имя: ' . $name . '</p>
      <p>Телефон: <a href=\'tel:' . $phone . '\'>' . $phone . '</a></p>
      <p></p>
      <p>Источник: ' . $referer . '</p>
      <p>Фраза: ' . $phrase . '</p>
      <p>Кампания: ' . $campaign . '</p>
    </body>
</html>
';

$sent = mail($to, $subject, $message, $headers);

if ($sent)
    exit("Заявка успешно отправлена");
else
    exit("Ошибка: не удалось отправить заявку");

?>
