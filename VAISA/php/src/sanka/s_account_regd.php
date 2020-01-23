<?php
  $nickname     = $_POST['nickname'];
  $fullname     = $_POST['fullname'];
  $place_id     = $_POST['area'];
  $age          = $_POST['age'];
  $gender       = $_POST['gender'];
  $message      = $_POST['message'];
  $mail_address = $_POST['mail_address'];
  $tel_num      = $_POST['tel_num'];
  $passwd       = $_POST['password'];

  $picture      = $_POST['pic'];

  //postが来てなければ飛ばす
  if($nickname && $fullname && $place_id && $age && $gender && $mail_address && $tel_num && $passwd){
    $dsn   = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db    = new PDO($dsn, 'root', 'root');
    $s_cnt = $db->query("select mail_address from sanka_user where mail_address='".$mail_address."'")->rowCount();
    $b_cnt = $db->query("select mail_address from bosyu_user where mail_address='".$mail_address."'")->rowCount();

    //データベースに入れて良い値かの判定
    if (!$s_cnt && !$b_cnt && mb_strlen($nickname) <= 20 && mb_strlen($fullname) <= 20 && $age <= 256 && mb_strlen($message) <= 20 && mb_strlen($tel_num) <= 30 && mb_strlen($passwd) <= 12) {
      do {
        //idの生成:まだ危ない可能性あり（デモぐらいは大丈夫なはず）
        $s_user_id    = chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57));
        $s_id_sql     = "select s_user_id from sanka_user where s_user_id = '".$s_user_id."'";
        $b_id_sql     = "select b_user_id from bosyu_user where b_user_id = '".$s_user_id."'";
        $s_id_cnt     = $db->query($s_id_sql)->rowCount();
        $b_id_cnt     = $db->query($b_id_sql)->rowCount();
      } while ($s_id_cnt or $b_id_cnt);

      $profile_path = "/prof/$s_user_id.jpg";
      $qr_path      = "/qr/$s_user_id.jpg";
      $point        = 0;
      $rank         = "ブロンズ";

      $sql    = "insert into sanka_user values(:s_user_id, :nickname, :fullname, :place_id, :age, :gender, :message, :mail_address, :tel_num ,:passwd ,:profile_path ,:qr_path ,:point ,:rank )";
      $stmt   = $db->prepare($sql);
      $params = array(':s_user_id'    => $s_user_id,
                      ':nickname'     => $nickname,
                      ':fullname'     => $fullname,
                      ':place_id'     => $place_id,
                      ':age'          => $age,
                      ':gender'       => $gender,
                      ':message'      => $message,
                      ':mail_address' => $mail_address,
                      ':tel_num'      => $tel_num,
                      ':passwd'       => $passwd,
                      ':profile_path' => $profile_path,
                      ':qr_path'      => $qr_path,
                      ':point'        => $point,
                      ':rank'         => $rank);
      $stmt->execute($params);

      //データベースに正常にinsertできたかの判定
      if ($stmt->rowCount()){
        echo'
          <form method="post" action="./s_account_regd_comp.php">
            <input type="hidden" name="mail_address" value="'.$mail_address.'" />
            <input type="hidden" name="passwd" value="'.$passwd.'" />
          </form>
          <script>
            document.forms[0].submit();
          </script>';
      }else{
        echo "can't insert into db";
      }

    }else{
      echo "plz input other forms.";
    }
  }
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/s_home.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../common/header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <a href= "./s_account_regd_tos.html">
      <img border="0" src="../common/back.jpg" width="20%" height="100%" class="back">
    </a>
  </div>


  <div id="body-bk">
    <div id="body" class="bg_test">
      <center> <!-- 中央寄せ -->
        <h1> 参加側アカウント登録</h1>
      </center>
    </div>
    <div id="body" class="radio size1">
      <form name="request" action="#" method="post" onsubmit="return check();">
        <dl>
      <center> <!-- 中央寄せ -->
      <h2>
        <dt>プロフィール画像</dt>
        <dd><input type="file" name="pic"></dd>
        <hr color="black"><br/>

        <dt>名前</dt>
        <dd><input type="text" name="fullname" id="input1" ></dd>
        <hr color="black"><br/>
        <dt>メールアドレス</dt>
        <dd><input type = "text" name ="mail_address" id="input2" ></dd>
        <hr color="black"><br/><br/>
        <dt>パスワード</dt>
        <dd><input type = "text" name ="password" id="input3" ></dd>
        <hr color="black"><br/><br/>
        <dt>住所</dt>
        <dd><input type = "text" name ="user_address" id="input4" ></dd>
        <hr color="black"><br/><br/>
        <dt>電話番号</dt>
        <dd><input type = "text" name ="tel_num" id="input5" ></dd>
        <hr color="black"><br/><br/>

      <p>
        <dt>性別</dt>
        <input type="radio" name="gender" class="radio-input" id="radio-01" value="男">
        <label for="radio-01">男</label>
        <input type="radio" name="gender" class="radio-input" id="radio-02" value="女">
        <label for="radio-02">女</label><br>
      </p>
      <hr color="black"><br/>

      <dt>年齢</dt>
      <dd><input type = "number" name ="age" id="input8" ></dd>
      <hr color="black"><br/><br/>

      <dt>ひとこと</dt>
      <dd><input type = "text" name ="message" id="input6" ></dd>
      <hr color="black"><br/><br/>

      <p>
        <dt>住所エリア選択</dt>
        <dd><select name ="area" type="number"></dd>
        <option value="002" id="option">高知</option>
        <option value="003" id="option">愛媛</option>
        </select>
      </p>
      <hr color="black"><br/>
        <dt>ニックネーム</dt>
        <dd><input type = "text" name ="nickname" id="input7" ></dd>
        <hr color="black"><br/>
      <br>
      <input type="submit" value="登録完了" class="btn-square1"><br>
      <!--<p class="btn-square1">登録完了</p><br>>-->
    </center>
  </dl>
  </form>
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
    if (i == 6) {
      if (document.request.elements[i].type == "text") {
        if (document.request.elements[i].value.length <=3) {
          alert("年齢に誤りがあります");
          return false;
        }
      }
    }
    if (i == 7) {
      if (document.request.elements[i].type == "text") {
        if (document.request.elements[i].value.length <=20) {
          alert("ひとことに誤りがあります");
          return false;
        }
      }
    }
    if (i == 8) {
      if (document.request.elements[i].type == "text") {
        if (document.request.elements[i].value.length <=20) {
          alert("ニックネームに誤りがあります");
          return false;
        }
      }
    }
  }
}
</script>


  <div id="footer-fixed">
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
