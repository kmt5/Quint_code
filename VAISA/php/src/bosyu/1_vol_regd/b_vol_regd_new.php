<!--ボランティア新規登録画面-->
<!DOCTYPE html>
<?php
    //データベースに接続(test3)
    $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db = new PDO($dsn, 'root', 'root');
    //接続確認    
    if ($db) {
        echo "データベースに繋がっています";
    } else {
        "データベースに繋がってないです";
    }

    $b_user_id = $_POST["b_user_id"];

    //都道府県プルダウン
    if ($pref_data = $db -> query("SELECT DISTINCT pref_id, pref_name FROM areas")) {
      foreach($pref_data as $pref_data_val) {
        $pref_pd .= "<option value='".$pref_data_val['pref_id']."'>".$pref_data_val['pref_name']."</option>";
      }
    }
?>
<?php
if(isset($_FILES)&& isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
    if(!file_exists('upload')){
        mkdir('upload');
    }
    $a = 'upload/' . basename($_FILES['image']['name']);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $a)){
        $msg = $a. 'のアップロードに成功しました';
    }else {
        $msg = 'アップロードに失敗しました';
    }
}?>

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
        <form method="POST" action="b_vol_regd_new.php" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*">

		  		<h2>ボランティア名</h2>
		  		<input type="text" name="vol_name" maxlength="20" value="" placeholder="２０文字以内で入力">
					<br>
					<h2>地域選択</h2>
					<label>都道府県</label>
					<select name="select_pref", id="pref">
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
					<select name="select_area", id="area">
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
          <label>ランク指定　</label>
					<select name="rank_spec">
				    <option value="指定なし">指定なし</option>
				    <option value="ブロンズ">ブロンズ</option>
				    <option value="シルバー">シルバー</option>
            <option value="ゴールド">ゴールド</option>
				  </select><br><br>

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
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>

<?php
if(isset($msg) && $msg == true){
    echo '<p>'. $msg . '</p>';
}
?>
<?php
$h = apache_request_headers();
var_dump($h["Content-Type"]);
?>
<?php

// 入力フォームのデータを変数に
$vol_name = $_POST["vol_name"];
$vol_date .= $_POST["year"]."-".$_POST["month"]."-".$_POST["day"];
$vol_beg_time = $_POST["beg_time"];
$vol_fin_time = $_POST["fin_time"];
$vol_capacity = $_POST["capacity"];
$post_num = $_POST["zip11"];
$vol_place = $_POST["addr11"];
$val_flag = $_POST["va_flag"];
$newbie_flag = $_POST["newbie_flag"];
$vol_detail = $_POST["detail"];
$pref_id = $_POST["select_pref"];
$spec_rank = $_POST["rank_spec"];
$b_user_id = '00000001';
$rank_spec_flag = 0;
$area_id = $_POST["select_area"];
$num = $vol_fin_time - $vol_beg_time;
$point = strval($num);
$vol_fig_path = $a;
$disapp_flag = 0;

//データベースに接続(test3)
$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');
//接続確認    
if ($db) {
    echo "データベースに繋がっています";
} else {
    "データベースに繋がってないです";
}
//データを登録する準備
$regist = $db->prepare("INSERT INTO volunteers(vol_id, vol_name, vol_date, vol_beg_time, vol_fin_time, vol_capacity, post_num, vol_place, val_flag, newbie_flag, vol_detail, pref_id, spec_rank, b_user_id, rank_spec_flag, area_id, vol_point, vol_fig_path, disapp_flag) VALUES (:vol_id, :vol_name, :vol_date, :vol_beg_time, :vol_fin_time, :vol_capacity, :post_num, :vol_place, :val_flag, :newbie_flag, :vol_detail, :pref_id, :spec_rank, :b_user_id, :rank_spec_flag, :area_id, :vol_point, :vol_fig_path, :disapp_flag)");
//値を格納します
$regist->bindValue(":vol_id", null, PDO::PARAM_INT);
$regist->bindParam(":vol_name", $vol_name, PDO::PARAM_STR);
$regist->bindValue(":vol_date", date('Y-m-d', strtotime($vol_date)),PDO::PARAM_STR);
$regist->bindValue(":vol_beg_time", date("H:i", strtotime($vol_beg_time)), PDO::PARAM_STR);
$regist->bindValue(":vol_fin_time", date("H:i", strtotime($vol_fin_time)), PDO::PARAM_STR);
$regist->bindValue(":vol_capacity", $vol_capacity, PDO::PARAM_INT);
$regist->bindParam(":post_num", $post_num, PDO::PARAM_STR);
$regist->bindParam(":vol_place", $vol_place, PDO::PARAM_STR);
$regist->bindValue(":val_flag", $val_flag, PDO::PARAM_INT);
$regist->bindValue(":newbie_flag", $newbie_flag, PDO::PARAM_INT);
$regist->bindParam(":vol_detail", $vol_detail, PDO::PARAM_STR);
$regist->bindParam(":pref_id", $pref_id, PDO::PARAM_STR);
$regist->bindValue(":spec_rank", $spec_rank, PDO::PARAM_INT);
$regist->bindParam(":b_user_id", $b_user_id, PDO::PARAM_STR);
$regist->bindValue(":rank_spec_flag", $rank_spec_flag, PDO::PARAM_INT);
$regist->bindValue(":area_id", $area_id, PDO::PARAM_INT);
$regist->bindValue(":vol_point", $point, PDO::PARAM_INT);
$regist->bindParam(":vol_fig_path", $vol_fig_path, PDO::PARAM_STR);
$regist->bindValue(":disapp_flag", $disapp_flag, PDO::PARAM_INT);

//実行
$regist->execute();
if ($regist) {
echo "登録完了!";
} else {
echo "エラーです！";
}
$db=null;
?>