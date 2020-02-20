<?php
include('../../../connect.php');



if($_POST['operation'] = "create_admission_form") {
    $UID = $_POST['UID'];
    if($conn->query("INSERT INTO student_data_regsiter (`UID`) VALUES ('$UID');")) {
        echo '<script>$(".modal").modal("hide")</script>';
    }


}
?>

