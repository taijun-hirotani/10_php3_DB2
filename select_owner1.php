<!-- 
INSERT： データを“登録”する事ができます。
SELECT： データを“表示“する事ができます。ここ
UPDATE： データを“更新”する事ができます。
DELETE： データを“削除“する事ができます。
-->

<?php
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  $pdo = new PDO('mysql:dbname=orangepuma5_tj01;charset=utf8;host=mysql1031.db.sakura.ne.jp','orangepuma5','taijun1217');
} catch (PDOException $e) {
  exit('接続エラー:'.$e->getMessage());
}//エラーを取得

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai3");//表示するテーブル＆カラム設定
$status = $stmt->execute();

//３．データ表示
$view="";
$view2="";
$view3="";
$view4="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLエラー:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){//1ページの中でFETCHは一回しか使えない ***[]for文用
    $view .=$result["title"]."<br>";
    $view2 .=$result["address"]."<br>";
    $view3 .= '<a href="u_view.php? id='.$result["id"].'">'.'[更新]'.'</a>'."<br>";
    $view4 .= '<a href="delete.php?id='.$result["id"].'">'.'[削除]'.'</a>'."<br>";
  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>物件登録変更</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">
<style>div{padding: 10px;font-size:16px;}</style>
</head>


<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録へ</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- List[Start] -->
<table  class="table">
  <tr class="table_tr">
    <th class="table_th">物件名</th>
    <th class="table_th">住所</th>
    <th class="table_th">更新</th>
    <th class="table_th">削除</th>
  </tr>
  <tr class="table_tr">
    <td><?=$view?></td>
    <td><?=$view2?></td>
    <td><?=$view3?></td>
    <td><?=$view4?></td>
  </tr>
</table>
<!-- List[End] -->


<div>
    <!--<div class="container jumbotron" id="love"><?=$view?></div>-->
</div>
<!-- Main[End] -->


<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ArY_mxvAiQt0FDVzpN0zIoGx5kkg17g06xPorZnTje5AefU5IhGSVERyhkSRfpUo'async defer></script>
<script src="js/BmapQuery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>



</body>
</html>

