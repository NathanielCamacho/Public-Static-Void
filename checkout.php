<?php
$color = $_POST["color"];
$size = $_POST["size"];
$qty = $_POST["qty"];


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Krooked Clothing</title>
    <link rel="stylesheet" href="payment_css.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
       <div class="navbar">
            <a href="homepage.html"> 
                <img src="krooked product/white_logo.png" class="logo" > 
            </a> 
            <div class="logo_name"> The Krooked</div>
            
            <nav>   
                <ul>
                   <li> <a href="profile.html" class="profile">
                        <i class="fa-regular fa-user fa-xl"></i>         
                    </a>   </li>       
                   <li> <a href="shopnow.html" class="cart">
                        <i class="fa-solid fa-cart-shopping fa-xl"></i>
                    </a></li>
                    <li><a href="about.html" class="about">
                        <i class="fa-regular fa-address-card fa-xl"></i>
                    </a></li>
                </ul>
            </nav>  
        </div>
    </div> 

    <?php
        echo "IMONG KULAY AY ".$color .$qty . $size ;
    ?>

   
  

    <div class="footer">
        <div class="col-1">
            <h3>CONTACTS</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/thekrkdclothing" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.tiktok.com/@thekrooked/video/727606583022
                2318854" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                <a href="https://www.instagram.com/thekrkdclothing/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
            </div>
        </div>
        <div class="col-3">
            <h3>@Bakal si ralph</h3>
        </div>
    </div>
  </body>
</html>    