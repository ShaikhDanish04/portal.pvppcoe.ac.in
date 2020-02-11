<?php $addr_space = "";
include('../connect.php'); ?>


<style>
    body {
        user-select: unset !important;
    }
</style>
<?php
// print_r($_POST);

$u_fname = $_POST['u_fname'];
$u_lname = $_POST['u_lname'];
$u_email = $_POST['u_email'];
$u_phone = $_POST['u_phone'];
$u_reg_pass = $_POST['u_reg_pass'];
$u_reg_pass = sha1($u_reg_pass);
$u_type = $_POST['u_type'];
$u_staff_auth = $_POST['u_staff_auth'];
$u_gender = $_POST['u_gender'];
$u_date_of_birth = $_POST['u_date_of_birth'];
$u_register_time = date("d/m/Y-H:i:s");

if (
    $u_lname == "" || $u_fname == "" ||
    $u_email == "" || $u_phone == "" ||
    $u_reg_pass == "" || $u_type == "" ||
    $u_gender == "" || $u_date_of_birth == ""
    // 0
) {
    echo '<div class="alert alert-warning">Something is missing !!! Please Check</div>';
} else {

    $result = $conn->query("SELECT u_email FROM users WHERE u_email = '$u_email'");
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-warning">Already registered !!! Try login</div>';
        echo '<script>$("#register_slider .progress-bar").css("width", "80%");</script>';
    } else {
        if ($u_type == "student") {


            $result = $conn->query("SELECT max(u_count) FROM users");
            $row = $result->fetch_assoc();
            $u_count =  $row['max(u_count)'] + 1;
            $u_uid_gen = "UR" . date("Y") . "D" . sprintf("%04d", $row['max(u_count)'] + 1);


            if ($conn->query("INSERT INTO users (u_count, UID, u_fname, u_lname, u_email, u_phone, u_password, u_gender, u_date_of_birth, u_type,u_register_time , u_access) 
                                VALUES ('$u_count', '$u_uid_gen', '$u_fname','$u_lname', 
                                        '$u_email', '$u_phone', '$u_reg_pass',
                                        '$u_gender', '$u_date_of_birth', '$u_type', '$u_register_time', '1')")) {
                echo '<div class="alert alert-success">Registeration Successfull !!! <a href="javascript:void(0)" class="alert-link" onclick="$("#login_slide").carousel(0)">login</a></div>';
                echo '<script>$("#register_slider .progress-bar").css("width", "100%");</script>';
            } else {
                echo '<div class="alert alert-warning">Network Issue !!! Check connection </div>';
                echo '<script>$("#register_slider .progress-bar").css("width", "80%");</script>';
            }

        }
        if ($u_type == "staff") {
            if ($u_staff_auth != "") {
                echo '<div class="alert alert-danger">Invalid Staff Auth Token</div>';
            }
        }
    }
    echo '<script>$(\'.personal_details .w-100[href="#register_slider"]\').html("register")</script>';
}

?>