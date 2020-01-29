<?php
$user_id=$_POST['s_user_id'];
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>ポイント明細</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/point_detail.css">
  <link rel="stylesheet" type="text/css" href="./CSS/tab.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
<div id="header-fixed">
<img border="0" src="header.jpg" style="vertical-align:middle;" width="100%" height="100%">
<form method="post" name="back" action="s_point_first.php">
<input type="hidden" name="s_user_id" value="<?php echo $user_id;?>"/>
<button type="submit">
        <p id="back"><i class="fas fa-reply"></i></p>
</button>
</form>
<form method="post" name="home" action="../s_home.php">
<input type="hidden" name="s_user_id" value="<?php echo $user_id;?>"/>
<button type="submit">
        <p id="home"><i class="fas fa-home"></i></p>
</button>
</form>
</div>
  <div id = "body-bk">
    <div id = "body">
      <div id ="Toptitle1">
        ポイント・ランク
        <div id ="Toptitle-detail">
          ポイント明細
        </div>
      </div>

      <div id = tab-color>
        <div id="tabcontrol">
          <center>
            <i class="fa fa-angle-double-left fa-3x" id = "left" onclick='slidefront()'></i>
            <a href="#tabpage1" id="m1">2019 12</a>
            <a href="#tabpage2" id="m2">2020 1</a>
            <a href="#tabpage3" id="m3">2020 2</a>
            <a href="#tabpage4" id="m4">2020 3</a>
            <a href="#tabpage5" id="m5">2020 4</a>
            <a href="#tabpage6" id="m6">2020 5</a>
            <a href="#tabpage7" id="m7">2020 6</a>
            <a href="#tabpage8" id="m8">2020 7</a>
            <a href="#tabpage9" id="m9">2020 8</a>
            <a href="#tabpage10" id="m10">2020 9</a>
            <a href="#tabpage11" id="m11">2020 10</a>
            <a href="#tabpage12" id="m12">2020 11</a>
            <i class="fa fa-angle-double-right fa-3x" id = "right" onclick='slideback()'></i>
          </center>
        </div>
      </div>

    <div id="tabbody">
      <center>
<?php
    $dbh=null;
      // ポストのデータを変数に
    $name = $_POST["username"];
    $age = $_POST["age"];
//データベースに接続(test3)
    $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
    $db = new PDO($dsn, 'root', 'root');
    $volid = "SELECT * FROM volunteers WHERE vol_id in (SELECT vol_id FROM sanka_situations where s_user_id = '$user_id' and read_flag = 1)";
    $result = $db->query($volid);

    $count1=0;
    $count2=0;
    $count3=0;
    $count4=0;
    $count5=0;
    $count6=0;
    $count7=0;
    $count8=0;
    $count9=0;
    $count10=0;
    $count11=0;
    $count12=0;

    foreach ($result as $row) {
      if(date("m",strtotime($row['vol_date'])) == '12'){
      echo '<div id="tabpage1">';
      $count1++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '1'){
      echo '<div id="tabpage2">';
      $count2++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '2'){
      echo '<div id="tabpage3">';
      $count3++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '3'){
      echo '<div id="tabpage4">';
      $count4++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '4'){
      echo '<div id="tabpage5">';
      $count5++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '5'){
      echo '<div id="tabpage6">';
      $count6++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '6'){
      echo '<div id="tabpage7">';
      $count7++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '7'){
      echo '<div id="tabpage8">';
      $count8++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '8'){
      echo '<div id="tabpage9">';
      $count9++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '9'){
      echo '<div id="tabpage10">';
      $count10++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '10'){
      echo '<div id="tabpage11">';
      $count11++;
      }
      elseif(date("m",strtotime($row['vol_date'])) == '11'){
      echo '<div id="tabpage12">';
      $count12++;
      }
      else{continue;}
          echo '<img src="../../bosyu/'.$row['vol_fig_path'].'" class="img2">';
          echo '<h1>';
          echo '<td align="left">';
          echo date("d日  ",strtotime($row['vol_date'])).date("H:i",strtotime($row['vol_beg_time'])).'~'.date("H:i",strtotime($row['vol_fin_time']));
          echo '<br>';
          echo '場所 '.$row['vol_place'];
          echo '<br>';
          echo '内容 '.$row['vol_name'];
          echo '<br>';
          echo '獲得ポイント '.$row['point'];
          echo '<br>';
          echo '</td>';
          echo '</div>';
         }
         if($count1 == 0){
          echo '<div id="tabpage1">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count2 == 0){
          echo '<div id="tabpage2">';
          echo '<td align="center">';
          echo '<center>';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count3 == 0){
          echo '<div id="tabpage3">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count4 == 0){
          echo '<div id="tabpage4">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count5 == 0){
          echo '<div id="tabpage5">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count6 == 0){
          echo '<div id="tabpage6">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count7 == 0){
          echo '<div id="tabpage7">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count8 == 0){
          echo '<div id="tabpage8">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count9 == 0){
          echo '<div id="tabpage9">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count10 == 0){
          echo '<div id="tabpage10">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count11 == 0){
          echo '<div id="tabpage11">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
          echo '</div>';
        }
        if($count12 == 0){
          echo '<div id="tabpage12">';
          echo '<h1>';
          echo '<td align="center">';
          echo '参加済みボランティアは<br>';
          echo 'ありません';
          echo '</td>';
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
    // ロード時に先頭ボタンを白にする
    var tabs = document.getElementById("tabcontrol").getElementsByTagName('a');
    var pages = document.getElementById('tabbody').getElementsByTagName('div');
    var novol = document.getElementById('novol');
    var leftsercle = document.getElementById('left');
    var rightsercle = document.getElementById('right');
    //選択した月に参加したボランティアがないときの表示--作成途中--
    /*if(pages.length == 0){
      novol.style.display = 'block';
      novol.style.zIndex = '10';
    }
    for(var i=0; i<pages[i].length; i++){
      if(pages[i].length == 0) {
        novol.style.display = 'block';
        novol.style.zIndex = '10';
      }
    }*/
    // ---------------------------
    // ▼B：タブの切り替え処理
    // ---------------------------
    function changeTab() {
      for(var i=0; i<tabs.length; i++) {
tabs[i].style.background = '#0CB06E';
 }
var tabnumber = this.id;
tabs[tabnumber].style.background = 'white';
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
    // ▼D：最初のタブ選択しておく
    // ---------------------------
    if(tabs.length == 3) {
       tabs[3].onclick();
     }else if(tabs.length == 12){
       tabs[9].onclick();
     }
    //tabs[9].onclick();
    // ---------------------------
    // 初期は直近3カ月表示のため右矢印を選択不可
    // ---------------------------
    rightsercle.style.color = 'grey';
    var count = 0;　//何月分を表示しているか判定用の変数
    //左矢印押されたときの遷移
    function slidefront() {
      if(count == 0){
        count += 1;
        tabs[11].style.display = 'none';
        tabs[8].style.display = 'inline-block';
        rightsercle.style.color = 'black';
      }else if(count == 1){
        count += 1;
        tabs[10].style.display = 'none';
        tabs[7].style.display = 'inline-block';
      }else if(count == 2){
        count += 1;
        tabs[9].style.display = 'none';
        tabs[6].style.display = 'inline-block';
      }else if(count == 3){
        count += 1;
        tabs[8].style.display = 'none';
        tabs[5].style.display = 'inline-block';
      }else if(count == 4){
        count += 1;
        tabs[7].style.display = 'none';
        tabs[4].style.display = 'inline-block';
      }else if(count == 5){
        count += 1;
        tabs[6].style.display = 'none';
        tabs[3].style.display = 'inline-block';
      }else if(count == 6){
        count += 1;
        tabs[5].style.display = 'none';
        tabs[2].style.display = 'inline-block';
      }else if(count == 7){
        count += 1;
        tabs[4].style.display = 'none';
        tabs[1].style.display = 'inline-block';

      }else if(count == 8){
        count += 1;
        tabs[3].style.display = 'none';
        tabs[0].style.display = 'inline-block';
        leftsercle.style.color = 'grey';
      }
    }
    //右矢印押されたときの遷移
    function slideback() {
      if(count == 1){
        count -= 1;
        tabs[8].style.display = 'none';
        tabs[11].style.display = 'inline-block';
        rightsercle.style.color = 'grey';
      }else if(count == 2){
        count -= 1;
        tabs[7].style.display = 'none';
        tabs[10].style.display = 'inline-block';
      }else if(count == 3){
        count -= 1;
        tabs[6].style.display = 'none';
        tabs[9].style.display = 'inline-block';
      }else if(count == 4){
        count -= 1;
        tabs[5].style.display = 'none';
        tabs[8].style.display = 'inline-block';
      }else if(count == 5){
        count -= 1;
        tabs[4].style.display = 'none';
        tabs[7].style.display = 'inline-block';
      }else if(count == 6){
        count -= 1;
        tabs[3].style.display = 'none';
        tabs[6].style.display = 'inline-block';
      }else if(count == 7){
        count -= 1;
        tabs[2].style.display = 'none';
        tabs[5].style.display = 'inline-block';
      }else if(count == 8){
        count -= 1;
        tabs[1].style.display = 'none';
        tabs[4].style.display = 'inline-block';
      }else if(count == 9){
        count -= 1;
        tabs[0].style.display = 'none';
        tabs[3].style.display = 'inline-block';
        leftsercle.style.color = 'black';
      }
    }

  </script>
</body>
</html>
