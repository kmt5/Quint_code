<?php
  $user_id=$_POST['s_user_id'];
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
<div id="header-fixed">
<img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="s_frd_first.php">
      <input type="hidden" name="s_user_id" value="<?php echo $user_id; ?>" />
      <a href="javascript:formback.submit()">
        <p id="back"><i class="fas fa-reply"></i></p>
      </a>
    </form>
    <form method="post" name="formhome" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $user_id; ?>" />
      <a href="javascript:formhome.submit()">
        <p id="home"><i class="fas fa-home"></i></p>
      </a>
    </form>
</div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        フレンド
        <div id="Toptitle-frd">
          <i class="far fa-list-alt"></i>
          フレンド一覧
        </div>
      </div>

<div id="tabbody">
<script>
  function remFrd(){
  return confirm("削除しますか？");
  }
</script>
<!-- php--------------------------------- -->
<?php
//データベースに接続(test3)
    $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db = new PDO($dsn, 'root', 'root');
    $frid = "SELECT * FROM sanka_users WHERE s_user_id in (SELECT fr_user_id FROM friends where my_user_id ='$user_id' and friend_flag = 1)";
    $result = $db->query($frid);
    $count=0;
foreach ($result as $row) {
      echo '<div class="frd-list">';
      echo '<h1>';
      echo '<form method="post" name="form'.$count.'" action="s_frd_list_pro.php">';
      echo '<input type="hidden" name="whos_user_id" value="'.$row['s_user_id'].'">';
      echo '<input type = "hidden" name="s_user_id" value="'.$user_id.'">';
      echo '<a href="javascript:form'.$count.'.submit()" style="color:black">';
      echo  '<img src="../../'.$row['prof_path'].'" class="img">';
      echo $row['nickname'];
      echo '</a>';
      echo '</form>';

      echo '<form method="POST">';
      echo '<button type = "submit" name="remove" id = "remov" class="del" onclick="return remFrd()">削除</button>';
      echo '<input type = "hidden" name="s_user_id" value="'.$user_id.'">';
      echo '<input type = "hidden" name ="iid" value ="'.$row['s_user_id'].'">';
      echo '</form>';
      echo '<br>';
      echo '</div>';
      $count++;
}
$db=null;
?>
    </div>
    </div>
    </div>
</body>
</html>
