<?php $addr_space = "";
include('../connect.php'); 

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


if (isset($_POST['otp_email_set'])) {
    $resend_otp = 0;

    if (isset($_POST['u_resend_otp'])) {
        $resend_otp = $_POST['u_resend_otp'];
    }
    $u_UID = $_POST['UID'];
    $u_fname = $_POST['u_fname'];
    $u_lname = $_POST['u_lname'];
    $u_email = $_POST['otp_email'];

    $result = $conn->query("SELECT u_email FROM users WHERE u_email = '$u_email' AND u_usage != '0'");
    if ($result->num_rows > 0) {
        echo '<div class="alert alert-warning">Email is already verified !!! Contact Admin</div>';
        echo '<script>$(\'.otp_email .submit\').html("Send OTP")</script>';
        echo '<script>$(\'.otp_email .submit\').removeAttr("disabled")</script>';
    } else {
        $expire_stamp = date('Y-m-d H:i:s', strtotime("+5 min"));
        $OTP = new_OTP();

        $result = $conn->query("SELECT `UID`,u_email,expire_time FROM user_otp WHERE u_email='$u_email'");
        $row = $result->fetch_assoc();
        if ($result->num_rows != 0) {

            $now_stamp = date("Y-m-d H:i:s");

            if (new DateTime($row['expire_time']) < new DateTime($now_stamp) || $resend_otp == 1) {
                $mail->addAddress($u_email, $u_fname . " " . $u_lname);
                $mail->Subject = 'PVPP Portal Registeration';
                $mail->msgHTML("The OTP is $OTP and Expire time is $expire_stamp.");
                if ($mail->send()) {
                    echo '<div class="alert alert-success">OTP is resent !!! <a class="alert-link text-success" href="#email_verification" data-slide-to="1">Enter OTP</a></div>';
                    $conn->query("UPDATE user_otp SET u_otp = '$OTP',expire_time = '$expire_stamp' WHERE u_email = '$u_email'");
                    // echo 'OTP Expire - RESENT';
                } else {
                    echo '<div class="alert alert-danger">Connection Error !!! Try Again</div>';
                    echo '<script>$(\'.otp_email .submit\').html("Send OTP")</script>';
                    echo '<script>$(\'.otp_email .submit\').removeAttr("disabled")</script>';
                }
            } else {
                echo '<div class="alert alert-success">OTP is sent !!! <a class="alert-link text-success" href="#email_verification" data-slide-to="1">Enter OTP</a></div>';
                echo '<script>$(\'.otp_email .submit\').html("OTP Sent")</script>';
                // echo 'OTP Alive';
            }
        } else {
            
            $mail->addAddress($u_email, $u_fname . " " . $u_lname);
            $mail->Subject = 'PVPP Portal Registeration';
            $mail->msgHTML("The OTP is $OTP and Expire time is $expire_stamp.");
            if ($mail->send()) {
                echo '<div class="alert alert-success">OTP is sent !!! <a class="alert-link text-success" href="#email_verification" data-slide-to="1">Enter OTP</a></div>';
                $conn->query("INSERT INTO user_otp (`UID`,u_email, u_otp, expire_time) VALUES ('$u_UID','$u_email', '$OTP', '$expire_stamp')");
                // echo 'OTP SENT';
            } else {
                echo '<div class="alert alert-danger">Connection Error !!! Try Again</div>';
                echo '<script>$(\'.otp_email .submit\').html("OTP Sent")</script>';
                echo '<script>$(\'.otp_email .submit\').removeAttr("disabled")</script>';
            }
        }

        // echo "<br>";
        // echo "Right now: " . $now_stamp;
        // echo "<br>";
        // echo "Expire Time " . $row['expire_time'];
        // echo "<br>";
        // echo "OTP " . $OTP;
        // echo "<br>";

        echo '<script>$(\'.otp_email .submit\').html("Send OTP")</script>';
        echo '<script>$(".resend_OTP").removeClass("disabled")</script>';
        echo '<script>$(".resend_OTP").html("Resend OTP")</script>';
        if (!isset($_POST['u_resend_otp'])) {
            echo "<script>$('#email_verification').carousel(1)</script>";
        }
    }
}


if (isset($_POST['otp_verification_set'])) {

    $u_email = $_POST['otp_email'];
    $otp = $_POST['u_otp'];
    $UID = $_POST['UID'];

    $result = $conn->query("SELECT * FROM user_otp WHERE u_email='$u_email'");
    $row = $result->fetch_assoc();

    if ($otp == $row['u_otp'] && $u_email == $row['u_email']) {

        $now_stamp = date("Y-m-d H:i:s");

        if (new DateTime($row['expire_time']) < new DateTime($now_stamp)) {
            echo '<div class="alert alert-warning">OTP Expired !!! Try resend</div>';
            echo '<script>$(\'.otp_verification .submit\').removeAttr("disabled")</script>';
            echo '<script>$(\'.otp_verification .submit\').html("Verify")</script>';
        } else {

            echo '<div class="alert alert-success">OTP Verified !!! <a href="" class="alert-link"> Refresh Page </a></div>';
            echo '<script>$(\'.otp_verification .submit\').html("Refresh")</script>';
            echo '<script>$(\'#email_verification .btn\').attr("disabled","true")</script>';
            $conn->query("UPDATE users SET u_email='$u_email', u_usage='1' WHERE `UID`='$UID'");

        }
    } else {
        echo '<div class="alert alert-danger">Invalid OTP !!!</div>';
        echo '<script>$(\'.otp_verification .submit\').removeAttr("disabled")</script>';
        echo '<script>$(\'.otp_verification .submit\').html("Verify")</script>';
    }
}
