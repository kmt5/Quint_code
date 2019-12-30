<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/color.css">
  <link rel=“stylesheet” type="text/css" href=“./CSS/size.css”>
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg" width="100%" height="100%">
  </div>
  <div id="body-bk">
    <div id="body" class="bg_test">
      <center> <!-- 中央寄せ -->
        <h1> 設定</h1>
      </center>
    </div>
    <div id="body">
      <center> <!-- 中央寄せ -->
      <h2>
        　　　　  　　プロフィール画像　　<input type="file" name="pic">
        <hr color="black"><br/>

        名前　　　　　　<input type = “text” name =“fullname“>
        <hr color="black"><br/>
        メールアドレス　<input type = “text” name =“mail_address“>
        <hr color="black"><br/><br/>
        パスワード　　　<input type = “text” name =“password“>
        <hr color="black"><br/><br/>
        住所　　　　　　<input type = “text” name =“user_address“>
        <hr color="black"><br/><br/>
        電話番号　　　　<input type = “text” name =“tel_num“>
        <hr color="black"><br/><br/>

      <p>
        性別　　　　　　　  　　　　<select name="gender">　　　　　　
        <option value="選択肢1">男</option>
        <option value="選択肢2">女</option>
        </select>
      </p>
      <hr color="black"><br/>
        ひとこと　　　　<input type = “text” name =“massage“>
        <hr color="black"><br/><br/>

      <p>
          住所エリア選択　　　　　　<select name ="area">
        <option value="選択肢1">高知</option>
        <option value="選択肢2">愛媛</option>
        </select>
      </p>
      <hr color="black"><br/>
        ニックネーム　　<input type = “text” name =“nickname“>
        <hr color="black"><br/>
      <br>
    </h2>
      <a href="s_setting_edit.php" class="btn-square">編集完了</a>
      <a href="s_setting_delete.php" class="btn-square">アカウント削除</a><br>
    </h2>
    </center>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
