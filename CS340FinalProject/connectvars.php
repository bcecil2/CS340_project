<?php
  // Define database connection constants
  define('DB_HOST', 'classmysql.engr.oregonstate.edu');
  define('DB_USER', 'cs340_cecilbl');
  define('DB_PASSWORD', '9415');
  define('DB_NAME', 'cs340_cecilbl');
  define('CON_STRING', 'mysql:host=classmysql.engr.oregonstate.edu;dname=cs340_cecilbl');
  /* Attempt to connect to MySQL database */
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
 
	// Check connection
	if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>

