<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geolocation Info</title>
    <link rel="stylesheet" href="products.css">
    <script src="https://kit.fontawesome.com/43b9de10c9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almendra+SC&family=Bangers&family=Cinzel+Decorative:wght@400;700;900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Quintessential&family=Satisfy&family=Sedan:ital@0;1&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <div class="navbar">
            <a href="homepage.html">
                <img src="krooked product/white_logo.png" class="logo">
            </a>
            <div class="logo_name">The Krooked</div>
            <nav>
                <ul>
                    <li><a href="profile.html" class="profile"><i class="fa-regular fa-user fa-xl"></i></a></li>
                    <li><a href="shopnow.html" class="cart"><i class="fa-solid fa-cart-shopping fa-xl"></i></a></li>
                    <li><a href="" class="about"><i class="fa-regular fa-address-card fa-xl"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="content">
        <?php
        function get_client_ip()
        {
            foreach (array(
                        'HTTP_CLIENT_IP',
                        'HTTP_X_FORWARDED_FOR',
                        'HTTP_X_FORWARDED',
                        'HTTP_X_CLUSTER_CLIENT_IP',
                        'HTTP_FORWARDED_FOR',
                        'HTTP_FORWARDED',
                        'REMOTE_ADDR') as $key) {
                if (array_key_exists($key, $_SERVER)) {
                    foreach (explode(',', $_SERVER[$key]) as $ip) {
                        $ip = trim($ip);
                        if ((bool) filter_var($ip, FILTER_VALIDATE_IP,
                                        FILTER_FLAG_IPV4 |
                                        FILTER_FLAG_NO_PRIV_RANGE |
                                        FILTER_FLAG_NO_RES_RANGE)) {
                            return $ip;
                        }
                    }
                }
            }
            return null;
        }

        $ip = get_client_ip();

        if ($ip) {
            $loc = file_get_contents(filename:"http://ip-api.com/json/$ip");
            $location = json_decode($loc);

            if ($location->status == 'success') {
                echo "<div>Country: {$location->country}</div>";
                echo "<div>Region: {$location->regionName}</div>";
                echo "<div>City: {$location->city}</div>";
                echo "<div>Zip: {$location->zip}</div>";
                echo "<div>Latitude: {$location->lat}</div>";
                echo "<div>Longitude: {$location->lon}</div>";
                echo "<div>Timezone: {$location->timezone}</div>";
            } else {
                echo "<div>Unable to retrieve location information.</div>";
            }
        } else {
            echo "<div>Unable to retrieve IP address.</div>";
        }

    $ip = get_client_ip();
    $loc = file_get_contents(filename: "http://ip-api.com/json/$ip");
    $loc_status = json_decode($loc);
    $loc_country = json_decode($loc);
    $loc_regionName = json_decode($loc);
    $loc_city = json_decode($loc);
    $loc_zip = json_decode($loc);
    $loc_lat = json_decode($loc);
    $loc_lon = json_decode($loc);
    $loc_timezone = json_decode($loc);

    echo "<br>$loc_country->country</br>";
    echo "<br>$loc_regionName->regionName</br>";
    echo "<br>$loc_city->city</br>";
    echo "<br>$loc_zip->zip</br>";
    echo "<br>$loc_lat->lat</br>";
    echo "<br>$loc_lon->lon</br>";
     echo date ("Y-m-d H:i:s");

        echo "<div>Date and Time: " . date("Y-m-d H:i:s") . "</div>";
        ?>

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
</body>
</html>
