let map;
function GetMap() {
    //------------------------------------------------------------------------
    //1. Instance
    //------------------------------------------------------------------------
    map = new Bmap("#myMap");
    //2. Display Map
    //   startMap(lat, lon, "MapType", Zoom[1~20]);MapType:[load, aerial,canvasDark,canvasLight,birdseye,grayscale,streetside]
    //--------------------------------------------------
    map.startMap(43.0611335, 141.3563703, "aerial", 15);

    //3.DB情報
    const json = JSON.parse('<?=$json?>')
    console.log(json);
  

    const len = json.length;
    console.log("データの個数" + len);
    const options = [];
    for (let i = 0; i < len; i++){
      options[i] = {
        "lat": json[i].lat,
        "lon": json[i].lon,
        "title": json[i].title,
        "address": json[i].address,
        "pinColor": "#ff0000",
        "height": 400,
        "width": 600,
        //"description": "<div><img src='"+json[i].*******+"'></div>",
        "description": "<div><a href='"+json[i].url+"'>LINK</a></div>",
        //"description":"<a href='+json[i].url+'>LINK</a>"
        "show": false
    };
    };
    map.infoboxLayers(options, true);

}
/*****************************
配列と反復処理の応用
*****************************/
//1. 配列を作成
//const a=["**","**","**","****","**","**","**","**","**"];
const json = JSON.parse('<?=$json?>')
//2. 変数の入れ物を作成
//let b="";
let taijun="";
//let c=a.length;//戸数自動取得用に変数作成
let hirotani=json.length;
//console.log(c);//コンソールで回数を確認
console.log(hirotani);
//3. 繰り返し処理で、文字列と配列を組み合わせ
//for(let i=0; i<c/*回数を自動取得*/; i++){
for(let i=0; i<hirotani/*回数を自動取得*/; i++){
    //girlfriend+=`<option>${a[i]}********</option>`;
    taijun+=`<a href="select_owner1.php? id="json[i].id"><p>${json[i].title+' '+json[i].address}</a></p>`;

    // taijun+=`<p>${json[i].address}</p>`;
    // taijun+=`<p>${json[i].lat}</p>`;
    // taijun+=`<p>${json[i].lon}</p>`;
}
//3.表示先
$("#love").html(taijun);