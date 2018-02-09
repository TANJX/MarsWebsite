<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
  <title>Graphics | Mars Inc.</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/css/bootstrap-material-design.min.css" integrity="sha384-k5bjxeyx3S5yJJNRD1eKUMdgxuvfisWKku5dwHQq9Q/Lz6H8CyL89KF52ICpX4cL" crossorigin="anonymous">

</head>

<body>
  <?php
  $doc = new DOMDocument();
  $doc->loadHTMLFile("nav.htm");
  echo $doc->saveHTML();
  ?>
    <script src="lib/lottie.js"></script>
    <div class="head">
      <div class="container ">
        <div id="anime"></div>
        <h1>Graphics Design and Animation</h1>
      </div>
    </div>
    <div class="filter container">
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php?filter=vector'">Vector Design</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php?filter=animation'">Animation</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='poster.php'">Poster Design</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php?filter=others'">Others</button>
    </div>

    <div class="container">
      <div class="cards">
        <?php
      $filter = $_REQUEST['filter'];
      $xml=simplexml_load_file("works/works.xml") or die("Error: Cannot create object");
      foreach($xml->children() as $works) {
        $name = $works->title;
        if(!($filter == "" || 
           ($filter=="vector" && $works->type =="Vector") ||
           ($filter=="animation" && $works->type =="Animation") ||
           ($filter=="others" && $works->type =="Graphics"))) continue;
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
    <?php
  $doc = new DOMDocument();
  $doc->loadHTMLFile("footer.htm");
  echo $doc->saveHTML();
  ?>

      <script src="js/menu.js"></script>
</body>

</html>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/sub.css">
<link rel="stylesheet" href="css/graphics.css">
<link rel="stylesheet" href="css/menu.css">
