<?php
//データベースに接続(test3)
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
?>
<?php
//if (isset($_POST['vol_id'])) {
//    print "送信された内容は{$_POST['vol_id']}です。<br/>";
//} 
$b_user_id = $_POST["b_user_id"];
$vol_id = $_POST['vol_id'];
echo $b_user_id;

$db->query("set names utf8");
$getName = $db->query("SELECT vol_name FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $vol_name =  $get_name['vol_name'];
}
$getDate = $db->query("SELECT vol_date FROM volunteers WHERE vol_id = $vol_id");
foreach ($getDate as $get_date) {
    $vol_date = $get_date['vol_date'];
}
$getBeg = $db->query("SELECT vol_beg_time FROM volunteers WHERE vol_id = $vol_id");
foreach ($getBeg as $get_beg) {
    $vol_beg_time =  $get_beg['vol_beg_time'];
}
$getFin = $db->query("SELECT vol_fin_time FROM volunteers WHERE vol_id = $vol_id");
foreach ($getFin as $get_fin) {
    $vol_fin_time =  $get_fin['vol_fin_time'];
}
$getCapa = $db->query("SELECT vol_capacity FROM volunteers WHERE vol_id = $vol_id");
foreach ($getCapa as $get_capa) {
    $vol_capacity =  $get_capa['vol_capacity'];
}
$getNum = $db->query("SELECT post_num FROM volunteers WHERE vol_id = $vol_id");
foreach ($getNum as $get_num) {
    $post_num =  $get_num['post_num'];
}
$getPlace = $db->query("SELECT vol_place FROM volunteers WHERE vol_id = $vol_id");
foreach ($getPlace as $get_place) {
    $vol_place =  $get_place['vol_place'];
}
$getName = $db->query("SELECT val_flag FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $val_flag =  $get_name['val_flag'];
}
$getName = $db->query("SELECT newbie_flag FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $newbie_flag =  $get_name['newbie_flag'];
}
$getName = $db->query("SELECT vol_detail FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $vol_detail =  $get_name['vol_detail'];
}
$getName = $db->query("SELECT pref_id FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $pref_id =  $get_name['pref_id'];
}
$getName = $db->query("SELECT pref_name FROM areas WHERE pref_id = $pref_id");
foreach ($getName as $get_name) {
    $pref_name =  $get_name['pref_name'];
}
$getName = $db->query("SELECT spec_rank FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $spec_rank =  $get_name['spec_rank'];
}
//$getName = $db->query("SELECT vol_id FROM volunteers WHERE vol_id = $vol_id");
//foreach ($getName as $get_name) {
//    $b_user_id =  $get_name['b_user_id'];/
//}
$getName = $db->query("SELECT area_id FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $area_id =  $get_name['area_id'];
}
$getName = $db->query("SELECT area_name FROM areas WHERE area_id = $area_id");
foreach ($getName as $get_name) {
    $area_name =  $get_name['area_name'];
}

$getName = $db->query("SELECT point FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $point =  $get_name['point'];
}
$getName = $db->query("SELECT vol_fig_path FROM volunteers WHERE vol_id = $vol_id");
foreach ($getName as $get_name) {
    $vol_fig_path =  $get_name['vol_fig_path'];
}
$specData = $db->query("SELECT DISTINCT rank_spec_flag FROM options WHERE b_user_id = $b_user_id");
foreach ($specData as $data_val) {
    $rank_spec_flag = $data_val['rank_spec_flag'];
}
//都道府県プルダウン
if ($pref_data = $db->query("SELECT DISTINCT pref_id, pref_name FROM areas")) {
    foreach ($pref_data as $pref_data_val) {
        $pref_pd .= "<option value='" . $pref_data_val['pref_id'] . "'>" . $pref_data_val['pref_name'] . "</option>";
    }
}
$db = null;
?>
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
      <form method="post" name="formback" action="b_vol_regd_list.php">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:formback.submit()">
        <p id="back"><i class="fas fa-reply"></i></p>
      </a>
    </form>
    <form method="post" name="formhome" action="../b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
      <a href="javascript:formhome.submit()">
        <p id="home"><i class="fas fa-home"></i></p>
      </a>
    </form>
    </div>
    <div id="body-bk">
        <div id="body">
            <div id="Toptitle1">
                <i class="fas fa-edit"></i>　登録・編集
            </div>
            <div width="100%" class="new">
                <h1 align="center">変更画面</h1>

                <h2>　ボランティア名</h2>
                <form name='foo' action="update.php" method="post" onSubmit="return check()">
                    <!-- 登録したボランティア名が表示されるか　valueに代入 -->
                    <input type="text" name="vol_name" maxlength="20" value="<?php echo $vol_name; ?>" required>
                    <input type="hidden" name="b_user_id" value="<?= $b_user_id ?>">
                    <input type="hidden" name="vol_id" value="<?= $vol_id ?>">
                    <br>
                    <h2>イメージ画像</h2>
                    <label>登録画像</label>
                    <?php if ($vol_fig_path == null) {
                        echo "<br>登録されている写真はありません。";
                    } else {
                        echo "<img src=" . $vol_fig_path . ">";
                    } ?>
                    <br>
                    <br>
                    <label>ファイルを変更する場合は、<br>ファイルを選択してください</label>
                    <br>
                    <input type="file" id='image' name="image" accept="image/*">
                    <img id="preview">
                    <script>
                        $('#image').on('change', function(e) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                $("#preview").attr('src', e.target.result);
                            }
                            reader.readAsDataURL(e.target.files[0]);
                        });
                    </script>
                    <h2>地域選択</h2>
                    <label>都道府県</label>
                    <select name="select_pref" , id="pref" required>
                        <!-- 登録した都道府県が表示されるか　都道府県が選択できるか　selectedがついているところに登録した県が入る（一番上） -->
                        <option value="<?php echo $pref_id; ?>" selected><?php echo $pref_name; ?></option>
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
                    <select name="select_area" , id="area" required>
                        <!-- 登録した地域が表示されるか　地域が選択できるか　selectedがついているところに登録した地域が入る（一番上） -->
                        <option value="<?php echo $area_id; ?>" selected><?php echo $area_name; ?></option>

                    </select>
                    <br>
                    <h2>郵便番号</h2>
                    <!-- ▼郵便番号入力フィールド(7桁) -->-
                    <!-- 登録した郵便番号が表示できるか -->
                    <input type="text" name="zip11" size="10" maxlength="8" value="<?= htmlspecialchars($post_num, ENT_QUOTES, 'UTF-8') ?>" required>
                    <!-- ▼住所入力フィールド(都道府県+以降の住所) -->
                    <br>
                    <h2>住所</h2>
                    <!-- 登録した住所が表示できるか textareaで登録したものを囲む-->
                    <textarea name="addr11" required><?= htmlspecialchars($vol_place, ENT_QUOTES, 'UTF-8') ?></textarea>
                    <br>
                    <h2>開催日</h2>
                    <!-- 登録した日付が表示されるか　編集ができるか　input type="text"だから登録したときにヤバいかも？-->
                    <input type="text" name="vol_date" value="<?= htmlspecialchars($vol_date, ENT_QUOTES, 'UTF-8') ?>" required>
                    <br>
                    <label>開始時間</label>
                    <input type="time" name="beg_time" value="<?php echo $vol_beg_time; ?>" required>
                    <br>
                    <label>終了時間</label>
                    <input type="time" name="fin_time" value="<?php echo $vol_fin_time; ?>" required>
                    <h2>定員</h2>
                    <!-- 登録した定員が表示されるか　valueに代入　今は仮の100を代入-->
                    <input class="capacity" type="number" name="vol_capacity" value="<?php echo $vol_capacity; ?>" maxlength="3" required>名
                    <br><br>
                    <input id="check-a" type="checkbox" name="val_flag" value="1" checked><label for="check-a">報酬あり</label><br>
                    (※詳しい報酬内容は<br>　　詳細にお書きください)<br><br>
                    <!-- var va_flag = falseならばチェックが外れる-->
                    <?php
                    if ($val_flag == 0 || $val_flag == null) {
                        echo "<script>";
                        echo "$('#check-a').prop('checked', false);";
                        echo "</script>";
                    }
                    ?>
                    <!-- var newbie_flag = falseならばチェックが外れる-->
                    <input id="check-b" type="checkbox" name="newbie_flag" value="1" checked><label for="check-b">初心者歓迎</label><br><br>
                    <?php if ($newbie_flag == 0 || $newbie_flag == null) {
                        echo "<script>";
                        echo "$('#check-b').prop('checked', false);";
                        echo "</script>";
                    }
                    ?>
                    <?php
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
                    <!-- 登録した住所が表示できるか textareaで登録したものを囲む-->
                    <textarea name="detail" value=<?php echo $vol_detail; ?> placeholder="詳細を入力" required><?= htmlspecialchars($vol_detail, ENT_QUOTES, 'UTF-8') ?></textarea>
                    <br>
                    <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>">
                    <input type="hidden" name="vol_id" value="<?php echo $vol_id; ?>">
                    <input type="hidden" name="pref_name" value="<?php echo $pref_name; ?>">
                    <input type="hidden" name="area_name" value="<?php echo $area_name; ?>">
                    <button type='submit' align="center">編集登録</button>
                </form>
                <script type="text/javascript">
                    function check() {

                      // 今日の日付
                      var date1 = new Date(Date.now());
                      // 2020/4/30 12:30:45
                      var year = document.getElementById( "year" ).value ;
                      var month = document.getElementById( "month" ).value - 1;
                      var day = document.getElementById( "day" ).value ;
                      var date2 = new Date(year, month, day);

                      try {
                      // year、month、dayの年月日をもつDate型のインスタンスを作成
                      var validDate=new Date( year, month, day);

                      // year、month、dayが妥当であるかどうかのチェック
                      var isValid = (
                                     ( validDate.getFullYear() == year )
                                  && ( validDate.getMonth() == month )
                                  && ( validDate.getDate() == day)
                              );

                      } catch( e ) {

                          // Date型の作成で例外が発生した場合は、妥当でないのでfalse
                          return false;
                      }

                      if (isValid) {
                        if ( date1.getTime() < date2.getTime()) {
                          if (window.confirm('登録してしてよろしいですか？')) { // 確認ダイアログを表示
                              return true; // 「OK」時は送信を実行
                          } else { // 「キャンセル」時の処理
                              window.alert('キャンセルされました'); // 警告ダイアログを表示
                              return false; // 送信を中止
                          }
                        } else {
                          window.alert('日付は明日以降にして下さい'); // 警告ダイアログを表示
                          return false; // 送信を中止
                        }
                      } else {
                        window.alert('日付の値が正しくありません'); // 警告ダイアログを表示
                        return false; // 送信を中止
                      }
                    }
                </script>
            </div>
        </div>
    </div>
</body>
</html>
