<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <?php $addr_space = "";
    include("head.php") ?>

    <?php


    // if (!isset($_COOKIE[$cookie_name])) {
    //     echo "Cookie named '" . $cookie_name . "' is not set!";
    // } else {
    //     echo "Cookie '" . $cookie_name . "' is set!<br>";
    //     echo "Value is: " . $_COOKIE[$cookie_name];
    // }

    // $UID = 'UR2020D0002';
    // $UID = sha1($UID);
    // if (isset($_POST['login'])) {
    //     if (!empty($_POST['signed_in'])) {
    //         setcookie("u_uid", $UID, time() + (86400 * 30), "/"); // 86400 = 1 day
    //     }
    // }
    // setcookie("u_uid", "", time() + (86400 * 30), "/"); // 86400 = 1 day


    ?>

    <?php
    if (isset($_SESSION["UID"])) {
        header('Location: panel');
    } else if (isset($_COOKIE['cK123']) && isset($_COOKIE['cKsd'])) {
        $UID = $_COOKIE['cK123'];
        $pass = $_COOKIE['cKsd'];
        $result = $conn->query("SELECT `UID`,u_type FROM users WHERE `UID` = '$UID' AND u_password='$pass'");

        if ($row = $result->fetch_assoc()) {

            $login_response = '<div class="alert alert-success">Validation Sucessfull !!!</div>';

            $_SESSION["UID"] = $row["UID"];
            $_SESSION["u_type"] = $row["u_type"];

            if (!empty($_POST['signed_in'])) {
                setcookie("cK123", $_SESSION["UID"], time() + (10 * 365 * 24 * 60 * 60)); // 86400 = 1 day
                setcookie("cKsd", $pass, time() + (10 * 365 * 24 * 60 * 60)); // 86400 = 1 day
            }

            echo '<script>location.href = "panel"</script>';
        } else {
            $login_response = '<div class="alert alert-danger">Incorrect Password !!! Try Again</div>';
        }
    }

    // setcookie("cK", "Its good", time() + (10 * 365 * 24 * 60 * 60)); // 86400 = 1 day
    // print_r($_COOKIE);
    ?>
    <?php
    $login_response = "";
    if (isset($_POST['login_submit'])) {

        $login_id = $_POST["login_id"];
        $pass = $_POST["u_pass"];
        $pass = sha1($pass);

        $result = $conn->query("SELECT users.UID FROM users INNER JOIN staff_role_manager ON users.UID = staff_role_manager.UID 
                                WHERE users.UID = '$login_id' OR staff_role_manager.staff_biometic = '$login_id'");
        $row = $result->fetch_assoc();
        // print_r($row);

        if ($result->num_rows == 0) {
            $no_found = 1;

            $result = $conn->query("SELECT users.UID FROM users INNER JOIN student_academic_manager ON users.UID = student_academic_manager.UID 
                            WHERE users.UID = '$login_id' OR student_academic_manager.student_id = '$login_id'");
            $row = $result->fetch_assoc();
            // print_r($row);
            if ($result->num_rows == 0) {
                $no_found = 1;
            } else {
                $no_found = 0;
            }
        } else {
            $no_found = 0;
        }

        if ($no_found) {
            $login_response = '<div class="alert alert-warning">No Such Account found !!!</div>';
        } else {

            $UID = $row['UID'];
            $result = $conn->query("SELECT `UID`,u_type FROM users WHERE `UID` = '$UID' AND u_password='$pass'");

            if ($row = $result->fetch_assoc()) {

                $login_response = '<div class="alert alert-success">Validation Sucessfull !!!</div>';

                $_SESSION["UID"] = $row["UID"];
                $_SESSION["u_type"] = $row["u_type"];

                if (!empty($_POST['signed_in'])) {
                    setcookie("cK123", $_SESSION["UID"], time() + (10 * 365 * 24 * 60 * 60)); // 86400 = 1 day
                    setcookie("cKsd", $pass, time() + (10 * 365 * 24 * 60 * 60)); // 86400 = 1 day
                }

                echo '<script>location.href = "panel"</script>';
            } else {
                $login_response = '<div class="alert alert-danger">Incorrect Password !!! Try Again</div>';
            }
        }
    }
    ?>


    <style>
        body {
            background: #f5f5f5;
            font-size: 12px;
            overflow: unset;
        }

        .login-body {
            max-width: 400px;
            margin: 15px auto;
            padding: 8px;
            padding-top: 15px;
        }

        .toggle-password {
            position: relative;
        }

        .toggle-password .fa {
            font-size: 14px;
            position: absolute;
            top: 36px;
            right: 16px;
            color: #808080;
            cursor: pointer;
        }

        .footer {
            position: static;
            margin: unset;
        }
    </style>
    <script>
        $(document).ready(function() {
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

            $('#login_slide').css('min-height', 'calc(100vh - ' + $('.footer').height() + 'px - 20px)');
        })

        $(window).resize(function() {
            $('#login_slide').css('min-height', 'calc(100vh - ' + $('.footer').height() + 'px - 20px)');
        })

        $(document).keyup(function() {
            // console.log($(this));
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>



</head>


<body>
    <div id="login_slide" class="carousel slide" data-touch="false" data-ride="carousel" data-interval="false">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="login-body">
                    <form class="login_input" action="" method="post">
                        <p class="h2 text-center mb-3 font-weight-light"><img src="assets/img/college_logo.png" alt="" width="50px"> Login in to Portal</p>
                        <div class="px-sm-3"><?php echo $login_response ?></div>
                        <div class="card my-3">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Institite ID or Email</label>
                                    <input type="text" class="form-control" name="login_id" autocomplete="on">
                                </div>
                                <!-- <div class="form-group toggle-password mb-0">
                                    <label for="u_pass">Password</label>
                                    <input type="password" class="form-control" name="u_pass" id="u_pass" autocomplete="on">
                                    <i class="fa fa-eye-slash"></i>
                                </div> -->
                                <!-- <div class="form-check form-group">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="signed_in" id="" value="signed_in">
                                        Keep me signed in.
                                    </label>
                                </div> -->
                                <div class="form-group m-0">
                                    <input type="submit" class="btn btn-success w-100" name="login_submit" value="login">
                                    <label for="" class="my-1"><a href="javascript:void(0)">Forgot Password?</a></label>
                                </div>
                            </div>
                            <div class="card-footer">
                                <p class="text-center m-0">Register? <a href="javascript:void(0)" onclick="$('#login_slide').carousel(1)">Create New Account</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="carousel-item">
                <?php include('register/register.php') ?>
            </div>
        </div>
    </div>
    <div class="footer flex-column-reverse flex-sm-row-reverse">
        <p>© PVPP College of Engineering</p>
        <p><b>Developed By</b> - <a href="javascript:0" class="text-white">Danish Shaikh and Team</a></p>
    </div>
</body>


<?php $addr_space = "";
include("foot.php") ?>

</html>