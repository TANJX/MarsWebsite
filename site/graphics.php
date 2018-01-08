<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
  <title>Mars Inc.</title>
</head>

<body>
  <header>
    <div class="title ">
      <p class="container">SPRING 2018</p>
    </div>
  </header>

  <div class="head">
    <div class="container ">
      <h1>Graphics Design and Animation</h1>
    </div>
  </div>

  <div class="container">
    <div class="cards">
      <?php
      $xml=simplexml_load_file("works/works.xml") or die("Error: Cannot create object");
      foreach($xml->children() as $works) {
        $name = $works->title; 
        echo '<div class="card bg-white text-white block">';
        echo '<img class="card-img" src="works/';
        echo $works->file;
        echo '" alt="Card image">';
        echo '<div class="card-info">';
        echo '<h4 class="card-title">';
        echo $works->title;
        echo '</h4>';
        echo '<p class="card-text date">';
        echo $works->date;
        echo '</p>';
        echo '</div>';
        echo '</div>';
      }
      ?>
    </div>

  </div>

  <div class="clear"></div>
  <footer>
    <div class="container">
      <img class="logo" src="logo/logo-text.svg">
      <div class="social">
        <a href="https://www.facebook.com/mars.tanjx" target="_blank"><img class="social-icon" src="icon/fb.svg" data-toggle="tooltip" data-placement="bottom" title="@mars.tanjx"></a>
        <a href="https://www.instagram.com/mars.tanjx/" target="_blank"><img class="social-icon" src="icon/ins.svg" data-toggle="tooltip" data-placement="bottom" title="@mars.tanjx"></a>
        <a href="https://github.com/TANJX" target="_blank"><img class="social-icon" src="icon/github.svg" data-toggle="tooltip" data-placement="bottom" title="@TANJX"></a>
        <img class="social-icon" src="icon/wechat.svg" data-toggle="tooltip" data-placement="bottom" title="@TANJX424">
      </div>
      <p>Mars. 2017. <a href="https://github.com/TANJX/MarsWebsite">GitHub</a>.</p>
    </div>
  </footer>

</body>

</html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/css/bootstrap-material-design.min.css" integrity="sha384-k5bjxeyx3S5yJJNRD1eKUMdgxuvfisWKku5dwHQq9Q/Lz6H8CyL89KF52ICpX4cL" crossorigin="anonymous">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/graphics.css">
