<?php
  $s_user_id = $_POST['s_user_id'];
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./s_qr.css">
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <form method="post" name="back" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <button type="submit">
        <p id="back"><i class="fas fa-reply"></i></p>
        </button>
    </form>
    <form method="post" name="home" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <button type="submit">
        <p id="home"><i class="fas fa-home"></i></p>
        </button>
    </form>
  </div>
  <div id="body-bk">
    <div id="Toptitle1">
      <center> <!-- 中央寄せ -->
        QRコード
      </center>
    </div>
    <div id="body">
      <center>
      <div id="qrcode"></div>
    </center>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script type="text/javascript" src="jquery.qrcode.min.js"></script>
  <script>
  jQuery(function(){
    jQuery('#qrcode').qrcode("<?php echo $s_user_id; ?>");
  })
  </script>
  <div id="footer-fixed">
    <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
