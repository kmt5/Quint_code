<?php
$user_id='1234567a';
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
if(isset($_POST['add'])){
  $adi= $_POST['advol'];
  $sth=$db->prepare("UPDATE sanka_situations SET set_flag = 0 WHERE vol_id = $adi and s_user_id='$user_id'");
  $sth->execute();
}


?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>参加登録ボランティア</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/mybora.css">
  <link rel="stylesheet" type="text/css" href="./CSS/tab.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="./CSS/my_fav.css">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="header.jpg"style="vertical-align:middle;" width="100%" height="100%">
    <a href= "s_my_first.php">
      <img border="0" src="back.jpg" width="20%" height="100%" class="back">
    </a>
    <a href= "s_home.html">
      <img border="0" src="home.jpg" width="20%" height="100%" class="home">
    </a>
  </div>
  <div id = "body-bk">
    <div id = "body">
      <div id ="Toptitle2">
        マイボランティア
        <div id ="Toptitle-my">
        <i class="far fa-calendar-alt"></i>
          参加登録ボランティア
        </div>
      </div>

<?php
$now_time=date("Y/m/d");
$now_month=(int)date("m",strtotime($now_time));
$now_year=(int)date("Y",strtotime($now_time));
      echo '<div id = "tab-color">';
        echo '<div id="tabcontrol">';
          echo '<center>';
            echo '<a href="#tabpage1">'.$now_year.' '.$now_month.'</a>';
            $now_month++;
            echo '<a href="#tabpage2">'.$now_year.' '.$now_month.'</a>';
            $now_month++;
            echo '<a href="#tabpage3">'.$now_year.' '.$now_month.'</a>';
          echo '</center>';
       echo '</div>';
     echo '</div>';
?>
<div id="tabbody">
  <center>
<script>
  function adVol(){
  return confirm("登録解除しますか？");
  }
</script>
<?php
//データベースに接続(test3)
    $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db = new PDO($dsn, 'root', 'root');
    $volid = "SELECT * FROM volunteers WHERE vol_id in (SELECT vol_id FROM sanka_situations where s_user_id = '$user_id' and set_flag = 1)";
    $result = $db->query($volid);


//月
    $now_time=date("Y/m/d");
    $now_month_1=(int)date("m",strtotime($now_time));
    $now_month_1=strval($now_month_1);
    $now_month_2=(int)date("m",strtotime($now_time))+1;
    $now_month_2=strval($now_month_2);
    $now_month_3=(int)date("m",strtotime($now_time))+2;
    $now_month_3=strval($now_month_3);
//年
    $now_year=(int)date("Y",strtotime($now_time));
    $now_year=strval($now_year);

    $count1=0;
    $count2=0;
    $count3=0;

    foreach ($result as $row) {
      if((date("m",strtotime($row['vol_date'])) == $now_month_1) and (date("Y",strtotime($row['vol_date'])) == $now_year)){
      echo '<div id="tabpage1">';
      $count1++;
      }
      else if((date("m",strtotime($row['vol_date'])) == $now_month_2) and (date("Y",strtotime($row['vol_date'])) == $now_year)){
      echo '<div id="tabpage2">';
      $count2++;
      }
      else if((date("m",strtotime($row['vol_date'])) == $now_month_3) and (date("Y",strtotime($row['vol_date'])) == $now_year)){
      echo '<div id="tabpage3">';
      $count3++;
      }
      else{
        continue;
      }
        echo '<h1>';
        echo '<form method="post" name="form1" action="../1_search/s_search_result_vol.php">';
        echo '<input type="hidden" name="vol_id" value="'.$row['vol_id'].'">';
        echo '<a href="javascript:form1.submit()">';
        echo date("d日  ",strtotime($row['vol_date'])).date("H:i",strtotime($row['vol_beg_time'])).'~'.date("H:i",strtotime($row['vol_fin_time']));
        echo '<br>';
        echo '場所 '.$row['vol_place'];
        echo '<br>';
        echo '内容 '.$row['vol_name'];
        echo '</a>';
        echo '</form>';

        echo '<form method="POST">';
        echo '<button type = "submit" name = "add" id="ad" class="del" onclick="return adVol()">登録解除</button>';
        echo '<input type = "hidden" name = "advol" value="'.$row['vol_id'].'">';
        echo '</form>';
        echo  '<img src="../../bosyu/1_vol_regd/upload/'.$row['vol_fig_path'].'" class="img">';
        echo '<br>';
        echo '</div>';
    }
    if($count1 == 0){
      echo '<div id="tabpage1">';
      echo '<h1>';
      echo '<center>';
      echo '参加登録ボランティアは<br>';
      echo 'ありません';
      echo '</center>';
      echo '</div>';
    }
    if($count2 == 0){
      echo '<div id="tabpage2">';
      echo '<h1>';
      echo '<center>';
      echo '参加登録ボランティアは<br>';
      echo 'ありません';
      echo '</center>';
      echo '</div>';
    }
    if($count3 == 0){
      echo '<div id="tabpage3">';
      echo '<h1>';
      echo '<center>';
      echo '参加登録ボランティアは<br>';
      echo 'ありません';
      echo '</center>';
      echo '</div>';
    }
    $db=null;
?>
</center>
  </div>
  </div>
</div>
<script type="text/javascript">
  // ---------------------------
  // ▼A：対象要素を得る
  // ---------------------------
  var tabs = document.getElementById('tabcontrol').getElementsByTagName('a');
  var pages = document.getElementById('tabbody').getElementsByTagName('div');
  // ---------------------------
  // ▼B：タブの切り替え処理
  // ---------------------------
  function changeTab() {
     // ▼B-1. href属性値から対象のid名を抜き出す
     var targetid = this.href.substring(this.href.indexOf('#')+1,this.href.length);

     // ▼B-2. 指定のタブページだけを表示する
     for(var i=0; i<pages.length; i++) {
        if( pages[i].id != targetid ) {
           pages[i].style.display = "none";
        }
        else {
           pages[i].style.display = "block";
        }
     }
     // ▼B-3. クリックされたタブを前面に表示する
     for(var i=0; i<tabs.length; i++) {
        tabs[i].style.zIndex = "0";
     }
     this.style.zIndex = "10";
     // ▼B-4. ページ遷移しないようにfalseを返す
     return false;
  }
  // ---------------------------
  // ▼C：すべてのタブに対して、クリック時にchangeTab関数が実行されるよう指定する
  // ---------------------------
  for(var i=0; i<tabs.length; i++) {
     tabs[i].onclick = changeTab;
  }
  // ---------------------------
  // ▼D：最初は先頭のタブを選択しておく
  // ---------------------------
  tabs[0].onclick();
</script>
  <div id="footer-fixed">
    <img border="0" src="kokoku.jpg" width="100%" height="100%">
  </div>
</body>
</html>
