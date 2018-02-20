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
  <?php
  $doc = new DOMDocument();
  $doc->loadHTMLFile("nav.htm");
  echo $doc->saveHTML();
  ?>
    <div class="head">
      <div class="container ">
        <div id="anime"></div>
        <h1>Poster Design</h1>
      </div>
    </div>
    <div class="filter container">
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php'">All</button>
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
    <?php
  $doc = new DOMDocument();
  $doc->loadHTMLFile("footer.htm");
  echo $doc->saveHTML();
  ?>
      <script src="js/menu.js"></script>
</body>

</html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/sub.css">
<link rel="stylesheet" href="css/posters.css">
<link rel="stylesheet" href="css/menu.css">
