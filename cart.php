<?php 
    require_once('connect.php');
    session_start();
    if(isset($_SESSION[''])){
        header('location:login.php');
    }else{

   if(isset($_REQUEST['delete'])){
    $product_id = $_REQUEST['delete'];
    $delete_cart = $db->prepare("DELETE FROM `cart` WHERE id = ?");
    $delete_cart->execute([$product_id]);
   }
   

   if(isset($_REQUEST['checkout'])){
    #order_date	reguredate	price	qty	user_id	image	payment_status	

        $date = date('Y-m-d');
        $to_date = date('Y-m-d', strtotime($date.' +1 day')); 
        $price = $_REQUEST['total'];
        $qty = $_POST['qty'];
        $user_id = 1;
        $image = $_POST['image'];
        $payment_method = $_POST['payment_method'];
        $tips = 50;
        $p_name = $_POST['p_name'];
        
        $insert = $db->prepare("INSERT INTO `orders` (`order_date`, `reguredate`,`p_name`, `price`, `qty`, `user_id`, `image`,  `payment_method`,r_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $insert->execute([$date,$to_date,$p_name, $price, $qty, $user_id, $image,$payment_method, $tips]);
    
        if($insert){
            $product_id = $_REQUEST['delete'];
            $delete_cart = $db->prepare("DELETE FROM `cart` WHERE user_id = 1");
            $delete_cart->execute();
        }
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
    <section class="cart">
    <?php
                $select_cart = $db->prepare("SELECT * FROM `cart` WHERE user_id = 1");
                $select_cart->execute();
                $tips = 50;
                if($select_cart->rowCount() > 0){
                $row = $select_cart->fetch(PDO::FETCH_ASSOC);
           
                
                
            ?>
        <h1>Your Shopping Cart</h1>
      <form action="" method="post">
            <a class="links-1" href="products.php">continue shopping</a>
            <button type="submit"   class="btn_checkouts"name="checkout">checkout</button>
                <input type="hidden" name="image" value="<?php echo $row['image']?>">
                <input type="hidden" name="qty" value="<?php echo $row['qty']?>">
                <input type="hidden" name="total" value="<?php echo $row['price'] + $tips?>">
                <input type="hidden" name="r_price" value="<?php echo $row['price']?>">
                <input type="hidden" name="p_name" value="<?php echo $row['p_name']?>">
            

        <table style="width:100%">
            <tr class="tr-head">
                <th style="width:10%; ">qty</th>
                <th style="width:40%; text-align:left;">Description</th> 
                <th style="width:20%; text-align:right;">Unit price</th>
                <th style="width:20%; text-align:right;">Price</th>
                <th style="width:10%;"></th>
            </tr>
            <tr style="height:40px;" class="tr-body">
            
                <td style="text-align:center;"><input type="number" value="<?php echo $row['qty']?>" min="0" max="99"></td>
                <td style="text-decoration: underline; color:skyblue;"><?php echo $row['p_name']?> </td>
                <td style="text-align:center;"><?php echo $row['price']?></td>
                <td style="text-align:center;"><?php echo $row['price'] / $row['qty']?></td>
                <td style="text-align:center;"><a href="?delete=<?php echo $row['id']?>"  onclick="return confirm('do you want to delete')"  class="btns">Remove</a></td>
            </tr>
        </table>
        <hr>
        <a href="">Recalulate</a>
            <br>
            <label>ship via:</label>
            <select name="payment_method" id="payment_method">
                <option value="fedex">Fedex</option>
                <option value="UPS">UPS</option>
            </select>
        
        <p class="total">SubTotal : <span>฿<?php echo $row['price']?></span></p><br>
        <p class="total">Shipping : <span>฿<?php echo  $tips?></span></p>
        <hr>
        <button type="submit"  class="btn_checkout"name="checkout">checkout</button>
        <p class="totals" names="total">Total: <span>฿<?php echo $row['price'] + $tips?></span></p>
        </form>
        <hr>
        <?php }else{
        ?>
        <p style="color:red;text-align:center">no product in cart</p>
        <?php
        } ?>
        </section>
</body>
</html>
<?php  }    ?>