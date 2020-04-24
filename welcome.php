<?php 

session_start();

include 'connect.php';
if (isset($_SESSION['fname'])) {
	$fname = $_SESSION['fname'];

} else {
	header('location: login.php');
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<?php include 'links.php'; ?>
 	<title>Welcome</title>
 </head>
 <body>
 	
 	
 	<form action="welcome.php" method="POST" accept-charset="utf-8">
 		<h1 class="text-center">Welcome Dear <?php echo $fname; ?>!</h1>
 		<center><input type="submit" name="submit" class="btn btn-danger"></center>
 	</form>
 	

 	<?php 

 	if (isset($_POST['submit'])) {
 		session_destroy();
 		header('location: login.php');
 	}
 	


 	 ?>



 </body>
 </html>