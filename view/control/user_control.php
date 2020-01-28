<?php
$result = $conn->query("SELECT * FROM users");

$count_admin = 0;
$count_pending = 0;
$count_users = 0;
while ($users = $result->fetch_assoc()) {
    if ($users['u_admin'] == "1") {
        $count_admin++;
    }
    if ($users['u_usage'] == "0") {
        $count_pending++;
    }
    if ($users['UID'] != "") {
        $count_users++;
    }
}

if (!isset($_GET['UID'])) {
    $_GET['UID'] = $_SESSION["UID"];
}

$self = false;
if ($_GET['UID'] == $_SESSION["UID"]) {
    $self = true;
}
$selected_UID = $_GET['UID'];

?>
<style>
    .user-select {
        cursor: pointer;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-4 p-0">
            <div class="head-card bg-success-gradient">
                <div>
                    <span class="count"><?php echo $count_users ?></span>
                    <p>User Accounts</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 p-0">
            <div class="head-card bg-warning-gradient">
                <div>
                    <span class="count"><?php echo $count_pending ?></span>
                    <p>Pending Request</p>
                </div>

            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-4 p-0">
            <div class="head-card bg-danger-gradient">
                <div>
                    <span class="count"><?php echo $count_admin ?></span>
                    <p>Admin Access</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-md-row-reverse">
        <div class="col-md-4 p-0">

            <div class="card">
                <div class="card-head d-flex align-items-center">
                    <img class="reg-user-img" src="" alt="">
                    <?php
                    $selected_result = $conn->query("SELECT * FROM users WHERE `UID`='$selected_UID'");
                    $select_user = $selected_result->fetch_assoc();
                    // print_r($select_user);
                    ?>
                    <div class="d-block">
                        <p><?php echo $select_user['u_name'] ?></p>
                        <h4 class="text-success m-0"><?php echo $select_user['u_surname'] ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <?php $u_register = new DateTime($select_user['u_register']); ?>
                    <p class="card-text my-2"><b>UID : </b><?php echo $select_user['UID'] ?></p>
                    <p class="card-text my-1"><b>Email : </b><?php echo $select_user['u_email'] ?></p>
                    <p class="card-text my-1"><b>Phone : </b><?php echo $select_user['u_phone'] ?></p>
                    <p class="card-text my-1"><b>Registered : </b><?php echo $u_register->format('d-M-Y') ?></p>
                    <div class="divider"></div>
                    <p class="card-text my-1 text-capitalize"><b>Admin Access : </b><?php echo $select_user['u_admin'] ? "Yes" : "No"; ?></p>
                    <p class="card-text my-1"><b>Usage Access : </b><?php echo $select_user['u_usage'] ? "Granted" : "Pending"; ?></p>

                    <p class="text-center my-2"><input type="button" data-toggle="tab" tabindex="-1" href="#user_profile" class="btn btn-info btn-sm br-5rem px-5" value="View Profile" <?php //echo ($self) ? "disabled" : "" ?>></p>
                </div>
                <script>
                    $('[href="#user_profile"]').click(function() {
                        $.post("view/control/view_profile.php", {
                                uid: $('[name="current_UID"]').val()
                            },
                            function(data, status) {
                                $('#user_profile').html(data);
                            });
                    });
                </script>
                <div class="card-footer">
                    <form action="" method="post">
                        <input type="hidden" name="current_UID" value="<?php echo $select_user['UID'] ?>">
                        <div class="form-group">
                            <label for="">Usage Access</label>
                            <select class="form-control text-capitalize" name="u_usage" required>
                                <?php
                                if ($select_user['u_usage'] == 0) {
                                    echo '<option value="0"> Pending</option>';
                                }
                                echo '<option value="1">Granted</option>';
                                echo '<option value="0">Pending</option>';
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Admin Access</label>
                            <select class="form-control text-capitalize" name="u_admin" required>
                                <?php
                                if ($select_user['u_admin'] == 0) {
                                    echo '<option value="0"> No</option>';
                                }
                                echo '<option value="1">Yes</option>';
                                echo '<option value="0">No</option>';
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update_profile_usage_all" class="btn btn-success form-control" value="Submit" <?php echo ($self) ? "disabled" : "" ?>>
                        </div>
                    </form>
                    <?php

                    if (isset($_POST['update_profile_usage_all'])) {

                        $uid = $_POST['current_UID'];
                        $u_usage = $_POST['u_usage'];
                        $u_admin = $_POST['u_admin'];

                        $conn->query("UPDATE users 
                        SET 
                            u_admin = '$u_admin',
                            u_usage = '$u_usage'
                        WHERE UID = '$uid'");

                        echo '<script>location.reload()</script>';
                    }

                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-8 p-0">
            <div class="card">
                <div class="card-head">
                    <p><i class="fa fa-database"></i> List of Registered User Accounts</p>
                </div>
                <div class="card-body">
                    <div class="table">

                        <form action="" method="post">
                            <table id="reg_table" class="table display border-light mb-3">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>UID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date & Time</th>
                                        <th>User Type</th>
                                        <th>Admin Access</th>
                                        <th>Usage Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result->data_seek(0);
                                    while ($users = $result->fetch_assoc()) {
                                        echo "<tr class='user-select' data-id='" . $users['UID'] . "'>";
                                        echo "<td>" . $users['u_count'] . "</td>";
                                        echo "<td><a href=''>" . $users['UID'] . "</a></td>";
                                        echo "<td class='text-uppercase'>" . $users['u_name'] . "</td>";
                                        echo "<td class='text-uppercase'>" . $users['u_surname'] . "</td>";
                                        echo "<td>" . $users['u_email'] . "</td>";
                                        echo "<td>" . $users['u_phone'] . "</td>";
                                        echo "<td>" . $users['u_register'] . "</td>";
                                        echo "<td class='text-capitalize'>" . $users['u_type'] . "</td>";
                                        echo $users['u_admin'] == 1 ? "<td class='alert-warning'> Yes </td>" : "<td class='alert-success'> No</td>";
                                        echo $users['u_usage'] == 1 ? "<td class='alert-success'> Granted </td>" : "<td class='alert-warning'> Pending</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>UID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>User Type</th>
                                        <th>Date & Time</th>
                                        <th>Admin Access</th>
                                        <th>Usage Access</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // $('.user-select').dblclick(function() {
        //     get_data = "";
        //     get_data += "&UID=" + $(this).attr('data-id');


        //     hash = location.hash;

        //     var uri = window.location.toString();
        //     if (uri.indexOf("&") > 0) {
        //         var clean_uri = uri.substring(0, uri.indexOf("&"));

        //         window.history.replaceState({}, document.title, clean_uri);
        //     }

        //     window.location.href = window.location.href + get_data + hash;
        // })

        $('.user-select a').click(function(e) {
            e.preventDefault();
            hash = location.hash;
            get_data = "";
            get_data += "&UID=" + $($(this).closest('.user-select')).attr('data-id');

            var uri = window.location.toString();
            if (uri.indexOf("&") > 0) {
                var clean_uri = uri.substring(0, uri.indexOf("&"));

                window.history.replaceState({}, document.title, clean_uri);
            }
            
            window.location.href = window.location.href.split('#')[0] + get_data + hash;
        })

        $('#reg_table').DataTable({
            dom: 'Bfrtip',
            // "scrollX": true,
            lengthMenu: [
                [10, 25, 50, -1],
                ['10 rows', '25 rows', '50 rows', 'Show all']
            ],
            buttons: [{
                    extend: 'copyHtml5',
                    title: 'registeration_table',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    title: 'registeration_table',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: 'registeration_table',
                    exportOptions: {
                        columns: [0, 1, 2, 5]
                    }
                },
                {
                    extend: 'colvisGroup',
                    text: 'Default',
                    className: 'btn btn-primary',
                    show: [0],
                    hide: [7, 9]
                },
                {
                    extend: 'colvisGroup',
                    text: 'Show all',
                    show: ':hidden'
                },
                'pageLength',
                'colvis'
            ],
            columnDefs: [{
                "targets": [6, 8],
                "visible": false
            }],
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });
    });
</script>