<?php
  $vol_id     = $_POST['vol_id'];
  $s_user_id  = $_POST['s_user_id'];
  $b_user_id  = $_POST['b_user_id'];

  $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db  = new PDO($dsn, 'root', 'root');

  $check = $db->query('select read_flag from sanka_situations where s_user_id="'.$s_user_id.'" and vol_id = "'.$vol_id.'"')->fetch();

  if ($check['read_flag'] == 1){
    //point追加処理(mada)
    $v_res = $db->query('select point from volunteers where vol_id = "'.$vol_id.'"')->fetch();
    $s_res = $db->query('select point,rank from sanka_users where s_user_id = "'.$s_user_id.'"')->fetch();
    $new = $s_res['point'] - $v_res['point'];
    $db->query('update sanka_users set point="'.$new.'" where s_user_id="'.$s_user_id.'"');
    echo $new;

    if ($new > 200 && $s_res['rank'] != "プラチナ"){
      $db->query("update sanka_users set rank='プラチナ' where s_user_id='".$s_user_id."'");
    }elseif($new > 100 && $s_res['rank'] != "ゴールド"){
      $db->query("update sanka_users set rank='ゴールド' where s_user_id='".$s_user_id."'");
    }elseif($new > 50 && $s_res['rank'] != "シルバー"){
      $db->query("update sanka_users set rank='シルバー' where s_user_id='".$s_user_id."'");
    }elseif($s_res['rank'] != "ブロンズ"){
      $db->query("update sanka_users set rank='ブロンズ' where s_user_id='".$s_user_id."'");
    }

    //read_flagの変更
    $db->query('update sanka_situations set read_flag="0" where s_user_id="'.$s_user_id.'" and vol_id = "'.$vol_id.'"');
  }

  echo '
  <form method="post" action="./b_sanka.php">
    <input type="hidden" name="b_user_id" value="'.$b_user_id.'" />
    <input type="hidden" name="vol_id" value="'.$vol_id.'">
  </form>
  <script>
    document.forms[0].submit();
  </script>';
?>