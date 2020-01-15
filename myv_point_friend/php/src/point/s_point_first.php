<?php
//現在時刻とポイントの取得、次ランクまでのポイントの設定
session_start();
if(!isset($_SESSION['nowpoint'])){
  $_SESSION['nowpoint']=0;
  $_SESSION['nowtime']=date("Y/m/d H:i");
  $_SESSION['lesspoint']=51;
}
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>ポイント・ランク</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/point.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    <img border="0" src="home.jpg" width="20%" height="100%" class="home">
  </div>
  <div id = "body-bk">
    <div id = "body">
      <div id ="Toptitle1">
        ポイント・ランク
      </div>

<?php
      // ポストのデータを変数に
    $name = $_POST["username"];
    $age = $_POST["age"];
//データベースに接続(test3)
    $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
    $db = new PDO($dsn, 'root', 'root');
    $volid = "SELECT * FROM sanka_users WHERE s_user_id = '1234567a'"; //参加ユーザテーブルからユーザIDの一致するカラム全てを取得
    $result = $db->query($volid);
    if (!$result) {
      die('クエリが失敗'); // これが本当の「クエリが失敗」であって，最初のものは「接続が失敗」なのでエラーメッセージが不適切
    }
 foreach ($result as $row) {
      echo '<div class ="point"><!--ポイント部分の実装-->';
      echo '<h1>';
      echo '総ポイント';
      echo '<br>';
      echo '<h2>';
      echo '<i class="fas fa-coins fa-4x"></i>'; //ポイントイメージ図
      echo '<br>';
      echo '<h3>';
      echo $row['point'].'P';
      echo '<br>';
      //ポイントに前回と変更がなければそのまま前回の更新時間を表示
     if($_SESSION['nowpoint'] == $row['point']){
      echo '<h4>';
      echo '更新日時:'.$_SESSION['nowtime'];
     }
     //変更があった場合はセッション値を現在のポイントと時刻に変更し出力、次回以降に反映
     else{
      $_SESSION['nowpoint'] = $row['point'];
      $_SESSION['nowtime'] = date("Y/m/d H:i");
      echo '<h4>';
      echo '更新日時:'.$_SESSION['nowtime'];
      }
      echo '<br>';
      echo '</div>';
 }
?>

<?php
      // ポストのデータを変数に
    $name = $_POST["username"];
    $age = $_POST["age"];
//データベースに接続(test3)
    $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
    $db = new PDO($dsn, 'root', 'root');
    $volid = "SELECT * FROM sanka_users WHERE s_user_id = '1234567a'";
    $result = $db->query($volid);
    if (!$result) {
      die('クエリが失敗'); // これが本当の「クエリが失敗」であって，最初のものは「接続が失敗」なのでエラーメッセージが不適切
    }
    if($_SESSION['nowpoint'] <= 50){$_SESSION['lesspoint']=51-$_SESSION['nowpoint'];} 
    elseif($_SESSION['nowpoint'] >= 51 && $_SESSION['nowpoint'] <= 100) $_SESSION['lesspoint']=101-$_SESSION['nowpoint']; //シルバーランクの次ランクまでのポイント計算
    elseif($_SESSION['nowpoint'] >= 101 && $_SESSION['nowpoint'] <= 200) $_SESSION['lesspoint']=201-$_SESSION['nowpoint']; //ゴールドランクの次ランクまでのポイント計算
    else $_SESSION['lesspoint']=0; //プラチナランクの場合は0へ

    foreach ($result as $row) {
      echo '<div class ="rank">';
      echo '<h1>';
      echo 'ランク';
      echo '<br>';
      echo '<h2>';
      //ランク名がブロンズの時は銅色のトロフィーへ
      if($row['rank'] == 'ブロンズ'){
      echo '<i class="fas fa-trophy fa-4x"; style="color:#C47022"></i>';
      }
      //ランク名がシルバーの時は銀色のトロフィーへ
      elseif($row['rank'] == 'シルバー'){
      echo '<i class="fas fa-trophy fa-4x"; style="color:silver"></i>';
      }
      //ランク名がゴールドの時は金色のトロフィーへ
      elseif($row['rank'] == 'ゴールド'){
      echo '<i class="fas fa-trophy fa-4x"; style="color:gold"></i>';
      }
      //ランク名が3種類以外の時はプラチナ色のトロフィーへ
      else{
      echo '<i class="fas fa-trophy fa-4x"; style="color:rgb(176, 205, 230)"></i>';
      }
      echo '<br>';
      echo '<h3>';
      echo $row['rank'];
      echo '<br>';
      //次ランクまでのポイント計算だが、201異常はプラチナのままなので上限通知
      if($_SESSION['nowpoint'] >= 201){
      echo '<h4>';
      echo 'ランク上限に達しています';
      }
      //次ランクまでのポイントを計算したものを表示
      else{
      echo '<h4>';
      echo '次のランクまで '.$_SESSION['lesspoint'].'P';
      }
      echo '<br>';
      echo '</div>';
      }
  ?>
      <center>
        <a href="s_point_detail.php" class="btn-point"><h2>ポイント明細</a>
      </center>
    </div>
  </div>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
