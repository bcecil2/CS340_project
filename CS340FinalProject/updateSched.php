<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
header('Location: https://web.engr.oregonstate.edu/~cecilbl/CS340FinalProject/update.php');
	require_once "connectvars.php";
	$newSched = "";
	$id = 0;
	if(isset($_POST['submit'])){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$input_name = trim($_POST["days"]);
			$newSched = $input_name;
			$input_id = (int)trim($_POST["schid"]);
			$id = $input_id;

			$sql = "UPDATE Schedule SET days = \"$newSched\" WHERE Schedule.sch_id = $id";
			mysqli_query($link, $sql);
		}
	}
?>