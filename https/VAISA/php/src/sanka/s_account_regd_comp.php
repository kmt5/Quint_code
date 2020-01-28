<?php
$mail_address = $_POST['mail_address'];
$passwd       = $_POST['passwd'];
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>参加側</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/s_home.css">
  <link rel="stylesheet" type="text/css" href="../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../common/header.jpg" width="100%" height="100%">
  </div>
  <div id="body-bk">
    <div id="Toptitle2">
      <center> <!-- 中央寄せ -->
        参加アカウント登録
      </center>
    </div>
    <div id="body" class="size3">
      <center> <!-- 中央寄せ -->
        登録完了<br>
        ありがとうございます<br>
        アカウント登録が完了しました<br>
      </center>
      </div>
      <div id="body-bkxaa" class="size3">
        <center> <!-- 中央寄せ -->
        <form method="post" name="goHome" action="../login.php">
          <input type="hidden" name="mail_address" value="<?php echo $mail_address; ?>" />
          <input type="hidden" name="password" value="<?php echo $passwd; ?>" />
          <a href="javascript:goHome.submit()" class="btn-square1">ホーム</a>
        </form>
        </center>
      </div>
    </div>
    <div id="footer-fixed">
      <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
    </div>
  </body>
</html>
