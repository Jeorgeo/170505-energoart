<?
// ----------------------------конфигурация-------------------------- //

header("Content-Type: text/html; charset=utf-8");

$adminemail="info@energoart.ru";  // e-mail админа


$date=date("d.m.y"); // число.месяц.год

$time=date("H:i"); // часы:минуты:секунды

$backurl="https://energoart.ru";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- //



// Принимаем данные с формы

$name=$_POST['name'];

$email=$_POST['mail'];

$msg=$_POST['message'];



// Проверяем валидность e-mail

if (!preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is",
strtolower($email)))

 {

  echo
"<center>Вернитесь <a
href='javascript:history.back(1)'><B>назад</B></a>. Вы
указали неверные данные!";

  }

 else

 {


$msg="


<p>Имя: $name</p>

<p>E-mail: $email</p>

<p>сообщение: $msg</p>


";



 // Отправляем письмо админу

mail("$adminemail", "$date $time Сообщение от $name", "$msg");



// Сохраняем в базу данных

$f = fopen("message.txt", "a+");

fwrite($f," \n $date $time Сообщение от $name");

fwrite($f,"\n $msg ");

fwrite($f,"\n ---------------");

fclose($f);



// Выводим сообщение пользователю

print "<script language='Javascript'><!--
function reload() {location = \"$backurl\"}; setTimeout('reload()', 600);
//--></script>

$msg

<p>Сообщение отправлено! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";
exit;

 }

?>
