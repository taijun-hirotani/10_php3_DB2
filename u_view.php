<!-- 
INSERT： データを“登録”する事ができます。
SELECT： データを“表示“する事ができます。
UPDATE： データを“更新”する事ができます。
DELETE： データを“削除“する事ができます。
-->

<?php
//1. POSTデータ取得
$id = $_GET["id"];//URLできているのでGET
//echo $id; ID取得の確認
//exit;

//2. DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=orangepuma5_tj01;charset=utf8;host=mysql1031.db.sakura.ne.jp','orangepuma5','taijun1217');
} catch (PDOException $e) {
    exit('接続エラー:'.$e->getMessage());
}//エラーを取得

//3.SELECT * FROM テーブル名 WHERE id=:id
$sql = "SELECT * FROM kadai3 WHERE id=:id";//どこの何を持ってくるか
$stmt = $pdo->prepare($sql);//
$stmt->bindValue(':id', $id, PDO::PARAM_INT);//idは数字なのでINT
$status = $stmt->execute();

//データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLエラー:".$error[2]);

}else{
//1データのみ抽出の場合はwhileループでは取り出さない
$row = $stmt->fetch();//→htmlにvalueで$rowを組み込む
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>物件情報更新</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <div class="navbar-header"><a class="navbar-brand" href="select.php">物件情報一覧</a></div>
        </div>
    </nav>
</header>
<!-- Head[End] -->


<!-- MAIN[Start] -->
<div class="main">
    <div>
        <!-- List[Start] -->
        <form method="POST" action="update.php">
            <div class="list">
            <fieldset>
                <legend>フリーアンケート</legend>
                <label class="list_label">名前：<input type="text" name="title" value="<?=$row["title"]?>"></label><br>
                <label class="list_label">住所：<input type="text" name="address" value="<?=$row["address"]?>"></label><br>
                <label class="list_label">緯度：<input type="text" name="lat" value="<?=$row["lat"]?>"></label><br>
                <label class="list_label">経度：<input type="text" name="lon" value="<?=$row["lon"]?>"></label><br>
                <label class="list_label">url：<input type="text" name="url" value="<?=$row["url"]?>"></label><br>
                <input type="hidden" name="id" value="<?=$row["id"]?>"><!-- ユーザーに見えないようIDを送る -->
                <input type="submit" value="更新">
                </fieldset>
            </div>
        </form>
        <!-- List[End] -->

        <!-- MAP[Start] -->
        <div id="geocode">geocode:data</div>
        <div id="geocode2">Reversegeocode:data</div>
    </div>
    <div id="myMap" class="map"></div>
    <!-- MAP[END] -->
</div>
<!-- MAIN[End] -->


<!--Script[Start] -->
<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ArY_mxvAiQt0FDVzpN0zIoGx5kkg17g06xPorZnTje5AefU5IhGSVERyhkSRfpUo'async defer></script>
<script src="js/BmapQuery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="js/map_geolocation.js"></script>

</body>
</html>