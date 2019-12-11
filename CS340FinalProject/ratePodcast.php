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

        $input_name = trim($_POST["sel1"]);
        $pName = $input_name;


        $input_num = trim($_POST["rating"]);
        $usrRating = (int)$input_num;

        $sql = "CALL updateRating(?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "is", $param_num, $param_name);
            $param_num = $usrRating;
            $param_name = $pName;
            if(mysqli_stmt_execute($stmt)){
                header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/success.php');
            } else{
                header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/fail.php');
                exit;
            }
        mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    }
  }
?>
