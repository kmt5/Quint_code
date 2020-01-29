<?php
session_start();
$read_mem = 0;
$b_user_id = $_POST["b_user_id"];
$vol_id = $_POST["vol_id"];
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
//echo $vol_id;
$getName = $db->query("SELECT fullname, a.s_user_id FROM sanka_users a, sanka_situations b WHERE b.vol_id = $vol_id AND a.s_user_id = b.s_user_id AND set_flag = 1");
$j = 0;
foreach ($getName as $get_name) {
  $s_user_name[$j] .= $get_name['fullname'];
  $s_user_id[$j] .= $get_name['s_user_id'];
  $j += 1;
}
if (!empty($s_user_name)) {
  $count = count($s_user_name);
} else {
  $count = 0;
}
$getName = $db->query("SELECT rank_spec_flag FROM options WHERE b_user_id = $b_user_id");
$j = 0;
foreach ($getName as $get_name) {
  $rank_spec_flag .= $get_name['rank_spec_flag'];
}
$getName = $db->query("SELECT vol_name FROM volunteers WHERE vol_id = $vol_id");
$j = 0;
foreach ($getName as $get_name) {
  $vol_name .= $get_name['vol_name'];
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
    <form method="post" name="formback" action="b_entrant_vol_list.php">
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
      <?php
      $read_mem = 0;
      for ($i = 0; $i < $count; $i++) {
        $al_read = $db->query("SELECT read_flag FROM sanka_situations WHERE s_user_id = $s_user_id[$i] AND set_flag = 1 AND vol_id = $vol_id");
        foreach ($al_read as $come) {
          $read[$i] =  $come['read_flag'];
          if ($read[$i] == 1) {
            $read_mem += 1;
          }
        }
      }
      ?>
      <h1 align="center"><?php echo $vol_name; ?></h1>
      <form action='./b_vol_detail.php' method='post'>
      <input type='hidden' name='vol_id' value=<?php echo $vol_id; ?>>
      <input type='hidden' name='b_user_id' value=<?php echo $b_user_id; ?>>
      <button type='submit' class='button-vol'>ボランティア詳細を見る</button>
      </form>
      <h2 align="center">参加者人数　<?php echo $read_mem; ?>/<?php echo $count; ?></h2>
      <div align="center">
        <?php
        for ($i = 0; $i < $count; $i++) {
          //echo $s_user_name[$i];
          //echo $s_user_id[$i];
          //echo "flag:".$read[$i];

          if ($read[$i] != 1) {
            echo "<form action='b_entrant_detail.php' method='post'>";
            echo "<input type='hidden' name='s_user_id' value=" . $s_user_id[$i] . ">";
            echo "<input type='hidden' name='b_user_id' value=" . $b_user_id . ">";
            echo "<input type='hidden' name='vol_id' value=" . $vol_id . ">";
            echo "<button type='submit' class='button-vol'>" . $s_user_name[$i] . "</button>";
            echo "</form>";
            echo "<br>";
          } else {
            echo "<form action='b_entrant_detail.php' method='post'>";
            echo "<input type='hidden' name='b_user_id' value=" . $b_user_id . ">";
            echo "<input type='hidden' name='s_user_id' value=" . $s_user_id[$i] . ">";
            echo "<input type='hidden' name='vol_id' value=" . $vol_id . ">";
            echo "<button type='submit' class='button-vol'><font color='red'><i class='fas fa-check'></i></font>　" . $s_user_name[$i] . "</button>";
            echo "</form>";
            echo "<br>";
          }
        }
        if ($count == 0) {
          echo "<h2>現在、参加登録者がいません<br></h2>";
          if ($rank_spec_flag == 0) {
            echo "<h3>オプションから検索上位表示を有効化すると、<br>参加者が増える可能性があります！<br>(※設定には別途料金が必要です)</h3>";
          }
        }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
<?php $db = null; ?>