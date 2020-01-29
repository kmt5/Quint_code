<?php
session_start();
$b_user_id = $_SESSION["b_user_id"];
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');

$getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE b_user_id = $b_user_id AND disapp_flag = 0");
$j = 0;
foreach ($getName as $get_name) {
  $vol_id[$j] .= $get_name["vol_id"];
  $vol_name[$j] .= $get_name['vol_name'];
  $j += 1;
}
if (!empty($vol_name)) {
  $getName = $db->query("SELECT COUNT(vol_name) AS count FROM volunteers WHERE b_user_id = $b_user_id AND disapp_flag = 0");
  foreach ($getName as $get_name) {
    $count = $get_name["count"];
  }
} else {
  $count = 0;
  $message = "<h2>ボランティアがありません<br>登録・編集から登録してください</h2>";
}
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>

<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>参加者一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link rel="stylesheet" type="text/css" href="entrant.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="b_entrant_login.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:formback.submit()">
        <p id="back"><i class="fas fa-reply"></i></p>
      </a>
    </form>
    <form method="post" name="formhome" action="../b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:formhome.submit()">
        <p id="home"><i class="fas fa-home"></i></p>
      </a>
    </form>
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        <i class="fas fa-handshake"></i>　参加者一覧
      </div>
      <h1 align="center">ボランティアを<br>選択してください</h1>
      <div align="center">
        <?php
        echo $message;
        echo $count;
        for ($i = 0; $i < $count; $i++) {
          echo "<form action='b_entrant_list.php' method='post'>";
          echo "<input type='hidden' name='vol_id' value=" . $vol_id[$i] . ">";
          echo "<input type='hidden' name='b_user_id' value=" . $b_user_id . ">";
          echo "<button type='submit' class='button-vol'>" . $vol_name[$i] . "</button>";
          echo "</form>";
          echo "<br>";
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>
<?php $db = null; ?>