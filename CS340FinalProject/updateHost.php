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

			if($_POST["sel1"] != "--None--" && $_POST["sel2"] != "--None--"){
				$input_host_id = (int) (split("-", ($_POST["sel1"]))[1]);
				$input_podcast_name = trim($_POST["sel2"]);
				debug_to_console($input_host_name);
				debug_to_console($input_podcast_name);
				$hosts = "INSERT INTO Hosts (Pname, host_id) VALUES (\"$input_podcast_name\", $input_host_id)";
				mysqli_query($link, $hosts);
			}
			
			$sql = "UPDATE Host SET host_name = \"$newName\" WHERE Host.host_id = $id";
			mysqli_query($link, $sql);

		}
	}
?>