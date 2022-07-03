<?php 
    require_once('connect.php');
    if(isset($_REQUEST['delete'])){
        $delete_id =$_REQUEST['delete'];
        $delete = $db->prepare("DELETE FROM `customers` WHERE id  = ?");
        $delete->execute([$delete_id]);
        header('refresh:1;custommers.php');
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
    <section>
        <h1>custommers</h1>

        <form action="" method="post">
        <a style="margin-left: 80%;" href="">add new customers</a>
        </form>
        <p >check on header to sart</p>
        <table style="width:100%">
            <tr class="tr-head">
                <th style="width:10%; ">Id</th>
                <th style="width:35%; text-align:left;">customers name</th> 
                <th style="width:20%; text-align:center;">city</th>
                <th style="width:15%; text-align:right;">country</th>
                <th style="width:10%; text-align:center;">Edit</th>
                <th style="width:10%; text-align:center;">Delete</th>
            </tr>
            <tr class="tr-body">
                <?php
                    $select_customer = $db->prepare("SELECT * FROM `customers` ");
                    $select_customer->execute();
                    while($row = $select_customer->fetch(PDO::FETCH_ASSOC)){
                ?>
                <td style="text-align:center;"><?php echo $row['id']?></td>
                <td><?php echo $row['customer_name']?></td>
                <td style="text-align:center;"><?php echo $row['city']?></td>
                <td><?php echo $row['country']?></td>
                <td style="text-align:center; "><a href="edit.php?update_id=<?php echo $row['id']?>" style="color:skyblue;">Edit</a></td>
                <td style="text-align:center; "><a href="?delete=<?php echo $row['id']?>" onclick="return confirm('do you sure you want to delete')" style="color:skyblue;">Delete</a></td>
            </tr>
            <?php } ?>
        </table>
        </section>
</body>
</html>