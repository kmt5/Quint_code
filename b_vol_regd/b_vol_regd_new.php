<?php

header("Content-type: text/html; charset=utf-8");

require_once("db.php");
$mysqli = db_connect();

$sql = "SELECT * FROM vol";

$result = $mysqli -> query($sql);

//クエリ失敗
if(!$result) {
	echo $mysqli->error;
	exit();
}

//連想配列で取得
while($row = $result->fetch_array(MYSQLI_ASSOC)){
	$rows[] = $row;
}

//結果セットを解放
$result->free();

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
      <table border='1'>

<?php
foreach($rows as $row){
 ?>

<tr>
	<td class="volList"><?=$row['id']?></td>
	<td class="voLlist"><?=htmlspecialchars($row['vol_name'], ENT_QUOTES, 'UTF-8')?></td>
	<td>
		<form action="update2.php" method="post">
		<input type="submit" value="変更する">
		<input type="hidden" name="id" value="<?=$row['id']?>">
		</form>
	</td>
  <td>
		<form action="delete2.php" method="post">
		<input type="submit" value="削除する">
		<input type="hidden" name="id" value="<?=$row['id']?>">
		</form>
	</td>
</tr>

 <?php
 }
 ?>

</table>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
