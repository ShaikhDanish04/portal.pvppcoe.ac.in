<?php $addr_space = "";
include('../connect.php'); ?>

<?php

function new_OTP()
{
    $characters = '0123456789';
    $randomString = '';

    for ($i = 0; $i < 6; $i++) {
        $index = rand(1, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

$resend_otp = 0;
$u_fname = $_POST['u_fname'];
$u_lname = $_POST['u_lname'];
$u_email = $_POST['u_email'];

if (isset($_POST['u_resend_otp'])) {
    $resend_otp = $_POST['u_resend_otp'];
}


$result = $conn->query("SELECT u_email FROM users WHERE u_email = '$u_email'");

if ($result->num_rows > 0) {
    echo '<div class="alert alert-warning">Already registered !!! Try login</div>';
} else {
    $expire_stamp = date('Y-m-d H:i:s', strtotime("+5 min"));
    $OTP = new_OTP();

    $result = $conn->query("SELECT u_email,expire_time FROM otp_table WHERE u_email='$u_email'");
    $row = $result->fetch_assoc();
    if ($result->num_rows != 0) {

        $now_stamp = date("Y-m-d H:i:s");

        if (new DateTime($row['expire_time']) < new DateTime($now_stamp) || $resend_otp == 1) {
            $mail->addAddress($u_email, $u_fname . " " . $u_lname);
            $mail->Subject = 'PVPP Portal Registeration';
            $mail->msgHTML("The OTP is $OTP and Expire time is $expire_stamp.");
            if ($mail->send()) {
                echo '<div class="alert alert-success">OTP is resent !!! <a class="alert-link text-success" href="#register_slider" data-slide="next">Enter OTP</a></div>';
                $conn->query("UPDATE otp_table SET otp = '$OTP',expire_time = '$expire_stamp' WHERE u_email = '$u_email'");
                // echo 'OTP Expire - RESENT';
            } else {
                echo '<div class="alert alert-danger">Connection Error !!! Try Again</div>';
            }
        } else {
            echo '<div class="alert alert-success">OTP is sent !!! <a class="alert-link text-success" href="#register_slider" data-slide="next">Enter OTP</a></div>';
            // echo 'OTP Alive';
        }
    } else {

        $mail->addAddress($u_email, $u_fname . " " . $u_lname);
        $mail->Subject = 'PVPP Portal Registeration';
        $mail->msgHTML("The OTP is $OTP and Expire time is $expire_stamp.");
        if ($mail->send()) {
            echo '<div class="alert alert-success">OTP is sent !!! <a class="alert-link text-success" href="#register_slider" data-slide="next">Enter OTP</a></div>';
            $conn->query("INSERT INTO otp_table (u_email, otp, expire_time) VALUES ('$u_email', '$OTP', '$expire_stamp')");
            // echo 'OTP SENT';
        } else {
            echo '<div class="alert alert-danger">Connection Error !!! Try Again</div>';
        }
    }

    // echo "<br>";
    // echo "Right now: " . $now_stamp;
    // echo "<br>";
    // echo "Expire Time " . $row['expire_time'];
    // echo "<br>";


    echo '<script>$(\'.reg_details .w-100[href="#register_slider"]\').removeAttr("disabled")</script>';
    echo '<script>$(\'.reg_details .w-100[href="#register_slider"]\').html("Next")</script>';
    echo '<script>$(".resend_OTP").removeClass("disabled")</script>';
    echo '<script>$(".resend_OTP").html("Resend OTP")</script>';
    if (!isset($_POST['u_resend_otp'])) {
        echo "<script>$('#register_slider').carousel('next')</script>";
    }
    echo '<script>$("#register_slider .progress-bar").css("width", "40%");</script>';
}
?>