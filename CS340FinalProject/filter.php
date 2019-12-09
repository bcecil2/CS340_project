<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function isEmpty($i){
    return empty($i) && $i != 0;
}
//header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/browse.php');
function genQuery(){
  require_once 'connectvars.php';

  $usrCName = "";
  $usrRating = 0;
  $usrHID = 0;

  $argsA = array();
  $isActive = array();

  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input_c = trim($_POST["sel1"]);
        if(!empty($input_c)){
            $argsA[0] = trim($_POST["sel1"]);
            $isActive[0] = 1;
        }

        $input_n = trim($_POST["sel2"]);
        if(!empty($input_n)){
           $argsA[1] = (int) (split("-", ($_POST["sel2"]))[1]);
           $isActive[1] = 1;
        }




        $input_num = trim($_POST["pRating"]);
        //debug_to_console($input_num);
        if(empty($input_num)){
            $num_err = "Please enter a number.";
            $argsA[3] = -1;
        } elseif(!filter_var($input_num, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[1-9][0-9]*$/")))){
            $num_err = "Please enter a valid number.";
        } else{
            $argsA[2] = (int)$input_num;
            $isActive[2] = 1;
        }


        $input_g = trim($_POST["sel3"]);
        if(!empty($input_g)){
           $argsA[3] = (int) (split("-", ($_POST["sel3"]))[1]);
           $isActive[3] = 1;
        }

        $stmt = "";
        // Prepare an insert statement
        $filterCategory = "(SELECT Pname FROM Podcast WHERE Gtype = ?)";
        $filterHost = "(SELECT Pname FROM Hosts WHERE Hosts.host_id = ?)";
        $filterRating = "(SELECT Pname FROM Podcast WHERE rating >= ?)";
        $filterGuest = "(SELECT Pname FROM episode, features WHERE Guest_id = ? AND episode.ep_title = features.ep_title)";
        if($isActive[0]){
            $stmt = $filterCategory;
            $stmt = str_replace('?',"\"$argsA[0]\"", $stmt);
        }
        if($isActive[1]){
            if(!empty($stmt)){
                $stmt .= " INTERSECT " . $filterHost;
                $stmt = str_replace('?', $argsA[1], $stmt);
            }else{
                $stmt = $filterHost;
                $stmt = str_replace('?', $argsA[1], $stmt);
            }
        }
        if($isActive[2]){
            if(!empty($stmt)){
                $stmt .= " INTERSECT " . $filterRating;
                $stmt = str_replace('?', $argsA[2], $stmt);
            }else{
                $stmt = $filterRating;
                $stmt = str_replace('?', $argsA[2], $stmt);
            }
        }
        if($isActive[3]){
            if(!empty($stmt)){
                $stmt .= " INTERSECT " . $filterGuest;
                $stmt = str_replace('?', $argsA[3], $stmt);
            }else{
                $stmt = $filterGuest;
                $stmt = str_replace('?', $argsA[3], $stmt);
            }
        }
        //print_r($stmt);
        return $stmt;
  }
  }
}

//genQuery();
?>
