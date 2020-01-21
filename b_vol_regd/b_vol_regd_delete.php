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

<head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>Sample</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="./CSS/common.css">
    <link rel="stylesheet" type="text/css" href="./CSS/vol_regd.css">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
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
                <i class="fas fa-edit"></i>　登録・編集
            </div>
            <div width="100%" class="new">
                <h1 align="center">ボランティア内容</h1>
                <form action="b_vol_regd_delete.php" method="post" align="left">
                    <h2>ボランティア名</h2>
                    <?php echo $vol_name; ?>
                    <br>
                    <h2>ボランティアイメージ画像</h2>
                    <img id="preview" src=<?php echo $vol_fig_pass; ?> >
                    <h2>地域選択</h2>
                    <label>都道府県　</label>
                    <?php echo $pref_name; ?>
                    <br><br>
                    <label>地域　　　</label>
                    <?php echo $area_name; ?>
                    <br>
                    <h2>郵便番号</h2>
                    <?php echo $post_num; ?>
                    <br>
                    <h2>住所</h2>
                    <?php echo $vol_place; ?>
                    <br>
                    <h2>開催日</h2>
                    <?php echo $vol_date; ?>
                    <br>
                    <label>開始時間</label>
                    <?php echo $vol_beg_time; ?>
                    <br>
                    <label>終了時間</label>
                    <?php echo $vol_fin_time; ?>
                    <h2>定員</h2>
                    <?php echo $vol_capacity; ?>
                    <br><br>
                    <?php if ($val_flag == 1) {echo "報酬あり";} else {echo "報酬なし";} ?>
                    <br><br>
                    <?php if ($newbie_flag == 1) {echo "初心者歓迎";} else {echo "";} ?>
                    <br><br>
                    <label>ランク指定　</label>
                    <?php if ($spec_rank == 0) {echo "なし";} else {echo $rank_spec;} ?>
                    <br><br>
                    <h2>詳細</h2>
                    <?php echo $vol_detail; ?>
                    <br>
                    <h2>この内容で削除しますか？</h2><br>
                    <button type="submit" align="center" onclick="test()">削除</button>

                    <?php
                    $value = '<script>document.write(value);</script>';
                    echo $value;
                    if ($value == true) {
                    $db->query("UPDATE volunteers SET disapp_flag = 1 WHERE vol_id = $id");
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script>
        function test() {
            var result = window.confirm('本当に削除しますか？');
            if (result) {
                var value = true;
            }
        }
    </script>
    <div id="footer-fixed">
        <img border="0" src="kokoku.jpg" width="100%" height="100%">
    </div>
</body>

</html>
<?php $db=null; ?>
