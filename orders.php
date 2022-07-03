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
    <section>
        <h1>Orders for:<span>tribeca labs , inc</span></h1>

 

        <table style="width:100%;  margin-top:20px;">
            <tr class="tr-head">
                <th style="width:10%; ">Order id</th>
                <th style="width:25%; text-align:left;">Orde Date</th> 
                <th style="width:20%; text-align:center;">Required Date</th>
                <th style="width:15%; text-align:right;">shipping</th>
                <th style="width:10%; text-align:center;">items</th>
            </tr>
        
                <?php 
                    $selet_order =$db->prepare("SELECT * FROM `orders` ");
                    $selet_order->execute();
                    while($row = $selet_order->fetch(PDO::FETCH_ASSOC)){
                       
                ?>
                    <tr class="tr-body">
                <td style="text-align:center;"><?php echo $row['order_id']?></td>
                <td><?php echo $row['order_date']?></td>
                <td style="text-align:center;"><?php echo $row['reguredate']?></td>
                <td style="text-align:center;"><?php echo $row['r_price'] ?></td>
                <td style="text-align:center; "><a href="view_order.php?view_id=<?php echo $row['order_id']?>" style="color:skyblue;">view</a></td>
       <?php } ?>
            </tr>
        </table>
        </section>
</body>
</html>
<?php } ?>