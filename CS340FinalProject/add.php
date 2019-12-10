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
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>

		<!-- Main Navbar: -->
	  <nav class="navbar navbar-inverse">
	    <div class="container-fluid">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="index.php">PodWiki</a>
	      </div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li><a href="browse.php">Browse</a></li>
	        <li><a href="rating.php">Ratings</a></li>
	        <li class="active"><a href="add.php">Insert</a></li>
	        <li><a href="update.php">Update</a></li>
	      </ul>
	    </div>
	  </nav>


		<!-- Second Navbar -->
		<div class="container">
			<div class="well" style="background-color: light-grey;">
				<h2>Select what you'd like to add:</h2>
				<br>
				<a href="#" class="btn btn-info" role="button">Link Button</a>
				<button type="button" class="btn btn-info">Button</button>


			</div>
		</div>


	</head>
<body>

	<!-- Podcast -->
	<div class="container">
		<h1>Add a New Podcast:</h1>
		<br>
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
		<h1>Add a New Host:</h1>
		<br>
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
		<h1>Add a New Guest:</h1>
		<br>
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
		<h1>Add a New Episode:</h1>
		<br>
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
		<h1>Add a New Schedule:</h1>
		<br>
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
