<?php
// define('DEBUG', false);
// error_reporting(E_ALL);

// if (DEBUG) {
//     ini_set('display_errors', 'On');
// } else {
//     ini_set('display_errors', 'Off');
// }
// $sql = "SELECT user_registered.*,user_base_profile.*
//             FROM user_registered INNER JOIN user_base_profile ON user_registered.UID=user_base_profile.UID";


// print_r($GLOBALS['urow']['UID']);
// print_r($urow);
// print_r($urow);
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
            <div class="head-card bg-danger-gradient" onclick="setQView('payment.view')">
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
                    <div class="d-block">
                        <p><?php //echo $urow['u_fname'] ?></p>
                        <h4 class="text-success m-0"><?php //echo $urow['u_lname'] ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <?php ///$u_date_of_birth = new DateTime($urow['u_date_of_birth']); ?>
                    <p class="card-text my-2"><b>UID : </b><?php //echo $urow['UID'] ?></p>
                    <p class="card-text my-1"><b>Email : </b><?php //echo $urow['u_email'] ?></p>
                    <p class="card-text my-1"><b>Phone : </b><?php //echo $urow['u_phone'] ?></p>
                    <p class="card-text my-1"><b>Gender : </b><?php //echo $urow['u_gender'] ?></p>
                    <p class="card-text my-1"><b>Date of Birth : </b><?php //echo $u_date_of_birth->format('d-M-Y') ?></p>
                    <p class="card-text my-1"><b>Nationality : </b></p>
                    <p class="card-text my-1"><b>Address : </b></p>
                    <div class="divider"></div>
                    <p class="card-text my-1 text-capitalize"><b>User Type : </b><?php //echo $urow['u_type'] ?></p>
                    <p class="card-text my-1"><b>Usage Access : </b><?php //echo $urow['u_access'] ? "Granted" : "Pending"; ?></p>

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
                        <input type="hidden" name="current_UID" value="<?php //echo $urow['UID'] ?>">
                        <div class="form-group">
                            <label for="">Usage Access</label>
                            <select class="form-control text-capitalize" name="u_access" required>
                                <?php
                                // if ($urow['u_access'] == 0) {
                                //     echo '<option value="0"> Pending</option>';
                                // }
                                // echo '<option value="1">Granted</option>';
                                // echo '<option value="0">Pending</option>';

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Admin Access</label>
                            <select class="form-control text-capitalize" name="admin_access" required>
                                <?php
                                // if ($urow['admin_access'] == 0) {
                                //     echo '<option value="0"> No</option>';
                                // }
                                // echo '<option value="1">Yes</option>';
                                // echo '<option value="0">No</option>';

                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="update_profile_usage_all" class="btn btn-success form-control" value="Submit" <?php //echo ($self) ? "disabled" : "" ?>>
                        </div>
                    </form>
                    <?php

                    // if (isset($_POST['update_profile_usage_all'])) {

                    //     $uid = $_POST['current_UID'];
                    //     $u_access = $_POST['u_access'];
                    //     $admin_access = $_POST['admin_access'];

                    //     $conn->query("UPDATE users 
                    //     SET 
                    //         admin_access = '$admin_access',
                    //         u_access = '$u_access'
                    //     WHERE UID = '$uid'");

                    //     echo '<script>location.reload()</script>';
                    // }

                    ?>

                </div>
            </div>
        </div>
        <?php $result->data_seek(0); ?>
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
                                    while ($users = $result->fetch_assoc()) {
                                        echo "<tr class='user-select' data-id='" . $users['UID'] . "'>";
                                        echo "<td>" . $users['u_count'] . "</td>";
                                        echo "<td><a href=''>" . $users['UID'] . "</a></td>";
                                        echo "<td class='text-uppercase'>" . $users['u_name'] . "</td>";
                                        echo "<td class='text-uppercase'>" . $users['u_surname'] . "</td>";
                                        echo "<td>" . $users['u_email'] . "</td>";
                                        echo "<td>" . $users['u_phone'] . "</td>";
                                        echo "<td class='text-capitalize'>" . $users['u_type'] . "</td>";
                                        echo "<td>" . $users['u_register'] . "</td>";
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