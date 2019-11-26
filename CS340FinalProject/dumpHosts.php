<?php
	require_once "connectvars.php";
	function dumpHosts(){
		$sql = "SELECT * FROM Host";
    	if($result = mysqli_query($link, $sql)){
      		if(mysqli_num_rows($result) > 0){
        		echo "<table class='table table-bordered table-striped'>";
        		echo "<thead>";
        		echo "<tr>";
        		echo "<th>Host ID#</th>";
        		echo "<th>Name</th>";
        		echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['host_id'] . "</td>";
                    echo "<td>" . $row['host_name'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";                            
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else {
                echo "<p class='lead'><em>No records were found.</em></p>";
            }
      	} else {
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      	}
	}	
?>