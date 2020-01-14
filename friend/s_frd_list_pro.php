<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title></title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_list.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_list_pro.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
    <?php $motourl = $_SERVER['HTTP_REFERER'];
    echo '<a href= "'.$motourl.'">'; //前ページ遷移
    ?>
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
    <a href= "s_home.html">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
    </a>
  </div>

  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        フレンド
        <div id="Toptitle-frd">
          <i class="far fa-list-alt"></i>フレンド一覧
        </div>
      </div>
<?php
      // ポストのデータを変数に
    $name = $_POST["username"];
    $age = $_POST["age"];
//データベースに接続(test3)
    $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
    $db = new PDO($dsn, 'root', 'root');
    $id = $_GET['id'];//選択したフレンドのID取得
    $usi = "SELECT * FROM sanka_users WHERE s_user_id = '$id'"; //idは文字型で送られてくるのでクォーテーション
    $result = $db->query($usi);
    $result1 = $db->query($usi);//先にプロフ画像パスを取得
    foreach ($result1 as $pass){
    $url=$pass['prof_path'];
    $img = file_get_contents($url);
    $enc_img = base64_encode($img);
    $imginfo = getimagesize('data:application/octet-stream;base64,' . $enc_img);
    }
    foreach ($result as $row) {
      echo '<div class="frd-pro">';
      echo '<img src="data:' . $imginfo['mime'] . ';base64,'.$enc_img.'" class="img">';
      echo '<p class="name">'.$row['nickname'].'</p>';
      echo '<p class="rank">'.$row['rank'].'</p>';
    }
?>

        <center>
        <p class="vol">Myボランティアリスト</p>
        </center>
        <ul>
<?php
    $myv = "SELECT vol_name FROM volunteers WHERE vol_id in (SELECT vol_id FROM sanka_situations WHERE s_user_id = '$id' and set_flag = 1)";
    $result2 = $db->query($myv);
    foreach ($result2 as $row){
      echo '<li>'.$row['vol_name'].'</li>';
    }
?>
        </ul>
        <p class="text">ひとこと</p>
        <p class="message">
<?php
   $usm = "SELECT * FROM sanka_users WHERE s_user_id = '$id'"; //idは文字型で送られてくるのでクォーテーション
   $result2 = $db->query($usm);
   echo 'ここはID番号'.$id.'のページです。'.'<br>';
foreach ($result2 as $row2) {
echo $row2['message'];
}
?>
        </p>

      </div>
    </div>
  </div>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
