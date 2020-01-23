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

                <h1 align="center">以下の内容で<br>登録が完了しました</h1>

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
                    <?php if ($val_flag == 1) {echo "<p class='dezain'>報酬あり</p>";} else {echo "報酬なし";} ?>
                    <br><br>
                    <?php if ($newbie_flag == 1) {echo "<p class='dezain'>初心者OK</p>";} else {echo "";} ?>
                    <br><br>
                    <label>ランク指定　</label>
                    <?php if ($spec_rank == 0) {echo "なし";} else {echo $rank_spec;} ?>
                    <br><br>
                    <h2>詳細</h2>
                    <?php echo $vol_detail; ?>
                    <br>
                    <br>
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
