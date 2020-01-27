<?php

$result = $conn->query("SELECT * FROM users");

// $count_admin = 0;
// $count_pending = 0;
// $count_users = 0;
// while ($row = $result->fetch_assoc()) {
//     if ($row['admin_access'] == "1") {
//         $count_admin++;
//     }
//     if ($row['u_access'] == "0") {
//         $count_pending++;
//     }
//     if ($row['UID'] != "") {
//         $count_users++;
//     }
// }
// $result->data_seek(0);

// $GLOBALS['urow'] = $row;

// if (!isset($_GET['UID'])) {
//     $_GET['UID'] = $_SESSION["UID"];
// }

// $self = false;
// if ($_GET['UID'] == $_SESSION["UID"]) {
//     $self = true;
// }

// while ($row = $result->fetch_assoc()) {
//     if ($_GET['UID'] == $row['UID'])
//         $GLOBALS['urow'] = $row;
// }
?>
<!-- Nav pills -->
<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="pill" href="#all_users">All Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="pill" href="#staff_role_management">Staff Role Management</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" data-toggle="pill" href="#user_profile">User Profile</a>
            </li>
        </ul>
    </div>
</div>

<div class="tab-content">
    <div class="tab-pane active" id="all_users"><?php include('user_control.php'); ?></div>
    <div class="tab-pane fade" id="staff_role_management"><?php //include('staff_role_management.php'); ?></div>
    <div class="tab-pane fade" id="user_profile"></div>
</div>

<script>

    let url = location.href;

    if (location.hash) {
        const hash = url.split("#");

        $('.nav a[href="#' + hash[1] + '"]').tab("show");

        // url = location.href.replace(/\/#/, "#");
        // $('[href="' + hash + '"]').addClass('active');

        history.replaceState(null, null, url);
    }


    let hash;
    $('[data-toggle="tab"],[data-toggle="pill"]').on("click", function() {
        let newUrl;

        hash = $(this).attr("href");
        $('a.nav-link.active').removeClass('active');
        // $('a[href="' + hash + '"]').removeClass('active');

        $('[type=button]').removeClass('active');

        // console.log(hash);

        newUrl = url.split("#")[0] + hash;

        // newUrl += "/";

        history.replaceState(null, null, newUrl);
    });

    $('[type=button]').click(function() {
        $('a[href="' + hash + '"]').addClass('active');
    });
</script>

<style>
    .table {
        width: 100% !important;
        display: block;
        overflow: hidden;
        transition: .5s;
    }
</style>
<!-- Tab panes -->