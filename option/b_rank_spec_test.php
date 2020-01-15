<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>検索上位表示</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="option.css">
</head>
<body>
  <div id="header-fixed">  <!-- ヘッダー箇所 -->
    <img border="0" src="../common/header.jpg" width="100%" height="100%">
    <img border="0" src="../common/back.jpg" width="20%" height="100%" class="back">
    <img border="0" src="../common/home.jpg" width="20%" height="100%" class="home">
  </div>
  <div id="body-bk">
    <div id="body">
      <!-- ページ上部のタイトル部分 -->
      <div id="Toptitle2">
        <i class="fab fa-searchengin"></i>検索上位表示
      </div>
      <div class="setumei">
        ボランティア情報検索の際に<br>
        募集する参加者のランクを<br>
        指定可能にするオプションです
      </div>

      <div class="zyokyo">
        <p id="status">利用状況：　無効</p>
      </div>
      <div class="b">
        月額200円（税別）
        <br>
        <br>
        <!-- onclickでjsのtest関数を呼び出す -->
        <button type="submit" id="banner" onclick="postForm()">登録をする</button>
    </div>
    <?php

      $value = $_POST['test'];

      printf('<script>var value = %s;
      var elm = document.getElementById("status");
      var elm1 = document.getElementById("banner");

      if ( value == true){
        elm.textContent = "利用状況：　有効";
        elm1.textContent = "登録を解除する";
      }
      </script>', $value);
    ?>
    <script>
    function postForm() {

    var result = window.confirm("実行しますか？");

    var elm1 = document.getElementById("banner");

    var form = document.createElement('form');
    var request = document.createElement('input');

    form.method = 'POST';
    form.action = 'test.php';

    request.type = 'hidden'; //入力フォームが表示されないように
    request.name = 'test';

    var str = '登録をする';

    if( result ) {
      if(elm1.textContent == str){
        request.value = 'true';
      }else {
        request.value = 'false';
      }
    }


    form.appendChild(request);
    document.body.appendChild(form);

    form.submit();

    }
    </script>
  </div>
  <div id="footer-fixed">
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
