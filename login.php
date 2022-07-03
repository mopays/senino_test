<?php 
    require_once('connect.php');
    session_start();

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        if(empty($username)){
            echo "<script type='text/javascript'>alert('please enter username');</script>";
            header('refresh:1;');
        }else if(empty($password)){
            echo "<script type='text/javascript'>alert('please enter password');</script>";
            header('refresh:1;');
        }else{
            $select = $db->prepare("SELECT * FROM `login` WHERE username = ? ");
            $select->execute([$username]);
            $row = $select->fetch(PDO::FETCH_ASSOC);
            
            if($username == $row['username']){
                if($password == $row['password']){
                    if($row['user_type'] == 'user'){
                        $_SESSION['user'] = $row['id'];
                        header('refresh:1;index.php');
                        $loginMsg[] = 'login success';
                    }elseif($row['user_type'] == 'admin'){
                        $_SESSION['admin'] = $row['id'];
                        header('refresh:1;adminstration.php');
                        $loginMsg[] = 'login success';
                    }
                }else{  
                    echo "<script type='text/javascript'>alert('wrong password please try again');</script>";
                    header('refresh:1;');
                }
            }else{
                echo "<script type='text/javascript'>alert('wrong username please try again');</script>";
                header('refresh:1;');
            }
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
        <section class="login"> 
            <h1>login</h1>
            <div class="tilts">
                <p style=" width: 100%;">Login is require to access the Adminstration area. For demonstration purposes use these
                <br>credential: username: '<span>admin</span>' password: '<span>123456</span>'
                </p>
            </div>
            <div class="login">
               <form action="" method="post">
                <p>please login</p>
                <div class="forms">
                    <label for="">username</label>
                    <input type="text" name="username" id="">
                </div>
                <div class="forms">
                    <label for="">password</label>
                    <input type="password" name="password" id="">
                </div>
                <button  name="submit">login</button>
               </form>
            </div>
        </section>
        
</body>
</html>