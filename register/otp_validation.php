<?php $addr_space = "";
include('../connect.php');

$u_email = $_POST['u_email'];
$otp = $_POST['u_otp'];


$result = $conn->query("SELECT expire_time,otp,u_email FROM otp_table WHERE u_email='$u_email'");
$row = $result->fetch_assoc();

if($otp == $row['otp'] && $u_email == $row['u_email']) {

    $now_stamp = date("Y-m-d H:i:s");

    if(new DateTime($row['expire_time']) < new DateTime($now_stamp)) {
        echo '<div class="alert alert-warning">OTP Expired !!! Try resend</div>';

    } else {

        echo '<div class="alert alert-success">OTP Verified !!! Proceed</div>';

        echo '<script>$(\'.otp_verification .w-100[href="#register_slider"]\').removeAttr("disabled")</script>';
        echo '<script>$(\'.otp_verification .w-100[href="#register_slider"]\').html("Next")</script>';

        if (!isset($_POST['u_resend_otp'])) {
            echo "<script>$('#register_slider').carousel('next')</script>";
        }
        echo '<script>$("#register_slider .progress-bar").css("width", "80%");</script>';
    }
} else {
    echo '<div class="alert alert-danger">Invalid OTP !!!</div>';
}