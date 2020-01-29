<?php
session_start();
$b_user_id = $_POST["b_user_id"];
//echo $b_user_id;
$_SESSION["b_user_id"] = $b_user_id;

$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');

if ($kessai = $db->query("SELECT DISTINCT kessai_flag FROM payments WHERE b_user_id = $b_user_id")) {
    foreach ($kessai as $kessai_val) {
        $kessai_flag = $kessai_val['kessai_flag'];
    }
}
if (isset($kessai_flag)) {
    echo $kessai_flag;
} else {
    echo "NULL";
}
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>

<head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>ボランティア登録</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="../../common/common.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="kessai.css">
</head>

<body>
    <div id="header-fixed">
        <!-- ヘッダー -->
        <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    </div>
    <div id="body-bk">
        <div id="body">
            <!-- ページ上部のタイトル部分 -->
            <div id="Toptitle1">
                <i class="fas fa-coins"></i>決済情報確認
            </div>
            <div class="setumei">
                下記の口座にお振込み下さい。
            </div>
            <div class="zyokyo1">
                &nbsp;　銀行名：○○銀行<br>
                &nbsp;　支店名：○○支店<br>
                &nbsp;預金種別：当座預金<br>
                &nbsp;口座番号：123456789<br>
                &nbsp;口座名義：株式会社Quint<br>
                &nbsp;カナ表記：クイント
            </div>
            <div class="b">
                月額500円（税別）
                <br>
                <br>
                振込手数料は<br>
                お客様負担となります。<br>
                お振込みの際にお確かめ下さい。
            </div>
        </div>
        <h2>現在の状態</h2>
        <?php
        if ($kessai_flag == null) {
            echo "現在未払い状態です。<br>決済処理が完了するまでは、お時間がかかる場合がございます。<br>";
            echo "利用登録が完了致しましたら、メールでお知らせ致します。";
            echo "<form method='post' name='update' action='b_paycheck.php'>";
            echo "<input type='hidden' name='b_user_id' value='" . $b_user_id . " '/>";
            echo "<button type='submit' align='center'>情報更新</button>";
            echo "</form>";
            echo "<form method='post' name='goLogin' action='../login.php'>";
            echo "<input type='hidden' name='b_user_id' value='" . $b_user_id . " '/>";
            echo "<button type='submit' align='center'>ログイン画面へ戻る</button>";
            echo "</form>";
        } else {
            echo "決済処理が完了致しました。<br>登録ありがとうございます！<br>下のボタンからホーム画面に遷移し、各機能の利用が可能です。";
            echo "<form method='post' name='goHome' action='../login.php'>";
            echo "<input type='hidden' name='mail_address' value='".$mail_address."' />";
            echo "<input type='hidden' name='password' value='".$passwd."' />";
            echo "<a href='javascript:goHome.submit()' class='btn-square1'>ホーム</a>";
            echo "</form>";
        }
        ?>
</body>

</html>