<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/add.php');
  require_once 'connectvars.php';
  $pName = "";
  $days = "";

  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name

    	//TODO: need to use sql to check if inputted name is a podcast that already exits, its a foreign key so it has to be
        $input_name = trim($_POST["pName"]);
        if(empty($input_name)){
            $name_err = "Please enter a name.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Please enter a valid name.";
        } else{
        	$query = "SELECT Pname FROM Podcast WHERE Pname = \"$input_name\"";
        	$res = mysqli_query($link,$query);
        	if(mysqli_num_rows($res) == 1){
        		$pName = $input_name;
        	}
        }
        
        
        $input_days = trim($_POST["days"]);
        if(empty($input_days)){
        	$days_err = "empty";
        } elseif(!filter_var($input_days, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $days_err = "Please enter a valid name.";
        } else{
            $days = $input_days;
        }
        
        
        // Check input errors before inserting in database
        if(empty($name_err) && empty($days_err)){
        // Prepare an insert statement

        $sql = "INSERT INTO Schedule (days, sch_id, pname) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sis", $param_days, $param_id, $param_name);
            
            // Set parameters
            $param_days = $days;
            $param_id = NULL;
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
