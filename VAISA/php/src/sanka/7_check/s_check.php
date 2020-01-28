<?php
$s_user_id=$_POST['s_user_id'];

//データベースに接続(test3)
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
$sql = "SELECT * FROM sanka_users WHERE s_user_id = '$s_user_id'"; //idは文字型で送られてくるのでクォーテーション
$res = $db->query($sql)->fetch();
?>

<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title></title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="./CSS/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_list.css">
  <link rel="stylesheet" type="text/css" href="./CSS/frd_list_pro.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" style="vertical-align:middle;" width="100%" height="100%">
    <form method="post" name="back" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <button type="submit">
        <p id="back"><i class="fas fa-reply"></i></p>
      </button>
    </form>
    <form method="post" name="home" action="../s_home.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
      <button type="submit">
        <p id="home"><i class="fas fa-home"></i></p>
      </button>
    </form>
  </div>

  <div id="body-bk">
      <div id="Toptitle1">
        マイプロフィール
      </div>
    <div id="body">

      <div class="frd-pro">
      <img src=<?php echo '../../'.$res['prof_path'];?> class="img">
      <p class="name"><?php echo $res['nickname'];?></p>
      <?php
      if ($res['rank'] == 'ブロンズ'){
        echo '<p class="rank" style="color:#C47022">'.$res['rank'].'</p>';
      }
      elseif($res['rank'] == 'シルバー'){
        echo '<p class="rank" style="color:silver">'.$res['rank'].'</p>';
      }
      elseif($res['rank'] == 'ゴールド'){
        echo '<p class="rank" style="color:gold">'.$res['rank'].'</p>';
      }
      else{
        echo '<p class="rank" style="color:rgb(176, 205, 230)">'.$res['rank'].'</p>';
      }
      ?>

      <center>
        <p class="vol">Myボランティアリスト</p>
      </center>
      <ul>
        <?php
          $myv = "SELECT vol_name FROM volunteers WHERE vol_id in (SELECT vol_id FROM sanka_situations WHERE s_user_id = '$s_user_id' and set_flag = 1)";
          $result2 = $db->query($myv);
          foreach ($result2 as $row){
            echo '<li>'.$row['vol_name'].'</li>';
          }
        ?>
      </ul>
      <p class="text">ひとこと</p>
      <p class="message">
      <?php
        $usm = "SELECT * FROM sanka_users WHERE s_user_id = '".$s_user_id."'"; //idは文字型で送られてくるのでクォーテーション
        $res2 = $db->query($usm)->fetch();
        echo 'ここはID番号'.$s_user_id.'のページです。'.'<br>';
        echo $res2['message'];
        $db=null;
      ?>
        </p>

      </div>
    </div>
  </div>
</body>
</html>
