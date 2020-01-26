<?php
$user_id = '1234567a';
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>フレンド</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div id="header-fixed">
<img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
<form method="post" name="back" action="../s_home.php">
<input type="hidden" name="s_user_id" value="<?php echo $user_id;?>"/>
<a href="javascript:back.submit()">
<img border="0" src="back.jpg" width="20%" height="100%" class="back">
</a>
</form>
<form method="post" name="home" action="../s_home.php">
<input type="hidden" name="s_user_id" value="<?php echo $user_id;?>"/>
<a href="javascript:home.submit()">
<img border="0" src="home.jpg" width="20%" height="100%" class="home">
</a>
</form>
</div>

    <div id="body-bk">
      <div id="body">

        <div id="Toptitle2">
          フレンド
        </div>

        <div class="list">
          <i class="far fa-list-alt fa-5x"></i>
        <?php
        echo '<form method="post" name="form1" action="s_frd_list.php">';
        echo '<input type="hidden" name="s_user_id" value="'.$user_id.'">';
        echo '<a href="javascript:form1.submit()" style="color:black">';
        ?>
        フレンド一覧
        <?php
        echo '</a>';
        echo '</form>';
        ?>
        </div>

        <div class="add">
          <i class="fa fa-user-plus fa-5x"></i>
        <?php
        echo '<form method="post" name="form2" action="s_frd_add.php">';
        echo '<input type="hidden" name="s_user_id" value="'.$user_id.'">';
        echo '<a href="javascript:form2.submit()" style="color:black">';
        ?>
        フレンド追加
        <?php
        echo '</a>';
        echo '</form>';
        ?>
        </div>

        <div class="appcheck">
          <i class="fas fa-users fa-5x"></i>
          <?php
        echo '<form method="post" name="form3" action="s_frd_appcheck.php">';
        echo '<input type="hidden" name="s_user_id" value="'.$user_id.'">';
        echo '<a href="javascript:form3.submit()" style="color:black">';
        ?>
        フレンド申請確認
        <?php
        echo '</a>';
        echo '</form>';
        ?>
        </div>
      </div>
    </div>

    <div id="footer-fixed">
      <img border="0" src="kokoku.jpg" width="100%" height="100%">
    </div>
  </body>
</html>
