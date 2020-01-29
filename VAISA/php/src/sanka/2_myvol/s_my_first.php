<?php
$user_id = $_POST['s_user_id'];
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>マイボランティア</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/my_first.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div id="header-fixed">
<img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
    <form method="post" name="formback" action="../s_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
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
          マイボランティア
        </div>

        <div class="join">
          <i class="far fa-calendar-alt fa-5x"></i>
        <?php
        echo '<form method="post" name="form1" action="s_my_join.php">';
        echo '<input type="hidden" name="s_user_id" value="'.$user_id.'">';
        echo '<a href="javascript:form1.submit()" style="color:black">';
        ?>
        参加登録ボランティア
        <?php
        echo '</a>';
        echo '</form>';
        ?>
        </div>

        <div class="fav">
          <i class="fa fa-heart fa-5x" aria-hidden="true"></i>
        <?php
        echo '<form method="post" name="form2" action="s_my_fav.php">';
        echo '<input type="hidden" name="s_user_id" value="'.$user_id.'">';
        echo '<a href="javascript:form2.submit()" style="color:black">';
        ?>
        お気に入り
        <?php
        echo '</a>';
        echo '</form>';
        ?>
        </div>

        <div class="record">
          <i class="fas fa-folder fa-5x"></i>
          <?php
        echo '<form method="post" name="form3" action="s_my_record.php">';
        echo '<input type="hidden" name="s_user_id" value="'.$user_id.'">';
        echo '<a href="javascript:form3.submit()" style="color:black">';
        ?>
        ボランティア履歴
        <?php
        echo '</a>';
        echo '</form>';
        ?>
        </div>
      </div>
    </div>

</body>
</html>
