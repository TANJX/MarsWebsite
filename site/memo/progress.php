<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PROGRESS | Mars Inc.</title>
  <script>
    function validateForm() {
      var a = document.forms["Form"]["name"].value;
      echo(a);
      if (a == null || a == " ") {
        document.getElementById("error-box").style.display = "block";
        return false;
      }
      document.getElementById("error-box").style.display = "none";
      return true;
    }

  </script>
</head>

<body>
  <div class="title ">
    <div class="container">
      <h1 style="color: white">Progress Bar</h1>
      <p style="color: white">Mars' life</p>
    </div>
  </div>
  <div class="container">
    <ul class="nav align-middle">
      <li class="nav-item">
        <a class="nav-link active" href="../index.html">Mars Inc.</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="log.php">Log</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="event.php">Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="../music/index.php">Scale Picker</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="../japanese/index.html">Japanese</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="newprogress.html">New Progress Bar</a>
      </li>
    </ul>
    <div class="bar-wrapper">
      <?php
 $conn = mysql_connect('marstanjxcom.ipagemysql.com', 'mars', 'root'); 
 mysql_select_db('marsql');
 mysql_query("set names utf8;");
 
 $sql = sprintf("select * from progress;");  
 $result = mysql_query($sql, $conn);  
 echo $thstr;  
 while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
 { 
  echo "<div class='bar-wrapper'>";
  echo "<div class='bar-info'>";
  echo "<h2>";
  date_default_timezone_set('America/Los_Angeles');
  $now = new DateTime('now');
  $startdate = new DateTime($row[start]);
  $enddate = new DateTime($row[end]);  
  $interval1 = $startdate->diff($now);
  $interval2 = $startdate->diff($enddate);
  $diff=1.0* $interval1->days/ $interval2->days;
  if($interval1->invert==1) $diff=0;
  echo "$row[name]";
  echo "</h2></div><div class='bar'><div class='progress-bar' style='width: ";
  echo $diff*100;
  echo "%'> </div></div></div>";
   
 } 
 mysql_free_result($result);  
 mysql_close($conn);  
?>
    </div>
</body>

<style>
  .title {
    background-color: forestgreen;
  }

</style>

</html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/css/bootstrap-material-design.min.css" integrity="sha384-k5bjxeyx3S5yJJNRD1eKUMdgxuvfisWKku5dwHQq9Q/Lz6H8CyL89KF52ICpX4cL" crossorigin="anonymous">

<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="css/progress.css">
