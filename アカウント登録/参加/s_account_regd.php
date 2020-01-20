<?php
  $s_user_id = chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57));
  $nickname = $_POST['nickname'];
  $fullname = $_POST['fullname'];
  $place_id = $_POST['area'];
  $age      = $_POST['age'];
  $gender   = $_POST['gender'];
  $message  = $_POST['message'];
  $mail_address = $_POST['mail_address'];
  $tel_num  = $_POST['tel_num'];
  $passwd   = $_POST['password'];
  $profile_path = "/profile/$s_user_id";
  $qr_path  = "/qr/$s_user_id";
  $point    = 0;
  $rank     = "ブロンズ";

  $picture  = $_POST['pic'];

  if($nickname && $fullname && $place_id && $age && $gender && $message && $mail_address && $tel_num && $passwd){
    $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
    $db = new PDO($dsn, 'root', 'root');
    $sql = "insert into sanka_user values(:s_user_id, :nickname, :fullname, :place_id, :age, :gender, :message, :mail_address, :tel_num ,:passwd ,:profile_path ,:qr_path ,:point ,:rank )";
    $stmt = $db->prepare($sql);
    $params = array(':s_user_id' => $s_user_id, ':nickname' => $nickname, ':fullname' => $fullname, ':place_id' => $place_id, ':age' => $age, ':gender' => $gender, ':message' => $message, ':mail_address' => $mail_address, ':tel_num' => $tel_num, ':passwd' => $passwd, ':profile_path' => $profile_path, ':qr_path' => $qr_path, ':point' => $point, ':rank' => $rank);
    $stmt->execute($params);
    if ($stmt){
      echo '
      <form method="post" action="s_account_regd_comp.php">
        <input type="hidden" name="mail_address" value="'.$mail_address.'" />
        <input type="hidden" name="passwd" value="'.$passwd.'" />
      </form>
      <script>
        document.forms[0].submit();
      </script>';
    }else{
      echo "error";
    }
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
  <!--<link rel="stylesheet" type="text/css" href="./CSS/botan.css">-->
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <a href= "regd_first.html">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
  </div>


  <div id="body-bk">
    <div id="body" class="bg_test">
      <center> <!-- 中央寄せ -->
        <h1> 参加側アカウント登録</h1>
      </center>
    </div>
    <div id="body" class="radio size1">
      <form name="request" action="#" method="post">
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
      <p sinput="submit" value="登録完了" class="btn-square1">登録完了</p><br>
      <!--<p class="btn-square1">登録完了</p><br>>-->
    </center>
  </dl>
  </form>
  </div>
</div>

<div class="popup-overlay">
  <!--Creates the popup content-->
  <div class="popup-content">
    <p>登録に失敗しました</p>
    <!--popup's close button-->
    <button-ok class="ok">OK</button-ok>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
/*検索ボタンが押されたとき*/
$(".btn-square1").on("click", function(){
  var target1 = document.getElementById("input1").value;
  var target2 = document.getElementById("input2").value;
  var target3 = document.getElementById("input3").value;
  var target4 = document.getElementById("input4").value;
  var target5 = document.getElementById("input5").value;
  var target6 = document.getElementById("input6").value;
  var target7 = document.getElementById("input7").value;
  var target8 = document.getElementById("input8").value;
  /*ID(文字数8)が入力されている場合*/
  if(target1.length >= 1 && target2.length >= 1 && target3.length >= 1 && target4.length >= 1 && target5.length >= 1 && target6.length >= 1 && target7.length >= 1 && target8.length >= 1){
    /*IDが存在するならの処理もここ？*/
      document.request.submit();
  }else{
  /*IDが入力されてないor存在しない場合*/
  $(".popup-overlay, .popup-content").addClass("active");
  }
});

/*削除確認*/
$(".ok").on("click", function(){
  $(".popup-overlay, .popup-content").removeClass("active");
});
</script>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
