<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>参加者一覧</title> <!-- ページのタイトル -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"><!-- アイコンを外部からダウンロード -->
  <link rel="stylesheet" type="text/css" href="../common/common.css">
  <link rel="stylesheet" type="text/css" href="entrant.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../common/header.jpg" width="100%" height="100%">
    <a href="javascript:history.back()">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
    <a href="b_home">
      <p id="home"><i class="fas fa-home"></i></p>
    </a>
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle2">
        <i class="fas fa-handshake"></i>　参加者一覧
      </div>
      <h1 align="center">ボランティア一覧</h1>
      <div align="center">
        <?php
            $vol_name = ["ゴミ拾い", "これで２０もじになるようにあいうえおあお", "hello", "屋台"];
            $array_count = count($vol_name);
            for ($i = 0; $i < $array_count; $i++) {
              echo "<form action='b_entrant_list.php' method='post'>";
              echo "<button type='submit' class='button-vol'>".$vol_name[$i]."</button>";
              echo "</form>";
              echo "<br>";
            }
          ?>
      </div>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
