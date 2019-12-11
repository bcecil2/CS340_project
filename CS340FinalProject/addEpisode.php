<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
  require_once 'connectvars.php';
  $epName = "";
  $epNum = 0;
  $pName = "";

  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input_name = trim($_POST["eName"]);
        $epName = $input_name;

        $input_num = trim($_POST["epnum"]);
        $epNum = (int)$input_num;
        
        $input_pname = trim($_POST["sel1"]);
        $pName = $input_pname;

        $sql = "INSERT INTO episode (ep_number, ep_title, Pname) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "iss", $param_num, $param_title, $param_name);
            $param_num = $epNum;
            $param_title = $epName;
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
