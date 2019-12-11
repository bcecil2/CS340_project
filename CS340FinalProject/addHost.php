<?php
//header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/add.php');
  require_once 'connectvars.php';
  $name = "";
  $genre = "";

  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    	$input_name = trim($_POST["hName"]);
    	$name = $input_name;

        $sql = "INSERT INTO Host (host_name, host_id) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_id);
            $param_name = $name;
            $param_id = NULL;
            
            if(mysqli_stmt_execute($stmt)){
                header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/success.php');
            } else{
                header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/fail.php');
                exit;
            }
        }
         
        mysqli_stmt_close($stmt);
    	}
    
    	mysqli_close($link);
  	}
  }
?>
