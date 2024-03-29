<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport"
        content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi"/>
  <title>Project | Mars Inc.</title>
  <base href="https://marstanjx.com/">
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
  <link rel="stylesheet" href="/css/project.css">
  <script src='js/lib/jquery-3.3.1.min.js'></script>
  <script src='js/lib/popper.js'></script>
  <script src='js/lib/bootstrap-material-design.js'></script>
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
$project = $_REQUEST['name'];
$valid = false;
if ($project != '') {
  if (file_exists("projects/$project.htm")) {
    $doc->loadHTMLFile("projects/$project.htm");
    echo '<link rel="stylesheet" href="/css/projects.css">';
    echo $doc->saveHTML();
    echo '<a href="/project">';
    echo '<div class="prev-control"><div>';
    echo '<img src="/img/icon/arrow_left.svg">';
    echo '<p>BACK TO PROJECTS</p>';
    echo '</div></div></a>';
  } else {
//    echo "not found";
    $valid = true;
  }
} else {
  $valid = true;
}
if ($valid) {
  $filter = $_REQUEST['filter'];
  $page = 0;

  echo '<div class="head main-head">';
  echo '<div class="container ">';
  echo '<img src="/img/icon/project.svg">';
  echo '<h1>Projects and Collaboration</h1>';

  echo '<h3 style="font-size: 1.1rem; margin-top: 10px">';
  switch ($filter) {
    case("web"):
      echo "Web Design";
      break;
    case("printed"):
      echo "Product Design";
      break;
    case("video"):
      echo "Video and Documentary";
      break;
    default:
      echo "&nbsp;";
  }
  echo '</h3>';

  echo '<div class="filter">';
  echo '<button type="button" class="btn btn-secondary btn-sm" onclick="location.href=\'project\'">All</button>';
  echo '<button type="button" class="btn btn-secondary btn-sm" onclick="location.href=\'web-project\'">Web Design</button>';
  echo '<button type="button" class="btn btn-secondary btn-sm" onclick="location.href=\'video-project\'">Video & Documentary</button>';
  echo '<button type="button" class="btn btn-secondary btn-sm" onclick="location.href=\'printed-project\'">Product</button>';
  echo '</div>';
  echo '</div>';
  echo '</div>';

  echo '<div class="container">';
  echo '<div class="pieces">';

  if ($_REQUEST['page'] != '') {
    $page = (int)$_REQUEST['page'] - 1;
  }
  $xml = simplexml_load_file("works/projects/works.xml") or die("Error: Cannot create object");
  $items = $xml->children()->count();
  $pages = $items / 8;
  $i = 0;
  foreach ($xml->children() as $works) {
    if (!($filter == "" ||
        ($filter == "web" && $works->type == "web") ||
        ($filter == "video" && $works->type == "video") ||
        ($filter == "printed" && $works->type == "printed"))) continue;
    $i++;
    if ($i <= $page * 8) continue;
    if ($i > $page * 8 + 8) break;
    $name = $works->title;
    $link = $works->link;

    echo '<div class="piece">';
    if ($works->link != "") {
      echo '<a href="project/';
      echo $works->link;
      echo '">';
    } else if ($works->olink != "") {
      echo '<a href="';
      echo $works->olink;
      echo '" target="_blank">';
    }
    echo '<img src="works/projects/';
    echo $works->file;
    echo '" alt="' . $works->title . '">';

    echo '<div class="info">';
    echo '<h4>';
    echo $works->title;
    echo '</h4>';
    echo '<p class="date">';
    echo $works->date;
    echo '</p>';
    echo '</div>';
    if ($works->link != "") {
      echo '</a>';
    }
    echo '</div>';

  }
  if ($filter != "") {
    $items = 0;
    foreach ($xml->children() as $works) {
      if (($filter == "web" && $works->type == "web") ||
          ($filter == "video" && $works->type == "video") ||
          ($filter == "printed" && $works->type == "printed"))
        $items++;
    }
    $pages = $items / 8;
  }
  echo '</div><div class="clear"></div>';
  if ($pages > 1) {
    echo '<nav class="page-control"><ul class="pagination justify-content-center">';
    if ($page == 0) {
      echo '<li class="page-item disabled">';
      echo '<a class="page-link" href="#" tabindex="-1">Previous</a>';
    } else {
      echo '<li class="page-item">';
      echo '<a class="page-link" href="';
      if ($filter != "") {
        echo $filter;
        echo '-project';
      } else {
        echo 'project';
      }
      if ($page > 1) {
        echo '-';
        echo $page;
      }
      echo '" tabindex="-1">Previous</a>';
    }
    for ($i = 0; $i < $pages; $i++) {
      echo '</li>';
      if ($i == $page) {
        echo '<li class="page-item disabled">';
      } else {
        echo '<li class="page-item">';
      }
      echo '<a class="page-link" href="';
      if ($filter != "") {
        echo $filter;
        echo '-project';
      } else {
        echo 'project';
      }
      if ($i > 0) {
        echo '-';
        echo $i + 1;
      }
      echo '" tabindex="-1">';
      echo $i + 1;
      echo '</a>';

    }
    if ($page == $pages - 1) {
      echo '<li class="page-item disabled">';
      echo '<a class="page-link" href="#">Next</a>';
    } else {
      echo '<li class="page-item">';
      echo '<a class="page-link" href="';
      if ($filter != "") {
        echo $filter;
        echo '-project';
      } else {
        echo 'project';
      }
      echo '-';
      echo $page + 2;
      echo '" tabindex="-1">Next</a>';
    }
    echo '</li></ul></nav>';
  }
  echo '</div>';
}

$doc = new DOMDocument();
$doc->loadHTMLFile("pug/footer.htm");
echo $doc->saveHTML();
?>
<script src="js/menu.js"></script>
</body>

</html>
