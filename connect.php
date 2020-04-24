<?php 


// Database connection.
define('server', 'localhost');
define('user', 'root');
define('pass', '');
define('db', 'user_login');
$con = mysqli_connect(server, user, pass, db);
if (!$con) {
	die('Database connection failed'. mysql_error());
}







 ?>