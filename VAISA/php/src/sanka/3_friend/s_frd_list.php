<?php
  $user_id='1234567a';
  $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db = new PDO($dsn, 'root', 'root');
  if(isset($_POST['remove'])){
    $remfrid= $_POST['iid'];
    $sth=$db->prepare("UPDATE friends SET friend_flag = 0 WHERE my_user_id = '$user_id' and fr_user_id='$remfrid'");
    $sth->execute();
    $sth=$db->prepare("UPDATE friends SET friend_flag = 0 WHERE fr_user_id = '$user_id' and my_user_id='$remfrid'");
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
  <link rel="stylesheet" type="text/css" href="./CSS/frd_list.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div>
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
          <i class="far fa-list-alt"></i>フレンド一覧
        </div>
      </div>
<script>
  function remFrd(){
  return confirm("削除しますか？");
  }
</script>
<!-- php--------------------------------- -->
<?php
      // ポストのデータを変数に
    $name = $_POST["username"];
    $age = $_POST["age"];
//データベースに接続(test3)
    $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db = new PDO($dsn, 'root', 'root');
    $frid = "SELECT * FROM sanka_users WHERE s_user_id in (SELECT fr_user_id FROM friends where my_user_id ='$user_id' and friend_flag = 1)";
    $result = $db->query($frid);
    $count=0;
foreach ($result as $row) {
      echo '<div class="frd-list">';
      echo '<h1>';
      echo '<a href="s_frd_list_pro.php?id='.$row['s_user_id'].'">';
      echo  '<img src="../prof/'.$row['prof_path'].'" class="img">';
      echo $row['nickname'];
      echo '</a>';
      echo '<form method="POST">';
      echo '<button type = "submit" name="remove" id = "remov" class="del" onclick="return remFrd()">削除</button>';
      echo '<input type = "hidden" name ="iid" value ="'.$row['s_user_id'].'">';
      echo '</form>';
      echo '<br>';
      echo '</div>';
}
$db=null;
?>
    </div>
  </div>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
