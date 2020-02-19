<?php
if (!isset($_GET['UID'])) {
    $_GET['UID'] = $_SESSION["UID"];
}

$self = false;
if ($_GET['UID'] == $_SESSION["UID"]) {
    $self = true;
}
$selected_UID = $_GET['UID'];

?>
<div class="container-fluid">

    <div class="row flex-md-row-reverse">
        <div class="col-md-4 p-0">

            <div class="card">
                <div class="card-head d-flex align-items-center">
                    <img class="reg-user-img" src="" alt="">
                    <?php
                    $student_result = $conn->query("SELECT * FROM users INNER JOIN student_academic_manager ON users.UID = student_academic_manager.UID WHERE users.UID = '$selected_UID'");
                    $select_user = $student_result->fetch_assoc();
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
                    <p class="card-text my-1"><b>Admission Type : </b><?php echo $select_user['admission_type'] ?></p>
                    <p class="card-text my-1"><b>Student Branch : </b><?php echo $select_user['student_branch'] ?></p>
                    <p class="card-text my-1"><b>Division : </b><?php echo $select_user['student_division'] ?></p>
                    <p class="card-text my-1"><b>Active Semester : </b><?php echo $select_user['student_active_semester'] ?></p>
                </div>
                <div class="card-footer">
                    <form action="" method="post">
                        <div class="row">

                            <input type="hidden" name="current_UID" value="<?php echo $select_user['UID'] ?>">
                            <div class="form-group col-12">
                                <label for="">Student ID</label>
                                <input class="form-control" type="text" name="student_id" value="<?php echo $select_user['student_id'] ?>">
                            </div>
                            <div class="form-group col-12">
                                <label for="">Admission Type</label>
                                <select class="form-control text-capitalize" name="admission_type" required>
                                    <?php
                                    echo '<option class="alert-dark" value="' . $select_user['admission_type'] . '">' . $select_user['admission_type'] . '</option>';
                                    echo '<option value="FE">FE</option>';
                                    echo '<option value="DSE">DSE</option>';
                                    echo '<option value="TRA">TRA</option>';
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label for="">Student Branch</label>
                                <select class="form-control text-capitalize" name="student_branch" required>
                                    <?php
                                    echo '<option class="alert-dark" value="' . $select_user['student_branch'] . '">' . $select_user['student_branch'] . '</option>';
                                    echo '<option value="COMP">COMP</option>';
                                    echo '<option value="ELEX">ELEX</option>';
                                    echo '<option value="IT">IT</option>';
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Division</label>
                                <select class="form-control text-capitalize" name="student_division" required>
                                    <?php
                                    echo '<option class="alert-dark" value="' . $select_user['student_division'] . '">' . $select_user['student_division'] . '</option>';
                                    echo '<option value="A">A</option>';
                                    echo '<option value="B">B</option>';
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Semester</label>
                                <select class="form-control text-capitalize" name="student_active_semester" required>
                                    <?php
                                    echo '<option class="alert-dark" value="' . $select_user['student_active_semester'] . '">' . $select_user['student_active_semester'] . '</option>';
                                    echo '<option value="A">A</option>';
                                    echo '<option value="B">B</option>';
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <input type="submit" name="update_profile_usage_all" class="btn btn-success form-control" value="Submit">
                            </div>
                        </div>
                    </form>
                    <?php

                    if (isset($_POST['update_profile_usage_all'])) {

                        $uid = $_POST['current_UID'];

                        $student_id = $_POST['student_id'];
                        $admission_type = $_POST['admission_type'];
                        $student_branch = $_POST['student_branch'];
                        $student_division = $_POST['student_division'];
                        $student_active_semester = $_POST['student_active_semester'];

                        $conn->query("UPDATE student_academic_manager 
                        SET 
                            student_id = '$student_id',
                            admission_type = '$admission_type',
                            student_branch = '$student_branch',
                            student_division = '$student_division',
                            student_active_semester = '$student_active_semester'
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
                    <p><i class="fa fa-database"></i> List of Students User Accounts</p>
                </div>
                <div class="card-body">
                    <div class="table">

                        <form action="" method="post">
                            <table id="staff_role_management_table" class="table display border-light mb-3">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>UID</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Admission Type</th>
                                        <th>Student Branch</th>
                                        <th>Division</th>
                                        <th>Active Semester</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $conn->query("SELECT * FROM users INNER JOIN student_academic_manager ON users.UID=student_academic_manager.UID");
                                    while ($student = $result->fetch_assoc()) {
                                        echo "<tr  class='user-select' data-id='" . $student['UID'] . "'>";
                                        echo "<td></td>";
                                        echo "<td><a href=''>" . $student['UID'] . "</a></td>";
                                        echo "<td>" . $student['student_id'] . "</td>";
                                        echo "<td class='text-uppercase'>" . $student['u_name'] . "</td>";
                                        echo "<td class='text-uppercase'>" . $student['u_surname'] . "</td>";
                                        echo "<td>" . $student['admission_type'] . "</td>";
                                        echo "<td>" . $student['student_branch'] . "</td>";
                                        echo "<td>" . $student['student_division'] . "</td>";
                                        echo "<td>" . $student['student_active_semester'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>UID</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Admission Type</th>
                                        <th>Student Branch</th>
                                        <th>Division</th>
                                        <th>Active Semester</th>
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
        $('.user-select a').click(function(e) {
            e.preventDefault();
            get_data = "";
            get_data += "&UID=" + $($(this).closest('.user-select')).attr('data-id');
            hash = location.hash;

            var uri = window.location.toString();
            if (uri.indexOf("&") > 0) {
                var clean_uri = uri.substring(0, uri.indexOf("&"));

                window.history.replaceState({}, document.title, clean_uri);
            }

            window.location.href = window.location.href + get_data + hash;
        })

        $('#staff_role_management_table').DataTable({
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
                'pageLength',
                'colvis'
            ],
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
            },
            "columnDefs": [{
                "render": function(data, type, full, meta) {
                    return meta.row + 1; // adds id to serial no
                },
                "targets": 0
            }],

        });
    });
</script>