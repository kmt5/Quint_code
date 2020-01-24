<?php
  $b_user_id  = $_POST['b_user_id'];
  $vol_id     = $_PSOT['vol_id'];
 ?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Instascanサンプルデモ</title>
    <link rel=“stylesheet” type="text/css" href=“./b_qr.css”>
    <style>
      #info {
        font-size: 4em;
        font-weight: bold;
        color: #666;
      }
    </style>
  </head>
  <body>
    <div id="header-fixed">
      <img border="0" src="../../common/header.jpg"style="vertical-align:middle;" width="100%" height="100%">
      <form method="post" name="back" action="./b_qr_choice.php">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
        <a href="javascript:back.submit()">
          <img border="0" src="../../common/back.jpg" width="20%" height="100%" class="back">
        </a>
      </form>
      <form method="post" name="home" action="../b_home.php">
        <input type="hidden" name="b_user_id" value="<?php echo $b_user_id; ?>" />
        <a href="javascript:home.submit()">
          <img border="0" src="../../common/home.jpg" width="20%" height="100%" class="home">
        </a>
      </form>
    </div>
    <div id="body-bk">
      <div id="body" class="bg_test3">
        <center> <!-- 中央寄せ -->
          <h1>QRコード</h1>
        </center>
      </div>
      <div>
        <center>
          <!-- ここにカメラの映像を表示する -->
          <video id="preview"></video>

          <!-- ここにQRコードの情報を表示する -->
          <p id="info"></p>
        </center>
      </div>
    </div>


    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
      var videoTag = document.getElementById('preview');
      var info = document.getElementById('info');
      var scanner = new Instascan.Scanner({ video: videoTag });

      //formでpostを送信するためのやつ
      function post2Form(value1 , value2) {
        var form = document.createElement('form');
        var request1 = document.createElement('input');
        var request2 = document.createElement('input');
        var request3 = document.createElement('input');

        form.method = 'POST';
        form.action = './qr_redirect.php';

        request1.type = 'hidden'; //入力フォームが表示されないように
        request1.name = 'vol_id';
        request1.value = value1;

        form.appendChild(request1);

        request2.type = 'hidden'; //入力フォームが表示されないように
        request2.name = 's_user_id';
        request2.value = value2;

        form.appendChild(request2);

        request3.type = 'hidden'; //入力フォームが表示されないように
        request3.name = 'b_user_id';
        request3.value = <?php echo $b_user_id; ?>;

        form.appendChild(request3);

        document.body.appendChild(form);
        form.submit();
      }

      //QRコードを認識して情報を取得する
      scanner.addListener('scan', function (value) {
        post2Form( <?php echo $vol_id; ?> , value);
      });

      //PCのカメラ情報を取得する
      Instascan.Camera.getCameras()
      .then(function (cameras) {

          //カメラデバイスを取得できているかどうか？
          if (cameras.length > 0) {

            //スキャンの開始
            scanner.start(cameras[0]);
          }
          else {
            alert('カメラが見つかりません！');
          }
      })
      .catch(function(err) {
        alert(err);
      });
    </script>
    <div id="footer-fixed">
      <img border="0" src="../../common/kokoku.jpg" width="100%" height="100%">
    </div>
  </body>
</html>
