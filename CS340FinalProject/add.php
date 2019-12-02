<!DOCTYPE html>

<?php
		$currentpage="Add ";
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
      	" placeholder="Genre" name=gtype>
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>

<!-- Host -->
<div class="container">
    <form method="post" action="addHost.php">
    	<div class="form-group">
      	<label for="pname">Host Name</label>
      	<input type="name" class="form-control" id="hName" aria-describedby="emailHelp" placeholder="Enter Podcast Name" name="hName">
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>

<!--Guest-->
<div class="container">
    <form method="post" action="addGuest.php">
    	<div class="form-group">
      	<label for="pname">Guest Name</label>
      	<input type="name" class="form-control" id="gName" aria-describedby="emailHelp" placeholder="Enter Podcast Name" name="gName">
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
      	" placeholder="Episode Number" name=epnum>
    	</div>
    	<div class="form-group">
      	<label for="genre">Podcast Name</label>
      	<input type="gtype" class="form-control" id="epName
      	" placeholder="Podcast Name" name=epName>
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
      	" placeholder="Enter Days" name=days>
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>

</body>
</html>