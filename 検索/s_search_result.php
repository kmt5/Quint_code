<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>検索</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/search_result.css">
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

  <div id = "body-bk">
    <div id = "body">
      <div id ="Toptitle1">
        検索
      </div>
      <div class="area">
        地域名
      </div>
      <?php
        $value = 1;

        if(isset($_POST['zyoken'])){
          $value = $_POST['zyoken'];
        }

        echo "<form action='' method='post'>";
        echo "<p>";
        echo "<label for='zyoken'>検索条件</label>";
        echo "<select class='zyoken' name='zyoken' onchange='submit(this.form)'>";
        if ($value == 1) {
          echo "<option value='1' selected>報酬あり</option>";
        } elseif ($value == 2) {
          echo "<option value='2' selected>開催日が近い</option>";
        } else {
          echo "<option value='3' selected>初心者OK</option>";
        }
        echo "<option value='1'>報酬あり</option>";
        echo "<option value='2'>開催日が近い</option>";
        echo "<option value='3'>初心者OK</option>";
        echo "</select>";
        echo "</p>";
        echo "</form>";
      ?>
      <?php
        $value1 = 1;

        if(isset($_POST['narabi'])){
          $value1 = $_POST['narabi'];
        }

        echo "<form action='' method='post'>";
        echo "<p>";
        echo "<label for='narabi'>並び替え</label>";
        echo "<select class='zyoken' name='narabi' onchange='submit(this.form)'>";
        if ($value1 == 1) {
          echo "<option value='1' selected>開催時間順</option>";
        } elseif ($value1 == 2) {
          echo "<option value='2' selected>ポイント順</option>";
        } else {
          echo "<option value='3' selected>登録順</option>";
        }
        echo "<option value='1'>開催時間順</option>";
        echo "<option value='2'>ポイント順</option>";
        echo "<option value='3'>登録順</option>";
        echo "</select>";
        echo "</p>";
        echo "</form>";
      ?>

      <div class="b">
        <?php
          $vol_name = ["ゴミ拾い", "これで２０もじになるようにあいうえおあお", "hello", "屋台"];
          $array_count = count($vol_name);
          for ($i = 0; $i < $array_count; $i++) {
            echo "<form action='s_search_result_vol.html' method='post'>";
            echo "<button type='submit' class='vol'>".$vol_name[$i]."</button>";
            echo "</form>";
          }
        ?>
        <!--
        <button type="submit" class="vol" onclick="location.href='s_search_result_vol.html'">ボランティア名１</button>
        <button type="submit" class="vol" onclick="location.href='s_search_result_vol.html'">あいうえおかきくけこさしすせそたちつてと</button>
          <button type="submit">再検索</button> -->
      </div>
    </div>
  </div>

  <div id="footer-fixed">
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
