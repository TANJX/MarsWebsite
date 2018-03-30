<!DOCTYPE html>
<html lang="">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
  <title>Project | Mars Inc.</title>
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
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/css/bootstrap-material-design.min.css" integrity="sha384-k5bjxeyx3S5yJJNRD1eKUMdgxuvfisWKku5dwHQq9Q/Lz6H8CyL89KF52ICpX4cL" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/sub.css">
  <link rel="stylesheet" href="css/project.css">
  <link rel="stylesheet" href="css/menu.css">
</head>

<body>
  <?php
  $doc = new DOMDocument();
  $doc->loadHTMLFile("nav.htm");
  echo $doc->saveHTML();
  $project = $_REQUEST['name'];
  $valid = false;
  if($project != '') {
    $doc->loadHTMLFile("projects/$project.htm");
    if($doc==false) {
      $valid = true;
    } else {
      echo '<link rel="stylesheet" href="css/projects.css">';
      echo $doc->saveHTML();
    }
  } else {
    $valid = true;
  }
  if ($valid) {
    echo '<div class="head">';
    echo '<div class="container ">';
    echo '<h1>Projects and Collaboration</h1>';
    echo '</div>';
    echo '</div>';
    echo '<div class="container">';
    echo '<div class="pieces">';
  
    $filter = $_REQUEST['filter'];
    $page = 0;
    if($_REQUEST['page'] != '') {
      $page = (int)$_REQUEST['page'];
    }
    $xml=simplexml_load_file("works/projects/works.xml") or die("Error: Cannot create object");
    $items = $xml->children()->count();
    $pages = (int) ($items / 8 + 1);
    $i = 0;
    foreach($xml->children() as $works) {
      if(!($filter == "" || 
           ($filter=="vector" && $works->type =="Vector") ||
           ($filter=="animation" && $works->type =="Animation") ||
           ($filter=="others" && $works->type =="Graphics"))) continue;
      $i++;
      if ($i <= $page * 8) continue;
      if($i > $page * 8 + 8) break;
      $name = $works->title;
      $link = $works->link;

      echo '<div class="piece">';
      if($works->link != "") {
        echo '<a href="project-';
        echo $works->link;
        echo '">';
      }
      echo '<img src="works/projects/';
      echo $works->file;
      echo '" alt="Card image">';

      echo '<div class="info">';
      echo '<h4>';
      echo $works->title;
      echo '</h4>';
      echo '<p class="date">';
      echo $works->date;
      echo '</p>';
      echo '</div>';
      if($works->link != "") {
        echo '</a>';
      }
      echo '</div>';

    }
    if($filter != "") {
      $items = 0;
      foreach($xml->children() as $works) {
        if(($filter=="vector" && $works->type =="Vector") ||
           ($filter=="animation" && $works->type =="Animation") ||
           ($filter=="others" && $works->type =="Graphics")) 
          $items++;
      }
      $pages = (int) ($items / 8 + 1);
    }
    echo '</div><div class="clear"></div>';
    if($pages > 1) {
    echo '<nav><ul class="pagination justify-content-center">';
    if($page==0) {
        echo '<li class="page-item disabled">';
        echo '<a class="page-link" href="graphics.php?filter=others" tabindex="-1">Previous</a>';
    } else {
      echo '<li class="page-item">';
      echo '<a class="page-link" href="project.php?';
      if($filter!="") {
        echo 'filter=';
        echo $filter;
        echo '&';
      }
      echo 'page=';
      echo $page - 1;
      echo '" tabindex="-1">Previous</a>';
    }
    for($i = 0; $i<$pages; $i++) {
      echo '</li>';
      if($i==$page) {
        echo '<li class="page-item disabled">';
      } else {
        echo '<li class="page-item">';
      }
      echo '<a class="page-link" href="project.php?';
      if($filter!="") {
        echo 'filter=';
        echo $filter;
        echo '&';
      }
      echo 'page=';
      echo $i;
      echo '" tabindex="-1">';
      echo $i + 1;
      echo '</a>';
    }
    echo "<script>console.log(";
      echo $pages;
      echo ")</script>";
    if ($page == $pages - 1) {
      echo '<li class="page-item disabled">';
      echo '<a class="page-link" href="#">Next</a>';
    } else {
      echo '<li class="page-item">';
        echo '<a class="page-link" href="project.php?';
        if($filter!="") {
          echo 'filter=';
          echo $filter;
          echo '&';
        }
        echo 'page=';
        echo $page + 1;
        echo '" tabindex="-1">Next</a>';
    }
    echo '</li></ul></nav>';
    }
    echo '</div>';
  }
  
  $doc = new DOMDocument();
  $doc->loadHTMLFile("footer.htm");
  echo $doc->saveHTML();
  ?>
    <script src="js/menu.js"></script>
</body>

</html>
