<?php
//  $b_user_id    = chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57));
  $groupname    = $_POST['groupname'];
  $address      = $_POST['user_address'];
  $mail_address = $_POST['mail_address'];
  $tel_num      = $_POST['tel_num'];
  $passwd       = $_POST['passwd'];

  $picture      = $_FILES['pic'];

  //postが来てなければ飛ばす
  if($groupname && $address && $mail_address && $tel_num && $passwd){
    $dsn   = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db    = new PDO($dsn, 'root', 'root');
    $s_cnt = $db->query("select count(*) from sanka_users where mail_address='".$mail_address."'");
    $b_cnt = $db->query("select count(*) from bosyu_users where mail_address='".$mail_address."'");

    if ($s_cnt == false){
      $s_cnt = 0;
    }else{
      $s_cnt = $s_cnt->fetchColumn();
    }
    if ($b_cnt == false){
      $b_cnt = 0;
    }else{
      $b_cnt = $b_cnt->fetchColumn();
    }

    //データベースに入れて良い値かの判定
    if ($s_cnt == 0 && $b_cnt == 0 && mb_strlen($groupkname) <= 20 && mb_strlen($address) <= 30 && mb_strlen($tel_num) <= 20 && mb_strlen($mail_address) && mb_strlen($passwd) <= 12) {
      do {
        //idの生成:まだ危ない無限ループに入る可能性あり（デモぐらいは大丈夫なはず）
        $b_user_id    = chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57));
        $s_id_sql     = "select s_user_id from sanka_users where s_user_id = '".$b_user_id."'";
        $b_id_sql     = "select b_user_id from bosyu_users where b_user_id = '".$b_user_id."'";
        $s_id_cnt     = $db->query($s_id_sql)->rowCount();
        $b_id_cnt     = $db->query($b_id_sql)->rowCount();
        if ($s_cnt == false){
          $s_cnt = 0;
        }else{
          $s_cnt = $s_cnt->fetchColumn();
        }
        if ($b_cnt == false){
          $b_cnt = 0;
        }else{
          $b_cnt = $b_cnt->fetchColumn();
        }
      } while ($s_id_cnt != 0 or $b_id_cnt != 0);

      $prof_path = "prof/noimg.jpg";
      $msg = null;
      // もし$_FILES['pic']があって、一時的なファイル名の$_FILES'pic'が
      // POSTでアップロードされたファイルだったら
      if(isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])){
          $old_name = $_FILES['pic']['tmp_name'];
      //  もしprofというフォルダーがなければ
          if(!file_exists('../prof')){
              mkdir('../prof');
          }
          $new_name = $b_user_id;
          list($width, $height, $type, $attr) = getimagesize($_FILES['pic']['tmp_name']);
          switch ($type){//exif_imagetype($_FILES['pic']['tmp_name'])){
              case IMAGETYPE_JPEG:
                  $new_name .= '.jpg';
                  break;
              case IMAGETYPE_GIF:
                  $new_name .= '.gif';
                  break;
              case IMAGETYPE_PNG:
                  $new_name .= '.png';
                  break;
              default:
                  header('Location: s_account_regd.php');
                  exit();
          }
      //  もし一時的なファイル名の$_FILES['pic']ファイルを
      //  prof/basename($_FILES['pic']['name'])ファイルに移動したら
          $gazou = basename($_FILES['pic']['name']);
          if(move_uploaded_file($old_name, '../prof/'.$new_name)){
              $prof_path  = "prof/$new_name";
              $msg = $gazou. 'のアップロードに成功しました';
          }else {
              $msg = 'アップロードに失敗しました';
          }
      }

      $sql    = "insert into bosyu_users values( :b_user_id, :groupname, :address, :tel_num , :mail_address, :passwd , :prof_path)";
      $stmt   = $db->prepare($sql);
      $params = array(':b_user_id'    => $b_user_id,
                      ':groupname'    => $groupname,
                      ':address'      => $address,
                      ':tel_num'      => $tel_num,
                      ':mail_address' => $mail_address,
                      ':passwd'       => $passwd,
                      ':prof_path'    => $prof_path);
      $stmt->execute($params);

      $sql    = "insert into payments values( :b_user_id, null)";
      $stmt2  = $db->prepare($sql);
      $params = array(':b_user_id' => $b_user_id);
      $stmt2->execute($params);

      $sql    = "insert into options values( :b_user_id, 0, 0, 0, 0)";
      $stmt3  = $db->prepare($sql);
      $stmt3->execute($params);

      //データベースに正常にinsertできたかの判定
      if ($stmt->rowCount()){
        echo '
          <form method="post" action="./b_account_regd_comp.php">
            <input type="hidden" name="b_user_id" value = "'.$b_user_id.'" />
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
    <link rel="stylesheet" type="text/css" href="./CSS/b_home.css">
    <link rel="stylesheet" type="text/css" href="../common/common.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  </head>
  <body>
    <div id="header-fixed">
      <img border="0" src="../common/header.jpg"style="vertical-align:middle;" width="100%" height="100%">
      <a href= "./b_account_regd_tos.html">
        <p id="back"><i class="fas fa-reply"></i></p>
      </a>
    </div>


    <div id="body-bk">
      <div id="Toptitle1">
        <center> <!-- 中央寄せ -->
          募集アカウント登録
        </center>
      </div>
      <div id="body" class="radio size1">
        <form action ="#" method="post" name="myform" enctype="multipart/form-data" onsubmit="return check();">
          <dl>
          <center> <!-- 中央寄せ -->
            <h2>
            <dt>プロフィール画像</dt>
            <dd><input type="file" name="pic" id="pic" accept="image/*"></dd>
            <img id="preview" width="400" height="300">
            <script>
                $('#pic').on('change', function (e) {
                  var reader = new FileReader();
                  reader.onload = function (e) {
                    $("#preview").attr('src', e.target.result);
                  }
                  reader.readAsDataURL(e.target.files[0]);
                });
              </script>
            <hr color="black"><br/>

            <dt>会社・団体</dt>
            <dd><input type = "text" name="groupname" id="a" value="" class="waku" required></dd>
            <hr color="black"><br/>
            <dt>メールアドレス</dt>
            <dd><input type = "text" name="mail_address" id="b" value="" class="waku" required></dd>
            <hr color="black"><br/><br/>
            <dt>パスワード</dt>
            <dd><input type = "text" name="passwd" id="c" value="" class="waku" required></dd>
            <hr color="black"><br/><br/>
            <dt>住所</dt>
            <dd><input type = "text" name="user_address" id="d" value="" class="waku" required></dd>
            <hr color="black"><br/><br/>
            <dt>電話番号</dt>
            <dd><input type = "text" name="tel_num" id="f" value="" class="waku" required></dd>
            <hr color="black"><br/><br/>
            <br>
            <input type="submit" value="登録完了" class="btn-square1b"><br>
          </center>
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
      }
    }
    </script>

  </body>
</html>
