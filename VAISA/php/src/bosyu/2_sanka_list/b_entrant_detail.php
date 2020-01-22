<?php
//データベースに接続(test3)
$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');
?>
<?php
$id = $_POST['s_user_id'];
$db->query("set names utf8");
$getInfo = $db->query("SELECT nickname, fullname, mail_address, user_address, tel_num, gender, prof_path FROM sanka_users WHERE s_user_id = $id");
foreach ($getInfo as $get_info) {
    $nickname = $get_info['nickname'];
    $fullname = $get_info['fullname'];
    $mail_address = $get_info['mail_address'];
    $user_address = $get_info['user_address'];
    $tel_num = $get_info['tel_num'];
    $gender = $get_info['gender'];
    $prof_path = $get_info['prof_path'];
}
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>

<head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>参加者一覧</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="../common/common.css">
    <link rel="stylesheet" type="text/css" href="entrant.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="header-fixed">
        <img border="0" src="../common/header.jpg" width="100%" height="100%">
        <img border="0" src="../common/back.jpg" width="20%" height="100%" class="back">
        <img border="0" src="../common/home.jpg" width="20%" height="100%" class="home">
    </div>
    <div id="body-bk">
        <div id="body">
            <div id="Toptitle2">
                <i class="fas fa-handshake"></i>　参加者一覧
            </div>
            <div id="body" class="radio size1">
                <form class="contact" action="index.html" method="post">
                    <dl>
                        <center>
                            <!-- 中央寄せ -->
                            <h2>
                                <dt>プロフィール画像</dt>
                                <dd>
                                    <?php if ($prof_pass == null) {
                                        echo "登録されている写真は<br>ありません。";
                                    } else {
                                        echo "<img src=../b_vol_regd/" . $prof_path . ">";
                                    } ?>
                                </dd>
                                <hr color="black"><br />

                                <dt>名前</dt>
                                <dd><input type=“text” name=“fullname“ value="<?php echo $fullname; ?>"></dd>
                                <hr color="black"><br />
                                <dt>ニックネーム</dt>
                                <dd><input type=“text” name=“nickname“ value="<?php echo $nickname; ?>"></dd>
                                <hr color="black"><br />
                                <dt>メールアドレス</dt>
                                <dd><input type=“text” name=“mail_address“ value="<?php echo $mail_address; ?>"></dd>
                                <hr color="black"><br /><br />
                                <dt>住所</dt>
                                <dd><input type=“text” name=“user_address“ value="<?php echo $user_address; ?>"></dd>
                                <hr color="black"><br /><br />
                                <dt>電話番号</dt>
                                <dd><input type=“text” name=“tel_num“ value="<?php echo $tel_num; ?>"></dd>
                                <hr color="black"><br /><br />
                                <p>
                                    <dt>性別</dt>
                                    <label for="radio-01"><?php echo $gender; ?></label>
                                </p>
            </div>
        </div>
    </div>
    <div id="footer-fixed">
        <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
    </div>
</body>

</html>