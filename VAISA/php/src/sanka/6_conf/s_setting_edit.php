<?php
  $s_user_id    = $_POST['s_user_id'];
  $nickname     = $_POST['nickname'];
  $fullname     = $_POST['fullname'];
  $user_address = $_POST['user_address'];
  $place_id     = $_POST['area'];
  $age          = $_POST['age'];
  $gender       = $_POST['gender'];
  $message      = $_POST['message'];
  $mail_address = $_POST['mail_address'];
  $tel_num      = $_POST['tel_num'];
  $passwd       = $_POST['password'];

  $picture      = $_POST['pic'];

  $dsn   = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db    = new PDO($dsn, 'root', 'root');

  if ($nickname) {
    $sql = "update sanka_users set nickname = '".$nickname."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($fullname) {
    $sql = "update sanka_users set fullname = '".$fullname."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($place_id) {
    $sql = "update sanka_users set area_id = '".$place_id."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($user_address) {
    $sql = "update sanka_users set user_address = '".$user_address."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($age) {
    $sql = "update sanka_users set age = '".$age."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($gender) {
    $sql = "update sanka_users set gender = '".$gender."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($message) {
    $sql = "update sanka_users set message = '".$message."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($mail_address) {
    $sql = "update sanka_users set mail_address = '".$mail_address."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($tel_num) {
    $sql = "update sanka_users set tel_num = '".$tel_num."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($passwd) {
    $sql = "update sanka_users set passwd = '".$passwd."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./s_setting.css">
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
    <div id="Toptitle2">
      <i class="fas fa-cogs"></i>アカウント設定
    </div>
    <div id="body" class="radio size1">
      <form action ="s_setting_edit.php" method="post" name="myform" onsubmit="return check();">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>">
        <dl>
      <center> <!-- 中央寄せ -->
      <h2>
        <dt>プロフィール画像</dt>
        <dd><input type="file" name="pic" accept="image/*"></dd>
        <img id="preview">
        <hr color="black"><br/>

        <dt>名前</dt>
        <dd><input type="text" name="fullname" id="input1" value="" class="waku"></dd>
        <hr color="black"><br/>
        <dt>メールアドレス</dt>
        <dd><input type="text" name="mail_address" id="input2" value="" class="waku"></dd>
        <hr color="black"><br/><br/>
        <dt>パスワード</dt>
        <dd><input type = "text" name ="password" id="input3" value="" class="waku"></dd>
        <hr color="black"><br/><br/>
        <dt>住所</dt>
        <dd><input type = "text" name ="user_address" id="input4" value="" class="waku"></dd>
        <hr color="black"><br/><br/>
        <dt>電話番号</dt>
        <dd><input type = "text" name ="tel_num" id="input5" value="" class="waku"></dd>
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
        <dd><input type = "text" name ="massage" id="input6" value="" class="waku"></dd>
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
        <dd><input type = "text" name ="nickname" id="input7" value="" class="waku"></dd>
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
  $('#pic').on('change', function (e) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $("#preview").attr('src', e.target.result);
      }
      reader.readAsDataURL(e.target.files[0]);
  });
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
          if (document.request.elements[i].value.length >= 7 && document.request.elements[i].value.length >=12) {
            alert("パスワードに誤りがあります");
            return false;
          }
        }
      }
      if (i == 4) {
        if (document.request.elements[i].type == "text") {
          if (document.request.elements[i].value.length >=30) {
            alert("住所に誤りがあります");
            return false;
          }
        }
      }
      if (i == 5) {
        if (document.request.elements[i].type == "text") {
          if (document.request.elements[i].value.length >=30) {
            alert("電話番号に誤りがあります");
            return false;
          }
        }
      }
      if (i == 6) {
        if (document.request.elements[i].type == "text") {
          if (document.request.elements[i].value.length >=3) {
            alert("年齢に誤りがあります");
            return false;
          }
        }
      }
      if (i == 7) {
        if (document.request.elements[i].type == "text") {
          if (document.request.elements[i].value.length >=20) {
            alert("ひとことに誤りがあります");
            return false;
          }
        }
      }
      if (i == 8) {
        if (document.request.elements[i].type == "text") {
          if (document.request.elements[i].value.length >=20) {
            alert("ニックネームに誤りがあります");
            return false;
          }
        }
      }
    }
  }
  </script>


  <div id="footer-fixed">
    <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
