<?php
  $s_user_id = $_POST['s_user_id'];
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/color.css">
  <link rel="stylesheet" type="text/css" href="./CSS/size.css">
  <link rel="stylesheet" type="text/css" href="./CSS/pop.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <form method="post" name="back" action="s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <a href="javascript:back.submit()">
        <img border="0" src="back.jpg" width="20%" height="100%" class="back">
      </a>
    </form>
    <form method="post" name="home" action="s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <a href="javascript:home.submit()">
        <img border="0" src="home.jpg" width="20%" height="100%" class="home">
      </a>
    </form>
  </div>
  <div id="body-bk">
    <div id="body" class="bg_test">
      <center> <!-- 中央寄せ -->
        <h1> QRコード</h1>
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
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
