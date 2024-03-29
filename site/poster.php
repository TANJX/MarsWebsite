<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Poster Design | Mars Inc.</title>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116224796-1"></script>
  <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
          dataLayer.push(arguments);
      }

      gtag('js', new Date());
      gtag('config', 'UA-116224796-1');

  </script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
  <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/css/bootstrap-material-design.min.css"
        integrity="sha384-k5bjxeyx3S5yJJNRD1eKUMdgxuvfisWKku5dwHQq9Q/Lz6H8CyL89KF52ICpX4cL" crossorigin="anonymous">

  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
  <link rel="stylesheet" href="/css/poster.css">
  <script src='/js/lib/jquery-3.3.1.min.js'></script>
  <script src='/js/lib/popper.js'></script>
  <script src='/js/lib/bootstrap-material-design.js'></script>
  <script>
      $(document).ready(function () {
          $('body').bootstrapMaterialDesign();
      });

  </script>
</head>

<body>
<?php
$doc = new DOMDocument();
$doc->loadHTMLFile("pug/nav.htm");
echo $doc->saveHTML();
?>
<div class="head">
  <div class="container ">
    <div id="anime"></div>
    <h1>Poster Design</h1>
  </div>
</div>
<div class="filter container">
  <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='/graphics'">All</button>
  <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='/vector'">Vector Design</button>
  <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='/animation'">Animation</button>
  <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='/poster'">Poster Design</button>
  <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='/graphics-others'">Others</button>
</div>

<div class="container">
  <div class="cards">
    <?php
    $xml = simplexml_load_file("works/posters/works.xml") or die("Error: Cannot create object");
    foreach ($xml->children() as $works) {
      $name = $works->title;
      echo '<div class="card bg-white text-white block">';
      echo '<img class="card-img" src="/works/posters/';
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
$doc->loadHTMLFile("pug/footer.htm");
echo $doc->saveHTML();
?>
<script src="/js/menu.js"></script>
</body>

</html>
