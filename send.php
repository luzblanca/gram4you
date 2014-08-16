<?php

$action = $_POST['action'];
$name = $_POST['name'];
$phone = $_POST['phone'];

if (empty($action))
    exit("Ошибка: неизвестное действие");
if (empty($name))
    exit("Ошибка: введите имя");
if (empty($phone))
    exit("Ошибка: введите телефон");

$to = 'gram.for.you@gmail.com';

$subject = "Уведомление: " . $action;

$headers = "From: gram4you.ru <noreply@gram4you.ru>" . "\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$message = '<html><body><p>';
$message .= '<p>Действие: ' . $action . '</p>';
$message .= '<p>Имя: ' . $name . '</p>';
$message .= '<p>Телефон: <a href=\'tel:' . $phone . '\'>' . $phone . '</a></p>';
$message .= '</body></html>';

$sent = mail($to, $subject, $message, $headers);

if ($sent)
    exit("Заявка успешно отправлена");
else
    exit("Ошибка: не удалось отправить заявку");

?>
