<!DOCTYPE html>

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

<!-- Podcast -->
<div class="container">
    <form method="post" action="addPodcast.php">
    	<div class="form-group">
      	<label for="pname">Podcast Name</label>
      	<input type="name" class="form-control" id="pName" aria-describedby="emailHelp" placeholder="Enter Podcast Name" name="pName">
    	</div>
    	<div class="form-group">
      	<label for="genre">Genre</label>
      	<input type="gtype" class="form-control" id="gtype
      	" placeholder="Enter Genre" name=gtype>
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>

<!-- Host -->
<div class="container">
    <form method="post" action="addHost.php">
    	<div class="form-group">
      	<label for="pname">Host Name</label>
      	<input type="name" class="form-control" id="hName" aria-describedby="emailHelp" placeholder="Enter Host Name" name="hName">
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>

<!--Guest-->
<div class="container">
    <form method="post" action="addGuest.php">
    	<div class="form-group">
      	<label for="pname">Guest Name</label>
      	<input type="name" class="form-control" id="gName" aria-describedby="emailHelp" placeholder="Enter Guest Name" name="gName">
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>

<!--Episode-->
<div class="container">
    <form method="post" action="addEpisode.php">
    	<div class="form-group">
      	<label for="pname">Episode Name</label>
      	<input type="name" class="form-control" id="eName" aria-describedby="emailHelp" placeholder="Enter Episode Name" name="eName">
    	</div>
    	<div class="form-group">
      	<label for="genre">Episode Number</label>
      	<input type="gtype" class="form-control" id="epnum
      	" placeholder="Enter Episode Number" name=epnum>
    	</div>
    	<div class="form-group">
      	<label for="genre">Podcast Name</label>
          <select class="form-control form-check-inline" id="sel1" name="sel1">
              <option>--None--</option>
              <?php  $sql = "SELECT * FROM Podcast";
                if($result = mysqli_query($link, $sql)){
                  if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){
                      echo "<option>" . $row ['Pname'] . "</option>";
                    }
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
    <form method="post" action="addSched.php">
    	<div class="form-group">
      	<label for="pname">Podcast Name</label>
        <input type="gtype" class="form-control" id="pName
        " placeholder="Enter Days Aired" name=pName>
    	</div>
    	<div class="form-group">
      	<label for="genre">Days Aired</label>
      	<input type="gtype" class="form-control" id="days
      	" placeholder="Enter Days Aired" name=days>
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>

</body>
</html>