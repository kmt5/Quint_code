<?php
  $vol_id     = $_POST['vol_id'];
  $s_user_id  = $_POST['s_user_id'];
  $b_user_id  = $_POST['b_user_id'];

  $dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
  $db  = new PDO($dsn, 'root', 'root');

  //read_flagの変更
  $res = $db->query('update sanka_situations set read_flag="1" where s_user_id="'.$s_user_id.'" and vol_id = "'.$vol_id.'"');

  //point追加処理(mada)
  $sql1 = "select point from volanteers where vol_id = '".$vol_id."'";


  echo '
  <form method="post" action="../2_sanka_list/b_entrant_list.php">
    <input type="hidden" name="b_user_id" value="'.$b_user_id.'" />
    <input type="hidden" name="vol_id" value="'.$vol_id.'">
  </form>
  <script>
    document.forms[0].submit();
  </script>';
?>