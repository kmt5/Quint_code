<?php
  $user_id=$_POST['s_user_id'];
  $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db = new PDO($dsn, 'root', 'root');
  if(isset($_POST['reject'])){
    $rejfrid = $_POST['frdid'];
    $sth=$db->prepare("UPDATE friends SET reqest_flag = 0 WHERE my_user_id = '$rejfrid' and fr_user_id='$user_id' and reqest_flag = 1");
    $sth->execute();
  }
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>フレンド申請中ユーザ確認</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_add_appnow.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div id="header-fixed">
<img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="s_frd_add.php">
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
          <i class="fa fa-user-plus"></i>フレンド追加
        </div>
      </div>
<script>
  function reFrd(){
  return confirm("取消しますか？");
  }
</script>
<?php
// ポストのデータを変数に
//データベースに接続
    $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db = new PDO($dsn, 'root', 'root');
    $frid2 = "SELECT * FROM sanka_users WHERE s_user_id in (SELECT my_user_id FROM friends where fr_user_id ='$user_id' and reqest_flag = 1)";
    $result = $db->query($frid2);
    $count=0;
    foreach ($result as $row){
          echo '<div class="frd-appnow">';
          echo '<h1>';
          echo '<form method="post" name="form'.$count.'" action="s_frd_list_pro.php">';
          echo '<input type="hidden" name="now_user_id" value="'.$row['s_user_id'].'">';
          echo '<input type = "hidden" name="s_user_id" value="'.$user_id.'">';
          echo '<a href="javascript:form'.$count.'.submit()" style="color:black">';
          echo '<img src="../../'.$row['prof_path'].'" class="img">';
          echo $row['nickname'];
          echo '</a>';
          echo '</form>';

          echo '<form method="POST">';
          echo '<button type = "submit" name = "reject" id = "rejec" class="del" onclick="return reFrd()">取消</button>';
          echo '<input type = "hidden" name="s_user_id" value="'.$user_id.'">';
          echo '<input type = "hidden" name = "frdid" value ="'.$row['s_user_id'].'">';
          echo '</form>';
          echo '<br>';
          echo '</div>';
          $count++;
    }
    $db=null;
?>
    </div>
  </div>

</body>
</html>
