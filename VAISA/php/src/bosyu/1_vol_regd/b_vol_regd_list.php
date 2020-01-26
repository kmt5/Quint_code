<?php session_start();
//データベースに接続(test3)
//$id = $_POST["b_user_id"];
$b_user_id = $_SESSION["b_user_id"];
echo $b_user_id;
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
//接続確認
if ($db) {
  echo "データベースに繋がっています";
} else {
  "データベースに繋がってないです";
}

$db->query("set names utf8");
$getVolName = $db->query("SELECT vol_name FROM volunteers WHERE b_user_id = $b_user_id AND disapp_flag = 0");
$i = 0;
foreach ($getVolName as $volname) {
  $vol_name[$i] .= $volname['vol_name'];
  $i += 1;
}
$getCount = $db->query("SELECT COUNT(vol_name) AS num FROM volunteers WHERE b_user_id = $b_user_id AND disapp_flag = 0");
foreach ($getCount as $get_count) {
  $count = $get_count['num'];
}
$php_vol_name = json_encode($vol_name);

$getVolId = $db->query("SELECT vol_id FROM volunteers WHERE b_user_id = $b_user_id AND disapp_flag = 0");
$j = 0;
foreach ($getVolId as $volid) {
  $vol_id_html[$j] .= $volid['vol_id'];
  $j += 1;
}
$db = null;
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>Sample</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./CSS/vol_regd.css">
</head>

<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <a href="b_vol_regd.php">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
    <a href="../b_home.php">
      <p id="home"><i class="fas fa-home"></i></p>
    </a>
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        <i class="fas fa-pencil-alt"></i>登録・編集
      </div>
    <!--  <table border='1' frame="box" rules="none"> -->
          <?php
            for ($i = 0; $i < $count; $i++) {
              $vol_id = $vol_id_html[$i];
              echo "<div class='vollist'>";
              echo "<p>".$vol_name[$i]."</p>";
              echo "<form action='vol_regd_edit.php' method='post'>";
              echo "<input type='hidden' name='b_user_id' value=".$b_user_id.">";
              echo "<input type='hidden' name='vol_id' value=".$vol_id.">";
              echo "<button type='submit' align='center' id='listbutton'><i class='fas fa-edit'></i>　編集</button>";
              echo "</form>";
              echo "<form action='b_vol_regd_delete.php' method='post'>";
              echo "<input type='hidden' name='b_user_id' value=".$b_user_id.">";
              echo "<input type='hidden' name='vol_id' value=".$vol_id.">";
              echo "<button type='submit' align='center' id='listbutton'><i class='fas fa-trash'></i>　削除</button>";
              echo "</form>";
              echo "</div>";
          /*
              echo "<form action='b_vol_regd_delete.php' method='post'>";
              echo "<input type='hidden' name='b_user_id' value=".$b_user_id.">";
              echo "<input type='hidden' name='vol_id' value=".$vol_id.">";
              echo "<input type='submit' value='削除'>";
              echo "</form>";
              echo "</td>";
              echo "</tr>"; */
            }
          ?>
      </table>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>

</html>
