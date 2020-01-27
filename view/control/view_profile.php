<?php include('../../connect.php');

$search_uid = $_POST['uid'];

$result = $conn->query("SELECT * FROM users WHERE UID = '$search_uid'");
$row = $result->fetch_assoc();

include('../my_profile.php')
?>


