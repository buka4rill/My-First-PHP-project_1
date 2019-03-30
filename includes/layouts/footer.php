	<div id="footer"> Copyright <?php echo date("Y");?>, Adaogeb Corp </div>	

		
	</body>
	
</html>

<?php 

	// 5. Close database connection
	// Because of some pages require no database connection
	if (isset($connection)) {
		mysqli_close($connection);	
	}
	
?>