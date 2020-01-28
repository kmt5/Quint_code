<?php
$s_user_id = $_POST["s_user_id"];
//echo $s_user_id;
$dsn = "mysql:host=vaisa_mysql_1;dbname=vaisa;";
$db = new PDO($dsn, 'root', 'root');
$db->query("set names utf8");
$area_id = $_POST["area_id"];
$val_flag = $_POST["val_flag"];
$vol_date_near = $_POST["vol_date_near"];
$newbie_flag = $_POST["newbie_flag"];
$getArea = $db -> query("SELECT pref_name, area_name FROM areas WHERE area_id = $area_id");
foreach ($getArea as $get_area) {
  $pref_name = $get_area['pref_name'];
  $area_name = $get_area['area_name'];
}
if ($_POST['year'] == 'none') {
  $vol_date = date('Y-m-d');
} else {
  $vol_date = $_POST['year'] . '-' . $_POST['month'] . '-' . $_POST['day'];
}
$near_date = date('Y-m-d', strtotime('+1 week', strtotime($vol_date)));
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>

<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>検索</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link rel="stylesheet" type="text/css" href="./CSS/search_result.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<body>
  <div id="header-fixed">
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="s_search_first.php">
      <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
    <a href="javascript:formback.submit()">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
  </form>
  <form method="post" name="formhome" action="../s_home.php">
    <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
    <a href="javascript:formhome.submit()">
      <p id="home"><i class="fas fa-home"></i></p>
    </a>
  </form>
  </div>

  <div id="body-bk">
    <div id="body">
      <div id="Toptitle1">
        検索
      </div>
      <div class="area">
        <?php echo $pref_name . " " . $area_name; ?>
      </div>
      <form action='s_search_first.php' method="post">
        <input type="hidden" name="s_user_id" value="<?php echo $s_user_id; ?>" />
        <button type="submit" class="vol">別の条件で検索する　<i class="fas fa-search"></i></button>
      </form>

      <?php
      $value1 = 1;

      if (isset($_POST['narabi'])) {
        $value1 = $_POST['narabi'];
      }

      echo "<form action='' method='post'>";
      echo "<p>";
      echo "<label for='narabi'>並び替え</label>";
      echo "<select class='zyoken' name='narabi' onchange='submit(this.form)'>";
      if ($value1 == 1) {
        echo "<option value='1' selected>開催時間順</option>";
      } elseif ($value1 == 2) {
        echo "<option value='2' selected>ポイント順</option>";
      } else {
        echo "<option value='3' selected>登録順</option>";
      }
      echo "<option value='1'>開催時間順</option>";
      echo "<option value='2'>ポイント順</option>";
      echo "<option value='3'>登録順</option>";
      echo "</select>";
      echo "</p>";
      echo "<input type='hidden' name='year' value=" . $_POST["year"] . ">";
      echo "<input type='hidden' name='month' value=" . $_POST["month"] . ">";
      echo "<input type='hidden' name='day' value=" . $_POST["day"] . ">";
      echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
      echo "<input type='hidden' name='val_flag' value=" . $val_flag . ">";
      echo "<input type='hidden' name='vol_date_near' value=" . $vol_date_near . ">";
      echo "<input type='hidden' name='newbie_flag' value=" . $newbie_flag . ">";
      echo "<input type='hidden' name='area_id' value=" . $area_id . ">";
      echo "</form>";
      ?>

      <div class="b">
        <?php
        if ($value1 == 1) {
          if ($val_flag == 1 && $vol_date_near == 1 && $newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag = 1 AND newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_beg_time");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($val_flag == 1 && $vol_date_near == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_beg_time");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($vol_date_near == 1 && $newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_beg_time");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($val_flag == 1 && $newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag = 1 AND newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_beg_time");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($val_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_beg_time");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($vol_date_near == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_beg_time");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_beg_time");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_beg_time");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          }
        } else if ($value1 == 2) {
          if ($val_flag == 1 && $vol_date_near == 1 && $newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag = 1 AND newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND point");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($val_flag == 1 && $vol_date_near == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND point");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($vol_date_near == 1 && $newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND point");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($val_flag == 1 && $newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag = 1 AND newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND point");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($val_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND point");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($vol_date_near == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND point");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND point");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND point");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          }
        } else if ($value1 == 3) {
          if ($val_flag == 1 && $vol_date_near == 1 && $newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag =1 AND newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_id");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($val_flag == 1 && $vol_date_near == 1) {
              $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag =1 AND area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_id");
              $j = 0;
              foreach ($getName as $get_name) {
                $vol_id_html[$j] .= $get_name['vol_id'];
                $vol_name[$j] .= $get_name['vol_name'];
                $j += 1;
              }
          } else if ($vol_date_near == 1 && $newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_id");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($val_flag == 1 && $newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag =1  AND newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date'  AND disapp_flag = 0 ORDER BY vol_date AND vol_id");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($val_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE val_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_id");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($vol_date_near == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE area_id = $area_id AND vol_date >= '$vol_date' AND vol_date <= '$near_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_id");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else if ($newbie_flag == 1) {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE newbie_flag = 1 AND area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_id");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          } else {
            $getName = $db->query("SELECT vol_id, vol_name FROM volunteers WHERE area_id = $area_id AND vol_date >= '$vol_date' AND disapp_flag = 0 ORDER BY vol_date AND vol_id");
            $j = 0;
            foreach ($getName as $get_name) {
              $vol_id_html[$j] .= $get_name['vol_id'];
              $vol_name[$j] .= $get_name['vol_name'];
              $j += 1;
            }
          }
        }
        ?>
        <?php
        if (empty($get_name)) {
          echo "該当するボランティアはありません。";
        } else {
          $array_count = count($vol_name);
        }
        for ($i = 0; $i < $array_count; $i++) {
          $getValue = $db->query("SELECT set_flag, favo_flag FROM sanka_situations WHERE vol_id = $vol_id_html[$i] AND s_user_id = $s_user_id");
          foreach ($getValue as $get_value) {
            $setf =  $get_value['set_flag'];
            $favf =  $get_value['favo_flag'];
          }
          if ($setf == 0) {
            $value = 1;
          } else {
            $value = 2;
          }
          if ($favf == 0) {
            $value1 = 1;
          } else {
            $value1 = 2;
          }

          echo "<form action='s_search_result_vol.php' method='post'>";
          echo "<input type='hidden' name='s_user_id' value=" . $s_user_id . ">";
          echo "<input type='hidden' name='vol_id' value=" . $vol_id_html[$i] . ">";
          echo "<input type='hidden' name='value' value=" . $value . ">";
          echo "<input type='hidden' name='value1' value=" . $value1 . ">";
          echo "<input type='hidden' name='val_flag' value=" . $val_flag . ">";
          echo "<input type='hidden' name='year' value=" . $_POST["year"] . ">";
          echo "<input type='hidden' name='vol_date_near' value=" . $vol_date_near . ">";
          echo "<input type='hidden' name='newbie_flag' value=" . $newbie_flag . ">";
          //書き換え
          echo "<input type='hidden' name='month' value=" . $_POST["month"] . ">";
          echo "<input type='hidden' name='day' value=" . $_POST["day"] . ">";
          echo "<input type='hidden' name='area_id' value=" . $area_id . ">";      
          //
          echo "<button type='submit' class='vol'>" . $vol_name[$i] . "</button>";
          echo "</form>";

        }
        ?>
        <!--
        <button type="submit" class="vol" onclick="location.href='s_search_result_vol.html'">ボランティア名１</button>
        <button type="submit" class="vol" onclick="location.href='s_search_result_vol.html'">あいうえおかきくけこさしすせそたちつてと</button>
          <button type="submit">再検索</button> -->
      </div>
    </div>
  </div>
</body>
</html>
<?php $db = null; ?>
