<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>参加登録ボランティア</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/mybora.css">
  <link rel="stylesheet" type="text/css" href="./CSS/tab.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./CSS/my_fav.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <a href= "s_my_first.html">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
    <a href= "s_home.html">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
    </a>
  </div>
  <div id = "body-bk">
    <div id = "body">
      <div id ="Toptitle2">
        マイボランティア
        <div id ="Toptitle-my">
          参加登録ボランティア
        </div>
      </div>

      <div id = "tab-color">
        <div id="tabcontrol">
          <center>
            <a href="#tabpage1">2019 12</a>
            <a href="#tabpage2">2020 1</a>
            <a href="#tabpage3">2020 2</a>
          </center>
        </div>
      </div>

<div id="tabbody">
<?php
    $dbh=null;
      // ポストのデータを変数に
    $name = $_POST["username"];
    $age = $_POST["age"];
//データベースに接続(test3)
    $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
    $db = new PDO($dsn, 'root', 'root');
    $volid = "SELECT * FROM volunteers WHERE vol_id in (SELECT vol_id FROM sanka_situations where s_user_id = '1234567a' and set_flag = 1)";
    $result = $db->query($volid);
    if (!$result) {
      die('クエリが失敗'); // これが本当の「クエリが失敗」であって，最初のものは「接続が失敗」なのでエラーメッセージが不適切
  }
    foreach ($result as $row) {
      if(date("m",strtotime($row['vol_date'])) == '12'){
      echo '<div id="tabpage1">';
      echo '<h1>';
      echo date("d日  ",strtotime($row['vol_date'])).date("H:i",strtotime($row['vol_beg_time'])).'~'.date("H:i",strtotime($row['vol_fin_time']));
      echo '<br>';
      echo '場所 '.$row['vol_place'];
      echo '<br>';
      echo '内容 '.$row['vol_name'];
      echo '<button class="del">登録解除</button>';
      echo '<br>';
      echo '</div>';
      }
    }
  ?>
<?php
    $dbh=null;
      // ポストのデータを変数に
    $name = $_POST["username"];
    $age = $_POST["age"];
//データベースに接続(test3)
    $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
    $db = new PDO($dsn, 'root', 'root');
    $volid = "SELECT * FROM volunteers WHERE vol_id in (SELECT vol_id FROM sanka_situations where s_user_id = '1234567a' and set_flag = 1)";
    $result = $db->query($volid);
    if (!$result) {
      die('クエリが失敗'); // これが本当の「クエリが失敗」であって，最初のものは「接続が失敗」なのでエラーメッセージが不適切
  }
    foreach ($result as $row) {
      if(date("m",strtotime($row['vol_date'])) == '1'){
      echo '<div id="tabpage2">';
      echo '<h1>';
      echo date("d日  ",strtotime($row['vol_date'])).date("H:i",strtotime($row['vol_beg_time'])).'~'.date("H:i",strtotime($row['vol_fin_time']));
      echo '<br>';
      echo '場所 '.$row['vol_place'];
      echo '<br>';
      echo '内容 '.$row['vol_name'];
      echo '<button class="del">登録解除</button>';
      echo '<br>';
      echo '</div>';
      }
    }
  ?>
<?php
    $dbh=null;
      // ポストのデータを変数に
    $name = $_POST["username"];
    $age = $_POST["age"];
//データベースに接続(test3)
    $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
    $db = new PDO($dsn, 'root', 'root');
    $volid = "SELECT * FROM volunteers WHERE vol_id in (SELECT vol_id FROM sanka_situations where s_user_id = '1234567a' and set_flag = 1)";
    //ユーザIDとフラグを確認
    $result = $db->query($volid);
    if (!$result) {
      die('クエリが失敗'); // これが本当の「クエリが失敗」であって，最初のものは「接続が失敗」なのでエラーメッセージが不適切
  }
    foreach ($result as $row) {
      //if文により表示月の厳選
      if (date("m",strtotime($row['vol_date'])) == '2') {
      echo '<div id="tabpage3">';
      echo '<h1>';
      echo date("d日  ",strtotime($row['vol_date'])).date("H:i",strtotime($row['vol_beg_time'])).'~'.date("H:i",strtotime($row['vol_fin_time']));
      echo '<br>';
      echo '場所 '.$row['vol_place'];
      echo '<br>';
      echo '内容 '.$row['vol_name'];
      echo '<button class="del">登録解除</button>';
      echo '<br>';
      echo '</div>';
      }
    }
  ?>
  </div>
  </div>
</div>

<div class="popup-overlay">
  <!--Creates the popup content-->
  <div class="popup-content">
    <p><h1>登録を解除しますか?</p>
    <!--popup's close button-->
    <button class="ok">OK</button>
    <button class="no">キャンセル</button>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
    // ---------------------------
    // ▼A：対象要素を得る
    // ---------------------------
    var tabs = document.getElementById('tabcontrol').getElementsByTagName('a');
    var pages = document.getElementById('tabbody').getElementsByTagName('div');
    // ---------------------------
    // ▼B：タブの切り替え処理
    // ---------------------------
    function changeTab() {
       // ▼B-1. href属性値から対象のid名を抜き出す
       var targetid = this.href.substring(this.href.indexOf('#')+1,this.href.length);

       // ▼B-2. 指定のタブページだけを表示する
       for(var i=0; i<pages.length; i++) {
          if( pages[i].id != targetid ) {
             pages[i].style.display = "none";
          }
          else {
             pages[i].style.display = "block";
          }
       }
       // ▼B-3. クリックされたタブを前面に表示する
       for(var i=0; i<tabs.length; i++) {
          tabs[i].style.zIndex = "0";
       }
       this.style.zIndex = "10";
       // ▼B-4. ページ遷移しないようにfalseを返す
       return false;
    }
    // ---------------------------
    // ▼C：すべてのタブに対して、クリック時にchangeTab関数が実行されるよう指定する
    // ---------------------------
    for(var i=0; i<tabs.length; i++) {
       tabs[i].onclick = changeTab;
    }
    // ---------------------------
    // ▼D：最初は先頭のタブを選択しておく
    // ---------------------------
    tabs[0].onclick();
    //appends an "active" class to .popup and .popup-content when the "Open" button is clicked
  $(".del").on("click", function(){
    $(".popup-overlay, .popup-content").addClass("active");
  });

  //removes the "active" class to .popup and .popup-content when the "Close" button is clicked
  $(".ok, .popup-overlay").on("click", function(){
    $(".popup-overlay, .popup-content").removeClass("active");
  });

  $(".no, .popup-overlay").on("click", function(){
    $(".popup-overlay, .popup-content").removeClass("active");
  });
  </script>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
