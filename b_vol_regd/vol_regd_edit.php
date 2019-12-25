<?php

header("Content-type: text/html; charset=utf-8");

require_once("db.php");
$mysqli = db_connect();

if(empty($_POST)) {
	echo "<a href='b_vol_regd_list.php'>update1.php</a>←こちらのページからどうぞ";
	exit();
}else{
	if (!isset($_POST['id'])  || !is_numeric($_POST['id']) ){
		echo "IDエラー";
		exit();
	}else{
		//プリペアドステートメント
		$stmt = $mysqli->prepare("SELECT * FROM vol WHERE id=?");
		if ($stmt) {
			//プレースホルダへ実際の値を設定する
			$stmt->bind_param('i', $id);
			$id = $_POST['id'];

			//クエリ実行
			$stmt->execute();

			//結果変数のバインド
			$stmt->bind_result($id,$vol_name);
			// 値の取得
			$stmt->fetch();

			//ステートメント切断
			$stmt->close();
		}else{
			echo $mysqli->errno . $mysqli->error;
		}
	}
}

// データベース切断
$mysqli->close();

?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>Sample</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/vol_regd.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg" width="100%" height="100%">
    <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    <img border="0" src="home.jpg" width="20%" height="100%" class="home">
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        登録・編集
      </div>
      <h1>変更画面</h1>

<p>名前を変更して下さい。</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($vol_name, ENT_QUOTES, 'UTF-8')?>">
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
