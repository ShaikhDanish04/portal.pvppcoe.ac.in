
<?php
include("connect.php");

$UID = $_SESSION["UID"];
if ($_SESSION['u_type'] == "student") {
    $result = $conn->query("SELECT * FROM users INNER JOIN student_academic_manager ON users.UID = student_academic_manager.UID 
                            WHERE users.UID = '$UID' OR student_academic_manager.student_id = '$UID'");
    $user = $result->fetch_assoc();
}
if ($_SESSION['u_type'] == "staff") {
    $result = $conn->query("SELECT * FROM users INNER JOIN staff_role_manager ON users.UID = staff_role_manager.UID 
                                WHERE users.UID = '$UID' OR staff_role_manager.staff_biometic = '$UID'");
    $user = $result->fetch_assoc();
}

if (isset($_POST['path_view']) && isset($_POST['page'])) {

    $paths_view = json_decode($_POST['path_view']);

    foreach ($paths_view as $path_x) {
        if (urlencode($_POST['page']) == urlencode($path_x)) {
            if (file_exists("view/" . $path_x . ".php")) {
                include("view/" . $path_x . ".php");
                $home_path = false;
            } else {
                // echo '<script>alert("This Feature will be next update")</script>';
                $home_path = false;
                include("view/upcomming_feature.php");
            }
            break;
        } else {
            $home_path = true;
            // include("view/upcomming_feature.php");
            // echo $path_x;
        }
    }
    if ($home_path) {
        include("view/my_profile.php");
    }
} else {
    include("view/my_profile.php");
}
