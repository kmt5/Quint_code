<?php
  $b_user_id = $_POST['b_user_id'];

  $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db  = new PDO($dsn, 'root', 'root');
  $res = $db->query('select vol_id,vol_name from volunteers where b_user_id="'.$b_user_id.'"');
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./b_qr.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <form method="post" name="back" action="../b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:back.submit()">
        <img border="0" src="../../common/back.jpg" width="20%" height="100%" class="back">
      </a>
    </form>
    <form method="post" name="home" action="../b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:home.submit()">
        <img border="0" src="../../common/home.jpg" width="20%" height="100%" class="home">
      </a>
    </form>
  </div>

  <div id="body-bk">
    <div id="body" class="bg_test3">
      <center> <!-- 中央寄せ -->
        <h1>QRコード</h1>
      </center>
    </div>
    <div id="body">
      <center> <!-- 中央寄せ -->
        <h1>ボランティア一覧</h1>
      </center>
    </div>
      <center > <!-- 中央寄せ -->
        <?php
          foreach($res as $value ) {
            echo '
            <div id="body-qr1">
              <form method="post" action="./b_qr.php"  class="bg_test4">
                <input type="hidden" name="b_user_id" value="'.$b_user_id.'" />
                <input type="hidden" name="vol_id" value="'.$value['vol_id'].'" />
                <input type="submit" value="'.$value['vol_name'].'" />
              </form>
            </div>
            <br>';
          }
        ?>
        <!--<h1>こんにちは</h1><br>-->
      </center>


  </div>

  <div id="footer-fixed">
    <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
