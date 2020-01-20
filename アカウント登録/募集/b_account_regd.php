<?php
//  $b_user_id    = chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57));
  $groupname    = $_POST['groupname'];
  $address      = $_POST['user_address'];
  $place_id     = $_POST['area'];
  $mail_address = $_POST['mail_address'];
  $tel_num      = $_POST['tel_num'];
  $passwd       = $_POST['password'];

  $picture      = $_POST['pic'];

  //postが来てなければ飛ばす
  if($groupname && $address && $mail_address && $tel_num && $passwd){
    $dsn   = "mysql:host=test3_mysql_1;dbname=sample;";
    $db    = new PDO($dsn, 'root', 'root');
    $s_cnt = $db->query("select mail_address from sanka_user where mail_address='".$mail_address."'")->rowCount();
    $b_cnt = $db->query("select mail_address from bosyu_user where mail_address='".$mail_address."'")->rowCount();

    //データベースに入れて良い値かの判定
    if (!$s_cnt && !$b_cnt && mb_strlen($groupkname) <= 20 && mb_strlen($address) <= 30 && mb_strlen($tel_num) <= 20 && mb_strlen($mail_address) && mb_strlen($passwd) <= 12) {
      do {
        //idの生成:まだ危ない無限ループに入る可能性あり（デモぐらいは大丈夫なはず）
        $b_user_id    = chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57));
        $s_id_sql     = "select s_user_id from sanka_user where s_user_id = '".$b_user_id."'";
        $b_id_sql     = "select b_user_id from bosyu_user where b_user_id = '".$b_user_id."'";
        $s_id_cnt     = $db->query($s_id_sql)->rowCount();
        $b_id_cnt     = $db->query($b_id_sql)->rowCount();
      } while ($s_id_cnt or $b_id_cnt);

      $profile_path = "/prof/$b_user_id";

      $sql    = "insert into bosyu_user values( :b_user_id, :groupname, :address, :tel_num , :mail_address, :passwd , :profile_path)";
      $stmt   = $db->prepare($sql);
      $params = array(':b_user_id'    => $b_user_id,
                      ':groupname'    => $groupname,
                      ':address'      => $address,
                      ':tel_num'      => $tel_num,
                      ':mail_address' => $mail_address,
                      ':passwd'       => $passwd,
                      ':profile_path' => $profile_path);
      $stmt->execute($params);

      //データベースに正常にinsertできたかの判定
      if ($stmt->rowCount()){
        echo '
          <form method="post" action="b_account_regd_comp.php">
            <input type="hidden" name="b_user_id" value "'.$b_user_id.'" />
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
    <link rel="stylesheet" type="text/css" href="./CSS/common.css">
    <link rel="stylesheet" type="text/css" href="./CSS/color.css">
    <link rel="stylesheet" type="text/css" href="./CSS/size.css">
    <link rel="stylesheet" type="text/css" href="./CSS/pop.css">
  </head>
  <body>
    <div id="header-fixed">
      <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
      <a href= "regd_first.html">
        <img border="0" src="back.jpg" width="20%" height="100%" class="back">
      </a>
    </div>


    <div id="body-bk">
      <div id="body" class="bg_test3">
        <center> <!-- 中央寄せ -->
          <h1> 募集側アカウント登録</h1>
        </center>
      </div>
      <div id="body" class="radio size1">
        <form action ="#" method="get" name="myform" onsubmit="return check();">
          <dl>
          <center> <!-- 中央寄せ -->
            <h2>
            <dt>プロフィール画像</dt>
            <dd><input type="file" name="pic"></dd>
            <hr color="black"><br/>

            <dt>会社・団体</dt>
            <dd><input type = "text" name="groupname" id="a" value=""></dd>
            <hr color="black"><br/>
            <dt>メールアドレス</dt>
            <dd><input type = "text" name="mail_address" id="b" value=""></dd>
            <hr color="black"><br/><br/>
            <dt>パスワード</dt>
            <dd><input type = "text" name="password" id="c" value=""></dd>
            <hr color="black"><br/><br/>
            <dt>住所</dt>
            <dd><input type = "text" name="user_address" id="d" value=""></dd>
            <hr color="black"><br/><br/>
            <dt>電話番号</dt>
            <dd><input type = "text" name="tel_num" id="f" value=""></dd>
            <hr color="black"><br/><br/>
            <br>
            <input type="submit" value="登録完了" class="btn-square1b"><br>
          </center>
        </form>
      </div>
    </div>


    <script type="text/javascript">
      function check() {
        for(i = 0; i < document.myform.length; i++) {
          if (document.myform.elements[i].type == "text") {
            if (document.myform.elements[i].value.length <= 8) {
                alert("登録に失敗しました");
                return false;
            }
          }
          if (i == 2){
            if (document.myform.elements[i].type == "text") {
              if (document.myform.elements[i].value.length >= 8) {
                alert("既に登録されたメールアドレスです");
                return false;
              }
            }
          }
          if (i == 3) {
            if (document.myform.elements[i].type == "text") {
              if (document.myform.elements[i].value.length <= 7) {
                alert("登録に失敗しました");
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
