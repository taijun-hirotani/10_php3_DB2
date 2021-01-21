<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>物件データ登録</title>
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
    <div class="navbar-header"><a class="navbar-brand" href="select.php">登録データ一覧へ</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div class="main">
  <div>
    <!-- List[Start] -->
    <form method="POST" action="insert.php">
      <div class="list">
        <fieldset >
          <legend class="list_title">物件登録</legend>
          <label class="list_label">名前：<input type="text" name="title" class=""></label><br>
          <label class="list_label">住所：<input type="text" name="address"></label><br>
          <label class="list_label">緯度：<input type="text" name="lat"></label><br>
          <label class="list_label">経度：<input type="text" name="lon"></label><br>
          <label class="list_label">URL：<input type="text" name="url"></label><br>
          <label class="list_label">画像：<input type="file" name="img"></label>
          <input type="submit" value="登録">
        </fieldset>
      </div>
    </form>
    <!-- List[End] -->

    <!-- MAP[Start] -->
    <div id="geocode">geocode:data</div>
    <div id="geocode2">Reversegeocode:data</div>
  </div>
  <div id="myMap" style='width:100%;height:700px;'></div>
  <!-- MAP[END] -->

</div>
<!-- Main[End] -->


<!-- Script[Start] -->
<script src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=ArY_mxvAiQt0FDVzpN0zIoGx5kkg17g06xPorZnTje5AefU5IhGSVERyhkSRfpUo'async defer></script>
<script src="js/BmapQuery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="js/map_geolocation.js"></script>
<!-- Script[End] -->


</body>
</html>
