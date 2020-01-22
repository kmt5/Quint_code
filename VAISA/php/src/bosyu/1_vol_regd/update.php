<?php
//データベースに接続(test3)
$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');
?>
<?php
if(isset($_FILES)&& isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
    $a = '../b_vol_regd/upload/' . basename($_FILES['image']['name']);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $a)){
        $msg = $a. 'のアップロードに成功しました';
    }else {
        $msg = 'アップロードに失敗しました';
    }
}?>
<?php
$vol_id = $_POST["vol_id"];
$db->query("UPDATE volunteers SET vol_name = $vol_name WHERE vol_id = $vol_id");
//echo $vol_name = $_POST["vol_name"];echo "<br>";
$vol_date = $_POST["vol_date"];echo "<br>";
//echo $vol_date;
$vol_beg_time = $_POST["beg_time"];
$vol_fin_time = $_POST["fin_time"];
//echo $vol_beg_time;
//echo $vol_fin_time;
//echo $vol_capacity = $_POST["vol_capacity"];
//echo $post_num = $_POST["zip11"];
//echo $vol_place = $_POST["addr11"];
$val_flag = $_POST["val_flag"];
//echo "val_flag:".$val_flag. "<br>";
$newbie_flag = $_POST["newbie_flag"];
//echo "newbie_flag:".$newbie_flag. "<br>";
$vol_detail = $_POST["detail"];
//echo "vol_detail:".$vol_detail. "<br>";
$pref_id = $_POST["select_pref"];
//echo "select_pref:".$pref_id. "<br>";
$spec_rank = $_POST["spec_rank"];
//echo "spec_rank:".$spec_rank. "<br>";
//echo $vol_id. "<br>";
//echo $rank_spec_flag = 0;
//echo "<br>";
$area_id = $_POST["select_area"];
//echo "select_area:".$area_id. "<br>";
$num = $vol_fin_time - $vol_beg_time;
$point = strval($num);
//echo "point:".$point. "<br>";
if ($_POST["image"] != null) {$vol_fig_path = $a;}  
//echo $vol_fig_path;

//データを登録する準備
$regist = $db->prepare("UPDATE volunteers SET vol_name = :vol_name, vol_date = :vol_date, vol_beg_time = :vol_beg_time, vol_fin_time = :vol_fin_time, vol_capacity = :vol_capacity, post_num = :post_num, vol_place = :vol_place, val_flag = :val_flag, newbie_flag = :newbie_flag, vol_detail = :vol_detail, pref_id =:pref_id, spec_rank = :spec_rank, rank_spec_flag = :rank_spec_flag, area_id = :area_id, vol_point = :vol_point, vol_fig_path = :vol_fig_path WHERE vol_id = $vol_id");
//値を格納します
$regist->bindParam(":vol_name", $vol_name, PDO::PARAM_STR);
$regist->bindValue(":vol_date", date('Y-m-d', strtotime($vol_date)), PDO::PARAM_STR);
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
$regist->bindValue(":rank_spec_flag", $rank_spec_flag, PDO::PARAM_INT);
$regist->bindValue(":area_id", $area_id, PDO::PARAM_INT);
$regist->bindValue(":vol_point", $point, PDO::PARAM_INT);
$regist->bindParam(":vol_fig_path", $vol_fig_path, PDO::PARAM_STR);
//実行
$regist->execute();
if ($regist) {
    //echo "登録完了!";
} else {
    //echo "エラーです！";
}
$db = null;
?>