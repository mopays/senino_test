<?php 
    require_once('connect.php');

    session_start();
    if(!isset($_SESSION['admin'])){
        header('location:login.php');
    }else{
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

        <a style="margin-left: 80%; color:skyblue;" href="orders.php">back to pervious page</a>
       
        <table style="width:120%;margin-top:20px;">
        <?php 
        if(isset($_REQUEST['view_id'])){ 
            $id = $_REQUEST['view_id'];
            $select_id = $db->prepare("SELECT * FROM `orders` WHERE order_id = ?");
            $select_id->execute([$id]);
           while( $fetch = $select_id->fetch(PDO::FETCH_ASSOC)){
            ?>
            
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">order id</td>
                <td style="background-color:orange;"> <?php echo $fetch['order_id'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">order date</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['order_date'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">item</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['p_name'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">price</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['price'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">user id</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['user_id'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">tips</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['r_price'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">payment_status</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['payment_status'] ?></td>
            </tr>
            <tr style="background-color:white;">
                <td style="background-color:darkblue;color:#fff; text-align:right;">payment_method</td>
                <td style="background-color:rgb(233, 184, 95);"><?php echo $fetch['payment_method'] ?></td>
            </tr>
            <img style="margin-top: 204px;margin-left: -400px;" src="<?php echo $fetch['image']?>" alt="">

        </table>
    
        <?php 
           }
        }else{
            ?>
        <p style="text-align:center;color:red;"> no product</p>
            <?php
        } ?>
       
        </section>
</body>
</html>
<?php } ?>