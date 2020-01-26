<!--ボランティア新規登録画面-->
<!DOCTYPE html>
<?php
$s_user_id = $_POST["s_user_id"];
echo $s_user_id;
//データベースに接続(test3)
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
//接続確認
if ($db) {
  echo "データベースに繋がっています";
} else {
  "データベースに繋がってないです";
}

//都道府県プルダウン
if ($pref_data = $db -> query("SELECT DISTINCT pref_id, pref_name FROM areas")) {
  foreach ($pref_data as $pref_data_val) {
    $pref_pd .= "<option value='" . $pref_data_val['pref_id'] . "'>" . $pref_data_val['pref_name'] . "</option>";
  }
}
?>

<html>

<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>Sample</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/search_first.css">
  <link rel="stylesheet" type="text/css" href="./CSS/search_area.css">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="s_search_first.php">
      <input type="hidden" name="s_user_id" value="<?php echo $user_id; ?>" />
    <a href="javascript:formback.submit()">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
  </form>
  <form method="post" name="formhome" action="../s_home.php">
    <input type="hidden" name="s_user_id" value="<?php echo $user_id; ?>" />
    <a href="javascript:formhome.submit()">
      <p id="home"><i class="fas fa-home"></i></p>
    </a>
  </form>
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        <i class="fas fa-edit"></i>　検索
      </div>
      <div width="100%" class="new">
        <form method="POST" action="s_search_result.php" enctype="multipart/form-data">
          <select name="select_pref" id="pref"  required>
            <option value="" selected>--都道府県を選択してください--</option>
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
          <select name="area_id" , id="area"  required>
            <option value="" selected>--地域を選択してください--</option>
          </select>

          <div class="days">
            <select id="year" name="year" class="custom1-select sources">
              <option value="none">--</option>
              <option value="2020">2020</option>
            </select>年
            <select id="month" name="month" class="custom1-select sources">
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
            <input type="checkbox" name="newbie_flag" value=""> 初心者OK
          </div>
          <input type='hidden' name='s_user_id' value="<?php echo $s_user_id; ?>">
          <button class="search" type="submit" align="center">登録</button>
        </form>
      </div>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script type="text/javascript">
    /*域選択プルダウン作成用スクリプト*/
    $(".custom-select").each(function() {
      var classes = $(this).attr("class"),
        id = $(this).attr("id"),
        name = $(this).attr("name");
      var template = '<div class="' + classes + '">';
      template += '<span class="custom-select-trigger">' + '<option value="none">--</option>' + '</span>';
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
      template += '<span class="custom1-select-trigger">' + '<option value="none">--</option>' + '</span>';
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
</body>

</html>
