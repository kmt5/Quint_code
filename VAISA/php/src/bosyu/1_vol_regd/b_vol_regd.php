<?php
session_start();
$b_user_id = $_POST["b_user_id"];
//echo $b_user_id;
$_SESSION["b_user_id"] = $b_user_id;
?>
<!DOCTYPE html> <!-- 宣言（無くても機能する？） -->
<html>
<head>
  <meta charset="utf-8"> <!-- 文字コードを宣言 -->
  <title>ボランティア登録</title> <!-- ページのタイトル -->
  <link rel="stylesheet" type="text/css" href="../../common/common.css">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../bosyu/1_vol_regd/CSS/vol_regd.css">
</head>
<body>
  <div id="header-fixed">  <!-- ヘッダー箇所 -->
    <img border="0" src="../../common/header.jpg" width="100%" height="100%">
    <form method="post" name="formback" action="../b_home.php">
      <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
    <a href="javascript:formback.submit()">
      <p id="back"><i class="fas fa-reply"></i></p>
    </a>
  </form>
  <form method="post" name="formhome" action="../b_home.php">
    <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
    <a href="javascript:formhome.submit()">
      <p id="home"><i class="fas fa-home"></i></p>
    </a>
  </form>
  </div>
  <div id="body-bk">
    <div id="body">
      <!-- ページ上部のタイトル部分 -->
      <div id="Toptitle1">
        <i class="fas fa-pencil-alt"></i>登録・編集
      </div>
      <table>
        <tr>
          <td class="icon" width="30%">
            <form method="post" name="form1" action="b_vol_regd_new.php">
            <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
            <a href="javascript:form1.submit()">
            <i class="fas fa-plus fa-2x"></i>
            </a>
          </td>
          <td>
            <a href="javascript:form1.submit()">新規<br>ボランティア登録</a>
          </form>
          </td>
        </tr>
        <tr>
          <td class="icon" width="30%">
            <form method="post" name="form0" action="b_vol_regd_list.php">
            <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
            <a href="javascript:form0.submit()">
            <i class="fas fa-file-signature fa-2x"></i>
            </a>
          </td>
          <td>
            <a href="javascript:form0.submit()">ボランティア<br>一覧</a>
          </form>
          </td>
        </tr>
      </a>
      </table>
    </div>
  </div>

</body>
</html>
