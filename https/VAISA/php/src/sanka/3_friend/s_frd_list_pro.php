<?php
$user_id=$_POST['s_user_id'];
if(isset($_POST['whos_user_id'])){
$id = $_POST['whos_user_id'];//選択したフレンドのID取得
}
elseif(isset($_POST['now_user_id'])){
$id = $_POST['now_user_id'];//選択したフレンドのID取得
}
elseif(isset($_POST['check_user_id'])){
$id = $_POST['check_user_id'];
}
else{$id=null;}
?>

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
      <?php
      if(isset($_POST['whos_user_id'])){
      echo '<form method="post" name="back" action="s_frd_list.php">';
      }
      elseif(isset($_POST['now_user_id'])){
      echo '<form method="post" name="back" action="s_frd_add_appnow.php">';
      }
      elseif(isset($_POST['check_user_id'])){
      echo '<form method="post" name="back" action="s_frd_appcheck.php">';
      }
      else{
      echo '<form method="post" name="back" action="s_home.php">';
      }
      ?>
      <input type="hidden" name="s_user_id" value="<?php echo $user_id; ?>" />
      <a href="javascript:back.submit()">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
      </a>
      </form>
      <form method="post" name="home" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $user_id; ?>" />
      <a href="javascript:home.submit()">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
      </a>
      </form>
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
//データベースに接続(test3)
    $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db = new PDO($dsn, 'root', 'root');
    $usi = "SELECT * FROM sanka_users WHERE s_user_id = '$id'"; //idは文字型で送られてくるのでクォーテーション
    $result = $db->query($usi);
    foreach ($result as $row) {
      echo '<div class="frd-pro">';
      echo  '<img src="../prof/'.$row['prof_path'].'" class="img">';
      echo '<p class="name">'.$row['nickname'].'</p>';
      if ($row['rank'] == 'ブロンズ'){
        echo '<p class="rank" style="color:#C47022">'.$row['rank'].'</p>';
      }
      elseif($row['rank'] == 'シルバー'){
        echo '<p class="rank" style="color:silver">'.$row['rank'].'</p>';
      }
      elseif($row['rank'] == 'ゴールド'){
        echo '<p class="rank" style="color:gold">'.$row['rank'].'</p>';
      }
      else{
        echo '<p class="rank" style="color:rgb(176, 205, 230)">'.$row['rank'].'</p>';
      }
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
$db=null;
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
