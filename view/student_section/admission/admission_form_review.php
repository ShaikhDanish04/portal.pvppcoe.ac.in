<div class="container">


    <?php
    include('../../../connect.php');

    // if (isset($_POST['student_verification'])) {
    //     // print_r($_POST);
    //     $u_uid = $_POST['user_uid_form'];
    //     $admission_form_status = $_POST['admission_form_status'];
    //     $verification_response = $_POST['verification_response'];


    //     $data_array = array(
    //         "admission_form_edit" => intval($_POST['admission_form_edit']),
    //         "admission_form_status" => $_POST['admission_form_status'],
    //         "verification_response" => $_POST['verification_response'],
    //     );
    //     $data = json_encode($data_array);
    //     $conn->query("UPDATE `admission_table` SET `admission_form` = '$data' WHERE `UID` = '$u_uid'");

    //     echo "<div class='alert alert-success'>Submitted Successfully</div>";
    // }

    if (isset($_POST['user_uid_form']) && !isset($_POST['student_verification'])) {
        $selected_UID = $_POST['user_uid_form'];
        $addr_space = "";
        // echo $selected_UID;
        include("../../admission/admission_form_review.php");
        // include("../../student_section/admission/admission_form_verification.php");
    }
    if (isset($_POST['user_uid_doc'])) {
        print_r($_POST);
    }

    // if (isset($_POST['mass_operation'])) {

    //     $student_list = $_POST['student_list'];

    //     for ($i = 0; $i < count($student_list); $i++) {

    //         $data_array = array(
    //             "admission_form_edit" => intval("0"),
    //             "admission_form_status" => "verified",
    //             "verification_response" => "",
    //         );
    //         $data = json_encode($data_array);
    //         $u_uid = $student_list[$i];
    //         $conn->query("UPDATE `admission_table` SET `admission_form` = '$data' WHERE `UID` = '$u_uid'");

    //         echo $student_list[$i];
    //     }
    //     // print_r($_POST['student_list']);
    // }
    ?>

</div>