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
    <style type="text/css">
      .err{
        color: red;
      }
    </style>

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
		<div class="container" style="text-align: center;" id="navbar">
			<div class="well" style="background-color: light-grey;">
				<h2>Select what you'd like to add:</h2>
				<br>
        <button type="button" class="btn btn-info" target="1">New Podcast</button>
          <button type="button" class="btn btn-info" target="2">New Host</button>
          <button type="button" class="btn btn-info" target="3">New Guest</button>
          <button type="button" class="btn btn-info" target="4">New Episode</button>
          <button type="button" class="btn btn-info" target="5">New Schedule</button>
			</div>
		</div>


	</head>
<body>

	<!-- Podcast -->
	<div class="container">
		<br>
    <form method="post" action="addPodcast.php"  id="podcast" class="hideable div1">
      <h1>Add a New Podcast:</h1>
    	<div class="form-group">
      	<label for="pname">Podcast Name</label>
      	<input type="name" class="form-control" id="pName" placeholder="Enter Podcast Name" name="pName">
    	</div>
    	<div class="form-group">
      	<label for="genre">Genre</label>
      	<input type="gtype" class="form-control" id="gtype" placeholder="Enter Genre" name="gtype">
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
	</div>

	<!-- Host -->
	<div class="container">
		<br>
    <form method="post" action="addHost.php" id="host" style="display: none;" class="hideable div2">
      <h1>Add a New Host:</h1>
    	<div class="form-group">
      	<label for="pname">Host Name</label>
      	<input type="name" class="form-control" id="hName" aria-describedby="emailHelp" placeholder="Enter Host Name" name="hName">
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
	</div>

	<!--Guest-->
	<div class="container">

		<br>
	  <form method="post" action="addGuest.php" id="guest" style="display: none;" class="hideable div3">
      <h1>Add a New Guest:</h1>
	  	<div class="form-group">
	    	<label for="pname">Guest Name</label>
	    	<input type="name" class="form-control" id="gName" aria-describedby="emailHelp" placeholder="Enter Guest Name" name="gName">
	  	</div>
	  	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
		</form>
	</div>

	<!--Episode-->
	<div class="container">
		
		<br>
    <form method="post" action="addEpisode.php" id="episode" style="display: none;" class="hideable div4">
      <h1>Add a New Episode:</h1>
    	<div class="form-group">
      	<label for="pname">Episode Name</label>
      	<input type="name" class="form-control" id="eName" placeholder="Enter Episode Name" name="eName">
    	</div>
    	<div class="form-group">
      	<label for="genre">Episode Number</label>
      	<input type="gtype" class="form-control" id="epnum" placeholder="Enter Episode Number" name="epnum">
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
		<br>
    <form method="post" action="addSched.php" id="schedule" style="display: none;" class="hideable div5">
      <h1>Add a New Schedule:</h1>
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
                    mysqli_free_result($result);
                    } else {
                      echo "<p class='lead'><em>No records were found.</em></p>";
                    }
                } else {
                  echo "ERROR" . mysqli_error($link);
                }
              ?>
        </select>
    	</div>
    	<div class="form-group">
      	<label for="genre">Days Aired</label>
      	<input type="gtype" class="form-control" id="days" placeholder="Enter Days Aired" name=days>
    	</div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
	</div>

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $('#podcast').submit(function(e){
    alert("in");
    $(".err").remove();
    var pName = $('#podcast #pName').val();
    var gtype = $('#podcast #gtype').val();
    if(gtype == ""){
      e.preventDefault();
      $('#podcast #gtype').after('<p class=err> Podcasts must have a genre </p>');
    }
    if(pName == ""){
      e.preventDefault();
      $('#podcast #pName').after('<p class=err> Podcasts must have a name </p>');
    }
  });
}); 
</script>

<script type="text/javascript">
$(document).ready(function(){
  $('#host').submit(function(e){
    $(".err").remove();
    var hName = $('#host #hName').val();
    if(hName == ""){
      e.preventDefault();
      $('#host #hName').after('<p class=err> Hosts must have a name </p>');
    }
  });
}); 
</script>

<script type="text/javascript">
$(document).ready(function(){
  $('#guest').submit(function(e){
    $(".err").remove();
    var gName = $('#guest #gName').val();
    if(gName == ""){
      e.preventDefault();
      $('#guest #gName').after('<p class=err> Guests must have a name </p>');
    }
  });
}); 
</script>

<script type="text/javascript">
$(document).ready(function(){
  $('#episode').submit(function(e){
      $(".err").remove();
      var eName = $('#episode #eName').val();
      var eNum = $('#episode #epnum').val();
      var pName = $("#sel1 option:selected").text();
      console.log(eNum == []);
      if(eName == ""){
        e.preventDefault();
        $('#episode #eName').after('<p class=err> episodes must have a name </p>');
      }

      if(eNum == []){
        e.preventDefault();
        $('#episode #epnum').after('<p class=err> episodes must have a number </p>');
      }else{
        var isInteger =  /^[1-9][0-9]*$/;
        if(!isInteger.test(eNum)){
          e.preventDefault();
          $('#episode #epnum').after('<p class=err> episodes must be an integer greater than zero </p>');
        }
      }

      if(pName == "--None--"){
        e.preventDefault();
        $('#episode #sel1').after('<p class=err> episodes must be related to a podcast </p>');
      }

  });
}); 
</script>


<script type="text/javascript">
$(document).ready(function(){
  $('#schedule').submit(function(e){
      $(".err").remove();
      var pName = $("#schedule #sel1 option:selected").text();
      var daysAired = $("#schedule #days").val();
      if(pName == "--None--"){
        e.preventDefault();
        $('#schedule #sel1').after('<p class=err> Please choose a podcast </p>');
      }

      if(daysAired == ""){
        e.preventDefault();
        $('#schedule #days').after('<p class=err> Please enter days aired</p>');
      }

  });
}); 
</script>




    <!-- JavaScript for showing and hiding forms. -->
<script type="text/javascript">
  $(function() {
   $('#navbar .btn').click(function() {
      $('.hideable').hide();
      $('.div' + $(this).attr('target')).show();
    });
  });
</script>