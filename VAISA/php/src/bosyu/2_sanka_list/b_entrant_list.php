<?php
session_start();
$read_mem = 0;
$b_user_id = $_SESSION["b_user_id"];
$vol_id = $_POST["vol_id"];
$vol_id = 50;
$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');

$getName = $db->query("SELECT fullname, a.s_user_id FROM sanka_users a, sanka_situations b WHERE b.vol_id = $vol_id AND a.s_user_id = b.s_user_id");
$j = 0;
foreach ($getName as $get_name) {
  $user_name[$j] .= $get_name['fullname'];
  $user_id[$j] .= $get_name['s_user_id'];
  $j += 1;
}
$count = count($user_name);
?>
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
      <?php
      for ($i = 0; $i < $count; $i++) {
        $al_read = $db->query("SELECT read_flag FROM sanka_situations WHERE s_user_id = $user_id[$i]");
        foreach ($al_read as $come) {
          $read[$i] =  $come['read_flag'];
          if ($read[$i] == 1) {$read_mem += 1;}
        }
      }
      ?>
      <h1 align="center"><?php echo $vol_name; ?></h1>
      <h2 align="center">参加者人数　<?php echo $read_mem; ?>/<?php echo $count; ?></h2>
      <div align="center">
        <?php
        for ($i = 0; $i < $count; $i++) {
          $al_read = $db->query("SELECT read_flag FROM sanka_situations WHERE s_user_id = $user_id[$i]");
          foreach ($al_read as $come) {
            $read[$i] =  $come['read_flag'];
          }
          if ($read[$i] != 1) {
            echo "<form action='b_entrant_detail.php' method='post'>";
            echo "<input type='hidden' name='s_user_id' value=".$user_id[$i].">";
            echo "<button type='submit' class='button-vol'>" . $user_name[$i] . "</button>";
            echo "</form>";
            echo "<br>";
          } else {
            echo "<form action='b_entrant_detail.php' method='post'>";
            echo "<input type='hidden' name='s_user_id' value=".$user_id[$i].">";
            echo "<button type='submit' class='button-vol'><font color='red'><i class='fas fa-check'></i></font>　" . $user_name[$i] . "</button>";
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