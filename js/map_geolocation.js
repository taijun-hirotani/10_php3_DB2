let map;
function GetMap() {

  //1. Instance

    map = new Bmap("#myMap");

    //2. Display Map
    map.startMap(43.0611335, 141.3563703, "aerial", 15);

    //3. Geocode(2 patterns)
    let lat;
    let lon;
    //B.Get geocode of click location
    map.onGeocode("click", function (data2) {
    lat = data2.location.latitude; //Get latitude
    lon = data2.location.longitude; //Get longitude
    document.querySelector("#geocode").innerHTML = '緯度 : ' + lat + '<br>' + '緯度 : ' + lon;
    });

    //----------------------------------------------------
    //3. Get ReverseGeocode(2 patterns)
    //   reverseGeocode(location,callback);
    //----------------------------------------------------
    
    //A. Set location data for BingMaps
    //const location = map.getCenter(); //MapCenter
    map.reverseGeocode(location, function(data){
        console.log(data);
        document.querySelector("#geocode2").innerHTML=data;
    });
    
    //B. Get ReverseGeocode of click location
    map.onGeocode("click", function(clickPoint){
        map.reverseGeocode(clickPoint.location, function(data){
            console.log(data);
            document.querySelector("#geocode2").innerHTML=data;
        });
    });
    

  }