<?php

include '__php__.php';
include ($incPath . 'settings.php') ;
include ($incPath . 'functions.php') ;
	
get_header();
?>

<!DOCTYPE html>
<html>
<title>لندینگ</title>
<!-- <link rel="shortcut icon" href="/project/public/assets/images/favicon.ico" type="image/x-icon"/> -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    
.w3-sidebar a {font-family: "Roboto", sans-serif}
body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<body class="w3-content" style="max-width:1880px">

  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">کتب دست دوم</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="/project/public">خانه</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">تعرفه<span class="caret"></span></a>
          <ul class="dropdown-menu">
          <!--   <li><a href="/project/public">رهگیری</a></li>
            <li><a href="/project/public">راهنما</a></li>
            <li><a href="/project/public">روال سفارش</a></li> -->
          </ul>
        </li>
        <li><a href="/project/public">ورود به صفحه محصولات فروشگاه</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> ساخت حساب</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> لاگین</a></li>
      </ul>
    </div>
  </nav>
    
  <div class="container">
    <h3></h3>
    <p></p>
  </div>
<!-- Sidebar/menu -->
<!-- <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
  <div class="w3-container w3-display-container w3-padding-16">
    <i onclick="w3_close()" class="fa fa-remove w3-hide-large w3-button w3-display-topright"></i>
    <h3 class="w3-wide"><b> </b></h3>
  </div>
  <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
    <a href="#" class="w3-bar-item w3-button"></a>
    <a href="#" class="w3-bar-item w3-button">دانشگاه تهران</a>
    <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn">
         <i class="fa fa-caret-down"></i>
    </a>
    <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
      <a href="#" class="w3-bar-item w3-button w3-light-grey"><i class="fa fa-caret-right w3-margin-right"></i>ادعیه</a>
      <a href="#" class="w3-bar-item w3-button">داستان</a>
      <a href="#" class="w3-bar-item w3-button">علمی</a>
      <a href="#" class="w3-bar-item w3-button">دبستان</a>
    </div>
    <a href="#" class="w3-bar-item w3-button">متوسطه 1</a>
    <a href="#" class="w3-bar-item w3-button">متوسطه 2</a>
    <a href="#" class="w3-bar-item w3-button">نظام قدیم</a>
    <a href="#" class="w3-bar-item w3-button">دانشگاه آزاد</a>
  </div>
  <a href="#footer" class="w3-bar-item w3-button w3-padding">ارسال ایمیل</a> 
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding" onclick="document.getElementById('newsletter').style.display='block'"></a> 
  <a href="#footer"  class="w3-bar-item w3-button w3-padding"></a>
</nav> -->

<!-- Top menu on small screens -->
<header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">
  <div class="w3-bar-item w3-padding-24 w3-wide"></div>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-padding-24 w3-right" onclick="w3_open()"><i class="fa fa-bars"></i></a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:250px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>
  
  <!-- Top header -->
  <header class="w3-container w3-xlarge">
    <p class="w3-left"></p>
    <p class="w3-right">
     <!--  <i class="fa fa-shopping-cart w3-margin-right"></i>
      <i class="fa fa-search"></i> -->
    </p>
  </header>

  <!-- Image header -->
  <div class="w3-display-container w3-container">
    <!-- <img src="/w3images/jeans.jpg" alt="Jeans" style="width:100%"> -->
    <div class="w3-display-topleft w3-text-white" style="padding:24px 48px">
      <h1 class="w3-jumbo w3-hide-small">کتاب تازه</h1>
      <h1 class="w3-hide-large w3-hide-medium">کتاب تازه</h1>
      <h1 class="w3-hide-small">مجموعه رمان</h1>
      <p><a href="#jeans" class="w3-button w3-black w3-padding-large w3-large">الان بخرید</a></p>
    </div>
  </div>

  <div class="w3-container w3-text-grey" id="jeans">
    <p>تعدادی پیشنهاد محدود</p>
  </div>

  <!-- Product grid -->
  <div class="w3-row w3-grayscale">
    <div class="w3-col l3 s6">
      <div class="w3-container">
        <img src="/project/public/assets/images/shahname.jpg" style="width:100%">
        <p>شاهنامه<br><b>24.99</b></p>
      </div>
      <div class="w3-container">
        <img src="/project/public/assets/images/g132general book icondownload.png" style="width:100%"> 
        <p>شیمی 2<br><b>19.99</b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <div class="w3-display-container">
        <img src="/project/public/assets/images/ارسال-21.gif" style="width:200%"> 
          <span class="w3-tag w3-display-topleft">جدید</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">خرید فوری <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p><br><b></b></p>
      </div>
      <div class="w3-container">
      <img src="/project/public/assets/images/پیگیری-سفارشات-کتابلازم.png" style="width:200%"> 
        <p><br><b></b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <!-- <img src="/project/public/assets/images/FirstBanner1.jpg" style="width:100%"> -->
        <p><br><b></b></p>
      </div>
      <div class="w3-container">
        <div class="w3-display-container">
          <!-- <img src="/project/public/assets/images/FirstBanner1.jpg" style="width:100%"> -->
          <span class="w3-tag w3-display-topleft">فروش سریع</span>
          <div class="w3-display-middle w3-display-hover">
            <button class="w3-button w3-black">فوری <i class="fa fa-shopping-cart"></i></button>
          </div>
        </div>
        <p><br><b class="w3-text-red"></b></p>
      </div>
    </div>

    <div class="w3-col l3 s6">
      <div class="w3-container">
        <!-- <img src="/w3images/jeans4.jpg" style="width:100%"> -->
        <p><br><b></b></p>
      </div>
      <div class="w3-container">
        <!-- <img src="/w3images/jeans1.jpg" style="width:100%"> -->
        <p><br><b></b></p>
      </div>
    </div>
  </div>

  <!-- Subscribe section -->
  <div class="w3-container w3-black w3-padding-32">
    <h1>خبرنامه</h1>
    <p>تخفیفات به ایمیل ارسال میشود:</p>
    <p><input class="w3-input w3-border" type="text" placeholder="ایمیل" style="width:100%"></p>
    <button type="button" class="w3-button w3-red w3-margin-bottom">عضوشوید</button>
  </div>
  
  <!-- Footer -->
  <footer class="w3-padding-64 w3-light-grey w3-small w3-center" id="footer">
    <div class="w3-row-padding">
      <div class="w3-col s4">
      <!--   <h4>Contact</h4>
        <p>Questions? Go ahead.</p>
        <form action="/action_page.php" target="_blank">
          <p><input class="w3-input w3-border" type="text" placeholder="Name" name="Name" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Email" name="Email" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Subject" name="Subject" required></p>
          <p><input class="w3-input w3-border" type="text" placeholder="Message" name="Message" required></p>
          <button type="submit" class="w3-button w3-block w3-black">Send</button>
        </form>--> <img src="/project/public/assets/images/FirstBanner1.jpg" style="width:200%">
      </div> 

      <div class="w3-col s4">
        <h4>پیوند</h4>
        <p><a href="#">درباره</a></p>
        <p><a href="#">اهدا کتاب</a></p>
        <p><a href="#">حمایت مالی</a></p>
        <p><a href="#">قوانین</a></p>
        <p><a href="#">حریم شخصی</a></p>
        <p><a href="#">فرم شکایت</a></p>
        <p><a href="#">امور مالی</a></p>
        <p><a href="#">برگشت</a></p>
        <p><a href="#">راهنما</a></p>
      </div>

      <div class="w3-col s4 w3-justify">
        <h4>شرکت</h4>
        <p><i class="fa fa-fw fa-map-marker"></i> طلوع مهر</p>
        <p><i class="fa fa-fw fa-phone"></i> 0044123123</p>
        <p><i class="fa fa-fw fa-envelope"></i> ex@mail.com</p>
        <h4>درگاهها</h4>
        <p><i class="fa fa-fw fa-cc-amex">سپه</i> </p>
        <p><i class="fa fa-fw fa-credit-card">آینده</i></p>
        <br>
<!--         <i class="fa fa-facebook-official w3-hover-opacity w3-large"></i>
 -->        <i class="fa fa-instagram w3-hover-opacity w3-large"></i>
<!--         <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
 --><!--         <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i>
 -->        <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
<!--         <i class="fa fa-linkedin w3-hover-opacity w3-large"></i>
 -->      </div>
    </div>
  </footer>

  <div class="w3-black w3-center w3-padding-24"> <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity"></a></div>

  <!-- End page content -->
</div>

<!-- Newsletter Modal -->
<div id="newsletter" class="w3-modal">
  <div class="w3-modal-content w3-animate-zoom" style="padding:32px">
    <div class="w3-container w3-white w3-center">
      <i onclick="document.getElementById('newsletter').style.display='none'" class="fa fa-remove w3-right w3-button w3-transparent w3-xxlarge"></i>
      <h2 class="w3-wide">خبرنامه</h2>
      <p>برای دریافت خبرنامه ایمیلتان را بنویسید.</p>
      <p><input class="w3-input w3-border" type="text" placeholder="Enter e-mail"></p>
      <button type="button" class="w3-button w3-padding-large w3-red w3-margin-bottom" onclick="document.getElementById('newsletter').style.display='none'">Subscribe</button>
    </div>
  </div>
</div>

<script>
// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn").click();


// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
<?php
// get_footer();
// get_sidebar();
?><?php
// <!--checkout-->

get_sidebar();
get_footer();
?>
</html>
