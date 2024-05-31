<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link rel="stylesheet" href="products.css">

    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
<form action="cartadder.php" method="post">
    <input type="hidden" name="product_id" value="6">
    <input type="hidden" name="product_name" value="Dali Doll"> 
    <input type="hidden" name="product_price" value="500.00">
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

    <div class="product">
        <div class="content">
        <img src="krooked product/gamble.png">
        <div class="product_container">
            <div class="description">Dali Doll</div> 
            <div class="price">₱500.00</div>
            <hr>
           
            <br>Size<br>
            <div class="container">
               
                    <label>
                        <input type="radio" name="size" value="S" checked="">
                        <span>Small</span>
                    </label>
                    <label>
                        <input type="radio" name="size" value="M">
                        <span>Medium</span>
                    </label>
                    <label>
                        <input type="radio" name="size" value="L">
                        <span>Large</span>
                    </label>
                
            </div>
            <br>Quantity: <br>
            <div class="qty-input">
                <div class="number-left" data-content="-" onclick="decreaseQty()"></div>
                
                    <input class="product-qty" type="number" name="quantity" value="1" min="1" max="9" >
                
                <div class="number-right" data-content="+" onclick="increaseQty()"></div>
            </div>
            <br>
            <div class="submit">
                <button class="Btn" type="submit">
                    <span class="text">Add To Cart</span>
                    <span class="svgIcon">
                        <svg viewBox="0 0 16 16" class="bi bi-cart2" fill="currentColor" height="16" width="16" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="item-details">
        <h1>Product description</h1>
        <p>The Doli Doll shirt expresses timeless elegance by combining simple styling. Created for discerning individuals who want perfection in all aspects of clothing.</p>
        <br>
        <p>
        🔘Features
        <br>
        &emsp;       ○ Cotton 
<br>
&emsp;      ○ Asian Size
<br>
&emsp;      ○ Premium Quality
<br>
&emsp;           ○ Soft, Stretchable, and Comfortable
<br>
&emsp;           ○ Designed for a relaxed and cozy look
</p>
<br>
<p>
    🔘Size/Fit
    <br>

    &emsp;○ Small - Chest: 18" x Length: 28" <br>
    &emsp;○ Medium - Chest: 20" x Length: 29" <br>
    &emsp;○ Large: Chest: 22" x Length: 30" <br>
</p>
<br>
<p>
🔘 Composition and Care
<br>
&emsp;◙ Washing
<br>
&emsp; &emsp; : Gentle cycle
<br>
&emsp; &emsp;: Wash dark colors separately
<br>
&emsp; &emsp;: Wash inside out with cold water
<br>
&emsp; ◙ Drying
<br>
&emsp; &emsp;: Hang-dry
<br>
&emsp; &emsp;: Tumble dry low
<br>
⚠️DO NOT ⚠️
<br>
&emsp;&emsp;: Do not dry clean
<br>
&emsp;&emsp;: Avoid using bleach esp. on dark fabrics
</p>




    </div>
    </div>
    <hr>

    <div class="background">
        <div class="text3">You may Also Like:</div>
        <div class="img_container">
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
            <div class="description">Lebron - ₱500.00</div>
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
    </div>
</div>
    <div class="footer">
        <div class="col-1">
            <h3>CONTACTS</h3>
            <div class="social-icons">
                <a href="https://www.facebook.com/thekrkdclothing" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.tiktok.com/@thekrooked/video/7276065830222318854" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                <a href="https://www.instagram.com/thekrkdclothing/" target="_blank"><i class="fa-brands fa-square-instagram"></i></a>
            </div>
        </div>
        <div class="col-3">
            <h3>@Bart Ceria</h3>
        </div>
    </div>
    <script src="script.js"></script>
</form>
</body>
</html>
