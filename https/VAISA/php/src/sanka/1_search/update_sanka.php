<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>Sample</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="../../common/common.css">
    <link rel="stylesheet" type="text/css" href="./CSS/update.css">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="header-fixed">
      <img border="0" src="../../common/header.jpg" width="100%" height="100%">
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
              <h1 align="center"><font color='#0cb06e'><i class="fas fa-check-circle fa-5x"></i></font></h1>

                <h1 align="center">参加登録が完了しました</h1>

                    <br>
                    <br>
                    <form action='b_vol_regd_list.php' method='post'>
                      <button type="submit" align="center" id='list'>検索結果へ</button>
                    </form>

            </div>
        </div>
    </div>

    <div id="footer-fixed">
        <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
    </div>
</body>

</html>
