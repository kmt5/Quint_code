<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
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
$b_user_id = "00000001";
?>

<head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>ランク指定</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="../common/common.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="option.css">
</head>

<body>
    <div id="header-fixed">
        <!-- ヘッダー箇所 -->
        <img border="0" src="../common/header.jpg" width="100%" height="100%">
        <img border="0" src="../common/back.jpg" width="20%" height="100%" class="back">
        <img border="0" src="../common/home.jpg" width="20%" height="100%" class="home">
    </div>
    <div id="body-bk">
        <div id="body">
            <!-- ページ上部のタイトル部分 -->
            <div id="Toptitle2">
                <i class="fab fa-searchengin"></i>ランク指定
            </div>
            <div class="setumei">
                ボランティア情報検索の際に<br>
                募集する参加者のランクを<br>
                指定可能にするオプションです
            </div>

            <div class="zyokyo">
                <p id="status">利用状況：　無効</p>
            </div>
            <div class="b">
                月額200円（税別）
                <br>
                <br>
                <!-- onclickでjsのtest関数を呼び出す -->
                <button type="submit" id="banner" onclick="test()">登録をする</button>
                <?php
                $value = '<script>document.write(value);</script>';
                echo $value;
                if ($value == false) {
                    $db->query("UPDATE options SET rank_spec_flag = 1 WHERE b_user_id = $b_user_id");
                } else {
                    $db->query("UPDATE options SET rank_spec_flag = 0 WHERE b_user_id = $b_user_id");
                }
                ?>
            </div>
            <!-- js部分　現段階では、ボタンを押したら、変更 -->
            <script>
                var value = true;
                var elm = document.getElementById('status');
                var elm1 = document.getElementById('banner');

                if (value == true) {
                    elm.textContent = "利用状況：　有効";
                    elm1.textContent = "登録を解除する";
                }

                function test() {
                    var result = window.confirm('実行しますか？');

                    if (result) {
                        if (value == false) {
                            value = true;
                            elm.textContent = "利用状況：　有効";
                            elm1.textContent = "登録を解除する";
                        } else {
                            value = false;
                            elm.textContent = "利用状況：　無効";
                            elm1.textContent = "登録をする";
                        }
                    }
                }
            </script>
        </div>
        <?php //$db = null; 
        ?>
        <div id="footer-fixed">
            <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
        </div>
</body>

</html>