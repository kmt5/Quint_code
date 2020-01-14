<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>

<head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>検索上位表示</title> <!-- ページのタイトル -->
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
                <i class="fab fa-searchengin"></i>検索上位表示
            </div>
            <div class="setumei">
                ボランティア情報検索の際に<br>
                検索結果画面の上位に<br>
                優先的に配置するオプションです
            </div>
            <!-- js部分　現段階では、ボタンを押したら、変更 -->
            <script>
                function test() {
                    var result = window.confirm('実行しますか？');

                    if (result) {
                        var elm = document.getElementById('status');
                        elm.textContent = '利用状況：　有効';
                        var elm1 = document.getElementById('banner');
                        elm1.textContent = '登録を解除する';
                    }
                }
            </script>
            <div class="zyokyo">
                <p id="status">利用状況：　無効</p>
            </div>
            <div class="b">
                月額300円（税別）
                <br>
                <br>
                <!-- onclickでjsのtest関数を呼び出す -->
                <button type="submit" id="banner" onclick="test()">登録をする</button>
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
                            $.post('b_banner.php', 'value=0').done(function(data) {
                                console.log(data.form);
                            })
                        } else {
                            value = false;
                            elm.textContent = "利用状況：　無効";
                            elm1.textContent = "登録をする";

                            function postSend() {
                                var fd = new FormData();
                                fd.append('value', 1);
                                var xhr = new XMLHttpRequest();
                                xhr.open('POST', 'b_banner.php');
                                xhr.send(fd);
                                xhr.onreadystatechange = function() {
                                    if ((xhr.readyState == 4) && (xhr.status == 200)) {
                                        _returnValues = JSON.parse(xhr.responseText);
                                    }
                                };
                            }
                        }
                    }
                }
            </script>
        </div>
        <div id="footer-fixed">
            <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
        </div>
</body>

</html>
<?php
$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');
if ($_POST['value'] == 1) {
    $db->query("UPDATE options SET banner_flag = 1 WHERE b_user_id = $b_user_id");
    print json_encode($result);
} else {
    $db->query("UPDATE options SET banner_flag = 0 WHERE b_user_id = $b_user_id");
    print json_encode($result);
}
?>