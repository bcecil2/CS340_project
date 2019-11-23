<?php
function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
header('Location: https://web.engr.oregonstate.edu/~cecilbl/update.php');
	require_once "connectvars.php";
	$newName = "";
	$id = 0;
	if(isset($_POST['submit'])){
		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$input_name = trim($_POST["hName"]);
			$newName = $input_name;
			$input_id = (int)trim($_POST["hid"]);
			$id = $input_id;

			$sql = "UPDATE Host SET host_name = \"$newName\" WHERE Host.host_id = $id";
			mysqli_query($link, $sql);
		}
	}
?>