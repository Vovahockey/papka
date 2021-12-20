
<?php


if (!isset($_POST["name"])||!isset($_POST["mail"])||!isset($_POST["message"]))
{echo "Заполните, пожалуйста, все поля";die;}
if (strlen($_POST["name"])==0||strlen($_POST["mail"])==0||strlen($_POST["message"])==0)
{echo "Заполните, пожалуйста, все поля";die;}
if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {echo "Введите корректный адрес электронной почты";die;}

$to = "<vovka_isay18@mail.ru>" ;
$subject = "Весточка с сайта";
$mes = '<html>
<head>
<title>Новое сообщение на сайте</title>
</head>
<body>
<p>Автор: '.$_POST["name"].'</p>
<p>Email: '.$_POST["email"].'</p>
<p>Сообщение: '.$_POST["message"].'</p>


</body>';

$mes = chunk_split(base64_encode($mes));
$headers = "Content-type: text/html; charset=utf-8 \r\n";
$headers .= "From: \"".$_POST["name"]."\" <".$_POST["mail"].">\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Reply-To: ".$_POST["mail"]."\r\n";
$headers .= "Content-Transfer-Encoding: base64\r\n\r\n";
mail($to, $subject, $mes, $headers);
echo "Успешно";
?>