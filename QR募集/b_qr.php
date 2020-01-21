<?php
  $vol_id = $_POST['vol_id'];
?>

<html>
  <head>
    <title>QRコード</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="./CSS/common.css">
    <link rel="stylesheet" type="text/css" href="./CSS/color.css">
    <link rel=“stylesheet” type="text/css" href=“./CSS/size.css”>
    <link rel=“stylesheet” type="text/css" href=“./CSS/pop.css”>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  </head>
  <body>
      <div id="app">
    <div class="sidebar">
      <section class="scans">
        <h2>Scans</h2>
        <ul v-if="scans.length === 0">
          <li class="empty">No scans yet</li>
        </ul>
        <transition-group name="scans" tag="ul">
          <li v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}</li>
        </transition-group>
      </section>
    </div>


      <div class="preview-container">
        <video id="preview"></video>
      </div>
    </div>

    <script type="text/javascript" src="app.js"></script>
  </body>
</html>
