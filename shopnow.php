<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: userprofile.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Now</title>
    <link rel="stylesheet" href="shop_css.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
<div class="header">
        <div class="navbar">
            <a href="homepage.php"> 
                <img src="krooked product/white_logo.png" class="logo" alt="The Krooked Logo"> 
            </a> 
            <div class="logo_name">The Krooked</div>
        
        <nav>   
        <ul>
                      
                      <li> 
                          <a href="shopnow.php" class="about">
                              <i class="fa-solid fa-table-list fa-xl"></i> 
                          </a>
                      </li>
                      <li>     
                          <a href="cart.php" class="cart">
                              <i class="fa-solid fa-cart-shopping fa-xl"></i>        
                          </a>
                      </li>
                      
                      <li> 
                          <a href="loginpage.php" class="profile">
                              <i class="fa-regular fa-user fa-xl"></i>         
                          </a>   
                      </li> 
                  </ul>
        </nav>  
        </div>
    </div>

<div class="top_text">WINDBREAKER</div>
  <div class="windbreaker">
    <div class="wrapper">
    <div class="parent">
      <div class="child bg-1">
        <a href="windbreaker.php">
          <img src="krooked product/windbreaker_front.jpg" alt="windbreaker">
        </a>
      </div>
    </div>
    <div class="description">Port Black windbreaker - ₱999.00</div>
  </div>
</div>

    <hr>

    <div class="text3">StreetWear</div>

    <div class="products">
      <div class="wrapper">
        <div class="parent">
          <div class="child bg-2">
            <a href="mamba.php">
              <img src="krooked product/mamba.png">
            </a>
          </div>
        </div>
      </div>
      <div class="description">Mamba - ₱500.00</div>
    </div>

    <div class="products">
      <div class="wrapper">
        <div class="parent">
          <div class="child bg-3">
            <a href="lebron.php">
              <img src="krooked product/lebron.png">
            </a>
          </div>
        </div>
      </div>
      <div class="description">LeBron - ₱500.00</div>
    </div>

    <div class="products">
      <div class="wrapper">
          <div class="parent">
              <div class="child bg-4">
                  <a href="anniversary.php">
                      <img src="krooked product/tee.png">
                  </a>
              </div>
          </div>
      </div>
      <div class="description">Anniversary - ₱500.00</div>
  </div>
  
  <div class="products">
      <div class="wrapper">
          <div class="parent">
              <div class="child bg-5">
                  <a href="tommy.php">
                      <img src="krooked product/tommy.png">
                  </a>
              </div>
          </div>
      </div>
      <div class="description">Felix - ₱500.00</div>
  </div>
  
  <div class="products">
      <div class="wrapper">
          <div class="parent">
              <div class="child bg-6">
                  <a href="cypunk.php">
                      <img src="krooked product/cypunk.png">
                  </a>
              </div>
          </div>
      </div>
      <div class="description">Magatta - ₱500.00</div>
  </div>
  
  <div class="products">
      <div class="wrapper">
          <div class="parent">
              <div class="child bg-7">
                  <a href="gamble.php">
                      <img src="krooked product/gamble.png">
                  </a>
              </div>
          </div>
      </div>
      <div class="description">Dali Doll - ₱500.00</div>
  </div>
  

    <div class="footer">
        <div class="col-1">
            <h3>CONTACTS</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/thekrkdclothing" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.tiktok.com/@thekrooked/video/7276065830222318854" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                <a href="https://www.instagram.com/thekrkdclothing/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
            </div>
            <div class="col-3">
                <h3>@Bart Ceria</h3>
            </div>
        </div>
    </div>
</body>
</html>
