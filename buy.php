<?php
session_start();
$username=$_SESSION["username"];

if (isset($_SESSION["username"])){
    
} else {
    header("Location:login.php");
    exit();
}
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>翻箱倒櫃</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://unpkg.com/scrollreveal@4.0.0-beta.6"></script>
    <script>
        var center=[];  
    function successGPS(position) {
  const lat = position.coords.latitude;
  const lng = position.coords.longitude;
  center = [lat, lng];
  showMap();
};

function errorGPS() {
  window.alert('無法判斷您的所在位置');
  // 接著寫使用者「封鎖」位置資訊請求後要執行的事
}

if(navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(successGPS, errorGPS);
} else {
  window.alert('您的裝置不具備GPS，無法使用此功能');
  // 接著寫使用者裝置不支援位置資訊時要執行的事
}

function showMap() {
    const map = L.map('map', {
    maxZoom: 18,
    center:center,
    tileSize: 512,
    zoomOffset: -1
});


L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
map.setView(center,18);
const marker = L.marker(center, {

}).bindPopup('<h1>您現在所在位置</h1>')
  .openPopup()
  .addTo(map);

// setView 可以設定地圖座標
// watch 則是持續監聽使用者的位置

//map.locate({setView: true, watch: false});

// 成功監聽到使用者的位置時觸發
//map.on('locationfound', onLocationFound);

// 失敗時觸發
//map.on('locationerror', onLocationError);

//const center = [xxx, xxx];

}

    var city,town;
            document.addEventListener("load", getLocation(), false);
            var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
            };
            function error() {

            }
            function getLocation() {
              if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition,error,options);
              } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
              }
            }

    function showPosition(position) { 
                
                const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    var data=JSON.parse(this.responseText);
                    city=data.address.city;town=data.address.town;
                    document.getElementById("btsend").disabled=false;
                    //console.log(data);
                    //alert(data.address.city);
                }
                xhttp.open("GET", "https://nominatim.openstreetmap.org/reverse?format=json&lat="+position.coords.latitude +"&lon="+ position.coords.longitude);
                xhttp.send();
            }


                function getres() {
              const xhttp = new XMLHttpRequest();
                xhttp.onload = function() {
                    var data=JSON.parse(this.responseText);
                    t="";
   
                    for (var i in data){
                      t=t+data[i].lat+" / "+data[i].lon+"<br/>";
                      
                    }
                    document.getElementById("retres").innerHTML=t;
                    //console.log(data);
                    //alert(data.address.city);
                }
                xhttp.open("GET", "https://nominatim.openstreetmap.org/search?format=json&q="+document.getElementById("stext").value+"+"+city+"+"+town);
                xhttp.send();
            }

    </script>
</head> 

<body>
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <div class="top-menu  scroll-reveal">
                    <div class="menu">
                        <div class="title-bar" data-responsive-toggle="main-nav" data-hide-for="medium">
                            <button class="menu-icon dark" type="button" data-toggle="main-nav"></button>
                            <div class="title-bar-title">Menu</div>
                        </div>

                        <nav id="main-nav" data-animate="menu-in menu-out">
                            <ul class="main-navigation">
                                <li><a class="m-active" href="index.php" data-text="Home">首頁</a></li>
                                <li><a class="m-anim" href="search.php" data-text="Specials">食譜查詢</a></li>
                                <li><a class="m-anim" href="buy.php"  data-text="About">食材購買資料</a></li>
                                <li><a class="m-anim" href="about.php" data-text="Menu Cart">關於我們</a></li>
                                <?php
                                if (isset($_SESSION["username"])) 
                                
                                echo '<li><a class="m-anim" href="logout.php" data-text="Contact">登出</a></li>';
                                else
                                echo '<li><a class="m-anim" href="login.php" data-text="Contact">會員登入/註冊</a></li>';

                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="category-icons">
        <div class="container">
            <div class="yellow-content">
            </div> 
        </div>
    </section>
    
    <div id="about-us" class="about">
        <div class="container">
        <input type="text" id="stext">
        <button id="btsend" onclick="getres()" disabled>搜尋</button>
        <div id="retres"></div>
        <p id="ttt"></p>    
        </div>
    </div>
    
<script>



</script>

    <!--.about-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

<div id="map"></div>

    <script>





//var marker = L.marker(my.locate).addTo(map)


//var layer = L.marker(e.latlng).addTo(map);
//layer.bindPopup('<h1>您所在位置</h1>')
//.openPopup().addTo(map);

</script>

<style>
    html, body{
        width: 100%;
        height: 100%;
    }
    #map{
        width: 100%;
        height: 50%;
    }
</style>

   
    <a href="#0" class="cd-top">Top</a>

    

    <div id="preloader">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/what-input/5.0.2/what-input.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.js"></script>
    <script src="js/app.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

    <script type="text/javascript">
        $('.slider').slick({
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3500,
            arrows: false,
            fade: true,
            cssEase: 'linear'
        });

    </script>

    <script>
        $(window).on('load', function() {
            $("#preloader").fadeOut();
        });
    </script>
    

</body>

</html>
