<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<?php
		$currentpage="Schedule";
    require_once "connectvars.php";
?>
<html>
	<head>
		<title>Schedule</title>
		<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
		<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
		<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></script> -->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  <script
	    src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
			src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
	    //src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
	  </script>

	  <!-- Navbar: -->
	  <nav class="navbar navbar-inverse">
	    <div class="container-fluid">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="index.html">PodWiki</a>
	      </div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li><a href="browse.php">Browse</a></li>
	        <li><a href="rating.php">Ratings</a></li>
	        <li class="active"><a href="schedule.php">Schedule</a></li>
	        <li><a href="add.php">Insert</a></li>
	        <li><a href="update.php">Update</a></li>
	      </ul>
	    </div>
	  </nav>
	<!-- End Navbar -->
	</head>
  <body>

    <!--Schedule-->
    <div class="container">
      <h1>Podcast Schedules:</h1>
      <br>
      <?php  $sql = "SELECT * FROM Schedule";
          if($result = mysqli_query($link, $sql)){
              if(mysqli_num_rows($result) > 0){
                echo "<table class='table table-bordered table-striped'>";
                echo "<thead>";
                echo "<tr>";
                  echo "<th>Schedule ID#</th>";
                  echo "<th>Podcast Name</th>";
                  echo "<th>Days Aired</th>";
                echo "</tr>";
                  echo "</thead>";
                echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['sch_id'] . "</td>";
                        echo "<td>" . $row['pname'] . "</td>";
                        echo "<td>" . $row['days'] . "</td>";
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
            ?>

        <form method="post" action="updateSched.php">
        	<div class="form-group">
          	<label for="pname">New Schedule</label>
          	<input type="name" class="form-control" id="days" aria-describedby="emailHelp" placeholder="Enter Days" name="days">
        	</div>
        	<div class="form-group">
          	<label for="genre">Schedule ID</label>
          	<input type="gtype" class="form-control" id="schid
          	" placeholder="Enter Schedule ID" name=schid>
        	</div>
        	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
      	</form>
    </div>

  </body>
</html>
