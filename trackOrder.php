<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>ADMIN</title>
   <link rel="stylesheet" href="admin.css">
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
                    <a href="loginpage.php" class="profile">
                    <i class="fa-solid fa-right-from-bracket fa-xl"></i>      
                    </a>   
                </li> 
            </ul>
        </nav>  
        </div>
    </div>

  
    <div class="main"> 
         <h1 class="text">Track of Customer Order</h1>

    <div class="Customers">
 <table>
        <tr>
            <th>Customers</th>
            <th>Reference Number</th>
            <th>Customer's Address</th>
            <th>Order</th>
            <th>Order Status</th>
        </tr>
        <tr>
            <td>Customer#1</td>
            <td></td>
            <td></td>
            <td>mamba black small 1pc</td>
            <td>
                <select >
                    <option value="">Payment Information Confirm</option>
                    <option value="">Order Place</option>
                    <option value="">Order Ship</option>
                    <option value="">Out for Delivery</option>
                </select>
            </td>
        </tr>
    </div>
    </table>
    

    
            
            <div class="display_btn">
        <a href="Admin.php"><button>Back</button></a>
        <button style="width: 15%; margin-left:5px">Update</button>
    </div>
    </div>
  

           
    <script src="script.js"></script>  
</body>
</html>
        