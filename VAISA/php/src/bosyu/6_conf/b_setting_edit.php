<?php
  $b_user_id    = $_POST['b_user_id'];
  $groupname    = $_POST['groupname'];
  $address      = $_POST['address'];
  $tel_num      = $_POST['tel_num'];
  $mail_address = $_POST['mail_address'];
  $passwd       = $_POST['password'];

  $picture      = $_POST['pic'];

  $dsn   = "mysql:host=test3_mysql_1;dbname=sample;";
  $db    = new PDO($dsn, 'root', 'root');

  if ($groupname) {
    $sql = "update bosyu_user set nickname = '".$groupname."' where b_user_id = '".$b_user_id."'";
    $db->query($sql);
  }
  if ($address) {
    $sql = "update bosyu_user set fullname = '".$address."' where b_user_id = '".$b_user_id."'";
    $db->query($sql);
  }
  if ($tel_num) {
    $sql = "update bosyu_user set tel_num = '".$tel_num."' where b_user_id = '".$b_user_id."'";
    $db->query($sql);
  }
  if ($mail_address) {
    $sql = "update bosyu_user set mail_address = '".$mail_address."' where b_user_id = '".$b_user_id."'";
    $db->query($sql);
  }
  if ($passwd) {
    $sql = "update bosyu_user set passwd = '".$passwd."' where b_user_id = '".$b_user_id."'";
    $db->query($sql);
  }
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
    <form method="post" name="back" action="b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:back.submit()">
        <img border="0" src="back.jpg" width="20%" height="100%" class="back">
      </a>
    </form>
    <form method="post" name="home" action="b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:home.submit()">
        <img border="0" src="home.jpg" width="20%" height="100%" class="home">
      </a>
    </form>
  </div>


  <div id="body-bk">
    <div id="body" class="bg_test">
      <center> <!-- 中央寄せ -->
        <h1> 募集側アカウント設定</h1>
      </center>
    </div>
    <div id="body" class="radio size1">
      <form action ="b_setting_edit.php" method="post" name="myform" onsubmit="return check();">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>">
      <dl>
      <center> <!-- 中央寄せ -->
      <h2>
        <dt>プロフィール画像</dt>
        <dd><input type="file" name="pic"></dd>
        <hr color="black"><br/>

        <dt>会社・団体</dt>
        <dd><input type = "text" name ="groupname" id="input1" value=""></dd>
        <hr color="black"><br/>
        <dt>メールアドレス</dt>
        <dd><input type = "text" name ="mail_address" id="input2" value=""></dd>
        <hr color="black"><br/><br/>
        <dt>パスワード</dt>
        <dd><input type = "text" name ="password" id="input3" value=""></dd>
        <hr color="black"><br/><br/>
        <dt>住所</dt>
        <dd><input type = "text" name ="user_address" id="input4" value=""></dd>
        <hr color="black"><br/><br/>
        <dt>電話番号</dt>
        <dd><input type = "text" name ="tel_num" id="input5" value=""></dd>
        <hr color="black"><br/><br/>
        <br>
        <input type="submit" value="編集完了" class="btn-square5">
        </form>
        <form action=b_setting_delete.php method="post">
          <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>">
          <input type="submit" value="アカウント削除" class="btn-square4"><br>
        </form>
      </center>
    </div>
  </div>

  <script type="text/javascript">
  function check() {
    for(i = 0; i < document.request.length; i++) {
      if (document.request.elements[i].type == "text") {
        if (document.request.elements[i].value.length == 0) {
            alert("入力していない項目があります");
            return false;
        }
      }
      if (i == 2){
        if (document.request.elements[i].type == "text") {
          if (document.request.elements[i].value.length >= 8 && document.request.elements[i].value.length <=12) {
            alert("既に登録されたメールアドレスです");
            return false;
          }
        }
      }
      if (i == 3) {
        if (document.request.elements[i].type == "text") {
          if (document.request.elements[i].value.length <= 7 && document.request.elements[i].value.length <=12) {
            alert("パスワードに誤りがあります");
            return false;
          }
        }
      }
      if (i == 4) {
        if (document.request.elements[i].type == "text") {
          if (document.request.elements[i].value.length <=30) {
            alert("住所に誤りがあります");
            return false;
          }
        }
      }
      if (i == 5) {
        if (document.request.elements[i].type == "text") {
          if (document.request.elements[i].value.length <=30) {
            alert("電話番号に誤りがあります");
            return false;
          }
        }
      }
    }
  }
  </script>





  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
