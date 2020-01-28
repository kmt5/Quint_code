<?php
  $user_id=$_POST['s_user_id'];
  $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db = new PDO($dsn, 'root', 'root');
  if(isset($_POST['admin'])){
    $admrid= $_POST['adm'];
    $sth=$db->prepare("UPDATE friends SET friend_flag = 1, reqest_flag = 0 WHERE my_user_id = '$user_id' and fr_user_id='$admrid' and reqest_flag = 1");
    $sth->execute();
    $flg="SELECT * FROM friends WHERE my_user_id = '$admrid' and fr_user_id = '$user_id'";
    $check = $db->query($flg);
    $check2=$check->fetchAll();
    if($check2 == Array()){
    $sth2=$db->prepare("INSERT INTO friends VALUE ('$admrid','$user_id',0,1)");
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
<form method="post" name="back" action="s_frd_first.php">
<input type="hidden" name="s_user_id" value="<?php echo $user_id;?>"/>
<button type="submit">
        <p id="back"><i class="fas fa-reply"></i></p>
      </button>
</form>
<form method="post" name="home" action="../s_home.php">
<input type="hidden" name="s_user_id" value="<?php echo $user_id;?>"/>
<button type="submit">
        <p id="home"><i class="fas fa-home"></i></p>
</button>
</form>
</div>


  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        フレンド
        <div id="Toptitle-frd">
          <i class="fas fa-users"></i>フレンド申請確認
        </div>
      </div>
      <div id="tabbody">
<?php
 $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
 $db = new PDO($dsn, 'root', 'root');
 $frid3 = "SELECT * FROM sanka_users WHERE s_user_id in (SELECT fr_user_id FROM friends where my_user_id ='$user_id' and reqest_flag = 1)";
 $result = $db->query($frid3);
 $count=0;
 foreach ($result as $row) {
      echo '<div class="frd-appcheck">';
      echo '<h1>';
      echo '<form method="post" name="form'.$count.'" action="s_frd_list_pro.php">';
      echo '<input type="hidden" name="check_user_id" value="'.$row['s_user_id'].'">';
      echo '<input type = "hidden" name="s_user_id" value="'.$user_id.'">';
      echo '<a href="javascript:form'.$count.'.submit()" style="color:black">';
      echo  '<img src="../../prof/'.$row['prof_path'].'" class="img">';
      echo $row['nickname'];
      echo '</a>';
      echo '</form>';

      $count++;

      echo '<div class="btn">';
      echo '<form method = "POST" id="app">';
      echo '<button type = "submit" name = "admin" id = "admn" class="ok" onclick="adMin()">承認</button>';
      echo '<input type = "hidden" name="s_user_id" value="'.$user_id.'">';
      echo '<input type = "hidden" name = "adm" value="'.$row['s_user_id'].'">';
      echo '</form>';
      echo '<br><br><br>';
      echo '<form method = "POST" id="ap">';
      echo '<button type = "submit" name = "disap" id = "disa" class="no" onclick="disAp()">拒否</button>';
      echo '<input type = "hidden" name="s_user_id" value="'.$user_id.'">';
      echo '<input type = "hidden" name = "dis" value="'.$row['s_user_id'].'">';
      echo '</form>';
      echo '</div>';
      echo '</div>';
 }
 $db=null;
 ?>
    </div>
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

</body>
</html>
