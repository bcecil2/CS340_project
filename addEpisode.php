<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
header('Location: https://web.engr.oregonstate.edu/~cecilbl/add.php');
  require_once 'connectvars.php';
  $epName = "";
  $epNum = 0;
  $pName = "";

  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
        $input_name = trim($_POST["eName"]);
        if(empty($input_name)){
            $name_err = "Please enter a name.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $name_err = "Please enter a valid name.";
        } else{
            $epName = $input_name;
        }

        //TODO: Actual error checking on this the statement always fails currently
        $input_num = trim($_POST["epnum"]);
        if(empty($input_num)){
            $name_err = "Please enter a number.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[1-9]+$/")))){
            $num_err = "Please enter a valid number.";
        } else{
            $epNum = $input_num;
        }
        $epNum = (int)$input_num;
        
        //TODO: need to use sql to check if inputted name is a podcast that already exits, its a foreign key so it has to be
        $input_pname = trim($_POST["epName"]);
        if(empty($input_pname)){
            $name_err = "Please enter a name.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $pname_err = "Please enter a valid name.";
        } else{
            $pName = $input_pname;
        }
        
        
        // Check input errors before inserting in database
        if(empty($name_err) && empty($pname_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO episode (ep_number, ep_title, Pname) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "iss", $param_num, $param_title, $param_name);
            
            // Set parameters
            $param_num = $epNum;
            $param_title = $epName;
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
