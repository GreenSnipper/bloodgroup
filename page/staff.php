<?php 
 // header('Location:page\Login.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
  <link rel="icon" type="image/png" href="img/logo.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="img/logo.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="img/logo.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="img/logo.png" sizes="128x128" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <link href="css/style.css" type="text/css" rel="stylesheet" />
  <link href="css/nav.css" type="text/css" rel="stylesheet" />
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
* {box-sizing: border-box}

body {
  font-family: 'Raleway Thin';
   margin:0px;
  }


  .topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

.mySlides {display: none}
img {vertical-align: middle;}


.imgView{
        width: 100%;
        height: 500px;
   }


/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  /* height: 500px; */
  position: relative;
  margin: auto;
}

.imgnumber1 , .imgnumber2 , .imgnumber3{
     background-position: center;
     background-repeat: no-repeat;
     background-color: red;
     background-size: cover;
     position: relative;
     height: 450px;
	   width: 100%;
}

.imgnumber1 {
     background-image: url("img/img.jpg");
}

.imgnumber2{
  background-image: url("img/img2.jpg"); 
}

.imgnumber3{
  background-image: url("img/img3.jpg");
}


/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  /* padding: 8px 12px; */
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}


.cardview {
    width: 100%;
    height: auto;
    display: flex;
    justify-content: center;
    align-items: center;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: 10px;
  float: left;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}

.div1{
    background-color: #fff;
    width: 100%;
    height: 35%;
    padding: 5%;
    text-align: center;
    color: #000;
    font-size: 25px;
}

.div1 h1{
      color: red;
      font-size: 35px;
}

.div2{
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("img/img2.jpg");
  height: 300px;
  width: 100%;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

.div2 .hero-text{
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: white;
}

.div3{
    width: 100%;
    padding: 30px;
    background-color: #08565c;
    color: #f2f2f2;
    margin-top: 30px;
    font-size: 25px;
}

.div3 h1 , .div2 h1{
    text-align: center;
    font-size: 35px;
}

.div3 h1 {
    padding: 20px;
}


/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}

@media only screen and (max-width: 720px) {
  .cardview {
    display: grid;
    justify-content: center;
    align-items: center;
}

.div2{
   height: 500px;
}
}
</style>
  <title>Welcome</title>
  </head>
    <body>

<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a href="#about" disabled >Staff Page</a>
</div>


<div class="div1">
    <h1>WHY DONATE</h1>
    <p>Safe blood saves lives. Blood is needed by women with complications during pregnancy and childbirth, children with severe anaemia, often resulting from malaria or malnutrition, accident victims and surgical and cancer patients.</p>
</div>

<table id="customers">
  <tr>
    <th>BLOOD TYPE</th>
    <th>AVAILABLE(LITRES)</th>
    <th>UNDER SCREENING(LITRES)</th>
    <th>USED(LITRES)<th/>
    <th>TOTAL BLOOD COUNT(LITRES)</th>
  </tr>
  <tr>
    <td>A+</td>
    <td>10</td>
    <td>11</td>
    <td>08</td>
    <td>29</td>
  </tr>
  <tr>
    <td>Berglunds snabbköp</td>
    <td>Christina Berglund</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Königlich Essen</td>
    <td>Philip Cramer</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
  <tr>
    <td>North/South</td>
    <td>Simon Crowther</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Paris spécialités</td>
    <td>Marie Bertrand</td>
    <td>France</td>
  </tr>
</table>

<div class="div2">
<div class="hero-text">
<h1 style="font-size:50px" >WHO CAN DONATE</h1>
<p>You must be at least 17 years old to donate to the general blood supply, or 16 years old with parental/guardian consent, if allowed by state law. There is no upper age limit for blood donation as long as you are well with no restrictions or limitations to your activities.</p>
</div>
</div>

<div class="div3">
<h1>WHO CAN`T DONATE</h1>
<p>There are certain conditions that prevent a person from donating blood temporarily or permanently. Among the temporary conditions are:                            
      <ul>
        <li>Pregnancy</li>
        <li>Acute fever</li>
        <li>Recent alcoholic intake</li>
        <li>Recent Anti-biotics intake</li>
        <li>Tattooing</li>
        <li>Surgery</li>
      </ul>
   </p>
</div>

 </body>
<script>
  var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</html>




