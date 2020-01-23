<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
    <meta charset="utf-8"> <!-- 文字コードを宣言 -->
    <title>Sample</title> <!-- ページのタイトル -->
    <link rel="stylesheet" type="text/css" href="../../common/common.css">
    <link rel="stylesheet" type="text/css" href="./CSS/vol_regd.css">
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="header-fixed">
      <img border="0" src="../../common/header.jpg" width="100%" height="100%">
        <a href="../b_home.php">
          <p id="home"><i class="fas fa-home"></i></p>
        </a>
    </div>
    <div id="body-bk">
        <div id="body">
            <div id="Toptitle1">
                <i class="fas fa-edit"></i>　登録・編集
            </div>
            <div width="100%" class="new">
                <h1 align="center"><font color='#0cb06e'><i class="fas fa-check-circle fa-5x"></i></font></h1>
                <h1 align="center">削除が完了しました</h1>

                    <form action='b_vol_regd_list.php' method='post'>
                      <button type="submit" align="center" id='list'>ボランティア一覧へ</button>
                    </form>

            </div>
        </div>
    </div>

    <div id="footer-fixed">
        <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
    </div>
</body>

</html>
