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

      //QRコードを認識して情報を取得する
      scanner.addListener('scan', function (value) {
        info.textContent = value;
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