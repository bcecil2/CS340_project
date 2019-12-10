<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/add.php');
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

        $input_num = trim($_POST["epnum"]);
        debug_to_console($input_num);
        if(empty($input_num)){
            $num_err = "Please enter a number.";
        } elseif(!filter_var($input_num, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9][0-9]*$/")))){
            $num_err = "Please enter a valid number.";
        } else{
            
            $epNum = (int)$input_num;
        }
        debug_to_console($epNum);
        //$epNum = (int)$input_num;
        

        $input_pname = trim($_POST["sel1"]);
        if(empty($input_pname)){
            $pname_err = "Please enter a name.";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $pname_err = "Please enter a valid name.";
        } else{
            $query = "SELECT Pname FROM Podcast WHERE Pname = \"$input_pname\"";
            $res = mysqli_query($link,$query);
            if(mysqli_num_rows($res) == 1){
                $pName = $input_pname;
            } else {
                $pname_err = "podcast must exist";
            }
        }
        

        if(empty($name_err) && empty($num_err) && empty($pname_err)){

        $sql = "INSERT INTO episode (ep_number, ep_title, Pname) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "iss", $param_num, $param_title, $param_name);
            

            $param_num = $epNum;
            $param_title = $epName;
            $param_name = $pName;

            if(mysqli_stmt_execute($stmt)){

            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         

        mysqli_stmt_close($stmt);
        }
    
        mysqli_close($link);
    }
  }
?>
