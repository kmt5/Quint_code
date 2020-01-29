<?php
$user_id=$_POST['s_user_id'];
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>フレンド一覧</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_add.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div id="header-fixed">
<img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="s_frd_first.php">
      <input type="hidden" name="s_user_id" value="<?php echo $user_id; ?>" />
      <a href="javascript:formback.submit()">
        <p id="back"><i class="fas fa-reply"></i></p>
      </a>
    </form>
    <form method="post" name="formhome" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $user_id; ?>" />
      <a href="javascript:formhome.submit()">
        <p id="home"><i class="fas fa-home"></i></p>
      </a>
    </form>
</div>


  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        フレンド
        <div id="Toptitle-frd">
          <i class="fa fa-user-plus"></i>フレンド追加
        </div>
      </div>

      <div class="frd-add">
      <?php
      echo '<form method="post" name="form1" action="s_frd_add_appnow.php">';
      echo '<input type="hidden" name="s_user_id" value="'.$user_id.'">';
      echo '<a href="javascript:form1.submit()" style="color:black">';
      echo 'フレンド申請中ユーザ一覧';
      echo '</a>';
      echo '</form>';
      ?>
        <p class="id">あなたのID：<?php echo $user_id;?> </p>

        <form action="s_frd_add_app.php" method="POST" id="pal">
          <input type="text" name="name" id="input" class="text" placeholder="検索したいIDを入力してください">
          <button type="submit" name="seek" class="search" onclick="serLeng()">検索</button>
          <input type="hidden" name="s_user_id" value="<?php echo $user_id; ?>" />
        </form>
      </div>
    </div>
  </div>

<script>
  function serLeng(){
    var target = document.getElementById("input").value;
  if(target.length != 8){
  var result=window.alert("IDの長さが不正です")
  document.getElementById("pal").action="s_frd_add.php";
return false;
  }
return true;
  }
</script>
</body>
</html>

  </div>
