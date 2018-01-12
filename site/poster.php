<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
  <title>Poster Design | Mars Inc.</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/css/bootstrap-material-design.min.css" integrity="sha384-k5bjxeyx3S5yJJNRD1eKUMdgxuvfisWKku5dwHQq9Q/Lz6H8CyL89KF52ICpX4cL" crossorigin="anonymous">

</head>

<body>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/js/bootstrap-material-design.js" integrity="sha384-3xciOSDAlaXneEmyOo0ME/2grfpqzhhTcM4cE32Ce9+8DW/04AGoTACzQpphYGYe" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('body').bootstrapMaterialDesign();
    });

  </script>
  <header>
    <div class="title ">
      <div class="container">
        <a href="index">
          <img class="logo-text" src="logo/logo-text.svg">
        </a>
        <p>SPRING 2018</p>
      </div>
    </div>
  </header>

  <div class="head">
    <div class="container ">
      <h1>Poster Design</h1>
    </div>
  </div>
  <?php
  $doc = new DOMDocument();
  $doc->loadHTMLFile("nav.htm");
  echo $doc->saveHTML();
  ?>

    <div class="filter container">
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php?filter=vector'">Vector Design</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php?filter=animation'">Animation</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='poster.php'">Poster Design</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php?filter=others'">Others</button>
    </div>


    <div class="container">
      <div class="cards">
        <?php
      $xml=simplexml_load_file("posters/works.xml") or die("Error: Cannot create object");
      foreach($xml->children() as $works) {
        $name = $works->title; 
        echo '<div class="card bg-white text-white block">';
        echo '<img class="card-img" src="posters/';
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
    <script>
      $("li").mouseover(function() {
        $(this).find(".drop-down").slideDown(300);
        $(this).find(".accent").addClass("animate");
        $(this).find(".nav-item").css("color", "#FFF");
      }).mouseleave(function() {
        $(this).find(".drop-down").slideUp(300);
        $(this).find(".accent").removeClass("animate");
        $(this).find(".nav-item").css("color", "#000");
      });

    </script>
</body>

</html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/css/bootstrap-material-design.min.css" integrity="sha384-k5bjxeyx3S5yJJNRD1eKUMdgxuvfisWKku5dwHQq9Q/Lz6H8CyL89KF52ICpX4cL" crossorigin="anonymous">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/sub.css">
<link rel="stylesheet" href="css/posters.css">
