<?php
//header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/add.php');
  require_once 'connectvars.php';
  $name = "";
  $genre = "";

  if(isset($_POST['submit'])){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    	$input_name = trim($_POST["pName"]);
       	$name = $input_name;
    
    	$input_genre = trim($_POST["gtype"]);
        $genre = $input_genre;
    
   
        $sql = "INSERT INTO Podcast (Pname, Rating, Gtype) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_rating, $param_genre);
            
            $param_name = $name;
            $param_rating = NULL;
            $param_genre = $genre;
            
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
