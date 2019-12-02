<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<?php
		$currentpage="Add ";
    require_once "connectvars.php";
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
      <?php  $sql = "SELECT * FROM Host";
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
        ?>
    <form method="post" action="updateHost.php">
      <div class="form-group">
        <label for="pname">New Host Name</label>
        <input type="name" class="form-control" id="hName" aria-describedby="emailHelp" placeholder="Enter Host Name" name="hName">
      </div>
      <div class="form-group">
        <label for="id">Host id</label>
        <input type="name" class="form-control" id="hid" aria-describedby="emailHelp" placeholder="Enter Hosts ID" name="hid">
      </div>
      <div class="row">
        <label for="sel1">Who Hosts What?</label>
          <div class="col">
          <select class="form-control form-check-inline" id="sel1" name="sel1">
            <option>--None--</option>
          <?php  $sql = "SELECT * FROM Host";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<option>" . $row ['host_name'] . " - " . $row['host_id'] . "</option>";
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
        Hosts
        <div class="col">
            <select class="form-control form-check-inline" id="sel2" name="sel2">
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

      </div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>



<!--Guest-->
<div class="container">
      <?php  $sql = "SELECT * FROM Guest";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Guest ID#</th>";
            echo "<th>Name</th>";
            echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['Guest_id'] . "</td>";
                    echo "<td>" . $row['Guest_name'] . "</td>";
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
    <form method="post" action="updateGuest.php">
    	<div class="form-group">
      	<label for="pname">New Guest Name</label>
      	<input type="name" class="form-control" id="gName" aria-describedby="emailHelp" placeholder="Enter Guest Name" name="gName">
    	</div>
      <div class="form-group">
        <label for="pname">Guest ID</label>
        <input type="name" class="form-control" id="gid" aria-describedby="emailHelp" placeholder="Enter Guest ID" name="gid">
      </div>
      <div class="row">
        <label for="sel1">Who's Appeared Where?</label>
          <div class="col">
          <select class="form-control form-check-inline" id="sel1" name="sel1">
            <option>--None--</option>
          <?php  $sql = "SELECT * FROM Guest";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<option>" . $row ['Guest_name'] . " - " . $row['Guest_id'] . "</option>";
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
        Appeared On
        <div class="col">
            <select class="form-control form-check-inline" id="sel2" name="sel2">
              <option>--None--</option>
                      <?php  $sql = "SELECT * FROM episode";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<option>" . $row ['ep_title'] . "</option>";
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
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>


<!--Schedule-->
<div class="container">      
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