<!DOCTYPE html>
<?php
		$currentpage="Browse";
    require_once "connectvars.php";
    include "filter.php";
?>
<html>
	<head>
		<title>Browse</title>
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
	</head>

	<body>
		<!-- Navbar: -->
	  <nav class="navbar navbar-inverse">
	    <div class="container-fluid">
	      <div class="navbar-header">
	        <a class="navbar-brand" href="index.php">PodWiki</a>
	      </div>
	      <ul class="nav navbar-nav">
	        <li><a href="index.php">Home</a></li>
	        <li class="active"><a href="browse.php">Browse</a></li>
	        <li><a href="rating.php">Ratings</a></li>
	        <li><a href="add.php">Insert</a></li>
	        <li><a href="update.php">Update</a></li>
	      </ul>
	    </div>
	  </nav>
	<!-- End Navbar -->

<!-- Name -->
<div class="container">
	<h1>Browse Podcasts:</h1>
	<br>
  <form id="browse" method="post" action="#">

		<!-- Podcast Categroy -->
  	<div class="form-group">
      <label for="pname">Podcast Category</label>
    	<select class="form-control form-check-inline" id="sel1" name="sel1">
        <option></option>
      	<?php  $sql = "SELECT Gtype FROM Podcast";
        if($result = mysqli_query($link, $sql)){
    			if(mysqli_num_rows($result) > 0){
          	while($row = mysqli_fetch_array($result)){
              echo "<option>" . $row ['Gtype'] . "</option>";
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

	<!-- Host Name -->
  <div class="form-group">
    <label for="pname">Host Name</label>
    <select class="form-control form-check-inline" id="sel2" name="sel2">
      <option></option>
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
      		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    		}
    	?>
  	</select>
  </div>


      <div class="form-group">
        <label for="pname">Rating</label>
        <input type="name" class="form-control" id="pRating"  placeholder="Enter Podcast Rating" name="pRating">
      </div>

      <div class="form-group">
        <label for="pname">Guest</label>
        <select class="form-control form-check-inline" id="sel3" name="sel3">
            <option></option>
            <?php  $sql = "SELECT * FROM Guest";
              if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_array($result)){
                    echo "<option>" . $row ['Guest_name'] . " - " . $row ['Guest_id'] ."</option>";
                  }
                  mysqli_free_result($result);
                } else {
                  echo "<p class='lead'><em>No records were found.</em></p>";
                }
              } else {
                echo "not able to execute $sql. " . mysqli_error($link);
              }
            ?>
        </select>
      </div>
    	<button type="submit" class="btn btn-primary" name="submit">Submit</button>
  	</form>
    <div class="container" id="res">
      <?php $sql = genQuery();
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    echo "<table class='table table-bordered table-striped'>";
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>Podcast Name</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                      echo "<tr>";
                      echo "<td>" . $row['Pname'] . "</td>";
                      echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                  echo "<p class='lead'> <em>No matching podcasts were found</em></p>";
                }
            } else {

              echo "<p class='lead'> <em>No matching podcasts were found</em></p>";
            }
       ?>
    </div>

</div>



</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
  $('#browse').submit(function(e){
    $(".err").remove();
    var rating = $('#pRating').val();
    if(rating != [] && (rating <= 0 || rating > 10 )){
      e.preventDefault();
      $('#pRating').after('<p class=err> Rating must be greater than 0 and less than 11 </p>');
    }
  });
}); 
</script>



