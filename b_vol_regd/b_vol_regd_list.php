<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<?php
//データベースに接続(test3)
$id = '00000001';
$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');
//接続確認    
if ($db) {
  echo "データベースに繋がっています";
} else {
  "データベースに繋がってないです";
}

$db->query("set names utf8");
$getVolName = $db->query("SELECT vol_name FROM volunteers WHERE b_user_id = $id");
$i = 0;
foreach ($getVolName as $volname) {
  $vol_name[$i] .= $volname['vol_name'];
  $i += 1;
}
$getCount = $db->query("SELECT COUNT(vol_name) AS num FROM volunteers WHERE b_user_id = $id");
foreach ($getCount as $get_count) {
  $count = $get_count['num'];
}
$php_vol_name = json_encode($vol_name);

$getVolId = $db->query("SELECT vol_id FROM volunteers WHERE b_user_id = $id");
$j = 0;
foreach ($getVolId as $volid) {
  $vol_id[$j] .= $volid['vol_id'];
  $j += 1;
}
$php_vol_id = json_encode($vol_id);

print "<br>";
echo $vol_name[0];
echo $vol_name[1];
echo $vol_name[1];
echo $vol_name[1];
echo $vol_id[0];
echo $count;
$db = null;
?>

<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>Sample</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
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
        <i class="fas fa-pencil-alt"></i>登録・編集
      </div>

      <table border='1' frame="box" rules="none">
        <tbody id="tbodyID">
          <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
          <script type="text/javascript">
            for (var i = 0; i < <?php echo $count ?>; i++) {
              var js_array = JSON.parse('<?php echo $php_vol_name; ?>');
              var js_array_id = JSON.parse('<?php echo $php_vol_id; ?>');
              var vol_id = js_array_id[i];

              document.write("<tr><td colspan='2' class='volList'>" + vol_id + js_array[i] + "</td></tr>");
              document.write("<tr>");
              document.write("<td>");
              document.write("<form action='vol_regd_edit.php' method='post'>");
              document.write("<input type='submit' value='編集'>");
              document.write("<input type='hidden' name='id' value=''>");
              document.write("</form>");
              document.write("</td>");
              document.write("<td>");
              document.write("<form action='b_vol_regd_delete.php' method='post'>");
              document.write("<input type='submit' id=delete value='削除'>");
              document.write("<input type='hidden' name='id' value=''>");
              document.write("</form>");
              document.write("</td>");
              document.write("</tr>");
            }
          </script>
      </table>

    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>

</html>