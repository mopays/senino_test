<?php 

require_once('connect.php');
session_start();
if(!isset($_SESSION['admin'])){
    header('location:login.php');
}else{
    require_once('connect.php');
    if(isset($_POST['update'])){
        $edit_id = $_POST['id'];
        $cname = $_POST['customer_name'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        
       $edit = $db->prepare("UPDATE `customers` SET `customer_name` = ?, `city` = ?, `country` = ? WHERE `id` = ?;");
       $edit->execute([$cname,$city,$country,$edit_id]);
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
        <h1> Edit custommers</h1>

        <?php
            if(isset($_REQUEST['update_id'])){
            $id = $_REQUEST['update_id'];
            $select_customer = $db->prepare("SELECT * FROM `customers` WHERE id = ? ");
            $select_customer->execute([$id]);
            $row = $select_customer->fetch(PDO::FETCH_ASSOC);
            }
        ?>
        
        <form action="" method="post">
           <div class="box">
                <label for="">id</label>
                <input type="number" name="id" value="<?php echo $row['id']?>" readonly>
           </div>
           <div class="box">
                <label for="">customers name</label>
                <input type="text" name="customer_name" value="<?php echo $row['customer_name']?>">
           </div>
           <div class="box">
                <label for="">customers name</label>
                <input type="text" name="city" value="<?php echo $row['city']?>">
           </div>
           <div class="box">
                <label for="">customers name</label>
                <input type="text"name="country" value="<?php echo $row['country']?>">
           </div>
            <button name="update" class="btn">Edit</button>
        </form>
    </section>
</body>
</html>
<?php } ?>