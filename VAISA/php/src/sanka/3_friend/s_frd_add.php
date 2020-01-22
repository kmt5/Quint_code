<?php
$user_id='1234567a';
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
    <img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
    <a href= "s_frd_first.html">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
    <a href= "s_home.html">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
    </a>
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
        <a href="s_frd_add_appnow.php">フレンド申請中ユーザ一覧</a>
        <p class="id">あなたのID：<?php echo $user_id;?> </p>
        <form action="s_frd_add_app.php" method="POST" id="pal">
          <input type="text" name="name" id="input" class="text" placeholder="検索したいIDを入力してください">
          <button type="submit" name="seek" class="search" onclick="serLeng()">検索</button>
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
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>

  </div>
