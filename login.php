<?php
session_start();
if (isset($_SESSION["username"]))
$username=$_SESSION["username"];

?>

<?php
// Include config file
$conn=require_once "config.php";
 
// Define variables and initialize with empty values
if($_SERVER["REQUEST_METHOD"]=="POST"){
$username=$_POST["username"];
$password=$_POST["password"];
//增加hash可以提高安全性
$password_hash=password_hash($password,PASSWORD_DEFAULT);
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql = "SELECT * FROM members WHERE username ='".$username."'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)==1 && $password==mysqli_fetch_assoc($result)["password"]){
        
        // Store data in session variables
        $_SESSION["loggedin"] = true;
        //這些是之後可以用到的變數
        $_SESSION["id"] = mysqli_fetch_assoc($result)["id"];
        $_SESSION["username"] = $username;
        header("location:welcome.php");
        //exit();

    }else{
            function_alert("帳號或密碼錯誤"); 
    }
}}
    //else{
      //  function_alert("Something wrong"); 
    //}

    // Close connection
    mysqli_close($link);

function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');
     window.location.href='login.php';
    </script>"; 
    return false;
} 
?>

<!doctype html>
<!-- <?php
try {
  $pdo=new PDO("mysql:host=localhost;dbname=members;","root","");
  $stmt=$pdo->prepare("select * from members");
  $stmt->execute();
  $rows=$stmt->fetchAll();
  $account = str_replace("'","''",$_REQUEST['account']);
  $password = str_replace("'","''",$_REQUEST['password']);
  echo $rows;
  } catch (PDOException $err)
  { die("資料庫無法連接"); }
  
?> -->

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>翻箱找櫃</title>
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.css" />
    <link rel="stylesheet" type="text/css"href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://unpkg.com/scrollreveal@4.0.0-beta.6"></script>
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v12.0&appId=1602519540100042&autoLogAppEvents=1" nonce="9CTzlDw9"></script>
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
                                <li><a class="m-anim" href="buy.php" data-text="About">食材購買資料</a></li>
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
            <!--.yellow-content-->
        </div>
        <!--.container-->
    </section>
    <!--.category-icons-->


    <!--.month-specials-->




    <a href="#0" class="cd-top">Top</a>

    <footer id="contact-us">
        <div class="container">
                <div class="row">
                  <div class="col">
                      <img src = "assets/img/logo.jpg">
                  </div>
                <div class="col">
            <div>
                <h1 class="header-txt scroll-reveal">會員登入</h1>
                <div class="divider scroll-reveal">
                    <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1930 255.5"
                        style="enable-background:new 0 0 1930 255.5;" xml:space="preserve">
                        <style type="text/css">
                            .st0 {
                                fill: none;
                                stroke: #3c3c3c;
                                stroke-width: 10;
                                stroke-linecap: square;
                                stroke-miterlimit: 10;
                            }
                        </style>
                        <polyline class="st0" points="1224,171.8 1181.3,171.8 1139.2,129.6 1065,203.9 970.5,110.4 876,203.6 801.8,129.4 759.7,171.5 
                                    717,171.5 " />
                        <polyline class="st0" points="5,131.5 757.3,131.5 801.8,176.1 885.9,91.9 868.3,74.2 831.5,111 870.4,149.9 970.2,50.2 1070,149.9 
                                    1108.8,111 1072.1,74.2 1054.4,91.9 1138.5,176.1 1183.1,131.5 1925,131.5 " />
                        <rect x="921.9" y="26.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 231.426 707.2043)"
                            class="st0" width="95" height="95" />
                        <rect x="921.9" y="99.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 179.8072 728.5855)"
                            class="st0" width="95" height="95" />
                        <rect x="940.3" y="178.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 137.3893 746.1556)"
                            class="st0" width="58.2" height="58.2" />
                    </svg>
                </div>

                <div class="contact-form scroll-reveal" data-origin="bottom" data-distance="20%">
                    <h3>登入/註冊</h3>
                    <form action="login.php" method="post">
                        <input type="text" name="username" id="username" placeholder="帳號/電子郵件" />
                        <input type="password" name="password" id="password" placeholder="密碼" />
                        <button type="submit" class="btn btn-primary" style="color: rgb(0, 0, 0);background-color: gold;" name="OK">登入</button>
                        <button class="fb-login-button" data-width="" data-size="medium" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false"></button>                      
                    </form>
                    <a href='reg.php'>註冊</a>
                </div>
            </div>
        </div>
                </div>
        </div>
        <!--.container-->
    </footer>

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
        $(window).on('load', function () {
            $("#preloader").fadeOut();
        });
    </script>

    <section id="main-menu" class="menu-cart scroll-reveal">
        <div class="container">
            <div class ="col"></div>
            <h1 class="header-txt">設計團隊</h1>
            <div class="divider">
                <!-- Generator: Adobe Illustrator 21.1.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1930 255.5"
                    style="enable-background:new 0 0 1930 255.5;" xml:space="preserve">
                    <style type="text/css">
                        .st0 {
                            fill: none;
                            stroke: #3c3c3c;
                            stroke-width: 10;
                            stroke-linecap: square;
                            stroke-miterlimit: 10;
                        }
                    </style>
                    <polyline class="st0" points="1224,171.8 1181.3,171.8 1139.2,129.6 1065,203.9 970.5,110.4 876,203.6 801.8,129.4 759.7,171.5 
                                    717,171.5 " />
                    <polyline class="st0" points="5,131.5 757.3,131.5 801.8,176.1 885.9,91.9 868.3,74.2 831.5,111 870.4,149.9 970.2,50.2 1070,149.9 
                                    1108.8,111 1072.1,74.2 1054.4,91.9 1138.5,176.1 1183.1,131.5 1925,131.5 " />
                    <rect x="921.9" y="26.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 231.426 707.2043)"
                        class="st0" width="95" height="95" />
                    <rect x="921.9" y="99.7" transform="matrix(0.7071 -0.7071 0.7071 0.7071 179.8072 728.5855)"
                        class="st0" width="95" height="95" />
                    <rect x="940.3" y="178.1" transform="matrix(0.7071 -0.7071 0.7071 0.7071 137.3893 746.1556)"
                        class="st0" width="58.2" height="58.2" />
                </svg>
            </div>
            <!--.divider-->
            <ul class="menu-navigation" data-tabs data-match-height="true" id="example-tabs">
                <li class="tabs-title is-active"><a class="m-anim" href="#panel1" aria-selected="true"
                        data-text="Starters">資管四丙</a></li>
            </ul>

            <div class="tabs-content" data-tabs-content="example-tabs">
                <div class="tabs-panel is-active" id="panel1">
                    <div class="menu-content">
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <td><span>蕭佑昌</span></td>
                                    <td><span>組長</span></td>
                                </tr>
                                <tr>

                                </tr>
                                <tr>
                                    <td><span>張耀中</span></td>
                                    <td><span>組員</span></td>
                                </tr>
                                <tr>

                                </tr>
                                <tr>
                                    <td><span>鄭鈺霖</span></td>
                                    <td><span>老師</span></td>
                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->
                        <div class="menu-section">
                            <table>
                                <tr>
                                    <td><span>游靖</span></td>
                                    <td><span>組員</span></td>
                                </tr>

                                <tr>

                                </tr>

                                <tr>
                                    <td><span>莊秉洋</span></td>
                                    <td><span>組員</span></td>
                                </tr>

                                <tr>

                                </tr>
                            </table>
                        </div>
                        <!--.menu-section-->
                    </div>
                    <!--.menu-content-->
                </div>
                <!--#panel1-->
            </div>
        </div>
        <!--.container-->
    </section>
    <!--.menu-cart-->
</body>

</html>
