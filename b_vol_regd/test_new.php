<!--ボランティア新規登録画面-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>Sample</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../common/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/vol_regd.css">
	<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        <i class="fas fa-edit"></i>　登録・編集
      </div>
			<div width="100%" class="new">
        <h1 align="center">ボランティア内容</h1>
        <script>
            function check(){
              if(window.confirm('登録してしてよろしいですか？')){ // 確認ダイアログを表示
                window.alert('登録が完了しました');
                return true; // 「OK」時は送信を実行
              } else { // 「キャンセル」時の処理
                window.alert('キャンセルされました'); // 警告ダイアログを表示
                return false; // 送信を中止
              }
            }
        </script>
        <form method="POST" action="b_vol_regd_new.php" enctype="multipart/form-data" onSubmit='return check()'>


		  		<h2>ボランティア名</h2>
		  		<input type="text" name="vol_name" maxlength="20" value="" placeholder="２０文字以内で入力" required>
					<br>
          <h2>イメージ画像</h2>
          <!-- 登録した画像が表示されるか　valueに代入 -->
          <input type="file" id='image' name="image" accept="image/*" required>
          <img id="preview">
          <script>
          $('#image').on('change', function (e) {
            var reader = new FileReader();
            reader.onload = function (e) {
              $("#preview").attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
          });
        </script>
      		<h2>地域選択</h2>
					<label>都道府県</label>
					<select name="select_pref", id="pref" required>
          <option value="none" selected>----選択してください----</option>
          <?php
          echo $pref_pd;
          ?>
          </select>
          <br><br>
          <script>
            $('#pref').change(function() {
              $.get('arealist.php?pref_id='+$("#pref").val(), function(data) {
                $('#area').html(data);
              });
              $('#area').val('');
              $('#area').selectmenu('refresh');
            });
          </script>
					<label>地域</label>
					<select name="select_area", id="area" required>
          <option value="none" selected></option>

				  </select>
					<br>
					<h2>郵便番号</h2>
					<!-- ▼郵便番号入力フィールド(7桁) -->
					<input type="text" name="zip11" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');" required>
					<!-- ▼住所入力フィールド(都道府県+以降の住所) -->
					<br>
					<h2>住所</h2>
  				<textarea name="addr11" placeholder="住所を入力（郵便番号を入力すると自動で分かる箇所まで表示します）" required></textarea>
					<!--<input type="text" name="addr11" size="10" width="80%"> -->
					<br>
					<h2>開催日</h2>
          <select id="year" name="year" required>
            <option value="2020">2020</option>
          </select> 年
          <select id="month" name="month" required>
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
          <select id="day" name="day" required>
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
					<input type="time" name="beg_time" required>
					<br>
					<label>終了時間</label>
					<input type="time" name="fin_time" required>
					<h2>定員</h2>
					<input class="capacity" type="number" name="capacity" value="" maxlength="3" required>名
					<br><br>
					<input id="check-a" type="checkbox" name="va_flag" value="1"><label for="check-a">報酬あり</label><br>
					(※詳しい報酬内容は<br>　　詳細にお書きください)<br><br>
					<input id="check-b" type="checkbox" name="newbie_flag" value="1"><label for="check-a">初心者歓迎</label><br><br>
          <label>ランク指定　</label>
					<select name="rank_spec">
				    <option value="指定なし">指定なし</option>
				    <option value="ブロンズ">ブロンズ</option>
				    <option value="シルバー">シルバー</option>
            <option value="ゴールド">ゴールド</option>
				  </select><br><br>

					<h2>詳細</h2>
  				<textarea name="detail" placeholder="詳細を入力" required></textarea>
					<br>
          <button type="submit" align="center">登録</button>
        </form>
			</div>
    </div>
  </div>
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
