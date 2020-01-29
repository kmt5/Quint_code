<?php
  $s_user_id    = $_POST['s_user_id'];
  $nickname     = $_POST['nickname'];
  $fullname     = $_POST['fullname'];
  $user_address = $_POST['user_address'];
  $area_id      = $_POST['area_id'];
  $gender       = $_POST['gender'];
  $message      = $_POST['message'];
  $mail_address = $_POST['mail_address'];
  $tel_num      = $_POST['tel_num'];
  $passwd       = $_POST['passwd'];

  $picture      = $_POST['pic'];
  $check_mail   = null;

  $dsn   = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db    = new PDO($dsn, 'root', 'root');
  $sql   = "select mail_address,prof_path from sanka_users where s_user_id = '".$s_user_id."'";
  $res   = $db->query($sql)->fetch();

  $prof_path = $res['prof_path'];
  if ($res['mail_address'] != $mail_address) {
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

    if ($s_cnt > 0 || $b_cnt > 0) {
      $check_mail = $mail_address;
      $mail_address = false;
    }
  }

  $msg = null;
  // もし$_FILES['pic']があって、一時的なファイル名の$_FILES'pic'が
  // POSTでアップロードされたファイルだったら
  if(isset($_FILES['pic']) && is_uploaded_file($_FILES['pic']['tmp_name'])){
      $old_name = $_FILES['pic']['tmp_name'];
  //  もしprofというフォルダーがなければ
      if(!file_exists('../../prof')){
          mkdir('../../prof');
      }
      $new_name = $s_user_id;
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
      if(move_uploaded_file($old_name, '../../prof/'.$new_name)){
          $prof_path = "prof/".$new_name;
          $msg = $gazou. 'のアップロードに成功しました';
      }else {
          $msg = 'アップロードに失敗しました';
      }
  }


  if ($nickname) {
    $sql = "update sanka_users set nickname = '".$nickname."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($fullname) {
    $sql = "update sanka_users set fullname = '".$fullname."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($user_address) {
    $sql = "update sanka_users set user_address = '".$user_address."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }
  if ($area_id) {
    $sql = "update sanka_users set area_id = '".$area_id."' where s_user_id = '".$s_user_id."'";
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
  if ($prof_path) {
    $sql = "update sanka_users set prof_path = '".$prof_path."' where s_user_id = '".$s_user_id."'";
    $db->query($sql);
  }

  if ($area_data = $db->query("SELECT DISTINCT area_id, area_name, pref_name FROM areas")) {
    foreach ($area_data as $area_datas) {
      $pulldown .= "<option value='" . $area_datas['area_id'] . "' id='option'>" .$area_datas['pref_name']." ".$area_datas['area_name'] . "</option>";
    }
  }
  $sql = "select * from sanka_users where s_user_id = '".$s_user_id."'";
  $res = $db->query($sql)->fetch();
  $s_user_id    = $res['s_user_id'];
  $nickname     = $res['nickname'];
  $fullname     = $res['fullname'];
  $user_address = $res['user_address'];
  $area_id      = $res['area_id'];
  $gender       = $res['gender'];
  $message      = $res['message'];
  $mail_address = $res['mail_address'];
  $tel_num      = $res['tel_num'];
  $passwd       = $res['passwd'];

  $sql = "select pref_name,area_name from areas where area_id= '".$area_id."'";
  $res = $db->query($sql)->fetch();
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./s_setting.css">
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
  <div id="header-fixed">
  <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <a href="javascript:formback.submit()">
        <p id="back"><i class="fas fa-reply"></i></p>
      </a>
    </form>
    <form method="post" name="home" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <a href="javascript:home.submit()">
        <p id="home"><i class="fas fa-home"></i></p>
      </a>
    </form>
  </div>


  <div id="body-bk">
    <div id="Toptitle2">
      <i class="fas fa-cogs"></i>アカウント設定
    </div>
    <div id="body" class="radio size1">
      <form action ="s_setting_edit.php" method="post" name="myform" enctype="multipart/form-data" onsubmit="return check();">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>">
        <dl>
      <center> <!-- 中央寄せ -->
      <h2>
        <dt>プロフィール画像</dt>
        <dd><input type="file" name="pic" id="pic" accept="image/*"></dd>
        <img src=<?php echo '../../'.$prof_path; ?> id="preview" width="400" height="300">
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

        <dt>名前</dt>
        <dd><input type="text" name="fullname" id="input1" value="<?php echo $fullname; ?>" class="waku" required></dd>
        <hr color="black"><br/>
        <dt>メールアドレス</dt>
        <dd><input type="text" name="mail_address" id="input2" value="<?php echo $mail_address; ?>" class="waku" required></dd>
        <?php if ($check_mail) {echo $check_mail.'は使用できません。';} ?>
        <hr color="black"><br/><br/>
        <dt>パスワード</dt>
        <dd><input type = "text" name ="passwd" id="input3" value="<?php echo $passwd; ?>" class="waku" required></dd>
        <hr color="black"><br/><br/>
        <dt>住所</dt>
        <dd><input type = "text" name ="user_address" id="input4" value="<?php echo $user_address; ?>" class="waku" required></dd>
        <hr color="black"><br/><br/>
        <dt>電話番号</dt>
        <dd><input type = "text" name ="tel_num" id="input5" value="<?php echo $tel_num; ?>" class="waku" required></dd>
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
        <dd><input type = "text" name ="massage" id="input6" value="<?php echo $message; ?>" class="waku" maxlength='20'></dd>
        <hr color="black"><br/><br/>

      <p>
        <dt>住所エリア選択</dt>
        <dd><select name ="area_id" type="number"></dd>
            <option value="<?php echo $area_id; ?>" selected><?php echo $res['pref_name']; ?> <?php echo $res['area_name'] ; ?>(登録中)</option>
            <?php
            echo $pulldown;
            ?>
        </select>
      </p>
      <hr color="black"><br/>
        <dt>ニックネーム</dt>
        <dd><input type = "text" name ="nickname" id="input7" value="<?php echo $nickname; ?>" class="waku" required></dd>
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

</body>
</html>
