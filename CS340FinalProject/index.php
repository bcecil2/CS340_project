<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PodWiki</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <?php require_once "connectvars.php"; ?>
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
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="browse.php">Browse</a></li>
        <li><a href="rating.php">Ratings</a></li>
        <li><a href="#">Schedule</a></li>
        <li><a href="add.php">Insert</a></li>
        <li><a href="update.php">Update</a></li>
      </ul>
    </div>
  </nav>
  <!-- End Navbar -->

  </head>

  <body>
    
    <div class="container">
      <h1>Welcome!</h1>
      <br>
      <div class="well">
        Basic description of site.
      </div>
    </div>

    <div class="container">
      <h1>Featured Podcasts:</h1>
      <?php  $sql = "SELECT Pname, Gtype FROM Podcast ORDER BY rating DESC LIMIT 3";
      if($result = mysqli_query($link, $sql)){
          if(mysqli_num_rows($result) > 0){
            echo "<table class='table table-bordered table-striped'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th>Podcast Name</th>";
            echo "<th>Genre</th>";
            echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['Pname'] . "</td>";
                    echo "<td>" . $row['Gtype'] . "</td>";
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
