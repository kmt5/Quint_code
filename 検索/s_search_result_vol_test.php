<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>Sample</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../common/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/search_result_vol.css">
	<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../common/header.jpg" width="100%" height="100%">
    <a href="javascript:history.back()">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
    <a href="s_home">
      <p id="home"><i class="fas fa-home"></i></p>
    </a>
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        検索
      </div>
			<div width="100%" class="new">
        <h1 align="center">ボランティア内容</h1>
				<form action="receiver.php" method="post" align="left">
		  		<h2>ボランティア名</h2>
          <p>土佐山田清掃</p>
					<h2>地域</h2>
          <p>高知県香美市</p>
					<h2>住所</h2>
  				<p>〒●●●●●●<br>
            土佐山田</p>
					<h2>開催日</h2>
          <p>●●●●年○○月××日<br>
					   開始時間：○○時○○分<br>
	           終了時間：○○時○○分
					<h2>定員</h2>
				      <p>100名</p>
          <h2>ボランティアイメージ画像</h2>
          <input type="file" name="pic" class="img" accept=".jpg,.png,image/jpeg,image/png">
          <br><br>
					<h2>詳細</h2>
  				<p>内容はこんな感じです</p>
					<br>
          </form>
          <script>
            function check(){
              if(window.confirm('登録してしてよろしいですか？')){ // 確認ダイアログを表示
                window.alert('登録が完了しました');
                return true; // 「OK」時は送信を実行
              } else { // 「キャンセル」時の処理
                window.alert('キャンセルされました'); // 警告ダイアログを表示
                return false; // 送信を中止
              }
            }

            function check1(){ // 解除するとき
              if(window.confirm('登録を解除してしてよろしいですか？')){ // 確認ダイアログを表示
                window.alert('登録が解除されました');
                return true; // 「OK」時は送信を実行
            } else { // 「キャンセル」時の処理
              window.alert('キャンセルされました'); // 警告ダイアログを表示
              return false; // 送信を中止
            }
          }

          function oki_check(){
            if(window.confirm('お気に入りにしますか？')){ // 確認ダイアログを表示
              window.alert('お気に入りに登録しました');
              return true; // 「OK」時は送信を実行
            } else { // 「キャンセル」時の処理
              window.alert('キャンセルされました'); // 警告ダイアログを表示
              return false; // 送信を中止
            }
          }

          function oki_check1(){ // 解除するとき
            if(window.confirm('お気に入りを解除してしてよろしいですか？')){ // 確認ダイアログを表示
              window.alert('お気に入りが解除されました');
              return true; // 「OK」時は送信を実行
          } else { // 「キャンセル」時の処理
            window.alert('キャンセルされました'); // 警告ダイアログを表示
            return false; // 送信を中止
          }
        }
          </script>
          <?php
           $value = 1;

            if (isset($_POST["value"])){
              $value = $_POST["value"];
            }

            if ($value == 1) {
              echo "<form action='s_search_result_vol_test.php' method='post' onSubmit='return check()'>";
              echo "<input type='hidden' value='2' name='value'>";
              echo "<button type='submit' align='center' id='regd'>参加登録</button>";
              echo "</form>";
            } else {
              echo "<form action='s_search_result_vol_test.php' method='post' onSubmit='return check1()'>";
              echo "<input type='hidden' value='1' name='value'>";
              echo "<button type='submit' align='center' id='regd1'>参加登録を解除する</button>";
              echo "</form>";
            }

          ?>
          <?php
           $value1 = 1;

            if (isset($_POST["value1"])){
              $value1 = $_POST["value1"];
            }

            if ($value1 == 1) {
              echo "<form action='s_search_result_vol_test.php' method='post' onSubmit='return oki_check()'>";
              echo "<input type='hidden' value='2' name='value1'>";
              echo "<button type='submit' align='center' id='oki'>お気に入り</button>";
              echo "</form>";
            } else {
              echo "<form action='s_search_result_vol_test.php' method='post' onSubmit='return oki_check1()'>";
              echo "<input type='hidden' value='1' name='value1'>";
              echo "<button type='submit' align='center' id='oki1'>お気に入りを解除する</button>";
              echo "</form>";
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
