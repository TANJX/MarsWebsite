<!DOCTYPE html>
<html lang="jp">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
  <title>Japanese Notes</title>
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
  <script src="lib/jquery-3.2.1.min.js"></script>
  <!-- <script src="lib/jquery-ui.min.js"></script> -->
  
  <link rel="stylesheet" href="lib/bootstrap-material-design.min.css">
  <link rel="stylesheet" href="css/github.css">
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <script>
    $(function(){
      var i = 1;
      $(".content h1").each(function() {
        $(this).wrap('<a name="lecture'+ i++ + '"></a>');
      });
      var i = 1;
      $(".content h2").each(function() {
        $(this).nextUntil("h2, h1").wrapAll('<div class="section"></div>');
        $(this).wrap('<a id="t'+ i 
          + '" class="fold open" onclick="fold(' + i++ + ')"></a>');
      });
    });

    function fold(i) {
      if($("#t" + i).is('.open')){
        // to close
        $("#t" + i).next(".section").css('display','none');
        $("#t" + i).removeClass("open");
        $("#t" + i).after('<p class="more">. . .</p>')
      } else {
        // to open
        $("#t" + i).next('.more').remove();
        $("#t" + i).next(".section").css('display','block');
        $("#t" + i).addClass("open");
      }
    };
    var menu = false;
    function menufold() {
      if(menu) {
        // close menu
        $('.side-menu').removeClass('menu-on');
        $('.menu-btn').removeClass('btn-on');
        $('.side-menu').addClass('menu-off');
        menu = false;
      } else {
        $('.menu-btn').addClass('btn-on');
        $('.side-menu').removeClass('menu-off');
        $('.side-menu').addClass('menu-on');
        menu = true;
      }
    };
  </script>
  <div class="head-menu">
    <div class="wrapper clearfix">
      <h1>日本語　中級</h1>
      <div class="menu-btn" onclick='menufold()'></div>
    </div>
  </div>

  <?php
  echo '<div class="side-menu menu-off">';
  echo '<div class="wrapper">';

  $xml = simplexml_load_file("notes/notes.xml") or die("Error: Cannot create object");
  $att = 'id';
  echo '<ul class="chapter">';
  $courses = array();
  $i = 1;
  foreach ($xml->children() as $chapter) {
    $chapterId = (string) ($chapter->attributes()->$att);
    echo '<li class="chapter-item"><a href="#lecture';
    echo $i;
    echo '">';
    echo $chapter->attributes()->name;
    echo '</a>';
    echo '<ul class="class">';
    foreach ($chapter as $class) {
      $classId = (string)$class->attributes()->$att;
      echo '<li class="class-item"><a href="#lecture';
      echo $i;
      echo '">';
      echo $class->attributes()->name;
      echo '</a>';
      echo '<ul class="lecture">';
      foreach ($class as $lecture) {
        $lectureId = (string)$lecture->attributes()->$att;
        $filename = 'notes/';
        $filename .= $chapterId;
        $filename .= '-';
        $filename .= $classId;
        $filename .= '-';
        $filename .= $lectureId;
        $filename .= '.md';
        $courses [] = $filename;
        echo '<li class="lecture-item"><a href="#lecture';
        echo $i++;
        echo '">';
        echo $lecture->name;
        echo '</a>';
      }
    echo '</ul>';
    }
    echo '</ul>';
  }
  echo '</ul>';
        
  echo '</div>';
  echo '</div>';
  echo '<div class="content">';
  echo '<div class="container">';

  //include 'Parsedown.php';
  include 'NoteExtension.php';

	function readChapter($filename) {
    $fp = fopen($filename,"r");
    $str = fread($fp,filesize($filename));
    echo NoteExtension::instance()->text($str); 
    fclose($fp);
  }
  foreach ($courses as $course) {
    echo '<div class="lecture">';
    readChapter($course);
    echo "</div>";
  }

?>
    </div>
  </div>


</body>

</html>
