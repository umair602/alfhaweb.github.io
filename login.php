<?php 

session_start();

//CHecking Already Log in or no
if (isset($_SESSION['fname'])) {
    header('location: welcome.php');

} else{

//Database connection.
include 'connect.php';

//Geting value from index page for login alert 
if (isset($_GET['alert'])) {
  $alert = $_GET['alert'];
}                 



 ?>



 <!DOCTYPE html>
 <html>
 <head>
    <?php include 'links.php'; ?>
    <?php include 'login_css.php'; ?>
    <title>Log In</title>
 </head>
 <body>
    <header id="header" class="">
    <div class="col-11 m-auto wrapper">
        <div class="header">
            <h1> ALPHA WEB</h1>
        </div>
        <div class="form_wrapper col-lg-3 bg-white p-3">
            <div class="form ">
                <h2 class="pb-3">Log In</h2>

                <?php
                if (isset($alert)) {
                    
                    ?>

                    <div class="container bg-success text-white login_now_alert">
                        <span> <?php echo $alert; ?> </span>
                    </div>


                    <?php


                }
                

                ?>
                <form action="login.php" method="POST" accept-charset="utf-8">
                    <div class="form-group">
                        <input type="text" name="uname" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Password">
                    </div>
                    <p class="font-weight-bold">Not have a Account? <a href="index.php">Sign Up</a></p>
                    <button type="submit" class="btn btn-success text-right" name="submit">Log In</button>
                </form>
                

                <?php 


                if (isset($_REQUEST['submit'])) {
                    
                    //Taking values from user name.
                    $username = $_POST['uname'];
                    $pass = $_POST['pass'];

                    //username Query firing and validation
                    $username_query = "SELECT * FROM `users` WHERE `username`='{$username}'";
                    $username_fired = mysqli_query($con, $username_query);
                    $result = mysqli_fetch_array($username_fired);
                    $username_checked = mysqli_num_rows($username_fired);

                    if ($username_checked == 1) {
                        
                        //Taking password from databse.
                        $d_pass = $result['pass'];

                        //Password validation
                        if (password_verify($pass, $d_pass)) {
                            $_SESSION['fname'] = $result['fname'];
                            header('location: welcome.php');
                        } else {

                            ?>

                            <div class="container bg-danger text-white login_now_alert">
                                <span>Incorrect username or password!</span>
                            </div>

                            <?php

                        }

                    } else {

                        ?>

                        <div class="container bg-danger text-white login_now_alert">
                             <span>Incorrect username or password!</span>
                        </div>
                        

                        <?php


                    }




                }



                 ?>



            </div>
        </div>
    </div>
  </header>
 </body>
 </html>

 <?php 

}

  ?>