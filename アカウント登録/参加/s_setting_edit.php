<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>PHP</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/color.css">
  <link rel=“stylesheet” type="text/css" href=“./CSS/size.css”>
  <link rel=“stylesheet” type="text/css" href=“./CSS/pop.css”>
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <a href= "s_home.html">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
    <a href= "s_home.html">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
    </a>
  </div>


  <div id="body-bk">
    <div id="body" class="bg_test">
      <center> <!-- 中央寄せ -->
        <h1> 参加側アカウント登録</h1>
      </center>
    </div>
    <div id="body" class="radio size1">
      <form action ="s_setting_edit.php" method="get" name="myform" onsubmit="return check();">
        <dl>
      <center> <!-- 中央寄せ -->
      <h2>
        <dt>プロフィール画像</dt>
        <dd><input type="file" name="pic"></dd>
        <hr color="black"><br/>

        <dt>名前</dt>
        <dd><input type="text" name="fullname" id="input1" value=""></dd>
        <hr color="black"><br/>
        <dt>メールアドレス</dt>
        <dd><input type = “text” name =“mail_address“ id="input2" value=""></dd>
        <hr color="black"><br/><br/>
        <dt>パスワード</dt>
        <dd><input type = “text” name =“password“ id="input3" value=""></dd>
        <hr color="black"><br/><br/>
        <dt>住所</dt>
        <dd><input type = “text” name =“user_address“ id="input4" value=""></dd>
        <hr color="black"><br/><br/>
        <dt>電話番号</dt>
        <dd><input type = “text” name =“tel_num“ id="input5" value=""></dd>
        <hr color="black"><br/><br/>

      <p>
        <dt>性別</dt>
        <input type="radio" name="gender" class="radio-input" id="radio-01">
        <label for="radio-01">男</label>
        <input type="radio" name="gender" class="radio-input" id="radio-02">
        <label for="radio-02">女</label><br>
      </p>
      <hr color="black"><br/>
        <dt>ひとこと</dt>
        <dd><input type = “text” name =“massage“ id="input6" value=""></dd>
        <hr color="black"><br/><br/>

      <p>
        <dt>住所エリア選択</dt>
        <dd><select name ="area"></dd>
        <option value="選択肢1" id="option">高知</option>
        <option value="選択肢2" id="option">愛媛</option>
        </select>
      </p>
      <hr color="black"><br/>
        <dt>ニックネーム</dt>
        <dd><input type = “text” name =“nickname“ id="input7" value=""></dd>
        <hr color="black"><br/>
        <br>
        <input type="submit" value="編集完了" class="btn-square5">
        <a href="s_setting_delete.php" class="btn-square4">アカウント削除</a><br>
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
    }
  }
  </script>


  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
