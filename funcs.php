<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}


//画像保存の関数
function connectDB() {
    $param = 'mysql:dbname=orangepuma5_tj01;host=mysql1031.db.sakura.ne.jp';
    try {
        $pdo = new PDO($param, 'orangepuma5', 'taijun1217');
        return $pdo;

    } catch (PDOException $e) {
        echo $e->getMessage();
        exit('接続エラー:'.$e->getMessage());
    }
}



?>

