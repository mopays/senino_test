<?php 
    require_once('connect.php');
    session_start();
    if(isset($_SESSION[''])){
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
        <h1>products</h1>

        <form action="" method="post">
            <label for="">product name</label>
            <input type="text" name="name" id="">
            <label for="">price range</label>
            <select name="price" id="price">
                <option value="select">select</option>
                <option value="4890">4890</option>
                <option value="20000">20000</option>
            </select>
            <button class="btn" name="find">Find</button>
            <a href="search.php">reset</a>
        </form>
        <p>check on header to sart</p>
        <table style="width:100%">
            <tr class="tr-head">
                <th style="width:10%; ">Id</th>
                <th style="width:55%; text-align:left;">Product name</th> 
                <th style="width:10%; text-align:center;">Weight</th>
                <th style="width:15%; text-align:right;">Price</th>
                <th style="width:10%; text-align:center;">Detail</th>
            </tr>
            <tr class="tr-body">
                <?php 
                
                    if(isset($_POST['find'])){
        
                        $price = $_POST['price'];
                        $search = $_POST['name'];
                    $select_products =$db->prepare("SELECT * FROM `products` WHERE `p_name` LIKE '%{$search}%'  OR category LIKE '%{$search}%'  AND  `price` = '%{$price}%'  ");
                    $select_products->execute();
         
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
                ?>
                <td style="text-align:center;"><?php echo $fetch_products['id']?></td>
                <td><?php echo $fetch_products['p_name']?></td>
                <td style="text-align:center;"><?php echo $fetch_products['weight']?></td>
                <td style="text-align:center;"><?php echo $fetch_products['price']?></td>
                <td style="text-align:center;"><a style="color: skyblue;"  href="view.php?view=<?php echo $fetch_products['id']?>">View</a></td>
            </tr>
            <?php }}?>
        </table>
        </section>
</body>
</html>
<?php } ?>