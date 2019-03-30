<?php

	session_start();

	function message() {
		// Error message for adding subject
		if (isset($_SESSION["message"])) {
			$output = "<div class=\"message\">"; 
			$output .= htmlentities($_SESSION["message"]); // Render to harmless HTML.
			$output .= "</div>";

			// Clear message after use
			$_SESSION["message"] = null;

			return $output;
		}
	}

	function errors() {
		// Error message for adding subject
		if (isset($_SESSION["errors"])) {
			$errors = ($_SESSION["errors"]); 
			
			// Clear message after use
			$_SESSION["errors"] = null;

			return $errors;
		}
	}		
?>
