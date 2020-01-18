<?php /*
session_start();
$b_user_id = $_SESSION["b_user_id"];

$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');

$getName = $db -> query("SELECT vol_name FROM volunteers WHERE b_user_id = $b_user_id");
$j = 0;
foreach ($getName as $get_name) {
  $vol_name[$j] .= $get_name['vol_name'];
  $j += 1;
}
$count = $db -> query("SELECT COUNT(vol_name) FROM volunteers WHERE b_user_id = $b_user_id");
*/?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>参加者一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../common/common.css">
  <link rel="stylesheet" type="text/css" href="entrant.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../common/header.jpg" width="100%" height="100%">
    <a href="javascript:history.back()">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
    <a href="b_home">
      <p id="home"><i class="fas fa-home"></i></p>
    </a>
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        <i class="fas fa-handshake"></i>　参加者一覧
      </div>
      <h1 align="center">vol_name</h1>
      <h2 align="center">参加者人数　2/5</h2>
      <div align="center">
        <?php
            $array_count = count($vol_name);
            for ($i = 0; $i < $array_count; $i++) {
              if ($i != 2){
              echo "<form action='b_entrant_detail.html' method='post'>";
              echo "<button type='submit' class='button-vol'>".$vol_name[$i]."</button>";
              echo "</form>";
              echo "<br>";
            } else {
              echo "<form action='b_entrant_detail.html' method='post'>";
              echo "<button type='submit' class='button-vol'><font color='red'><i class='fas fa-check'></i></font>　".$vol_name[$i]."</button>";
              echo "</form>";
              echo "<br>";
            }
          }
          ?>
      </div>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
