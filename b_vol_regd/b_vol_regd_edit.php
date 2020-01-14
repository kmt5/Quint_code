<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>Sample</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/vol_regd.css">
	<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg" width="100%" height="100%">
    <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    <img border="0" src="home.jpg" width="20%" height="100%" class="home">
  </div>
  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        <i class="fas fa-edit"></i>　登録・編集
      </div>
			<div width="100%" class="new">
        <h1 align="center">ボランティア内容</h1>
				<form action="receiver.php" method="post" align="left">
		  		<h2>ボランティア名</h2>
		  		<input type="text" name="vol_name" maxlength="20" value="" placeholder="２０文字以内で入力">
					<br>
					<h2>地域選択</h2>
					<label>都道府県　</label>
					<select name="pull-down">
				    <option value="">ゾウさん</option>
				    <option value="lion">ライオンさん</option>
				    <option value="penguin">ペンギンさん</option>
				  </select>
					<br><br>
					<label>地域　　　</label>
					<select name="pull-down">
				    <option value="elephant">ゾウさん</option>
				    <option value="lion">ライオンさん</option>
				    <option value="penguin">ペンギンさん</option>
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
            <option value="2019">2019</option>
            <option value="2020">2020</option>
          </select> 年
          <select id"month" name="month">
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
					<input class="capacity" type="number" name="age" value="" maxlength="3">名
					<br><br>
					<input id="check-a" type="checkbox" name="va_flag" value="1" checked><label for="check-a">報酬あり</label><br>
					(※詳しい報酬内容は<br>　　詳細にお書きください)<br><br>
					<input id="check-b" type="checkbox" name="newbie_flag" value="1" checked><label for="check-a">初心者歓迎</label><br><br>
          <label>ランク指定　</label>
					<select name="rank_spec">
				    <option value="elephant">指定なし</option>
				    <option value="lion">ブロンズ</option>
				    <option value="penguin">シルバー</option>
            <option value="lion">ゴールド</option>
				  </select><br><br>
          <h2>ボランティアイメージ画像</h2>
          <input type="file" name="pic" accept=".jpg,.png,image/jpeg,image/png">
          <br><br>
					<h2>詳細</h2>
  				<textarea name="detail" placeholder="詳細を入力"></textarea>
					<br>
          <h2>この編集内容で<br>
              再度登録しますか？</h2><br>
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
