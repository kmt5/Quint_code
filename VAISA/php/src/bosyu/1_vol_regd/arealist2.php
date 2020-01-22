<?php
$dsn = "mysql:host=test3_mysql_1;dbname=sample;";
$db = new PDO($dsn, 'root', 'root');

$pref_id=$_GET['pref_id'];

if( isset( $_GET[ 'pref_id' ] ) ){
  //選択されたドロップダウンリストの value を表示する。
  print "送信された内容は{$_GET['pref_id']}です。<br/>";
}

$sql  = "SELECT area_id, area_name FROM areas WHERE pref_id = '" . $pref_id . "'";

if ($area_data = $db->query($sql)) {
    $area_pd = '<option value="">----変更する----</option>' . "\r\n";
    foreach($area_data as $area_data_val) {
      $area_pd .= "<option value='".$area_data_val['area_id']."'>".$area_data_val['area_name']."</option>";
    }
}
echo $area_pd;
?>
