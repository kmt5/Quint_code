<?php
$user_id = $_POST['s_user_id'];
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
<img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="s_my_first.php">
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
  </body>
</html>
