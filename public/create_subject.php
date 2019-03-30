<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 
	// detect form submission
	if (isset($_POST['submit'])) {
		// Process the form 

		// Often these are form values in $_POST
		$menu_name = mysql_prep($_POST["menu_name"]); // Escape string
		$position = (int) $_POST["position"];
		$visible = (int) $_POST["visible"];

		// Validations
		$required_fields = array("menu_name", "position", "visible");
		validate_presences($required_fields);

		$field_with_max_lengths = array("menu_name" => 30);
		validate_max_lengths($field_with_max_lengths);

		// Check
		if (!empty($errors)) {
			$_SESSION["errors"] = $errors;
			redirect_to("new_subject.php");
		}	

		// INSERT INTO subjects
		$query  = "INSERT INTO subjects (";
		$query .= " menu_name, position, visible";
		$query .= ") VALUES (";
		$query .= " '{$menu_name}', {$position}, {$visible}";
		$query .= ")";
		
		$result = mysqli_query($connection, $query);
		
		// test if query succeeded
		if ($result) {  
			// Success
			$_SESSION["message"] = "Subject created!";
			redirect_to("manage_content.php");
			
		} else {
			// Failure
			$_SESSION["message"] = "Subject creation failed!";
			redirect_to("new_subject.php");
		}	

	} else {
		// This is probably a GET request
		redirect_to("new_subject.php");
	}
?>


<?php 
	// 5. Close database connection
	if (isset($connection)) {
		mysqli_close($connection);	
	}
?>