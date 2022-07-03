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
            <h1>adminstration</h1>
            <div class="tilts">
                <p style=" width: 100%;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis, doloremque? Soluta qui officia laborum quisquam natus, pariatur sint, excepturi ullam tempora, sapiente magni? Repudiandae officiis, ipsam laudantium eveniet facere quod.
                Necessitatibus cumque accusantium molestiae, eveniet nostrum exercitationem provident dolores quia, tenetur quas placeat maxime repudiandae debitis minima distinctio 
                </p>
            </div>
            <div class="links">
                <ul>
                    <li><a href="custommers.php">Click here</a> to maintain customers</li>
                    <li><a href="orders.php">Click here</a> to view orders    </li>
                </ul>
            </div>
        </section>
        
</body>
</html>
<?php }?>