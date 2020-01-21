<?php
// 有効期限30日
session_cache_expire(10);
session_start();
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<?php
$s_user_id = '00000001';
//データベースに接続(test3)
$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');
//接続確認    
if ($db) {
  echo "データベースに繋がっています";
} else {
  "データベースに繋がってないです";
}
$db->query("set names utf8");
$getAreaId = $db->query("SELECT area_id FROM sanka_users WHERE s_user_id = $s_user_id");
foreach ($getAreaId as $area_id_val) {
  $area_id = $area_id_val['area_id'];
}
$getPref = $db->query("SELECT pref_name FROM areas WHERE area_id = $area_id");
foreach ($getPref as $pref_data_val) {
  $pref_name = $pref_data_val['pref_name'];
}
$getArea = $db->query("SELECT area_name FROM areas WHERE area_id = $area_id");
foreach ($getArea as $area_data_val) {
  $area_name = $area_data_val['area_name'];
}
?>

<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>検索</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/search_first.css">
  <link rel="stylesheet" type="text/css" href="./CSS/search_area.css">
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>

<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
    <a href="s_search_first.html">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
    <a href="s_home.html">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
    </a>
  </div>

  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        検索
      </div>
      <form method="POST" action="s_search_result.php">
        <center>
          <div class="area">
            <h1>あなたの登録地域</h1><br>
            <h2><?php echo $pref_name;
                echo $area_name; ?></h2>
          </div>

          <!--<select name="city" id="city" class="custom-select sources" placeholder="地域を選択してください">
        </select>-->
          <div class="days">
            <select id="year" name="year" class="custom1-select sources">
              <option value="none">--</option>
              <!--<option value="2019">2019年</option>-->
              <option value="2020">2020</option>
            </select>年
            <select id"month" name="month" class="custom1-select sources">
              <option value="none">--</option>
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
            </select>月
            <select id="day" name="day" class="custom1-select sources">
              <option value="none">--</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="4">5</option>
              <option value="4">6</option>
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
            </select>日
          </div>
          <div class="checkbox">
            <input type="checkbox" name="val_flag" value="1"> 報酬アリ
            <input type="checkbox" name="vol_date_near" value="1"> 開催日が近い
            <input type="checkbox" name="newbie_flag" value="1"> 初心者OK
          </div>
          <!--<a href="s_search_result.php" class="btn-square">検索</a>-->
          <?php
          echo "<input type='hidden' name='area_id' value='" . $area_id . "'>";
          ?>
          <button type="submit" align="center">検索</button>
      </form>
      </center>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript">
    /*都道府県preの値から地域の選択項目決定 参考サイト参照推奨
  $('#pre').change(function() {
    $.get('citylist.php?pref_code='+$(this).val(), function(data) {
      $('#city').html(data);
  });

  $('#city').val('');
  $('#city').selectmenu('refresh');
});*/

    /*地域選択プルダウン作成用スクリプト
    $(".custom-select").each(function() {
      var classes = $(this).attr("class"),
        id = $(this).attr("id"),
        name = $(this).attr("name");
      var template = '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
      template += '<div class="custom-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
      template += '</div></div>';

      $(this).wrap('<div class="custom-select-wrapper"></div>');
      $(this).hide();
      $(this).after(template);
    });

    $(".custom-option:first-of-type").hover(function() {
      $(this).parents(".custom-options").addClass("option-hover");
    }, function() {
      $(this).parents(".custom-options").removeClass("option-hover");
    });
    $(".custom-select-trigger").on("click", function() {
      $('html').one('click', function() {
        $(".custom-select").removeClass("opened");
      });
      $(this).parents(".custom-select").toggleClass("opened");
      event.stopPropagation();
    });
    $(".custom-option").on("click", function() {
      $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
      $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
      $(this).addClass("selection");
      $(this).parents(".custom-select").removeClass("opened");
      $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
    });

    /*日付プルダウン作成用スクリプト*/
    $(".custom1-select").each(function() {
      var classes = $(this).attr("class"),
        id = $(this).attr("id"),
        name = $(this).attr("name");
      var template = '<div class="' + classes + '">';
      template += '<span class="custom1-select-trigger">' + '</span>';
      template += '<div class="custom1-options">';
      $(this).find("option").each(function() {
        template += '<span class="custom1-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
      });
      template += '</div></div>';

      $(this).wrap('<div class="custom1-select-wrapper"></div>');
      $(this).hide();
      $(this).after(template);
    });

    $(".custom1-option:first-of-type").hover(function() {
      $(this).parents(".custom1-options").addClass("option-hover");
    }, function() {
      $(this).parents(".custom1-options").removeClass("option-hover");
    });
    $(".custom1-select-trigger").on("click", function() {
      $('html').one('click', function() {
        $(".custom1-select").removeClass("opened");
      });
      $(this).parents(".custom1-select").toggleClass("opened");
      event.stopPropagation();
    });
    $(".custom1-option").on("click", function() {
      $(this).parents(".custom1-select-wrapper").find("select").val($(this).data("value"));
      $(this).parents(".custom1-options").find(".custom1-option").removeClass("selection");
      $(this).addClass("selection");
      $(this).parents(".custom1-select").removeClass("opened");
      $(this).parents(".custom1-select").find(".custom1-select-trigger").text($(this).text());
    });
  </script>

  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>

</html>