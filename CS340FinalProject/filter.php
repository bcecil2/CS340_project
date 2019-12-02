<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/browse.php');
  require_once 'connectvars.php';

  $usrCName = "";
  $usrRating = 0;
  $usrHID = 0;
  $usrGID = 0;


  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $usrCName = trim($_POST["sel1"]);
        $usrHID = (int) (split("-", ($_POST["sel2"]))[1]);
        $usrGID = (int) (split("-", ($_POST["sel3"]))[1]);;

        $input_num = trim($_POST["pRating"]);
        //debug_to_console($input_num);
        if(empty($input_num)){
            $num_err = "Please enter a number.";
        } elseif(!filter_var($input_num, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9][0-9]*$/")))){
            $num_err = "Please enter a valid number.";
        } else{
            $usrRating = (int)$input_num;
        }


        // Check input errors before inserting in database
        if(empty($num_err)){
        // Prepare an insert statement
        $filterCategory = "SELECT Pname FROM Podcast WHERE Gtype = ?";
        $filterHost = "SELECT Pname FROM Hosts WHERE Host.host_id = ?";
        $filterRating = "SELECT Pname FROM Podcast WHERE rating >= ?";
        $filterGuest = "SELECT Pname FROM episode, features WHERE Guest_id = ? AND episode.ep_title = features.ep_title";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "is", $param_num, $param_name);
            
            // Set parameters
            $param_num = $usrRating;
            $param_name = $pName;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
        }
    
    // Close connection
        mysqli_close($link);
    }
  }
?>
