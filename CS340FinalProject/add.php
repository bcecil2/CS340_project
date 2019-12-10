<!DOCTYPE html>

<?php
		$currentpage="Add ";
?>
<html>
	<head>
		<title>Add</title>
		<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script></script> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script
      src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
      src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>

		<!-- Navbar: -->
	  <nav class="navbar navbar-inverse">
	    <div class="container-fluid">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="index.html">PodWiki</a>
	      </div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.html">Home</a></li>
	        <li><a href="browse.php">Browse</a></li>
	        <li><a href="rating.php">Ratings</a></li>
	        <li><a href="#">Schedule</a></li>
	        <li class="active"><a href="add.php">Insert</a></li>
	        <li><a href="update.php">Update</a></li>
	      </ul>
	    </div>
	  </nav>
	  <!-- End Navbar -->

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
      	<input type="gtype" class="form-control" id="epName
      	" placeholder="Enter Podcast Name" name=epName>
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>

<!--Schedule-->
<div class="container">
    <form method="post" action="addSched.php">
    	<div class="form-group">
      	<label for="pname">Podcast Name</label>
      	<input type="name" class="form-control" id="pName" aria-describedby="emailHelp" placeholder="Enter Podcast Name" name="pName">
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
