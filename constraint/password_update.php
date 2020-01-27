<?php

if (isset($_POST['update_password'])) {
    $current_password = $_POST['current_password'];
    $current_password = sha1($current_password);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password == $confirm_password) {
        
        $new_password = sha1($new_password);
        $result = $conn->query("SELECT `UID` FROM users WHERE `UID`= '$UID' AND u_password = '$current_password'");

        if ($result->num_rows == 1) {
            // output data of each row
            if ($conn->query("UPDATE users SET u_password='$new_password' WHERE `UID`='$UID'") === TRUE) {
                // $message = '<div class="alert alert-success alert-dismissible">Password Updated Successfully<button type="button" class="close py-2" data-dismiss="alert">&times;</button></div>';
                echo '<script>alert("Password Updated Successfully");window.location.href = "?logout=true"</script>';
            } else {
                $message = '<div class="alert alert-danger alert-dismissible">Error !!! Try again<button type="button" class="close py-2" data-dismiss="alert">&times;</button></div>';
            }
        } else {
            $message = '<div class="alert alert-danger alert-dismissible">Incorrect Password !!! Try again<button type="button" class="close py-2" data-dismiss="alert">&times;</button></div>';
        }
    } else {
        $message = '<div class="alert alert-warning alert-dismissible">Password Not Matched !!! Try again<button type="button" class="close py-2" data-dismiss="alert">&times;</button></div>';
    }
}


?>

<style>
    .toggle-password {
        position: relative;
    }

    .toggle-password .fa {
        font-size: 14px;
        position: absolute;
        top: 38px;
        right: 16px;
        color: #808080;
        cursor: pointer;
    }
</style>
<script>
    $(document).ready(function() {

        $('[name="new_password"]').on('focusout keyup', function() {
            var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
            if (regex.test($(this).val())) {
                $(this).removeClass('alert-danger border-danger');
                $(this).addClass('border-success');
            } else {
                $(this).addClass('alert-danger border-danger');
                $(this).removeClass('border-success');
            }
        })
        $('[name="confirm_password"]').on('focusout keyup', function() {
            if ($('[name="new_password"]').val() == $(this).val() && $(this).val() != "") {
                $(this).removeClass('alert-danger border-danger');
                $(this).addClass('border-success');
            } else {
                $(this).addClass('alert-danger border-danger');
                $(this).removeClass('border-success');
            }
        })
        $('.toggle-password .fa-eye-slash').click(function() {
            if ($(this).hasClass('fa-eye')) {
                $(this).removeClass('fa-eye');
                $(this).addClass('fa-eye-slash');
                $('.toggle-password input').attr('type', 'password');
            } else {
                $(this).removeClass('fa-eye-slash');
                $(this).addClass('fa-eye');
                $('.toggle-password input').attr('type', 'text');
            }
        })
    })
</script>