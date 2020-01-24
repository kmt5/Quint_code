<?php
  $user_id='1234567a';
  $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db = new PDO($dsn, 'root', 'root');
  if(isset($_POST['admin'])){
    $admrid= $_POST['adm'];
    $sth=$db->prepare("UPDATE friends SET friend_flag = 1, reqest_flag = 0 WHERE my_user_id = '$user_id' and fr_user_id='$admrid' and reqest_flag = 1");
    $sth->execute();
    $flg="SELECT * FROM friends WHERE my_user_id = '$admrid' and fr_user_id = '$user_id'";
    $check = $db->query($flg);
    if($check == Array()){
    $sth2=$db->prepare("INSERT INTO friends VALUE ('$admfrid','$user_id',0,1)");
    $sth2->execute();
  }else{
    $sth2=$db->prepare("UPDATE friends SET friend_flag= 1, reqest_flag = 0 WHERE my_user_id = '$admrid' and fr_user_id='$user_id'");
    $sth2->execute();
  }
  }
  if(isset($_POST['disap'])){
    $remfrid= $_POST['dis'];
    $sth=$db->prepare("UPDATE friends SET reqest_flag = 0 WHERE my_user_id = '$user_id' and fr_user_id='$remfrid'");
    $sth->execute();
  }
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>フレンド一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_appcheck.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
    <a href= "s_frd_first.php">
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
          <i class="far fa-list-alt"></i>フレンド申請確認
        </div>
      </div>
<?php
 $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
 $db = new PDO($dsn, 'root', 'root');
 $frid3 = "SELECT * FROM sanka_users WHERE s_user_id in (SELECT fr_user_id FROM friends where my_user_id ='$user_id' and reqest_flag = 1)";
 $result = $db->query($frid3);
 foreach ($result as $row) {
      echo '<div class="frd-appcheck">';
      echo '<h1>';
      echo '<a href="s_frd_list_pro.php?id='.$row['s_user_id'].'">';
      echo  '<img src="../prof/'.$row['prof_path'].'" class="img">';
      echo $row['nickname'];
      echo '</a>';
      echo '<div class="btn">';
      echo '<form method = "POST" id="app">';
      echo '<button type = "submit" name = "admin" id = "admn" class="ok" onclick="adMin()">承認</button>';
      echo '<input type = "hidden" name = "adm" value="'.$row['s_user_id'].'">';
      echo '</form>';
      echo '<br><br><br>';
      echo '<form method = "POST" id="ap">';
      echo '<button type = "submit" name = "disap" id = "disa" class="no" onclick="disAp()">拒否</button>';
      echo '<input type = "hidden" name = "dis" value="'.$row['s_user_id'].'">';
      echo '</form>';
      echo '</div>';
      echo '</div>';
 }
 $db=null;
 ?>
    </div>
  </div>

<script>
function adMin(){
var result=window.alert("承認しました!!");
}
function disAp(){
var result=window.alert("拒否しました");
}
</script>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
