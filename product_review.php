<!DOCTYPE html>
<html lang="en">
<?php require 'dbconnect.php';
session_start();
?>

<head>
    <title>product review</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
        $proid=$_GET['proid'];
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["randcheck"] == $_SESSION['rand']) {
            $name=$_POST['name'];
            $review=$_POST['review'];
        $query = "INSERT INTO review_table (name,product_id,message,datetime) VALUES ('$name','$proid','$review',current_timestamp())";
        mysqli_query($conn, $query);
        }
        $sql = "SELECT * FROM products where product_id='$proid'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
         while($row = $result->fetch_assoc()) {
        ?>
    <div class="container">
    <button class="backbtn"><a href="index.php">Home</a></button>
        <div class="product-review">
            <h1><?php echo $row["product_name"]; ?></h1>
            <img src="<?php echo $row["product_image"]; ?>" alt="" height='400' width='400'>
            <div class="write-review">
                <form action="product_review.php?proid=<?php echo $proid; ?>" method="post">
                <?php 
                $rand=time();
                $_SESSION['rand']=$rand;
                ?>
                    <h2>Write review</h2>
                    <input type="hidden" value="<?php echo $rand; ?>" name="randcheck">
                    <input type="text" placeholder="Enter your name" name="name" class="name">
                    <textarea name="review" id="review" cols="57" rows="5"
                        placeholder="Enter your review here..." class="textarea"></textarea>
                        <input type="submit" value="Submit" class="submitbtn">
                </form>
            </div>
        </div>
        <div class="review">
            <h1>reviews</h1>
            <?php
        $sql1 = "SELECT * FROM review_table where product_id='$proid'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
          // output data of each row
         while($rows = $result1->fetch_assoc()) {
        //    echo "comment: " . $row["product_name"]. "<br>";
        ?>
            <div class="review-items">
                <h4><?php echo $rows["name"]; ?></h4>
                <p><?php echo $rows["message"]; ?></p>
            </div>
            <?php
         }
        } else {
          echo "0 Review yet";
        }
    ?>
        </div>
    </div>
    <?php
         }
        }
    ?>


</body>

</html>