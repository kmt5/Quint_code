<?php
session_start();
//データベースに接続(test3)
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');

$s_user_id = $_POST["s_user_id"];
$vol_id = $_POST['vol_id'];

if (isset($_POST['sanka'])) {
    echo "set" . $_SESSION['set'];
    if ($_SESSION['set'] == 1) {
        $db->query("UPDATE sanka_situations SET set_flag = 1 WHERE s_user_id = $s_user_id AND vol_id = $vol_id");
    } else {
        $db->query("UPDATE sanka_situations SET set_flag = 0 WHERE s_user_id = $s_user_id AND vol_id = $vol_id");
    }
} else if (isset($_POST['favo'])) {
    echo "favo" . $_SESSION['favo'];
    if ($_SESSION['favo'] == 1) {
        $db->query("UPDATE sanka_situations SET favo_flag = 1 WHERE s_user_id = $s_user_id AND vol_id = $vol_id");
        echo "11ここ！";
    } else {
        $db->query("UPDATE sanka_situations SET favo_flag = 0 WHERE s_user_id = $s_user_id AND vol_id = $vol_id");
        echo "22ここ！";
    }
}

$db->query("set names utf8");
$getName = $db->query("SELECT vol_name FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $vol_name =  $get_name['vol_name'];
}
$getDate = $db->query("SELECT vol_date FROM volunteers WHERE vol_id = $vol_id");
foreach ($getDate as $get_date) {
    $vol_date =  $get_date['vol_date'];
}
$getBeg = $db->query("SELECT vol_beg_time FROM volunteers WHERE vol_id = $vol_id");
foreach ($getBeg as $get_beg) {
    $vol_beg_time =  $get_beg['vol_beg_time'];
}
$getFin = $db->query("SELECT vol_fin_time FROM volunteers WHERE vol_id = $vol_id");
foreach ($getFin as $get_fin) {
    $vol_fin_time =  $get_fin['vol_fin_time'];
}
$getCapa = $db->query("SELECT vol_capacity FROM volunteers WHERE vol_id = $vol_id");
foreach ($getCapa as $get_capa) {
    $vol_capacity =  $get_capa['vol_capacity'];
}
$getNum = $db->query("SELECT post_num FROM volunteers WHERE vol_id = $vol_id");
foreach ($getNum as $get_num) {
    $post_num =  $get_num['post_num'];
}
$getPlace = $db->query("SELECT vol_place FROM volunteers WHERE vol_id = $vol_id");
foreach ($getPlace as $get_place) {
    $vol_place =  $get_place['vol_place'];
}
$getName = $db->query("SELECT val_flag FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $val_flag =  $get_name['val_flag'];
}
$getName = $db->query("SELECT newbie_flag FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $newbie_flag =  $get_name['newbie_flag'];
}
$getName = $db->query("SELECT vol_detail FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $vol_detail =  $get_name['vol_detail'];
}
$getName = $db->query("SELECT pref_id FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $pref_id =  $get_name['pref_id'];
}
$getName = $db->query("SELECT pref_name FROM areas WHERE pref_id = $pref_id");
foreach ($getName as $get_name) {
    $pref_name =  $get_name['pref_name'];
}
$getName = $db->query("SELECT spec_rank, rank_spec_flag, b_user_id FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $spec_rank =  $get_name['spec_rank'];
    $rank_spec_flag =  $get_name['rank_spec_flag'];
    $b_user_id =  $get_name['b_user_id'];
}
$getName = $db->query("SELECT groupname, address, tel_num FROM bosyu_users WHERE b_user_id = $b_user_id");
foreach ($getName as $get_name) {
    $groupname =  $get_name['groupname'];
    $address =  $get_name['address'];
    $tel_num =  $get_name['tel_num'];
}
$getName = $db->query("SELECT area_id FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $area_id =  $get_name['area_id'];
}
$getName = $db->query("SELECT area_name FROM areas WHERE area_id = $area_id");
foreach ($getName as $get_name) {
    $area_name =  $get_name['area_name'];
}
$getName = $db->query("SELECT point FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $point =  $get_name['point'];
}
$getName = $db->query("SELECT vol_fig_path FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $vol_fig_path =  $get_name['vol_fig_path'];
}
$getName = $db->query("SELECT vol_fig_path FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $vol_fig_path =  $get_name['vol_fig_path'];
}
$getName = $db->query("SELECT vol_fig_path FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $vol_fig_path =  $get_name['vol_fig_path'];
}
$getName = $db->query("SELECT set_flag FROM sanka_situations WHERE vol_id = $vol_id AND s_user_id = $s_user_id");
foreach ($getName as $get_name) {
    $value =  $get_name['set_flag'];
}
$getName = $db->query("SELECT favo_flag FROM sanka_situations WHERE vol_id = $vol_id AND s_user_id = $s_user_id");
foreach ($getName as $get_name) {
    $value1 =  $get_name['favo_flag'];
}
$s_table = $db->query("SELECT rank FROM sanka_users WHERE s_user_id = $s_user_id");
foreach ($s_table as $get_table) {
    $rank =  $get_table['rank'];
}
$s_table = $db->query("SELECT s_user_id FROM sanka_situations WHERE vol_id = $vol_id AND s_user_id = $s_user_id");
foreach ($s_table as $get_table) {
    $table =  $get_table['s_user_id'];
}
if (empty($table)) {
    //echo $vol_id;
    $regist = $db->prepare("INSERT INTO sanka_situations(vol_id, s_user_id, read_flag, set_flag, favo_flag) VALUES (:vol_id, :s_user_id, :readf, :setf, :fav)");
    $regist->bindValue(":vol_id", $vol_id, PDO::PARAM_INT);
    $regist->bindParam(":s_user_id", $s_user_id, PDO::PARAM_STR);
    $regist->bindValue(":readf", 0, PDO::PARAM_INT);
    $regist->bindValue(":setf", 0, PDO::PARAM_INT);
    $regist->bindValue(":fav", 0, PDO::PARAM_INT);
    $regist->execute();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>Sample</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="../../common/common.css">
    <link rel="stylesheet" type="text/css" href="./CSS/search_result_vol.css">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="header-fixed">
        <img border="0" src="../../common/header.jpg" width="100%" height="100%">
        <?php
        if ($_POST['back'] == 1) {
            echo "<form method='post' name='formback' action='s_search_result.php'>";
            echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . " />";
            echo "<input type='hidden' name='year' value=" . $_POST['year'] . " />";
            echo "<input type='hidden' name='month' value=" . $_POST['month'] . " />";
            echo "<input type='hidden' name='day' value=" . $_POST['day'] . " />";
            echo "<input type='hidden' name='val_flag' value=" . $_POST['val_flag'] . " />";
            echo "<input type='hidden' name='vol_date_near' value=" . $_POST['vol_date_near'] . " />";
            echo "<input type='hidden' name='newbie_flag' value=" . $_POST['newbie_flag'] . "/>";
            echo "<input type='hidden' name='area_id' value=" . $_POST['area_id'] . " />";
            echo "<a href='javascript:formback.submit()'>";
            echo "<p id='back'><i class='fas fa-reply'></i></p>";
            echo "</a></form>";
        } else if ($_POST['back'] == 2) {
            echo "<form method='post' name='formback' action='../2_myvol/s_my_join.php'>";
            echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . " />";
            echo "<a href='javascript:formback.submit()'>";
            echo "<p id='back'><i class='fas fa-reply'></i></p>";
            echo "</a></form>";
        } else {
            echo "<form method='post' name='formback' action='../2_myvol/s_my_fav.php'>";
            echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . " />";
            echo "<a href='javascript:formback.submit()'>";
            echo "<p id='back'><i class='fas fa-reply'></i></p>";
            echo "</a></form>";
        }
        ?>

        <a href="javascript:formback.submit()">
            <p id="back"><i class="fas fa-reply"></i></p>
        </a>
        </form>
        <form method="post" name="formhome" action="../s_home.php">
            <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
            <a href="javascript:formhome.submit()">
                <p id="home"><i class="fas fa-home"></i></p>
            </a>
        </form>
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
                            echo "<img src=../../bosyu/" . $vol_fig_path . ">";
                        } ?>
                        <br><br>
                        <?php
                        if ($newbie_flag == 1) {
                            echo "<h2>初心者OK</h2>";
                        }
                        $can_ap = 0;
                        echo $rank;
                        echo $spec_rank;
                        if ($spec_rank == 'ブロンズ') {
                            if ($rank == 'ブロンズ' || $rank == 'シルバー' || $rank == 'ゴールド' || $rank == 'プラチナ') {
                                $can_ap = 1;
                            }
                        } else if ($spec_rank == 'シルバー') {
                            if ($rank == 'シルバー' || $rank == 'ゴールド' || $rank == 'プラチナ') {
                                $can_ap = 1;
                            }
                        } else if ($spec_rank == 'ゴールド') {
                            if ($rank == 'ゴールド' || $rank == 'プラチナ') {
                                $can_ap = 1;
                            }
                        } else if ($spec_rank == 'プラチナ') {
                            if ($rank == 'プラチナ') {
                                $can_ap = 1;
                            }
                        }
                        ?>
                        <br>
                        <h2>ランク指定</h2>
                        <p><?php echo $spec_rank; ?></p>
                        <br>
                        <h2>詳細</h2>
                        <p><?php echo $vol_detail; ?></p>
                        <br>
                        <h2>団体情報・連絡先</h2>
                        <p><?php echo "団体名：" . $groupname; ?></p><br>
                        <p><?php echo "住所：" . $address; ?></p><br>
                        <p><?php echo "電話番号：" . $tel_num; ?></p>
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
                if ($can_ap == 0) {
                    echo "このボランティアは" . $spec_rank . "以上の方しか参加することができません";
                } else if ($value == 0) {
                    $_SESSION['set'] = 1;
                    echo "<form action='s_search_result_vol.php' method='post' onSubmit='return check()'>";
                    //echo "<input type='hidden' value='2' name='value'>";
                    //echo "<input type='hidden' value='" . $value1 . "' name='value1'>";
                    echo "<input type='hidden' name='vol_id' value=" . $vol_id . ">";
                    echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
                    echo "<button type='submit' name='sanka' align='center' id='regd'>参加登録</button>";
                    echo "</form>";
                } else {
                    $_SESSION['set'] = 0;
                    echo "<form action='s_search_result_vol.php' method='post' onSubmit='return check1()'>";
                    //echo "<input type='hidden' value='1' name='value'>";
                    //echo "<input type='hidden' value='" . $value1 . "' name='value1'>";
                    echo "<input type='hidden' name='vol_id' value=" . $vol_id . ">";
                    echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
                    echo "<button type='submit' name='sanka' align='center' id='regd1'>参加登録を解除する</button>";
                    echo "</form>";
                }
                ?>
                <?php
                if ($value1 == 0) {
                    $_SESSION['favo'] = 1;
                    echo "<form action='s_search_result_vol.php' method='post' onSubmit='return oki_check()'>";
                    //echo "<input type='hidden' value='" . $value . "' name='value'>";
                    //echo "<input type='hidden' value='2' name='value1'>";
                    echo "<input type='hidden' name='vol_id' value=" . $vol_id . ">";
                    echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
                    echo "<button type='submit' name='favo' align='center' id='oki'>お気に入り</button>";
                    echo "</form>";
                } else {
                    $_SESSION['favo'] = 0;
                    echo "<form action='s_search_result_vol.php' method='post' onSubmit='return oki_check1()'>";
                    //echo "<input type='hidden' value='" . $value . "' name='value'>";
                    //echo "<input type='hidden' value='1' name='value1'>";
                    echo "<input type='hidden' name='vol_id' value=" . $vol_id . ">";
                    echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
                    echo "<button type='submit' name='favo' align='center' id='oki1'>お気に入りを解除する</button>";
                    echo "</form>";
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>