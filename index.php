<!DOCTYPE html>
<?php 
require 'dbconnect.php';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=a, initial-scale=1.0">
    <title>Amozon product review system</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="navbar">
            <div class="nav-logo border">
                <div class="logo"></div>
            </div>

            <div class="nav-adress border">
                <p class="add-first">Deliver to</p>
                <div class="add-icon">
                    <i class="fa-solid fa-location-dot"></i>
                    <p class="add-second">India</p>
                </div>
            </div>

            <div class="nav-search" >
                <select class="search-select">
                    <option>All</option>
                </select>
                <input id="net" placeholder="Search Amazon" class="search-input">
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>

            <div class="nav-signin border">
                <p><span>Hello, sign in</span></p>
                <p class="nav-second">Account & Lists</p>
            </div>

            <div class="nav-returns border">
                <p><span>Returns</span></p>
                <p class="nav-second">& Order</p>
            </div>

            <div class="nav-cart border">
                <i class="fa-solid fa-cart-shopping"></i>Cart
                
            </div>
        </div>
        
        <div class="panel">
            <div class="panel-all">
                <i class="fa-solid fa-bars"></i>
                All
            </div>
            <div class="panel-ops">
                <p>Today's Deals</p>
                <p>Customer Services</p>
                <p>Registry</p>
                <p>Gift Card</p>
                <p>Sells</p>
            </div>

            <div class="panel-deals">
                Shop deals in Electronics
            </div>
        </div>
    </header>

    <div class="hero-section">
        <div class="hero-msg">
            <p>You are on amazon.com.You can also shop on Amazon India for millions of products with fast local delivery. <a> Click here to go to amazon.in</a></p>
        </div>
    </div>

    <div class="shop-section">
    <?php
        $sql = "SELECT * FROM products";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
         while($row = $result->fetch_assoc()) {
        //    echo "comment: " . $row["product_name"]. "<br>";
        ?>
        <div class="box">
            <div class="box-content">
                <h2><?php echo $row["product_name"]; ?></h2>
                <div class="box-img" style="background-image:url('<?php echo $row["product_image"]; ?>');"></div>
                <a href="product_review.php?proid=<?php echo $row["product_id"]; ?>">See more</a>
            </div> 
        </div>
        <?php
         }
        } else {
          echo "0 results";
        }
    ?>
    </div>

    <footer>
        <div class="foot-panel1">
            Back to Top
        </div>

        <div class="foot-panel2">
            <ul>
                <p>Get to Know Us</p>
                <a>Careers</a>
                <a>Blog</a>
                <a>About Amazon</a>
                <a>Investor Relations</a>
                <a>Amazon Devices</a>
                <a>Amazon Science</a>
            </ul>

            <ul>
                <p>Make Money with Us</p>
                <a>Sell products on Amazon</a>
                <a>Sell apps on Amazon</a>
                <a>Become an Affiliate</a>
                <a>Advertise your Products</a>
                <a>Self-Publish with Us</a>
                <a>HOst an Amazon Hub</a>
                <a>See More Make Money</a>
                <a >With Us</a> 
                
            </ul>

            <ul>
                <p>Amazon Payment Products</p>
                <a>Amazon Business Card</a>
                <a>Shop with Points</a>
                <a>Reload Your Balance</a>
                <a>Amazon Currency Converter</a>
            </ul>

            <ul>
                <p>Let Us Help YOu</p>
                <a>Amazon and COVID-19</a>
                <a>Your Account</a>
                <a>Your Orders</a>
                <a>Shipping Rates & Policies</a>
                <a>Return & Replacement</a>
                <a>Manage Your Content and Devices</a>
                <a>Amazon Assistant</a>
                <a>Help</a>
            </ul>
        </div>

        <div class="foot-panel3">
            <div class="logo"></div>
        </div>

        <div class="foot-panel4">
            <div class="pages">
                <a>Conditions of Use & Sale</a>
                <a>Privacy NOtice</a>
                <a>Your Ads Privacy Choices</a>
            </div>
            <div class="copyright">
                © 1996-2023, Amazon.com, Inc. or its affiliates
            </div>
        </div>
    </footer>
</div>
</body>
</html>