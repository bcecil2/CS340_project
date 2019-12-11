<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
//header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/add.php');
  require_once 'connectvars.php';
  $pName = "";
  $days = "";

  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input_name = $_POST["sel1"];
        $pName = $_POST["sel1"];        }
        
        
        $input_days = trim($_POST["days"]);
        $days = $input_days;
        

        $sql = "INSERT INTO Schedule (days, sch_id, pname) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sis", $param_days, $param_id, $param_name);
            $param_days = $days;
            $param_id = NULL;
            $param_name = $pName;
            if(mysqli_stmt_execute($stmt)){
              header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/success.php');  
            } else{
                header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/fail.php');
                exit;
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($link);
    }
  }
?>
