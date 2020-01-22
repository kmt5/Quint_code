<?php
session_start();

//データベースに接続(test3)
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');

$s_user_id = $_POST["s_user_id"];
//$s_user_id = '00000001';
$id = $_POST['vol_id'];
//echo $id;

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
$getName = $db->query("SELECT vol_fig_path FROM volunteers WHERE vol_id = $id");
foreach ($getName as $get_name) {
    $vol_fig_path =  $get_name['vol_fig_path'];
}
?>

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
                    <p><?php echo $vol_name; ?></p>
                    <h2>地域</h2>
                    <p><?php echo $pref_name;
                        echo $area_name; ?></p>
                    <h2>住所</h2>
                    <p><?php echo $post_num; ?><br>
                        <?php echo $vol_place; ?></p>
                    <h2>開催日</h2>
                    <p><?php echo date('Y年m月d日',  strtotime($vol_date)); ?><br>
                        開始時間：<?php echo $vol_beg_time; ?><br>
                        終了時間：<?php echo $vol_fin_time; ?>
                        <h2>定員</h2>
                        <p><?php echo $vol_capacity; ?>名</p>
                        <h2>ボランティアイメージ画像</h2>
                        <?php if ($vol_fig_path == null) {
                            echo "登録されている写真はありません。";
                        } else {
                            echo "<img src=../b_vol_regd/" . $vol_fig_path . ">";
                        } ?>
                        <br><br>
                        <h2>詳細</h2>
                        <p><?php echo $vol_detail; ?></p>
                        <br>
                </form>
                <script>
                    function check() {
                        if (window.confirm('登録してしてよろしいですか？')) { // 確認ダイアログを表示
                            window.alert('登録が完了しました');
                            return true; // 「OK」時は送信を実行
                        } else { // 「キャンセル」時の処理
                            window.alert('キャンセルされました'); // 警告ダイアログを表示
                            return false; // 送信を中止
                        }
                    }

                    function check1() { // 解除するとき
                        if (window.confirm('登録を解除してしてよろしいですか？')) { // 確認ダイアログを表示
                            window.alert('登録が解除されました');
                            return true; // 「OK」時は送信を実行
                        } else { // 「キャンセル」時の処理
                            window.alert('キャンセルされました'); // 警告ダイアログを表示
                            return false; // 送信を中止
                        }
                    }

                    function oki_check() {
                        if (window.confirm('お気に入りにしますか？')) { // 確認ダイアログを表示
                            window.alert('お気に入りに登録しました');
                            return true; // 「OK」時は送信を実行
                        } else { // 「キャンセル」時の処理
                            window.alert('キャンセルされました'); // 警告ダイアログを表示
                            return false; // 送信を中止
                        }
                    }

                    function oki_check1() { // 解除するとき
                        if (window.confirm('お気に入りを解除してしてよろしいですか？')) { // 確認ダイアログを表示
                            window.alert('お気に入りが解除されました');
                            return true; // 「OK」時は送信を実行
                        } else { // 「キャンセル」時の処理
                            window.alert('キャンセルされました'); // 警告ダイアログを表示
                            return false; // 送信を中止
                        }
                    }
                </script>
                <?php
                //ボタンの状態を前画面より取得
                if (isset($_POST["value"])) {
                    $value = $_POST["value"];
                }
                if (isset($_POST["value1"])) {
                    $value1 = $_POST["value1"];
                }

                if ($value == 1) {
                    echo "<form action='s_search_result_vol.php' method='post' onSubmit='return check()'>";
                    echo "<input type='hidden' value='2' name='value'>";
                    echo "<input type='hidden' value='" . $value1 . "' name='value1'>";
                    echo "<input type='hidden' name='vol_id' value=" . $id . ">";
                    echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
                    echo "<button type='submit' align='center' id='regd'>参加登録</button>";
                    echo "</form>";
                } else {
                    echo "<form action='s_search_result_vol.php' method='post' onSubmit='return check1()'>";
                    echo "<input type='hidden' value='1' name='value'>";
                    echo "<input type='hidden' value='" . $value1 . "' name='value1'>";
                    echo "<input type='hidden' name='vol_id' value=" . $id . ">";
                    echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
                    echo "<button type='submit' align='center' id='regd1'>参加登録を解除する</button>";
                    echo "</form>";
                }
                ?>
                <?php
                if ($value1 == 1) {
                    $value1 == 2;
                    echo "<form action='s_search_result_vol.php' method='post' onSubmit='return oki_check()'>";
                    echo "<input type='hidden' value='" . $value . "' name='value'>";
                    echo "<input type='hidden' value='2' name='value1'>";
                    echo "<input type='hidden' name='vol_id' value=" . $id . ">";
                    echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
                    echo "<button type='submit' align='center' id='oki'>お気に入り</button>";
                    echo "</form>";
                } else {
                    $value1 == 1;
                    echo "<form action='s_search_result_vol.php' method='post' onSubmit='return oki_check1()'>";
                    echo "<input type='hidden' value='" . $value . "' name='value'>";
                    echo "<input type='hidden' value='1' name='value1'>";
                    echo "<input type='hidden' name='vol_id' value=" . $id . ">";
                    echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
                    echo "<button type='submit' align='center' id='oki1'>お気に入りを解除する</button>";
                    echo "</form>";
                }
                ?>
                <?php
                $_SESSION[$value];
                $_SESSION[$value1];

                $s_table = $db->query("SELECT s_user_id FROM sanka_situations WHERE vol_id = $id AND s_user_id = $s_user_id");
                foreach ($s_table as $get_table) {
                    $table =  $get_table['s_user_id'];
                }
                //echo $id;
                //echo $s_user_id;

                if (empty($table)) {
                    echo $id;
                    $regist = $db->prepare("INSERT INTO sanka_situations(vol_id, s_user_id, read_flag, set_flag, favo_flag) VALUES (:vol_id, :s_user_id, :readf, :setf, :fav)");
                    $regist->bindValue(":vol_id", $id, PDO::PARAM_INT);
                    $regist->bindParam(":s_user_id", $s_user_id, PDO::PARAM_STR);
                    $regist->bindValue(":readf", 0, PDO::PARAM_INT);
                    $regist->bindValue(":setf", 0, PDO::PARAM_INT);
                    $regist->bindValue(":fav", 0, PDO::PARAM_INT);
                    $regist->execute();

                    if ($_POST['value'] == 2) {
                        $db->query("UPDATE sanka_situations SET set_flag = 1 WHERE s_user_id = $s_user_id AND vol_id = $id");
                    } else {
                        $db->query("UPDATE sanka_situations SET set_flag = 0 WHERE s_user_id = $s_user_id AND vol_id = $id");
                    }
                    if ($_POST['value1'] == 2) {
                        $db->query("UPDATE sanka_situations SET favo_flag = 1 WHERE s_user_id = $s_user_id AND vol_id = $id");
                    } else {
                        $db->query("UPDATE sanka_situations SET favo_flag = 0 WHERE s_user_id = $s_user_id AND vol_id = $id");
                    }
                } else {
                    if ($_POST['value'] == 2) {
                        $db->query("UPDATE sanka_situations SET set_flag = 1 WHERE s_user_id = $s_user_id AND vol_id = $id");
                        //echo $id . "-" . $s_user_id;
                    } else {
                        $db->query("UPDATE sanka_situations SET set_flag = 0 WHERE s_user_id = $s_user_id AND vol_id = $id");
                    }
                    if ($_POST['value1'] == 2) {
                        $db->query("UPDATE sanka_situations SET favo_flag = 1 WHERE s_user_id = $s_user_id AND vol_id = $id");
                    } else {
                        $db->query("UPDATE sanka_situations SET favo_flag = 0 WHERE s_user_id = $s_user_id AND vol_id = $id");
                    }
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