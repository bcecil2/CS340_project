<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/update.php');
	require_once "connectvars.php";
	$newName = "";
	$id = 0;
	if(isset($_POST['submit'])){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$input_name = trim($_POST["gName"]);
			$newName = $input_name;
			$input_id = (int)trim($_POST["gid"]);
			$id = $input_id;

			if($_POST["sel1"] != "--None--" && $_POST["sel2"] != "--None--"){
				$input_guest_id = (int) (split("-", ($_POST["sel1"]))[1]);
				$input_ep_name = trim($_POST["sel2"]);
				$features = "INSERT INTO features (ep_title, Guest_id) VALUES (\"$input_ep_name\", $input_guest_id)";
				mysqli_query($link, $features);
			}

			$sql = "UPDATE Guest SET Guest_name = \"$newName\" WHERE Guest.Guest_id = $id";
			mysqli_query($link, $sql);
		}
	}
?>