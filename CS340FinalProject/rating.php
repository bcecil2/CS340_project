<!DOCTYPE html>
<!-- Add Part Info to Table Part -->
<?php
		$currentpage="Ratings";
    include 'dumpHosts.php';
?>
<html>
<head>
	<title>Ratings</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<style type="text/css">
      .err{
        color: red;
      }
    </style>
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
		src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
	</script>

	<!-- Navbar: -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">PodWiki</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="browse.php">Browse</a></li>
				<li class="active"><a href="rating.php">Ratings</a></li>
				<li><a href="add.php">Insert</a></li>
				<li><a href="update.php">Update</a></li>
			</ul>
		</div>
	</nav>
<!-- End Navbar -->


</head>

<body>
	<!-- Host -->
	<div class="container">
		<h1>Ratings:</h1>
		<br>
	    <form method="post" action="ratePodcast.php" id="rate">
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
	        <label for="id">Your Rating</label>
	        <input type="name" class="form-control" id="rating"  placeholder="Enter a Rating between 1-10" name="rating">
	      </div>
	    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	  	</form>
	</div>

	<br>
	<div class="container">
	 <?php  $sql = "SELECT * FROM Podcast Where Rating >= 0";
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

	                mysqli_free_result($result);
	            } else {
	                echo "<p class='lead'><em>No records were found.</em></p>";
	            }
	        } else {
	          echo "ERROR" . mysqli_error($link);
	        }
	        ?>
	</div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $('#rate').submit(function(e){
    $(".err").remove();
    var rating = $('#rating').val();
    if(rating != [] && (rating <= 0 || rating > 10 )){
      e.preventDefault();
      $('#rating').after('<p class=err> Rating must be greater than 0 and less than 11 </p>');
    }
  });
}); 
</script>