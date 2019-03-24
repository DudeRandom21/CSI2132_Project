<?php

	function createTable($query, $buttonText, $buttonLocation) {

		$db_connection = pg_connect("host=localhost dbname=csi2132_project user=web password=webapp");

		$result = pg_query($query) or die('Query failed: ' . pg_last_error());

		echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';
		echo '<table class="table table-bordered table-striped mb-0">';
		// TODO: add table headers if possible (simple)
		echo '<tbody>';
		while ($line = pg_fetch_array($result, null, PGSQL_NUM)) {
		    echo "\t<tr>\n";
		    foreach ($line as $key => $col_value) {
		        echo "\t\t<td>$col_value</td>\n";
		    }
		    echo '<td>
		    		<a href="' . $buttonLocation . '?id=' . $line[0] . '" class="btn btn-primary">' . $buttonText . '</a>
				</td>
			</tr>';

			// <a id="link" href="xxx.php?id=111&mk=">CLICK</a>
		  //   echo '<td>
				// 	<form action="' . $buttonLocation . '" method="get">
				// 		<input type="submit" value="' . $line[0] . '" name="Submit" id="frm1_submit" class="btn" />
				// 	</form>
				// </td>
				// </tr>';
		    // <button type="button" class="btn">' . $buttonText . '</button></td>';
		    // echo "\t</tr>\n";
		}
		echo "</table>\n";
		echo "</div>\n";		
	}


?>