<?php  
      session_start();
$file_name = basename($_SERVER['SCRIPT_FILENAME'], ".php"); 
?>
<div class="header">
        <div class="logo">
            <p>do.</p>
        </div>
        <div class="title-1">
            <h2>patterns in action</h2>
        </div>
        <div class="title-2">
            <p>_asp.net mvc</p>
        </div>
    </div>
    <div class="nav">
       <div class="main">
            <a href="index.php" style="<?php echo $file_name == 'index' ? ' color: rgb(255, 129, 18);' : '' ?>"> home</a>
            <a href="shopping.php" style="<?php echo $file_name == 'shopping' ? ' color: rgb(255, 129, 18);' : '' ?>
             <?php echo $file_name ==   'products' ? ' color: rgb(255, 129, 18);' : '' ;?>
             <?php echo $file_name ==   'search' ? ' color: rgb(255, 129, 18);' : '' ;?>
             <?php echo $file_name ==   'cart' ? ' color: rgb(255, 129, 18);' : '' ;?>
             ">shopping</a>
       </div>
       <div class="below">
            <a href="products.php"  style="<?php echo $file_name ==   'products' ? ' color: rgb(255, 129, 18);' : '' ;?>
            <?php echo $file_name ==   'view' ? ' color: rgb(255, 129, 18);' : '' ;?>">products</a>
            <a href="search.php" style="<?php echo $file_name ==  'search' ? ' color: rgb(255, 129, 18);' : '' ;?>">search</a>
            <a href="cart.php" style="<?php echo $file_name ==  'cart' ? ' color: rgb(255, 129, 18);' : '' ;?>">cart</a>
       </div>
       <?php 
       if(isset($_SESSION['admin'])){
          ?>
          <div class="main">
            <a href="adminstration.php" style="<?php echo $file_name ==  'adminstration' ? ' color: rgb(255, 129, 18);' : '' ;?>
            <?php echo $file_name ==  'custommers' ? ' color: rgb(255, 129, 18);' : '' ;?>
            <?php echo $file_name ==  'orders' ? ' color: rgb(255, 129, 18);' : '' ;?>
            <?php echo $file_name ==  'view_order' ? ' color: rgb(255, 129, 18);' : '' ;?>
            ">adminstration</a>
       </div>
       <div class="below">
            <a href="custommers.php" style="<?php echo $file_name ==  'custommers' ? ' color: rgb(255, 129, 18);' : '' ;?>">custommers</a>
            <a href="orders.php" style="<?php echo $file_name ==  'orders' ? ' color: rgb(255, 129, 18);' : '' ;?>
             <?php echo $file_name ==  'view_order' ? ' color: rgb(255, 129, 18);' : '' ;?>"> orders</a>
       </div>
       <?php
       }else{
          echo '';
       }
       ?>
       <?php 
          if(isset($_SESSION)){
               ?>
          <div class="main">
               <a href="login.php"  style="<?php echo $file_name ==  'login' ? ' color: rgb(255, 129, 18);' : '' ;?>">login</a>
          </div>
       <?php
          }
          if(isset($_SESSION)){
               ?>
          <div class="main">
               <a href="logout.php"  style="<?php echo $file_name ==  'logout' ? ' color: rgb(255, 129, 18);' : '' ;?>">logout </a>
          </div>
               <?php
          }
       ?>
    </div>