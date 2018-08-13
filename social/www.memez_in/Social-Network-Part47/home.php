<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Network</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
<style>
div.fixed {
     position: relative;
    left: 300px;
    width: 400px;
    border: 3px solid #73AD21;
}
html, body {
    height: 100%;
    width: 100%;
    margin: 0;
}
 
#inner_fixed {
    height: 100px;
    background-color: grey;
}
#inner_remaining {
    background-color: red;
    position: absolute;
    top: 100px;
    bottom: 0;
    width: 100%; 
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   color: white;
   text-align: center;
}
</style>
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-default">
    <div class="container">
        <div class="row">
  <a class="navbar-brand" href="#">
    <img src="./img/logo.jpg" width="30" height="30" class="d-inline-block align-top" alt=""></a><font color="black">memez.in<br/>&nbsp;&nbsp;Never Bored Again</font></div></div>
</nav>
<div class="fixed">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="./img/hi_crush.jpg" alt="Chania" class="img-fluid" height="10px">
      <div class="carousel-caption">
        <h3>Los Angeles</h3>
        <p>LA is always so much fun!</p>
      </div>
    </div>

    <div class="item">
      <img  src="./img/hindu_muslim.jpg" alt="Chicago" >
      <div class="carousel-caption">
        <h3>Chicago</h3>
        <p>Thank you, Chicago!</p>
      </div>
    </div>

    <div class="item">
      <img src="./img/marwari.jpg" alt="New York" height="200" width="200" >
      <div class="carousel-caption">
        <h3>New York</h3>
        <p>We love the Big Apple!</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
<div class="footer">
    <button type="button" class="btn btn-primary btn-lg btn-block">Sign Up!</button>
  <button type="button" class="btn btn-success btn-lg btn-block">Sign In</button>
</div>


 <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>
</html>