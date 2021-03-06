<?php
session_start();
$b_user_id = $_POST["b_user_id"];
$_SESSION["b_user_id"] = $b_user_id;

$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
$db->query("set names utf8");

$getName = $db->query("SELECT rank_spec_flag FROM options WHERE b_user_id = $b_user_id");
foreach ($getName as $get_name) {
  $shounin = $get_name['rank_spec_flag'];
}

//echo "shounin:" . $shounin;

if (isset($_POST['rank'])) {
  //echo "session:" . $_SESSION['rank'];
  if ($_SESSION['rank'] == 1) {
    $db->query("UPDATE options SET rank_spec_apply_flag = 1 WHERE b_user_id = $b_user_id");
  } else {
    $db->query("UPDATE options SET rank_spec_apply_flag = 0 WHERE b_user_id = $b_user_id");
  }
}
$getName = $db->query("SELECT rank_spec_apply_flag FROM options WHERE b_user_id = $b_user_id");
foreach ($getName as $get_name) {
  $rank_flag = $get_name['rank_spec_apply_flag'];
}
//echo "rank_flag:" . $rank_flag;
$db = null;
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>

<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>検索上位表示</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="option.css">
</head>

<body>
  <div id="header-fixed">
    <!-- ヘッダー箇所 -->
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="b_option.php">
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
      <!-- ページ上部のタイトル部分 -->
      <div id="Toptitle2">
        <i class="fab fa-searchengin"></i>ランク指定
      </div>
      <div class="setumei">
        ボランティア情報検索の際に<br>
        募集する参加者のランクを<br>
        指定可能にするオプションです
      </div>

      <div class="zyokyo">
        <p id="status">利用状況：　無効</p>
      </div>
      <div class="b">
        月額200円（税別）
        <br>

        <!-- onclickでjsのtest関数を呼び出す -->
        <?php
        if ($rank_flag == 0 || $rank_flag == null) {
          $_SESSION['rank'] = 1;
          echo "<form action='b_rank_spec.php' method='post' onSubmit='return check()'>";
          echo "<input type='hidden' name='b_user_id' value=" . $b_user_id . ">";
          echo "<button type='submit' name='rank' id='banner'>登録する</button>";
          echo "</form>";
        } else {
          $_SESSION['rank'] = 0;
          echo "<form action='b_rank_spec.php' method='post' onSubmit='return check1()'>";
          echo "<input type='hidden' name='b_user_id' value=" . $b_user_id . ">";
          echo "<button type='submit' name='rank' id='banner'>登録を解除する</button>";
          echo "</form>";
        }
        ?>
        <!--
        <form action='' method="post" onSubmit="return check()">
          <button type="submit" id="banner" onclick="postForm()">登録をする</button>
        </form> -->
      </div>
      <?php
      $b_user_id = $_POST["b_user_id"];
      $value = $rank_flag;

      printf('<script>var value = %s;
      var elm = document.getElementById("status");

      if ( value == true){
        elm.textContent = "利用状況：　利用申請中";
      }
      </script>', $value);

      //追加か所
      if ($shounin == 1 && $rank_flag == 1) {
        printf('<script>
                  var elm = document.getElementById("status");
                  elm.textContent = "利用状況：利用可能";
                  </script>');
      }
      ?>
      <script>
        function check() {
          if (window.confirm('登録してしてよろしいですか？')) { // 確認ダイアログを表示
            window.alert('登録が完了しました');
            return true; // 「OK」時は送信を実行
          } else { // 「キャンセル」時の処理
            window.alert('キャンセルされました'); // 警告ダイアログを表示
            return false; // 送信を中止
          }
        }

        function check1() { // 解除するとき
          if (window.confirm('登録を解除してしてよろしいですか？')) { // 確認ダイアログを表示
            window.alert('登録が解除されました');
            return true; // 「OK」時は送信を実行
          } else { // 「キャンセル」時の処理
            window.alert('キャンセルされました'); // 警告ダイアログを表示
            return false; // 送信を中止
          }
        }
      </script>
    </div>
    <div id="footer-fixed">
      <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
    </div>
</body>

</html>