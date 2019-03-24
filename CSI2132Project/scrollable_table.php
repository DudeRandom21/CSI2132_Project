<?php

	function createTable($query, $buttonText) {

		$db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

		$result = pg_query($query) or die('Query failed: ' . pg_last_error());

		echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';
		echo '<table class="table table-bordered table-striped mb-0">';
		// TODO: add table headers if possible (simple)
		echo '<tbody>';
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		    echo "\t<tr>\n";
		    foreach ($line as $key => $col_value) {
		        echo "\t\t<td>$col_value</td>\n";
		    }
		    echo '<td> <button type="button" class="btn">' . $buttonText . '</button></td>';
		    echo "\t</tr>\n";
		}
		echo "</table>\n";
		echo "</div>\n";		
	}


?>
<!DOCTYPE html>
<html>
	<?php include("common_head.php"); ?>
<head>
	<title></title>
</head>
<body>
	<?php include("header.php"); ?>
<div>
	<?php createTable("SELECT * FROM users", "Book Now!"); ?>

</div>
</body>
</html>