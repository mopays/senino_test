<?php 

    require_once('connect.php');
    
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
            <label>select a  category</label>
            <select name="categoty" id="categoty">
                <option value="computer">computer</option>
                <option value="hardware">hardware</option>
                <option value="software">software</option>
            </select>
            <button class="btn" name="find">Find</button>
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
            <tr class="tr-bod row">
                <?php 
                    if(isset($_POST['find'])){
                        $categotys = $_POST['categoty'];
                    $select = $db->prepare("SELECT * FROM `products` WHERE `category` LIKE '{$categotys}' ORDER BY `category` ASC");
                    $select->execute();
                    while($row = $select->fetch(PDO::FETCH_ASSOC)){
                ?>
                <td style="text-align:center;"><?php echo $row['id']?></td>
                <td><?php echo $row['p_name']?></td>
                <td style="text-align:center;"><?php echo $row['weight']?></td>
                <td><?php echo $row['price']?></td>
                <td style="text-align:center;"><a style="color: skyblue;"  href="view.php?view=<?php echo $row['id']?>">View</a></td>
            </tr>
            <?php }} ?>
        </table>
        </section>
</body>
</html>