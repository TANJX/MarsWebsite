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
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php'">All</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php?filter=vector'">Vector Design</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php?filter=animation'">Animation</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='poster.php'">Poster Design</button>
      <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='graphics.php?filter=others'">Others</button>
    </div>

    <div class="container">
      <div class="cards">
        <?php
        $filter = $_REQUEST['filter'];
        $page = 0;
        if($_REQUEST['page'] != '') {
          $page = (int)$_REQUEST['page'];
        }
        $xml=simplexml_load_file("works/works.xml") or die("Error: Cannot create object");
        $items = $xml->children()->count();
        $pages = $items / 9;
        $i = 0;
        foreach($xml->children() as $works) {
          if(!($filter == "" || 
               ($filter=="vector" && $works->type =="Vector") ||
               ($filter=="animation" && $works->type =="Animation") ||
               ($filter=="others" && $works->type =="Graphics"))) continue;
          $i++;
          if ($i <= $page * 9) continue;
          if($i > $page * 9 + 9) break;
          $name = $works->title;
          echo '<div class="card bg-white text-white block">';
          echo '<img class="card-img" src="works/';
          echo $works->file;
          echo '" alt="Card image">';
          if($works->link != "") {
            echo '<a href="';
            echo $works->link;
            echo '" target="_blank">';
            echo '<div class="detail">';
            echo '<p>How is made</p>';
            echo '</div>';
            echo '</a>';
          }
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
        if($filter != "") {
          $items = 0;
          foreach($xml->children() as $works) {
            if(($filter=="vector" && $works->type =="Vector") ||
               ($filter=="animation" && $works->type =="Animation") ||
               ($filter=="others" && $works->type =="Graphics")) 
              $items++;
          }
          $pages = $items / 9;
        }
        echo '</div><div class="clear"></div>';
        if($pages > 1) {
        echo '<nav><ul class="pagination justify-content-center">';
        if($page==0) {
            echo '<li class="page-item disabled">';
            echo '<a class="page-link" href="graphics.php?filter=others" tabindex="-1">Previous</a>';
        } else {
          echo '<li class="page-item">';
          echo '<a class="page-link" href="graphics.php?';
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
          echo '<a class="page-link" href="graphics.php?';
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
        if ($page == $pages - 1){
          echo '<li class="page-item disabled">';
          echo '<a class="page-link" href="#">Next</a>';
        } else {
          echo '<li class="page-item">';
            echo '<a class="page-link" href="graphics.php?';
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
        ?>

      </div>

      <?php
  $doc = new DOMDocument();
  $doc->loadHTMLFile("footer.htm");
  echo $doc->saveHTML();
  ?>
        <script src="js/menu.js"></script>
        <script>
          var animation = bodymovin.loadAnimation({
            container: document.getElementById('anime'),
            path: 'animate/trojan.json',
            renderer: 'svg',
            loop: true,
            autoplay: true,
            name: "Hello World", // Name for future reference. Optional.
          })

        </script>
</body>

</html>
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/sub.css">
<link rel="stylesheet" href="css/graphics.css">
<link rel="stylesheet" href="css/menu.css">
