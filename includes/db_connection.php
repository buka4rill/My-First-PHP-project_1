<?php
	// 1. Create a database connection
		$dbhost = "localhost";
		$dbuser = "adaogeb_cms";
		$dbpass = "secretpassword";
		$dbname = "adaogeb_corp";

	define("DB_SERVER", "localhost");
	define("DB_USER", "adaogeb_cms");
	define("DB_PASS", "secretpassword");
	define("DB_NAME", "adaogeb_corp");	
	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	
	// Test if connection occured.
	if (mysqli_connect_errno()) {
		die("Database connection failed: " .
				mysqli_connect_error() .
					" (" . mysqli_connect_errno() .  ")"
		);
	}
	
?>