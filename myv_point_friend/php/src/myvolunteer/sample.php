<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <title>DBサンプル(test3)</title>
    <style>
        body {
            width:60%;
            padding:20px 5%;
            margin:auto;
        }
        h1 {
            text-align:center;
        }
    </style>
</head>
<body>

<?php
// ポストのデータを変数に
    $name = $_POST["username"];
    $age = $_POST["age"];
//データベースに接続(test3)
    $dsn = "mysql:host=test3_mysql_1;dbname=sample;";
    $db = new PDO($dsn, 'root', 'root');
//接続確認    
    if ($db) {
        echo "データベースに繋がっています";
    } else {
        "データベースに繋がってないです";
    }
//データを登録する準備
$regist = $db->prepare("INSERT INTO sample(username, age) VALUES (:username, :age)");
//値を格納します
$regist->bindParam("username", $name);
$regist->bindParam("age", $age);
//実行
$regist->execute();
if ($regist) {
    echo "登録完了!";
} else {
    echo "エラーです！";
}
?>  
</body>
</html>