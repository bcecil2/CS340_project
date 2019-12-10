<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<?php
		$currentpage="Update";
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
	    //src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
	  </script>
    <style type="text/css">
      .err{
        color: red;
      }
    </style>

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
	        <li><a href="schedule.php">Schedule</a></li>
	        <li><a href="add.php">Insert</a></li>
	        <li class="active"><a href="update.php">Update</a></li>
	      </ul>
	    </div>
	  </nav>
	<!-- End Navbar -->

	</head>




<body>



<!-- Host -->
<div class="container">
    <form method="post" action="updateHost.php" id="host">
      <div class="form-group">
        <label for="pname">New Host Name</label>
        <input type="name" class="form-control" id="hName" aria-describedby="emailHelp" placeholder="Enter Host Name" name="hName">
      </div>
      <div class="form-group">
        <label for="id">Old Host Name</label>
        <select class="form-control form-check-inline" id="hostsel" name="hostsel">
            <option>--None--</option>
          <?php  $sql = "SELECT * FROM Host";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<option>" . $row ['host_name'] . " - " . $row['host_id'] . "</option>";
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

      </div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>



<!--Guest-->
<div class="container">
    <form method="post" action="updateGuest.php" id="guest">
    	<div class="form-group">
      	<label for="pname">New Guest Name</label>
      	<input type="name" class="form-control" id="gName" aria-describedby="emailHelp" placeholder="Enter Guest Name" name="gName">
    	</div>
      <div class="form-group">
        <label for="pname">Guest ID</label>
        <select class="form-control form-check-inline" id="guestsel" name="guestsel">
            <option>--None--</option>
          <?php  $sql = "SELECT * FROM Guest";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<option>" . $row ['Guest_name'] . " - " . $row['Guest_id'] . "</option>";
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
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>


<!--Schedule-->
<div class="container">
    <form method="post" action="updateSched.php" id="sched">
    	<div class="form-group">
      	<label for="pname">New Schedule</label>
        <input type="name" class="form-control" id="days" placeholder="Enter Initals of Days Aired" name="days">
    	</div>
    	<div class="form-group">
      	<label for="genre">Schedule ID</label>
        <select class="form-control form-check-inline" id="schsel" name="schsel">
              <option>--None--</option>
                      <?php  $sql = "SELECT * FROM Schedule";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    echo "<option>" . $row ['pname'] . " - " . $row['sch_id'] . "</option>";
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
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
</div>

</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $('#host').submit(function(e){
    $(".err").remove();
    var hName = $('#host #hName').val();
    var oldH = $("#hostsel option:selected").text();
    var sel1 = $("#host #sel1 option:selected").text(); 
    var sel2 = $("#host #sel2 option:selected").text();
    if(hName == ""){
      e.preventDefault();
      $('#host #hName').after('<p class=err> Host must have a name </p>');
    }
    if(oldH == "--None--"){
      e.preventDefault();
      $('#host #hostsel').after('<p class=err> Please select a host to update</p>');
    }

    if((sel1 != "--None--" && sel2 == "--None--") || (sel2 != "--None--" && sel1 == "--None--")){
      e.preventDefault();
      $('#host #sel2').after('<p class=err> please connect with a host or podcast </p>');
    }
  });
}); 
</script>

<script type="text/javascript">
$(document).ready(function(){
  $('#guest').submit(function(e){
    $(".err").remove();
    var gName = $('#guest #gName').val();
    var oldG = $("#guestsel option:selected").text();
    var sel1 = $("#guest #sel1 option:selected").text(); 
    var sel2 = $("#guest #sel2 option:selected").text();
    if(gName == ""){
      e.preventDefault();
      $('#guest #gName').after('<p class=err> Guest must have a name </p>');
    }
    if(oldG == "--None--"){
      e.preventDefault();
      $('#guest #guestsel').after('<p class=err> Please select a guest to update</p>');
    }

    if((sel1 != "--None--" && sel2 == "--None--") || (sel2 != "--None--" && sel1 == "--None--")){
      e.preventDefault();
      $('#guest #sel2').after('<p class=err> please connect with a guest or podcast</p>');
    }

  });
}); 
</script>


<script type="text/javascript">
$(document).ready(function(){
  $('#sched').submit(function(e){
    $(".err").remove();
    var days = $('#sched #days').val();
    var oldS = $("#schsel option:selected").text();
    if(days == ""){
      e.preventDefault();
      $('#sched #days').after('<p class=err> Schedule must have days</p>');
    }
    if(oldS == "--None--"){
      e.preventDefault();
      $('#sched #schsel').after('<p class=err> Please select a schedule to update</p>');
    }
  });
}); 
</script>


