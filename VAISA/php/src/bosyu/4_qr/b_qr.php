<?php
  $b_user_id  = $_POST['b_user_id'];
  $vol_id     = $_POST['vol_id'];
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Instascanサンプルデモ</title>
    <style>
      body {
        margin: auto;
        width: 960px;
        text-align: center;
      }
      #info {
        font-size: 4em;
        font-weight: bold;
        color: #666;
      }
    </style>
  </head>
  <body>
    <h1>Instascanサンプルデモ</h1>

    <!-- ここにカメラの映像を表示する -->
    <video id="preview"></video>

    <!-- ここにQRコードの情報を表示する -->
    <p id="info"></p>


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

        form.method = 'POST';
        form.action = 'b_home.php';

        request1.type = 'hidden'; //入力フォームが表示されないように
        request1.name = 'vol_id';
        request1.value = value1;

        form.appendChild(request1);

        request2.type = 'hidden'; //入力フォームが表示されないように
        request2.name = 's_user_id';
        request2.value = value2;

        form.appendChild(request2);

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
  </body>
</html>