<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
  if ($_REQUEST['journal'] == '') {
    echo '<title>Journal | Mars Inc.</title>';
  } else {
    $xml = simplexml_load_file("journal/journals.xml") or die("Error: Cannot create object");
    $found = false;
    foreach ($xml->children() as $work) {
      if (strcmp($work->file, $_REQUEST['journal']) == 0) {
        $title = $work->title;
        echo '<title>' . $title . ' | Mars Inc.</title>';
        $found = true;
      }
    }
    if (!$found) {
      echo '<title>Journal | Mars Inc.</title>';
    }
  }
  ?>
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
  <?php
  if ($_REQUEST['journal'] == '') {
    echo '<link rel="stylesheet" href="/css/journals.css">';
  } else {
    echo '<link rel="stylesheet" href="/css/journal.css">';
  }
  ?>
  <script src='/js/lib/jquery-3.3.1.min.js'></script>
  <script src='/js/lib/popper.js'></script>
  <script src='/js/lib/bootstrap-material-design.js'></script>
  <script>
  $(document).ready(function () {
    $('body').bootstrapMaterialDesign();
  });
  </script>
  <script src="/js/horizontal_drag.js"></script>
</head>

<body>

<?php
// nav
$doc = new DOMDocument();
$doc->loadHTMLFile("pug/nav.htm");
echo $doc->saveHTML();

if ($_REQUEST['journal'] == '') {
  // journals list
  echo '<div class="head">';
  echo '<h1>Journals</h1>';
  echo '</div>';

  echo '<div class="container">';

  $journal_div = '';
  $types = array();

  $xml = simplexml_load_file("journal/journals.xml") or die("Error: Cannot create object");
  $journal_div .= '<div class="journals">';
  foreach ($xml->children() as $work) {
    $type = (string)$work->type;
    if (!in_array($type, $types)) {
      $types[] = $type;
    }

    $journal_div .= sprintf("<a href='/journal/%s' class='%s'>", $work->file, $type);
    if ($work->img == '')
      $journal_div .= sprintf('<div class="journal">');
    else
      $journal_div .= sprintf('<div class="journal" style="background-image: url(\'/journal/img/%s\')">', $work->img);
    $color = $work->color;
    if ($color != '') {
      $color = ' style="color: ' . $color . ';"';
    }
    $journal_div .= "<h3 " . $color . ">" . $work->title . "</h3>";
    if ($type != 'log')
      $journal_div .= "<p " . $color . ">" . $work->date . "</h3>";
    $journal_div .= "</div></a>";
  }
  $journal_div .= '</div>';

  echo '<div class="selection-checkboxes">';
  foreach ($types as $type) {
    echo '<div>';
    if ($type == 'ascj')
      echo sprintf('<input class="styled-checkbox type-select" id="type-%s" type="checkbox" value="%s" onclick="update();">', $type, $type);
    else
      echo sprintf('<input class="styled-checkbox type-select" id="type-%s" type="checkbox" value="%s" onclick="update();" checked>', $type, $type);
    echo sprintf('<label for="type-%s">%s</label>', $type, $type);
    echo '</div>';
  }
  echo '</div>';

  echo $journal_div;

  echo '<div class="yes"><p>Yes. I know the filter is working.</p></div>';
  echo '</div>';
  echo '<script src="/js/journals_filter.js"></script>';
} else {
  // journal
  echo '<div class="container" id="main">';
  require 'journal/php/Parsedown.php';
  $filename = 'journal/' . $_REQUEST['journal'] . '.md';
  $fp = @fopen($filename, "r");
  if ($fp == false) {
    echo "<h1 style='margin-bottom: 70vh'>This journal doesn't exist!</h1>";
  } else {
    $str = fread($fp, filesize($filename));
    $text = Parsedown::instance()->text($str);
    echo $text;
    fclose($fp);
  }
  echo '</div>';

  $xml = simplexml_load_file("journal/journals.xml") or die("Error: Cannot create object");
  $current = false;
  $next = '';
  $last = '';
  $next_name = '';
  $last_name = '';

  foreach ($xml->children() as $work) {
    if ($current) {
      $next = $work->file;
      $next_name = $work->title;
      break;
    } else if (strcmp($work->file, $_REQUEST['journal']) == 0) {
      $current = true;
    } else {
      $last = $work->file;
      $last_name = $work->title;
    }
  }

  if ($last != '') {
    echo sprintf('<a href="/journal/%s">', $last);
    echo '<div class="next-control">';
    echo '<div>';
    echo '<img src="/img/icon/arrow_right.svg">';
    echo '<p>' . $last_name . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
  }
  if ($next != '') {
    echo sprintf('<a href="/journal/%s">', $next);
    echo '<div class="prev-control">';
    echo '<div>';
    echo '<img src="/img/icon/arrow_left.svg">';
    echo '<p>' . $next_name . '</p>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
  }

}


// footer
$doc = new DOMDocument();
$doc->loadHTMLFile("pug/footer.htm");
echo $doc->saveHTML();
?>

<script src="/js/menu.js"></script>
<script>
$('#main h1').next().nextUntil('footer').wrapAll('<div class="inner-wrapper"></div>');
$('#main a').attr('target', '_blank');
$('#main img:not(.no-subtitle):not(.icon)').each(function () {
  $(this).parent().next().addClass('img-info');
});

// init horizontal_drag
(function () {
  document.querySelectorAll('.vertical-display').forEach((ele) => horizontal_drag(ele));
})();
</script>
</body>

</html>
