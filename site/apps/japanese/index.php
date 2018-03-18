<!DOCTYPE html>
<html lang="jp">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no">
  <title>Japanese Notes</title>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

</head>

<body>
  <script>
    $(function() {
      $("#notes").load("Japanese.htm");
    })
    var old = 1;

    function unit(u) {
      document.getElementById("unit-" + old).style.display = "none";
      document.getElementById("unit-" + u).style.display = "block";
      old = u;
    }

    $(document).ready(function() {
      document.getElementById("loading").style.display = "none";
    });

  </script>


  <header id="header" class="header header--fixed">
    <div class="btn-group first-btn" role="group" aria-label="Units">
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(0)">预备</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(1)">第一单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(2)">第二单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(3)">第三单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(4)">第四单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(5)">第五单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(6)">第六单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(7)">第七单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(8)">第八单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(9)">第九单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(10)">第十单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(11)">第十一单元</button>
      <button type="button" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off" onClick="unit(12)">第十二单元</button>
    </div>
    <div id="unit-0" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-0">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c1'">あ</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c2'">か</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c3'">さ</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c4'">た</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c5'">な</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c6'">は</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c7'">ま</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c8'">や</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c9'">ら</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c10'">わ</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c11'">が</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c12'">ざ</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c13'">ば</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c14'">长音</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c15'">促音</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c16'">拗音</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c17'">声调</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c18'">发音规则</button>
    </div>
    <div id="unit-1" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-1">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c19'">第1课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c20'">第1课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c21'">第2课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c22'">第2课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c23'">第3课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c24'">第3课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c25'">第4课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c26'">第4课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c27'">单元1复习</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c28'">练习单词</button>
    </div>
    <div id="unit-2" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-2">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c29'">第5课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c30'">第5课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c31'">第5课-3</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c32'">第6课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c33'">第6课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c34'">第7课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c35'">第7课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c36'">第8课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c37'">第8课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c38'">第8课-3</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c39'">单元2复习</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c40'">练习单词</button>
    </div>
    <div id="unit-3" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-3">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c41'">第9课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c42'">第9课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c43'">第10课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c44'">第10课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c45'">第11课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c46'">第11课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c47'">第12课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c48'">第12课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c49'">单元3复习</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c50'">错题</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c51'">练习单词</button>
    </div>
    <div id="unit-4" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-4">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c52'">第13课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c53'">第13课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c54'">第14课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c55'">第14课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c56'">第15课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c57'">第15课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c58'">第16课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c59'">第16课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c60'">单元4复习</button>
    </div>
    <div id="unit-5" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-5">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c61'">第17课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c62'">第17课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c63'">第18课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c64'">第18课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c65'">第19课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c66'">第19课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c67'">第20课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c68'">第20课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c69'">日本风俗 节假日</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c70'">单元5复习</button>
    </div>
    <div id="unit-6" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-6">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c71'">第21课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c72'">第21课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c73'">第22课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c74'">第22课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c75'">第23课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c76'">第23课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c77'">第24课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c78'">第24课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c79'">单元6复习</button>
    </div>
    <div id="unit-7" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-7">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c80'">第25课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c81'">第25课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c82'">第26课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c83'">第26课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c84'">第27课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c85'">第27课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c86'">第28课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c87'">第28课-2</button>
    </div>
    <div id="unit-8" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-8">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c88'">第29课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c89'">第29课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c90'">第30课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c91'">第30课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c92'">第31课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c93'">第31课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c94'">第32课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c95'">第32课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c96'">单元8复习</button>
    </div>
    <div id="unit-9" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-9">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c97'">第33课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c98'">第33课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c99'">第34课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c100'">第34课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c101'">第35课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c102'">第35课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c103'">第36课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c104'">第36课-2</button>
    </div>
    <div id="unit-10" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-10">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c105'">第37课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c106'">第37课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c107'">第38课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c108'">第38课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c109'">第39课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c110'">第39课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c111'">第40课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c111'">第40课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c113'">日本行政区划/复习</button>
    </div>
    <div id="unit-11" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-11">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c114'">第41课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c115'">第41课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c116'">第42课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c117'">第42课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c118'">第43课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c119'">第43课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c120'">第43课-3</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c121'">第44课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c122'">第44课-2</button>
    </div>
    <div id="unit-12" class="btn-group second-btn" role="group" style="display: none" aria-label="Units-12">
      <button type="button" class="btn btn-info" onClick="window.location.href='#c123'">第45课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c124'">第45课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c125'">第46课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c126'">第46课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c127'">第47课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c128'">第47课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c129'">第48课-1</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c130'">第48课-2</button>
      <button type="button" class="btn btn-info" onClick="window.location.href='#c131'">单元测试</button>
    </div>
  </header>
  <div class="title ">
    <div class="container">
      <h1>日本語のノート</h1>
      <p>Marsです</p>
    </div>
  </div>
  <div class="container">
    <div id="notes"></div>
    <p id="loading">加载中...</p>
  </div>
  <?php
    $doc = new DOMDocument();
  $doc->loadHTMLFile("../menu.htm");
  echo $doc->saveHTML();
  ?>
</body>

</html>
<script src="https://rawgithub.com/WickyNilliams/headroom.js/gh-pages/assets/scripts/main.js"></script>
<script src="index.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="normalize.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/css/bootstrap-material-design.min.css" integrity="sha384-k5bjxeyx3S5yJJNRD1eKUMdgxuvfisWKku5dwHQq9Q/Lz6H8CyL89KF52ICpX4cL" crossorigin="anonymous">
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/menu.css">
<link rel="stylesheet" href="index.css">
