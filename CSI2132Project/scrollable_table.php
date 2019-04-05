<?php

	function createTable($query, $buttonText = "", $buttonLocation = "", $method = "get") {

		$db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

		$result = pg_query($query) or die('Query failed: ' . pg_last_error());

		echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';
		echo '<table class="table table-bordered mb-0">';
		echo '<thead><tr>';
		
		$i = 0;
		while ($i < pg_num_fields($result)) {
			$column = pg_field_name($result, $i);
			if (strpos($column, '_id') === false) {
				echo '<th scope="col">' . ucwords(str_replace("_", " ", $column)) . '</th>';
			}
			$i = $i + 1;			
		}
		echo '</thead></tr>';


		echo '<tbody>';
		while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
		    echo "\t<tr>\n";
		    foreach ($line as $key => $col_value) {
				if (strpos($key, '_id') === false) {
		        	echo "\t\t<td>$col_value</td>\n";
		    	}
			}

			if ($buttonText != "") {
			    //TODO: clean this up if you have time it's a little gross
			    if ($method == "get") {
				    echo '<td>
				    		<a href="' . $buttonLocation . http_build_query(array('line' => $line)) . '" class="btn btn-primary">' . $buttonText . '</a>
						</td>
					</tr>';		    	
			    }
			    if ($method == "post")
			    	echo '<td>
			    			<form action="' . $buttonLocation . '" method="post">
			    				<input type="hidden" name="line" value="' . htmlentities(serialize($line)) . '">
			    				<input type="submit" class="btn btn-primary" name="submit" value="' . $buttonText . '">
			    			</form>
						</td>';
				}
				echo '</tr>';		    	
		}
		echo '</tbody>';
		echo "</table>\n";
		echo "</div>\n";		
	}


?>