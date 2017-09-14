<?php
$name = $_POST['name']; 
$date = $_POST['date'];
$link = mysql_connect('marstanjxcom.ipagemysql.com', 'mars', 'root'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
}
mysql_select_db(marsql); 
//设置mysql字符编码
mysql_query("set names utf8;");
//insert语句
$insert = "insert into event (name,date) values ('$name','$date')";
$res_insert = mysql_query($insert);
header("Location: index.php");
exit;
?>
