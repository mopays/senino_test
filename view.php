<?php 
    require_once('connect.php');
          if(isset($_POST['add_to_cart'])){
            
            $user_id  = 1;
            $pname = $_POST['p_name'];
            $qty = $_POST['qty'];
            $price = $_POST['price'];
            $image = $_POST['image'];
            $total_price = $price * $qty;
            $r_price = 50;
            
            $insert = $db->prepare("INSERT INTO `cart` (user_id,p_name,qty,price,image,r_price)VALUE(?,?,?,?,?,?)");
            $insert->execute([$user_id,$pname,$qty,$total_price,$image,$r_price]);
            header('refresh:1;cart.php');
          }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>index</title>
</head>
<body>
    <?php include_once('header.php');?>
    <section class="views">
        <h1>Product details</h1>

        <a style="margin-left: 80%; color:skyblue;" href="products.php">back to pervious page</a>
       
        <table style="width:100%;margin-top:20px;">
        <?php 
        if(isset($_GET['view'])){ 
            $id = $_GET['view'];
            $select_id = $db->prepare("SELECT * FROM `products` WHERE id = ?");
            $select_id->execute([$id]);
            $fetch = $select_id->fetch(PDO::FETCH_ASSOC);
            ?>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">category</td>
                <td style="background-color:orange;"> <?php echo $fetch['category'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">Product name</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['p_name'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">Price</td>
                <td style="background-color:rgb(233, 184, 95);">฿<?php echo $fetch['price'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">Weight</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['weight'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">#in Stock</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['in_struck'] ?></td>
            </tr>
            <img src="<?php echo $fetch['image']?>" alt="">

        </table>
        <form action="" method="post">
                <input type="hidden" value="<?php echo $fetch['category'] ?>" name="category">
                <input type="hidden" value="<?php echo $fetch['p_name'] ?>" name="p_name">
                <input type="hidden" value="<?php echo $fetch['price'] ?>" name="price">
                <input type="hidden" value="<?php echo $fetch['image']?>" name="image">
                <input type="number" name="qty" id="" min="1" max="<?php echo $fetch['in_struck'] ?>" value="1">
                <button class="btn" name="add_to_cart">Add to Cart</button>
        </form>
        <?php 
        }else{
            ?>
        <p style="text-align:center;color:red;"> no product</p>
            <?php
        } ?>
        </section>
</body>
</html>