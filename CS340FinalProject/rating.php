<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<?php
		$currentpage="Add ";
    include 'dumpHosts.php';
?>
<html>
	<head>
		<title>Add</title>
		 <meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></script>
	</head>
<body>



<!-- Host -->
<div class="container">
    <form method="post" action="ratePodcast.php">
      <div class="form-group">
        <label for="pname">Podcast Name</label>
        <select class="form-control form-check-inline" id="sel1" name="sel1">
        <option>--None--</option>
          <?php  $sql = "SELECT * FROM Podcast";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<option>" . $row ['Pname'] . "</option>";
                }
                // Free result set
                mysqli_free_result($result);
            } else {
                echo "<p class='lead'><em>No records were found.</em></p>";
            }
        } else {
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
        ?>
        </select>
      </div>
      <div class="form-group">
        <label for="id">Your Rating</label>
        <input type="name" class="form-control" id="rating"  placeholder="Enter a Rating between 0-10" name="rating">
      </div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>
<div class="container">
 <?php  $sql = "SELECT * FROM Podcast"; 
if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Podcast Name</th>";
            echo "<th>Rating</th>";
            echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['Pname'] . "</td>";
                    echo "<td>" . $row['rating'] . "</td>";
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
</div>
</body>
</html>