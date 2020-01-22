<?php
  session_start();
  $s_user_id    = $_SESSION['s_user_id'];
  $nickname     = $_POST['nickname'];
  $fullname     = $_POST['fullname'];
  $place_id     = $_POST['area'];
  $age          = $_POST['age'];
  $gender       = $_POST['gender'];
  $message      = $_POST['message'];
  $mail_address = $_POST['mail_address'];
  $tel_num      = $_POST['tel_num'];
  $passwd       = $_POST['password'];
  echo $_SESSION['s_user_id'];

  $picture      = $_POST['pic'];

  $dsn   = "mysql:host=test3_mysql_1;dbname=sample;";
  $db    = new PDO($dsn, 'root', 'root');

  if ($nickname) {
    $sql = "update sanka_user set nickname = '".$nickname."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($fullname) {
    $sql = "update sanka_user set fullname = '".$fullname."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($place_id) {
    $sql = "update sanka_user set place_id = '".$place_id."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($age) {
    $sql = "update sanka_user set age = '".$age."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($gender) {
    $sql = "update sanka_user set gender = '".$gender."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($message) {
    $sql = "update sanka_user set message = '".$message."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($mail_address) {
    $sql = "update sanka_user set mail_address = '".$mail_address."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($tel_num) {
    $sql = "update sanka_user set tel_num = '".$tel_num."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($passwd) {
    $sql = "update sanka_user set passwd = '".$passwd."' where s_user_id = '".$s_user_id."'";
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
        <h1> 参加側アカウント登録</h1>
      </center>
    </div>
    <div id="body" class="radio size1">
      <form action ="s_setting_edit.php" method="post" name="myform" onsubmit="return check();">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>">
        <dl>
      <center> <!-- 中央寄せ -->
      <h2>
        <dt>プロフィール画像</dt>
        <dd><input type="file" name="pic"></dd>
        <hr color="black"><br/>

        <dt>名前</dt>
        <dd><input type="text" name="fullname" id="input1" value=""></dd>
        <hr color="black"><br/>
        <dt>メールアドレス</dt>
        <dd><input type="text" name="mail_address" id="input2" value=""></dd>
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

      <p>
        <dt>性別</dt>
        <input type="radio" name="gender" class="radio-input" id="radio-01" value="男">
        <label for="radio-01">男</label>
        <input type="radio" name="gender" class="radio-input" id="radio-02" value="女">
        <label for="radio-02">女</label><br>
      </p>
      <hr color="black"><br/>
        <dt>ひとこと</dt>
        <dd><input type = "text" name ="massage" id="input6" value=""></dd>
        <hr color="black"><br/><br/>

      <p>
        <dt>住所エリア選択</dt>
        <dd><select name ="area"></dd>
        <option value="002" id="option">高知</option>
        <option value="003" id="option">愛媛</option>
        </select>
      </p>
      <hr color="black"><br/>
        <dt>ニックネーム</dt>
        <dd><input type = "text" name ="nickname" id="input7" value=""></dd>
        <hr color="black"><br/>
        <br>
        <input type="submit" value="編集完了" class="btn-square5">
        </form>
        <form action=s_setting_delete.php method="post" name=request >
        <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>">
        <input type="submit" value="アカウント削除" class="btn-square4"><br>
        </form>
      </center>
    </div>
  </div>

  <script type="text/javascript">
  function check() {
    for(i = 0; i < document.myform.length; i++) {
      if (document.myform.elements[i].type == "text") {
        if (document.myform.elements[i].value.length == 100) {
            alert("登録に失敗しました");
            return false;
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
