<?php
  $vol_id     = $_POST['vol_id'];
  $s_user_id  = $_POST['s_user_id'];

  $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
  $db  = new PDO($dsn, 'root', 'root');
  $res = $db->query('update sanka_situations set read_flag="1" where s_user_id="'.$s_user_id.'" and vol_id = "'.$vol_id.'"');
  echo '
  <form method="post" action="s_home.php">
    <input type="hidden" name="s_user_id" value="'.$s_user_id.'" />
  </form>
  <script>
    document.forms[0].submit();
  </script>';
?>