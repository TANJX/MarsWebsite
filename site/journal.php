<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Journal | Mars Inc.</title>
  <base href="http://marstanjx.com/">
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
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/sub.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/journal.css">
  <script src='js/lib/jquery.min.js'></script>
</head>

<body>
<?php
$doc = new DOMDocument();
$doc->loadHTMLFile("nav.htm");
echo $doc->saveHTML();
?>

<div class="container" id="main">
  <?php
  if ($_REQUEST['journal'] == '') {
    echo '<script>window.location.replace("/journal/2018-9")</script>';
  } else {
    require 'journal/php/Parsedown.php';
    $filename = 'journal/' . $_REQUEST['journal'] . '.md';
    $fp = @fopen($filename, "r");
    if ($fp == false) {
      echo "<h1>This journal doesn't exist!</h1>";

    } else {
      $str = fread($fp, filesize($filename));
      $text = Parsedown::instance()->text($str);
      echo $text;
      fclose($fp);
    }
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
    $('#main h1').next().nextUntil('footer').wrapAll('<div class="inner-wrapper"></div>');
    $('#main a').attr('target', '_blank');
    $('#main img:not(.icon)').each(function () {
        $(this).parent().next().addClass('img-info');
    });
</script>
</body>

</html>
