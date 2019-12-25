<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg" width="100%" height="100%">
  </div>
  <div id="body-bk">
    <div id="body">
      <?php
        $contents = file_get_contents("test.txt");
        echo $contents;
        ?>
    <h1>フォームデータの送信</h1>
      <form action = “output.php” method = “get”>
        <input type = “text” name =“comment/“><br/>
        <input type = “submit” value =“送信“>
      </form>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
