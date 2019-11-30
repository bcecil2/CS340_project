<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/rating.php');
  require_once 'connectvars.php';

  $pName = "";
  $usrRating = 0;


  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
        $input_name = trim($_POST["sel1"]);
        if(empty($input_name)){
            $name_err = "Please enter a name.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Please enter a valid name.";
        } else{
            $pName = $input_name;
        }


        $input_num = trim($_POST["rating"]);
        //debug_to_console($input_num);
        if(empty($input_num)){
            $num_err = "Please enter a number.";
        } elseif(!filter_var($input_num, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9][0-9]*$/")))){
            $num_err = "Please enter a valid number.";
        } else{
            
            $usrRating = (int)$input_num;
        }
        //debug_to_console($epNum);
        //$epNum = (int)$input_num;
        
        
        
        // Check input errors before inserting in database
        if(empty($name_err) && empty($num_err)){
        // Prepare an insert statement
        $sql = "CALL updateRating(?, ?)";
         
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
