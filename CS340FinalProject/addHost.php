<?php
  header('Location: https://web.engr.oregonstate.edu/~cecilbl/add.php');
  require_once 'connectvars.php';
  $name = "";
  $genre = "";

  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    	$input_name = trim($_POST["hName"]);
    	if(empty($input_name)){
        	$name_err = "Please enter a name.";
    	} elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
    	    $name_err = "Please enter a valid name.";
    	} else{
       		$name = $input_name;
    	}
    
    	
    	// Check input errors before inserting in database
    	if(empty($name_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO Host (host_name, host_id) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_id);
            
            // Set parameters
            $param_name = $name;
            $param_id = NULL;
            
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
