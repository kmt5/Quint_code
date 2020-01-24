<?php
session_start();
$b_user_id = $_SESSION["b_user_id"];

echo $b_user_id;
//データベースに接続(test3)
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
?>
<!--ボランティア新規登録画面-->
<!DOCTYPE html>
<?php
//都道府県プルダウン
if ($pref_data = $db->query("SELECT DISTINCT pref_id, pref_name FROM areas")) {
  foreach ($pref_data as $pref_data_val) {
    $pref_pd .= "<option value='" . $pref_data_val['pref_id'] . "'>" . $pref_data_val['pref_name'] . "</option>";
  }
}
?>

<html>

<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>Sample</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/vol_regd.css">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <img border="0" src="../../common/back.jpg" width="20%" height="100%" class="back">
    <img border="0" src="../../common/home.jpg" width="20%" height="100%" class="home">
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        <i class="fas fa-edit"></i>　登録・編集
      </div>
      <div width="100%" class="new">
        <h1 align="center">ボランティア内容</h1>
        <form method="POST" action="update_new.php" enctype="multipart/form-data">
          <h2>ボランティアイメージ画像</h2>
          <input type="file" name="image" accept="image/*">

          <h2>ボランティア名</h2>
          <input type="text" name="vol_name" maxlength="20" value="" placeholder="２０文字以内で入力">
          <br>
          <h2>地域選択</h2>
          <label>都道府県</label>
          <select name="select_pref" , id="pref">
            <option value="none" selected>----選択してください----</option>
            <?php
            echo $pref_pd;
            ?>
          </select>
          <br><br>
          <script>
            $('#pref').change(function() {
              $.get('arealist.php?pref_id=' + $("#pref").val(), function(data) {
                $('#area').html(data);
              });
              $('#area').val('');
              $('#area').selectmenu('refresh');
            });
          </script>
          <label>地域</label>
          <select name="select_area" , id="area">
            <option value="none" selected></option>

          </select>
          <br>
          <h2>郵便番号</h2>
          <!-- ▼郵便番号入力フィールド(7桁) -->
          <input type="text" name="zip11" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');">
          <!-- ▼住所入力フィールド(都道府県+以降の住所) -->
          <br>
          <h2>住所</h2>
          <textarea name="addr11" placeholder="住所を入力（郵便番号を入力すると自動で分かる箇所まで表示します）"></textarea>
          <!--<input type="text" name="addr11" size="10" width="80%"> -->
          <br>
          <h2>開催日</h2>
          <select id="year" name="year">
            <option value="2020">2020</option>
          </select> 年
          <select id="month" name="month">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select> 月
          <select id="day" name="day">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select> 日
          <br>
          <label>開始時間</label>
          <input type="time" name="beg_time">
          <br>
          <label>終了時間</label>
          <input type="time" name="fin_time">
          <h2>定員</h2>
          <input class="capacity" type="number" name="capacity" value="" maxlength="3">名
          <br><br>
          <input id="check-a" type="checkbox" name="va_flag" value="1" checked><label for="check-a">報酬あり</label><br>
          (※詳しい報酬内容は<br>　　詳細にお書きください)<br><br>
          <input id="check-b" type="checkbox" name="newbie_flag" value="1" checked><label for="check-a">初心者歓迎</label><br><br>
          <?php
          $specData = $db->query("SELECT DISTINCT rank_spec_flag FROM options WHERE b_user_id = $b_user_id");
          foreach ($specData as $data_val) {
            $rank_spec_flag = $data_val['rank_spec_flag'];
          }
          echo $rank_spec_flag;
          echo "<h2>ランク指定  </h2>";
          if ($rank_spec_flag == 1) {
            echo "<select name='spec_rank'>";
            echo "<option value='指定なし' selected>指定なし</option>";
            echo "<option value='ブロンズ'>ブロンズ</option>";
            echo "<option value='シルバー'>シルバー</option>";
            echo "<option value='ゴールド'>ゴールド</option>";
            echo "</select><br><br>";
          } else {
            echo "参加ユーザのランク指定は行えません。<br>(※オプションで有効化ができます。別途追加料金が必要です。)";
          }
          ?>

          <h2>詳細</h2>
          <textarea name="detail" placeholder="詳細を入力"></textarea>
          <br>
          <input type='hidden' name='b_user_id' value="<?php echo $b_user_id; ?>">
          <button type="submit" align="center">登録</button>
        </form>
      </div>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>

</html>
<?php $db = null; ?>