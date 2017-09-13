<?php 

?>
<?php
//声明变量并接受form表单发送过来的数据
$name = $_POST['name']; 
$date = $_POST['date'];

//字符串拼接，打印输出
echo $name."<br/>".$date."<br/>";

//连接数据库
$link = mysql_connect('marstanjxcom.ipagemysql.com', 'mars', 'root'); 
if (!$link) { 
    die('Could not connect: ' . mysql_error()); 
} 
echo 'Connected successfully'; 
mysql_select_db(marsql); 
//设置mysql字符编码
mysql_query("set names utf8;");
//insert语句
$insert = "insert into event (name,date) values ('$name','$date')";

$res_insert = mysql_query($insert);
if($res_insert){
echo "<br/>插入成功";
} else {
echo "<br/>插入失败";
}
?>
