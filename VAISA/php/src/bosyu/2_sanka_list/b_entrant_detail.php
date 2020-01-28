<?php
//データベースに接続(test3)
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
?>
<?php
$b_user_id = $_POST["b_user_id"];
$id = $_POST['s_user_id'];
$db->query("set names utf8");
$getInfo = $db->query("SELECT nickname, fullname, mail_address, user_address, tel_num, gender, prof_path FROM sanka_users WHERE s_user_id = $id");
foreach ($getInfo as $get_info) {
    $nickname = $get_info['nickname'];
    $fullname = $get_info['fullname'];
    $mail_address = $get_info['mail_address'];
    $user_address = $get_info['user_address'];
    $tel_num = $get_info['tel_num'];
    $gender = $get_info['gender'];
    $prof_path = $get_info['prof_path'];
}
$db = null;
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>参加者一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link rel="stylesheet" type="text/css" href="entrant.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="b_entrant_list.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <input type="hidden" name="vol_id" value="<?php echo $_POST["vol_id"]; ?>" />
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
        <div id="Toptitle2">
          <i class="fas fa-handshake"></i>　参加者一覧
        </div>
        <div id="body" class="radio size1">
          <dl>
          <center><!-- 中央寄せ -->
          <h2>
          <dt>プロフィール画像</dt>
          <dd>
            <?php
                  if ($prof_path == null) {
                    //echo "登録されている写真は<br>ありません。";
                    echo "<img class='prof' src= '../../common/noimg.jpg'>";
                  } else {
                    echo "<img class='prof' src=../../" . $prof_path . ">";
                  }
            ?>
          </dd>
          <hr color="black">
             <dt>名前</dt>
             <?php echo "<dd>$fullname</dd>"; ?>
             <hr color="black">
             <dt>ニックネーム</dt>
             <?php echo "<dd>$nickname</dd>"; ?>
             <hr color="black">
             <dt>メールアドレス</dt>
             <?php echo "<dd>$mail_address</dd>"; ?>
             <hr color="black">
             <dt>住所</dt>
             <?php echo "<dd>$user_address</dd>"; ?>
             <hr color="black">
             <dt>電話番号</dt>
             <?php echo "<dd>$tel_num</dd>"; ?>
             <hr color="black">
             <p>
             <dt>性別</dt>
             <?php echo "<dd>$gender</dd>"; ?>
             </p>
      </div>
    </div>
  </div>
</body>
</html>
