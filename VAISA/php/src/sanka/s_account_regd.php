<?php
  $area_id      = $_POST['area_id'];
  $nickname     = $_POST['nickname'];
  $fullname     = $_POST['fullname'];
  $user_address = $_POST['user_address'];
  $age          = $_POST['age'];
  $gender       = $_POST['gender'];
  $mes          = $_POST['mes'];
  $mail_address = $_POST['mail_address'];
  $tel_num      = $_POST['tel_num'];
  $passwd       = $_POST['passwd'];

  $check        = "false";//判定どうしよう js->呼び出された瞬間 php->読み込まれた瞬間 phpの判定結果を使うと動的にならないs

  $dsn   = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db    = new PDO($dsn, 'root', 'root');
  if ($area_data = $db->query("SELECT DISTINCT area_id, area_name, pref_name FROM areas")) {
    foreach ($area_data as $area_datas) {
      $pulldown .= "<option value='" . $area_datas['area_id'] . "' id='option'>" .$area_datas['pref_name']." ".$area_datas['area_name'] . "</option>";
    }
  }

  //postが来てなければ飛ばす
  if($nickname && $fullname && $area_id && $user_address && $age && $gender && $mail_address && $tel_num && $passwd){
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    $s_cnt = $db->query("select count(*) as num from sanka_users where mail_address='".$mail_address."'");
    $b_cnt = $db->query("select count(*) as num from bosyu_users where mail_address='".$mail_address."'");

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

    if ($s_cnt == 0  or $b_cnt == 0) {
      $check = "true";
    }

    //データベースに入れて良い値かの判定
    if ($s_cnt == 0 && $b_cnt == 0 && mb_strlen($nickname) <= 20 && mb_strlen($fullname) <= 20 && $age <= 256 && mb_strlen($mes) <= 20 && mb_strlen($tel_num) <= 30 && mb_strlen($passwd) <= 12) {
      do {
        //idの生成:まだ危ない可能性あり（デモぐらいは大丈夫なはず）
        $s_user_id  = chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57)) . chr(mt_rand(48,57));
        $s_id_sql   = "select count(*) from sanka_users where s_user_id = '".$s_user_id."'";
        $b_id_sql   = "select count(*) from bosyu_users where b_user_id = '".$s_user_id."'";
        $s_cnt   = $db->query($s_id_sql);
        $b_cnt   = $db->query($b_id_sql);

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
      }
    } while ($s_cnt != 0 or $b_cnt != 0);

      /*$msg = null;
      // もし$_FILES['pic']があって、一時的なファイル名の$_FILES['pic']が
      // POSTでアップロードされたファイルだったら
      if(isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])){
          $old_name = $_FILES['pic']['tmp_name'];
      //  もしprofというフォルダーがなければ
          if(!file_exists('../prof')){
              mkdir('../prof');
          }
          $new_name = $s_user_id;
          list($width, $height, $type, $attr) = getimagesize($_FILES['pic']['tmp_name']);
          echo ($type);
          switch ($type){//exif_imagetype($_FILES['pic']['tmp_name'])){
              case 3:
                  $new_name .= '.jpg';
                  break;
              case IMAGETYPE_GIF:
                  $new_name .= '.gif';
                  break;
              case 2:
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
              $msg = $gazou. 'のアップロードに成功しました';
          }else {
              $msg = 'アップロードに失敗しました';
          }
      }*/

      $prof_path  = "/prof/$new_name";
      $qr_path    = "empty";
      $poi        = 0;
      $rnk        = "ブロンズ";

      $sql    = "insert into sanka_users values( :s_user_id, :area_id, :nickname, :fullname, :user_address, :age, :gender, :mes, :mail_address, :tel_num , :passwd , :prof_path , :qr_path , :poi , :rnk)";
      $stmt   = $db->prepare($sql);
      $params = array(':s_user_id'    => $s_user_id,
                      ':area_id'      => $area_id,
                      ':nickname'     => $nickname,
                      ':fullname'     => $fullname,
                      ':user_address' => $user_address,
                      ':age'          => $age,
                      ':gender'       => $gender,
                      ':mes'          => $mes,
                      ':mail_address' => $mail_address,
                      ':tel_num'      => $tel_num,
                      ':passwd'       => $passwd,
                      ':prof_path'    => $prof_path,
                      ':qr_path'      => $qr_path,
                      ':poi'          => $poi,
                      ':rnk'          => $rnk);
      $stmt->execute($params);

      var_dump($stmt->errorInfo());
      //データベースに正常にinsertできたかの判定
      if ($stmt->rowCount()){//rowCountがエラーを吐くかも？
        echo '
          <form method="post" action="./s_account_regd_comp.php">
            <input type="hidden" name="mail_address" value="'.$mail_address.'" />
            <input type="hidden" name="passwd" value="'.$passwd.'" />
          </form>
          <script>
            document.forms[0].submit();
          </script>';
      }else{
        echo "error insert";
      }

    }else{
      echo "plz input other forms.";
    }
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/s_home.css">
  <link rel="stylesheet" type="text/css" href="../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../common/header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <a href= "./s_account_regd_tos.html">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
  </div>


  <div id="body-bk">
    <div id="Toptitle2">
      <center> <!-- 中央寄せ -->
        参加アカウント登録
      </center>
    </div>
    <div id="body" class="radio size1">
      <form name="request" action="#" method="post" enctype="multipart/form-data" onsubmit="return check();">
        <dl>
      <center> <!-- 中央寄せ -->
        <dt>プロフィール画像</dt>
        <dd><input type="file" name="pic"></dd>
        <hr color="black"><br/>

        <dt>名前</dt>
        <dd><input type="text" name="fullname" id="input1" class="waku"></dd>
        <hr color="black"><br/>
        <dt>メールアドレス</dt>
        <dd><input type = "text" name ="mail_address" id="input2"  class="waku"></dd>
        <hr color="black"><br/><br/>
        <dt>パスワード</dt>
        <dd><input type = "text" name ="passwd" id="input3"  class="waku"></dd>
        <hr color="black"><br/><br/>
        <dt>住所</dt>
        <dd><input type = "text" name ="user_address" id="input4"  class="waku"></dd>
        <hr color="black"><br/><br/>
        <dt>電話番号</dt>
        <dd><input type = "text" name ="tel_num" id="input5"  class="waku"></dd>
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
      <dd><input type = "number" name ="age" min="1" max="130" id="input8" class="waku" ></dd>
      <hr color="black"><br/><br/>

      <dt>ひとこと</dt>
      <dd><input type = "text" name ="mes" id="input6" class="waku" ></dd>
      <hr color="black"><br/><br/>

      <p>
        <dt>住所エリア選択</dt>
        <dd><select name ="area_id" type="number"></dd>
            <option value="none" selected>----選択してください----</option>
            <?php
            echo $pulldown;
            ?>
        </select>
      </p>
      <hr color="black"><br/>
        <dt>ニックネーム</dt>
        <dd><input type = "text" name ="nickname" id="input7" class="waku" ></dd>
        <hr color="black"><br/>
      <br>
      <input type="submit" value="登録完了" class="btn-square1"><br>
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
    }

    if (document.request.elements[2].type == "text") {
      if (30 < document.request.elements[2].value.length) {//データベースまだ
        alert("既に登録されたメールアドレスもしくは30文字以上の入力です。");
        return false;
      }
    }

    if (document.request.elements[3].type == "text") {
      if (document.request.elements[3].value.length <= 7 && 12 <= document.request.elements[3].value.length) {
        alert("パスワードに誤りがあります。7文字以上12文字以下に設定してください。");
        return false;
      }
    }

    if (document.request.elements[4].type == "text") {
      if (document.request.elements[4].value.length > 30) {
        alert("住所は30文字以下で入力してください");
        return false;
      }
    }

    if (document.request.elements[5].type == "text") {
      if (document.request.elements[5].value.length >30) {
        alert("電話番号には30文字以下で入力してください");
        return false;
      }
    }

    if (document.request.elements[6].type == "number") {//多分動くことはない
      if (document.request.elements[6].value >= 150) {
        alert("年齢は本当にあっていますか？");
        return false;
      }
    }

    if (document.request.elements[7].type == "text") {
      if (document.request.elements[7].value.length >20) {
        alert("ひとことは20文字以下で入力してください");
        return false;
      }
    }

    if (document.request.elements[8].type == "text") {
      if (document.request.elements[8].value.length >20) {
        alert("ニックネームは20文字以下で入力してください");
        return false;
      }
    }
  }
</script>


  <div id="footer-fixed">
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
