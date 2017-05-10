<?
// ----------------------------конфигурация-------------------------- //

header("Content-Type: text/html; charset=utf-8");

$adminemail="Zakazcveti@bk.ru";  // e-mail админа


$date=date("d.m.y"); // число.месяц.год

$time=date("H:i"); // часы:минуты:секунды

$backurl="http://лилиябелая.рф";  // На какую страничку переходит после отправки письма

//---------------------------------------------------------------------- //



// Принимаем данные с формы

$indicator=$_POST['indicator'];

$name=$_POST['name'];

$phone=$_POST['phone'];

$message=$_POST['message'];






$msg="

Откуда заказ: $indicator

Имя: $name

Телефон : $phone

Сообщение: $message


";

$msg1="

Ваше Имя: $name

Ваш телефон : $phone

Ваши пожелания, уточнения: $message

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
function reload() {location = \"$backurl\"}; setTimeout('reload()', 1000);
//--></script>

$msg1

<p>Ваш заказ принят! Подождите, сейчас вы будете перенаправлены на главную страницу...</p>";
exit;



?>
