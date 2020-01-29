<?php
//データベースに接続(test3)
$b_user_id = $_POST["b_user_id"];
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');

if (isset($_FILES) && isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])) {
  if (!file_exists('../upload')) {
    mkdir('../upload');
  }
  $a = '../upload/' . basename($_FILES['image']['name']);
  $b = 'upload/' . basename($_FILES['image']['name']);
  if (move_uploaded_file($_FILES['image']['tmp_name'], $a)) {
    $msg = $a . 'のアップロードに成功しました';
  } else {
    $msg = 'アップロードに失敗しました';
  }
}

if (isset($msg) && $msg == true) {
  //echo '<p>' . $msg . '</p>';
}

//$h = apache_request_headers();
//var_dump($h["Content-Type"]);
?>
<?php
// 入力フォームのデータを変数に
$vol_name = $_POST["vol_name"];
$vol_date .= $_POST["year"] . "-" . $_POST["month"] . "-" . $_POST["day"];
$vol_beg_time = $_POST["beg_time"];
$vol_fin_time = $_POST["fin_time"];
$vol_capacity = $_POST["capacity"];
$post_num = $_POST["zip11"];
$vol_place = $_POST["addr11"];
$val_flag = $_POST["va_flag"];
$newbie_flag = $_POST["newbie_flag"];
$vol_detail = $_POST["detail"];
$pref_id = $_POST["select_pref"];
$spec_rank = $_POST["spec_rank"];

if ($spec_rank == null) {
    $spec_rank = '指定なし';
}
$area_id = $_POST["select_area"];
$num = $vol_fin_time - $vol_beg_time;
$point = strval($num);
$vol_fig_path = $b;

//データを登録する準備
$regist = $db->prepare("INSERT INTO volunteers(vol_id, vol_name, vol_date, vol_beg_time, vol_fin_time, vol_capacity, post_num, vol_place, val_flag, newbie_flag, vol_detail, pref_id, spec_rank, b_user_id, rank_spec_flag, area_id, point, vol_fig_path, disapp_flag) VALUES (:vol_id, :vol_name, :vol_date, :vol_beg_time, :vol_fin_time, :vol_capacity, :post_num, :vol_place, :val_flag, :newbie_flag, :vol_detail, :pref_id, :spec_rank, :b_user_id, :rank_spec_flag, :area_id, :point, :vol_fig_path, :disapp_flag)");
//値を格納します
$regist->bindValue(":vol_id", null, PDO::PARAM_INT);
$regist->bindParam(":vol_name", $vol_name, PDO::PARAM_STR);
$regist->bindValue(":vol_date", date('Y-m-d', strtotime($vol_date)), PDO::PARAM_STR);
$regist->bindValue(":vol_beg_time", date("H:i", strtotime($vol_beg_time)), PDO::PARAM_STR);
$regist->bindValue(":vol_fin_time", date("H:i", strtotime($vol_fin_time)), PDO::PARAM_STR);
$regist->bindValue(":vol_capacity", $vol_capacity, PDO::PARAM_INT);
$regist->bindParam(":post_num", $post_num, PDO::PARAM_STR);
$regist->bindParam(":vol_place", $vol_place, PDO::PARAM_STR);
$regist->bindValue(":val_flag", $val_flag, PDO::PARAM_INT);
$regist->bindValue(":newbie_flag", $newbie_flag, PDO::PARAM_INT);
$regist->bindParam(":vol_detail", $vol_detail, PDO::PARAM_STR);
$regist->bindParam(":pref_id", $pref_id, PDO::PARAM_STR);
$regist->bindParam(":spec_rank", $spec_rank, PDO::PARAM_STR);
$regist->bindParam(":b_user_id", $b_user_id, PDO::PARAM_STR);
$regist->bindValue(":rank_spec_flag", $rank_spec_flag, PDO::PARAM_INT);
$regist->bindValue(":area_id", $area_id, PDO::PARAM_INT);
$regist->bindValue(":point", $point, PDO::PARAM_INT);
$regist->bindParam(":vol_fig_path", $vol_fig_path, PDO::PARAM_STR);
$regist->bindValue(":disapp_flag", 0, PDO::PARAM_INT);

//実行
$regist->execute();
if ($regist) {
  //echo "登録完了!";
} else {
  //echo "エラーです！";
}
$db = null;
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>

<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>Sample</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/vol_regd.css">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formhome" action="../b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:formhome.submit()">
        <p id="home"><i class="fas fa-home"></i></p>
      </a>
    </form>
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        <i class="fas fa-edit"></i>　登録・編集
      </div>
      <div width="100%" class="new">
        <h1 align="center">
          <font color='#0cb06e'><i class="fas fa-check-circle fa-5x"></i></font>
        </h1>

        <h1 align="center">以下の内容で<br>登録が完了しました</h1>

        <h2 class="a">ボランティア名</h2>
        <?php echo $vol_name; ?>
        <br>
        <h2 class="a">ボランティアイメージ画像</h2>
        <?php if ($vol_fig_path == null) {
          echo "<br>登録されている写真はありません。";
        } else {
          echo "<img src=../" . $vol_fig_path . ">";
        } ?>
        <h2 class="a">都道府県　：<?php echo $pref_name; ?></h2>
        <h2 class="a">地域　　　：<?php echo $area_name; ?></h2>
        <h2 class="a">〒<?php echo $post_num; ?></h2>
        <div class="textarea">
        <?php echo $vol_place; ?>
        </div>
        <h2>開催日</h2>
        <?php echo $vol_date; ?>
        <br>
        <label>開始時間</label>
        <?php echo $vol_beg_time; ?>
        <br>
        <label>終了時間</label>
        <?php echo $vol_fin_time; ?>
        <h2>定員</h2>
        <?php echo $vol_capacity; ?>
        <?php if ($val_flag == 1) {
          echo "<p class='dezain'>報酬あり</p>";
        } else {
          echo "<p class='dezain'>報酬なし</p>";
        } ?>

        <?php if ($newbie_flag == 1) {
          echo "<p class='dezain'>初心者歓迎</p>";
        } else {
          echo "<p class='dezain'>経験者のみ</p>";
        } ?>

        <label>ランク指定　</label>
        <?php
          echo "<p class='dezain'>$spec_rank</p>";
        ?>
        <h2>詳細</h2>
        <div class="textarea">
        <?php echo $vol_detail; ?>
        </div>
        <br>
        <br>
        <form action='b_vol_regd_list.php' method='post'>
          <input type="hidden" name="b_user_id" value="<?= $b_user_id ?>">
          <button type="submit" align="center" id='list'>ボランティア一覧へ</button>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
