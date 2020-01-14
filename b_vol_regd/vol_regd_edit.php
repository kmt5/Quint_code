<!DOCTYPE html>
<html>
<?php
//データベースに接続(test3)
$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');
//接続確認    
if ($db) {
    echo "データベースに繋がっています";
} else {
    "データベースに繋がってないです";
}
?>
<?php
if( isset( $_POST[ 'vol_id' ] ) ){
    print "送信された内容は{$_POST['vol_id']}です。<br/>";
  }
$id = $_POST['vol_id'];
$db->query("set names utf8");
$getName = $db->query("SELECT vol_name FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $vol_name =  $get_name['vol_name'];
}
$getDate = $db->query("SELECT vol_date FROM volunteers WHERE vol_id = $id");
foreach ($getDate as $get_date) {
    $vol_date =  $get_date['vol_date'];
}
$getBeg = $db->query("SELECT vol_beg_time FROM volunteers WHERE vol_id = $id");
foreach ($getBeg as $get_beg) {
    $vol_beg_time =  $get_beg['vol_beg_time'];
}
$getFin = $db->query("SELECT vol_fin_time FROM volunteers WHERE vol_id = $id");
foreach ($getFin as $get_fin) {
    $vol_fin_time =  $get_fin['vol_fin_time'];
}
$getCapa = $db->query("SELECT vol_capacity FROM volunteers WHERE vol_id = $id");
foreach ($getCapa as $get_capa) {
    $vol_capacity =  $get_capa['vol_capacity'];
}
$getNum = $db->query("SELECT post_num FROM volunteers WHERE vol_id = $id");
foreach ($getNum as $get_num) {
    $post_num =  $get_num['post_num'];
}
$getPlace = $db->query("SELECT vol_place FROM volunteers WHERE vol_id = $id");
foreach ($getPlace as $get_place) {
    $vol_place =  $get_place['vol_place'];
}
$getName = $db->query("SELECT val_flag FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $val_flag =  $get_name['val_flag'];
}
$getName = $db->query("SELECT newbie_flag FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $newbie_flag =  $get_name['newbie_flag'];
}
$getName = $db->query("SELECT vol_detail FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $vol_detail =  $get_name['vol_detail'];
}
$getName = $db->query("SELECT pref_id FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $pref_id =  $get_name['pref_id'];
}
$getName = $db->query("SELECT pref_name FROM areas WHERE pref_id = $pref_id");
foreach ($getName as $get_name) {
    $pref_name =  $get_name['pref_name'];
}
$getName = $db->query("SELECT spec_rank FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $spec_rank =  $get_name['spec_rank'];
}
$getName = $db->query("SELECT b_user_id FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $b_user_id =  $get_name['b_user_id'];
}
$getName = $db->query("SELECT area_id FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $area_id =  $get_name['area_id'];
}
$getName = $db->query("SELECT area_name FROM areas WHERE area_id = $area_id");
foreach ($getName as $get_name) {
    $area_name =  $get_name['area_name'];
}

$getName = $db->query("SELECT vol_point FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $point =  $get_name['vol_point'];
}
$getName = $db->query("SELECT vol_fig_pass FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $vol_fig_pass =  $get_name['vol_fig_pass'];
}
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

<p>ボランティア名</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($vol_name, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>ボランティアイメージ写真</p>
<form action="update3.php" method="post">
<img src=<?php echo $vol_fig_pass; ?>>
<input type="file" name="image" accept="image/*">
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>地域選択</p>
<p>都道府県</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($pref_name, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>
<p>地域区分</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($area_name, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>郵便番号</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($post_num, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>住所</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($vol_place, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>開催日</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($vol_date, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>開始時間</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($vol_beg_time, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>終了時間</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($vol_fin_time, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>定員</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($vol_capacity, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>初心者OK</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($newbie_flag, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>ランク指定</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($spec_rank, ENT_QUOTES, 'UTF-8')?>"> 
<input type="hidden" name="id" value="<?=$id?>">
<input type="submit" value="変更する">
</form>

<p>詳細</p>
<form action="update3.php" method="post">
<input type="text" name="name" value="<?=htmlspecialchars($vol_detail, ENT_QUOTES, 'UTF-8')?>"> 
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
