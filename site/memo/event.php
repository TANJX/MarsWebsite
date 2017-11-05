<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>EVENTS | Mars Inc.</title>
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
            <h1>Event List</h1>
            <p>Mars' life</p>
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
                <a class="nav-link" href="newevent.html">New Event</a>
            </li>
        </ul>
        <div class="card-columns">
            <?php
$conn = mysql_connect('marstanjxcom.ipagemysql.com', 'mars', 'root'); 
mysql_select_db(marsql); 
mysql_query("set names utf8;");

$sql = sprintf("select * from event ORDER BY date ASC;");  
$result = mysql_query($sql, $conn);  
echo $thstr;  
while ($row=mysql_fetch_array($result, MYSQL_ASSOC))
{ 
	echo "<div class='card' style='width: 15rem;'>
    <div class='card-body'>
    <h4 class='card-title'>";
    echo "$row[name]" ;
    echo "</h4><h6 class='card-subtitle mb-2 text-muted'>";
    echo "$row[date]";
    echo "</h6></div></div>";
}  
mysql_free_result($result);  
mysql_close($conn);  
?>
        </div>
    </div>
    <style>
        .title {
            background-color: greenyellow;
        }

        .card {
            text-align: center;
            margin: 0 auto;
        }

    </style>
</body>

</html>
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/css/bootstrap-material-design.min.css" integrity="sha384-k5bjxeyx3S5yJJNRD1eKUMdgxuvfisWKku5dwHQq9Q/Lz6H8CyL89KF52ICpX4cL" crossorigin="anonymous">
