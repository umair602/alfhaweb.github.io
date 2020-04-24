<?php 

// Adding database connection file.
include 'connect.php';

 ?>



 <!DOCTYPE html>
 <html>
 <head>
 	<?php include 'links.php'; ?>
 	<?php include 'css.php'; ?>
 	<title>Sign Up</title>
 </head>
 <body>
 	<header id="header" class="">
    <div class="col-11 m-auto wrapper">
    	<div class="header">
    		<h1> ALPHA WEB</h1>
    	</div>
    	<div class="form_wrapper col-lg-3 bg-white p-3">
    		<div class="form ">
    			<h2 class="pb-3">Sign Up</h2>
    			<form action="index.php" method="POST" accept-charset="utf-8">
    				<div class="form-group">
                        <div class="row">
                        <div class="col">
                            <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col">
                            <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    </div>
    				<div class="form-group">
    					<input type="text" name="uname" class="form-control" placeholder="Username" required>
    				</div>
    				<div class="form-group">
    					<input type="email" name="email" class="form-control" placeholder="Email" required>
    				</div>
    				<div class="form-group">
    					<input type="password" name="pass" class="form-control" placeholder="Password" required>
    				</div>
    				<div class="form-group">
    					<input type="password" name="cpass" class="form-control" placeholder="Conform Password" required>
    				</div>
    				<p class="font-weight-bold">Already have a account? <a href="login.php">Log in</a></p>
    				<button type="submit" class="btn btn-success" name="submit">Sign Up</button>
    			</form>
    		</div>

            <?php 

                // Start backend development.
                if (isset($_REQUEST['submit'])) {
                    
                    // Taking Values from inputs tags in Form.
                    $fname = ucfirst(strtolower($_POST['fname']));
                    $lname = ucfirst(strtolower($_POST['lname']));

                    //user name conver to lower alphabets.
                    $username  = strtolower($_POST['uname']);

                    $email = strtolower($_POST['email']);
                    $pass = $_POST['pass'];
                    $cpass = $_POST['cpass'];

                    //Email Validation
                    $email_check_query = "SELECT * FROM users WHERE email='{$email}'";
                    $email_check_query_fired = mysqli_query($con, $email_check_query);
                    $email_checked = mysqli_num_rows($email_check_query_fired);
                    
                    //Email Apply validation.
                    if ($email_checked == 0) {
                        
                        //Checking username from Database
                        $username_check_query = "SELECT * FROM users WHERE username='{$username}'";
                        $username_check_fetch_query = mysqli_query($con, $username_check_query);
                        $username_checked = mysqli_num_rows($username_check_fetch_query);
                        
                        //Validating username.
                        if ($username_checked == 0) {
                            
                            //Password Validation.
                            if ($pass === $cpass) {

                                //Passsword Encoding.
                                $e_pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
                                $e_cpass = password_hash($_POST['cpass'], PASSWORD_BCRYPT);
                                
                                //Creatining query for store data in database.
                                $store_data_query = "INSERT INTO users(fname, lname, username, email, pass, cpass) VALUES('{$fname}', '{$lname}', '{$username}', '{$email}', '{$e_pass}', '{$e_cpass}')";

                                //firing query.
                                $fired_query = mysqli_query($con, $store_data_query);

                                //Query Validation
                                if ($fired_query) {
                                     header('location: login.php?alert=You Sign Up successfully, Login now');

                                 } else{

                                    ?>
                                    <div class="container bg-danger text-white  warning">
                                        <span>SignUp failed! Please try again later</span>
                                    </div>

                                    <?php
                                 }




                            } else{

                                ?>
                                <div class="container bg-danger text-white  warning">
                                    <span>Enter same password!</span>
                                </div>

                                <?php
                            }




                        } else{

                            ?>
                            <div class="container bg-danger text-white  warning">
                                <span>Username already exist!</span>
                            </div>

                            <?php

                        }




                    } else{

                        ?>
                        <div class="container bg-danger text-white  warning">
                            <span>You have alredy Sign Up!</span>
                        </div>

                        <?php


                    }
                    







                    


                }



                


             ?>


    </div>
  </header>
 </body>
 </html>