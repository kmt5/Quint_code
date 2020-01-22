<?php
$user_id='1234567a';
//申請時に前画面に遷移するためにデータが途切れるヌルで判定
if($_POST['name']== null){
  header("location: s_frd_add.php");
}
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
//テーブルに自分とフレンドに関するデータがない場合はこっちの申請で追加
if(isset($_POST['ask'])){
  $askfrid= $_POST['frid'];
  $sth=$db->prepare("INSERT INTO friends VALUE ('$askfrid','$user_id',1,0)"); //相手に申請
  $sth->execute();
//テーブルに存在し、過去に申請したが取り消してしまいもう一度申請したい場合などはフラグの更新でこっち
}else if(isset($_POST['ask2'])){
  $askfrid2= $_POST['frid2'];
  $sth=$db->prepare("UPDATE friends SET reqest_flag = 1 WHERE my_user_id = '$askfrid2' and fr_user_id = '$user_id'"); //相手に申請
  $sth->execute();
}
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>フレンド追加</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_add_app.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div id="header-fixed">
    <img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
    <a href= "s_frd_add.php">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
    <a href= "s_home.html">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
    </a>
  </div>

  <div id="body-bk">
    <div id="body">
      <?php
    $id =  $_POST['name'];
    $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db = new PDO($dsn, 'root', 'root');
    $frid = "SELECT * FROM sanka_users WHERE s_user_id = '$id'";
    $flags = "SELECT * FROM friends WHERE my_user_id = '$id' and fr_user_id = '$user_id' and reqest_flag = 1";//テーブルに情報があると申請済みかフレンドになっているかのどちらか
    $flags2 =  "SELECT * FROM friends WHERE my_user_id = '$id' and fr_user_id = '$user_id' and friends_flag = 1";
    $which_exit = "SELECT * FROM friends WHERE my_user_id = '$id' and fr_user_id = '$user_id'";
    $result1 = $db->query($frid); //8文字IDでも存在しないユーザなら警告文を出すためその判定用
    $result2 = $db->query($frid); //存在した場合の名前と写真を上げるため用
    $result3 = $db->query($flags); //申請をしている場合にボタンを表示させない判定用
    $result4 = $db->query($flags2); //フレンドになっているのに検索しボタンを表示させない用
    $which = $db->query($which_exit); //申請を行う際、前に申請したことがある場合テーブルにデータが残るので、残っている場合の更新処理と、初めての申請の時データを追加処理する判定用

    $data1 = $result1->fetchAll();
    $data2 = $result3->fetchAll();
    $data3 = $result4->fetchAll();
    $data_which = $which->fetchAll();
    if($data1 == Array()){echo 'IDに一致するユーザーが見つかりませんでした'; }
    foreach ($result2 as $row){
      echo '<div class="frd-add-app">';
      //echo '<a href="s_frd_list_pro.php?id='.$row['s_user_id'].'">';
      echo  '<img src=".../sanka/prof/'.$row['prof_path'].'" class="img">';
      echo '<p class="user_name">';
      echo $row['nickname'].'</p>';
      echo '</a>';
      echo '</div>';
    if(($data2 != Array()) or ($data3 != Array())){echo '<p>申請済みかフレンドです<p/>';}
    //elseif($data3 != Array()){echo '<p>申請済みかフレンドです<p/>';}
    else{
      if($data_which == Array()){
        echo '<form method="POST" id = "add">';
        echo '<button type = "submit" name = "ask" class="apply" onclick="appFrd()">申請</button>';
        echo '<input type = "hidden" name = "frid" value ="'.$row['s_user_id'].'">';
        echo '<input type = "hidden" name = "ask" id = "ask">';
        echo '</form>';
        }
        else{ //一度申請したことがあるならテーブルにデータがそんざいする
        echo '<form method="POST" id = "add2">';
        echo '<button type = "submit" name = "ask2" class="apply" onclick="appFrd()">申請</button>';
        echo '<input type = "hidden" name = "frid2" value ="'.$row['s_user_id'].'">';
        echo '<input type = "hidden" name = "ask2" id = "ask2">';
        echo '</form>';
        }
      }
    }
    $db=null;
    ?>
    </div>
  </div>

<script>
function appFrd(){
var result=window.alert("申請しました!!");
}
</script>


  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
