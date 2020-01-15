<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
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

      <center>
          <select name="pre" id="pre" class="custom-select sources" placeholder="都道府県を選択してください">
            <option value="01">北海道</option>
            <option value="02">青森県</option>
          </select>

          <select name="city" id="city" class="custom-select sources" placeholder="地域を選択してください">
          </select>

          <div class="days">
            <select id="year" name="year" class="custom1-select sources" placeholder="2019年　">
              <option value="2019">2019年</option>
              <option value="2020">2020年</option>
            </select>

            <select id"month" name="month" class="custom1-select sources" placeholder="1月">
              <option value="1">1月</option>
              <option value="2">2月</option>
              <option value="3">3月</option>
              <option value="4">4月</option>
            </select>

            <select id="day" name="day" class="custom1-select sources" placeholder="1日">
              <option value="1">1日</option>
              <option value="2">2日</option>
              <option value="3">3日</option>
              <option value="4">4日</option>
            </select>
          </div>

          <div class="checkbox">
            <input type="checkbox" name="q1" value="value_flag"> 報酬アリ
            <input type="checkbox" name="q1" value="vol_date"> 開催日が近い
            <input type="checkbox" name="q1" value="newbie_flag"> 初心者OK
          </div>

          <a href="s_search_result.html" class="btn-square">検索</a>
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

/*プルダウン作成用スクリプト*/
$(".custom-select").each(function() {
  var classes = $(this).attr("class"),
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
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
  $('html').one('click',function() {
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
      id      = $(this).attr("id"),
      name    = $(this).attr("name");
  var template =  '<div class="' + classes + '">';
      template += '<span class="custom1-select-trigger">' + $(this).attr("placeholder") + '</span>';
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
  $('html').one('click',function() {
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
    <img border="0" src="../common/kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
