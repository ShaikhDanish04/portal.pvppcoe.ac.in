<?php
$result = $conn->query("SELECT * FROM users INNER JOIN staff_role_manager ON users.UID=staff_role_manager.UID");

$count_admin = 0;
$count_granted = 0;
$count_pending = 0;
$count_staff = 0;
while ($users = $result->fetch_assoc()) {
    if ($users['u_admin'] == "1") {
        $count_admin++;
    }
    if ($users['u_usage'] == "1") {
        $count_granted++;
    }
    if ($users['u_usage'] == "0") {
        $count_pending++;
    }
    if ($users['u_type'] == "staff") {
        $count_staff++;
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
<div class="container-fluid">
    <?php //print_r($count_data);
    ?>

    <div class="row">
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-success-gradient">
                <div>
                    <span class="count"><?php echo $count_staff ?></span>
                    <p>Total Staff</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-secondary-gradient">
                <div>
                    <span class="count"><?php echo $count_granted ?></span>
                    <p>Granted Access</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-warning-gradient">
                <div>
                    <span class="count"><?php echo $count_pending ?></span>
                    <p>Pending Usage</p>
                </div>

            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-danger-gradient">
                <div>
                    <span class="count"><?php echo $count_admin ?></span>
                    <p>Rejected Access</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row flex-md-row-reverse">
        <div class="col-md-12 p-0">
            <div class="card">

                <div class="card-head">
                    <p><i class="fa fa-database"></i> User Statistics</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <canvas id="staff_type" width="800" height="650"></canvas>
                            <p class="h6 text-center mt-3">3 Types of staff</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <canvas id="staff_branch" width="800" height="650"></canvas>
                            <p class="h6 text-center mt-3">12 Types of Branch</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <canvas id="staff_approv" width="800" height="650"></canvas>
                            <p class="h6 text-center mt-3">4 Types of Approval</p>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <canvas id="staff_post" width="800" height="650"></canvas>
                            <p class="h6 text-center mt-3">21 Types of Approval</p>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {

                            new Chart(document.getElementById("staff_type"), {
                                type: 'doughnut',
                                data: {
                                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                                    datasets: [{
                                        backgroundColor: ["#fa4443", "#3fbfbe", "#ffb453", "#949fb1", "#4d5361"],
                                        data: [2478, 5267, 734, 784, 433]
                                    }]
                                },
                                options: {
                                    legend: false,
                                    title: {
                                        display: true,
                                        text: 'Staff Type'
                                    }
                                }
                            });
                            new Chart(document.getElementById("staff_branch"), {
                                type: 'doughnut',
                                data: {
                                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                                    datasets: [{
                                        backgroundColor: ["#fa4443", "#3fbfbe", "#ffb453", "#949fb1", "#4d5361"],
                                        data: [2478, 5267, 734, 784, 433]
                                    }]
                                },
                                options: {
                                    legend: false,
                                    title: {
                                        display: true,
                                        text: 'Branch'
                                    }
                                }
                            });
                            new Chart(document.getElementById("staff_approv"), {
                                type: 'doughnut',
                                data: {
                                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                                    datasets: [{
                                        backgroundColor: ["#fa4443", "#3fbfbe", "#ffb453", "#949fb1", "#4d5361"],
                                        data: [2478, 5267, 734, 784, 433]
                                    }]
                                },
                                options: {
                                    legend: false,
                                    title: {
                                        display: true,
                                        text: 'Approvals'
                                    }
                                }
                            });
                            new Chart(document.getElementById("staff_post"), {
                                type: 'doughnut',
                                data: {
                                    labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                                    datasets: [{
                                        backgroundColor: ["#fa4443", "#3fbfbe", "#ffb453", "#949fb1", "#4d5361"],
                                        data: [2478, 5267, 734, 784, 433]
                                    }]
                                },
                                options: {
                                    legend: false,
                                    title: {
                                        display: true,
                                        text: 'Staff Post'
                                    }
                                }
                            });
                        })
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-4 p-0">

            <div class="card">
                <div class="card-head d-flex align-items-center">
                    <img class="reg-user-img" src="" alt="">
                    <div class="d-block">
                        <?php
                        $staff_result = $conn->query("SELECT * FROM users INNER JOIN staff_role_manager ON users.UID = staff_role_manager.UID WHERE users.UID = '$selected_UID'");
                        $select_staff = $staff_result->fetch_assoc();
                        // print_r($select_staff);
                        ?>
                        <p><?php echo $select_staff['u_name'] ?></p>
                        <h4 class="text-success m-0"><?php echo $select_staff['u_surname'] ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text my-2"><b>UID : </b><?php echo $select_staff['UID'] ?></p>
                    <p class="card-text my-1"><b>Biometric ID : </b><?php echo $select_staff['staff_biometic'] ?></p>
                    <p class="card-text my-1"><b>Email : </b><?php echo $select_staff['u_email'] ?></p>
                    <p class="card-text my-1"><b>Phone : </b><?php echo $select_staff['u_phone'] ?></p>
                    <div class="divider"></div>
                    <p class="card-text my-1"><b>Staff Type : </b><?php echo $select_staff['staff_type'] ?></p>
                    <p class="card-text my-1"><b>Branch : </b><?php echo $select_staff['staff_branch'] ?></p>
                    <p class="card-text my-1"><b>Application : </b><?php echo $select_staff['staff_approv'] ?></p>
                    <p class="card-text my-1"><b>Post : </b><?php echo $select_staff['staff_post'] ?></p>
                </div>
                <div class="card-footer">
                    <form action="" method="post">
                        <input type="hidden" name="current_UID" value="<?php echo $select_staff['UID'] ?>">
                        <div class="form-group">
                            <label for="">Biometric ID</label>
                            <input type="tel" class="form-control" name="staff_biometic" value="<?php echo $select_staff['staff_biometic'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Staff Type</label>

                            <select class="form-control text-capitalize" name="staff_type" required>

                                <?php echo $select_staff['staff_type'] != "" ? '<option value="' . $select_staff['staff_type'] . '">' . $select_staff['staff_type'] . '</option>' : '<option value="">--- Select ---</option>';
                                ?>
                                <option value="Administration">Administration</option>
                                <option value="Teaching">Teaching</option>
                                <option value="Technical">Technical</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Branch</label>
                            <select class="form-control text-capitalize" name="staff_branch" required>
                                <?php echo $select_staff['staff_branch'] != "" ? '<option value="' . $select_staff['staff_branch'] . '">' . $select_staff['staff_branch'] . '</option>' : '<option value="">--- Select ---</option>'; ?>
                                <option value="Account section">Account section</option>
                                <option value="Computer Engg">Computer Engg</option>
                                <option value="Electronics Engg">Electronics Engg</option>
                                <option value="Electronics and Telecom">Electronics and Telecom</option>
                                <option value="Establishment section">Establishment section</option>
                                <option value="Exam Section">Exam Section</option>
                                <option value="First Year">First Year</option>
                                <option value="Information Technology">Information Technology</option>
                                <option value="Library Section">Library Section</option>
                                <option value="Principal Office">Principal Office</option>
                                <option value="Registrar Office">Registrar Office</option>
                                <option value="Store Department">Store Department</option>
                                <option value="Student section">Student section</option>
                                <option value="System Admin">System Admin</option>
                                <option value="TPO Section">TPO Section</option>
                                <option value="Workshop Department">Workshop Department</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Application</label>
                            <select class="form-control text-capitalize" name="staff_approv" required>
                                <?php echo $select_staff['staff_approv'] != "" ? '<option value="' . $select_staff['staff_approv'] . '">' . $select_staff['staff_approv'] . '</option>' : '<option value="">--- Select ---</option>'; ?>
                                <option value="ADHOC">ADHOC</option>
                                <option value="Contract">Contract</option>
                                <option value="Permenent">Permenent</option>
                                <option value="Temperory">Temperory</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Post</label>
                            <select class="form-control text-capitalize" name="staff_post" required>
                                <?php echo $select_staff['staff_post'] != "" ? '<option value="' . $select_staff['staff_post'] . '">' . $select_staff['staff_post'] . '</option>' : '<option value="">--- Select ---</option>'; ?>
                                <option value="">--- Select ---</option>
                                <option value="Account Assistant">Account Assistant</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Accounts Officier">Accounts Officier</option>
                                <option value="Assistant Instructor">Assistant Instructor</option>
                                <option value="Assistant Librarian">Assistant Librarian</option>
                                <option value="Assistant Professor">Assistant Professor</option>
                                <option value="Assistant Storekeeper">Assistant Storekeeper</option>
                                <option value="Associate Professor">Associate Professor</option>
                                <option value="Attendant">Attendant</option>
                                <option value="Clerk">Clerk</option>
                                <option value="Driver">Driver</option>
                                <option value="Electrical Supervisor">Electrical Supervisor</option>
                                <option value="Fitting Instructor">Fitting Instructor</option>
                                <option value="Foreman">Foreman</option>
                                <option value="Lab Assistant">Lab Assistant</option>
                                <option value="Liaising Officer">Liaising Officer</option>
                                <option value="Librarian">Librarian</option>
                                <option value="Maintence Supervisie">Maintence Supervisie</option>
                                <option value="PA to Principal">PA to Principal</option>
                                <option value="Peon">Peon</option>
                                <option value="Principal">Principal</option>
                                <option value="Pro Term Lect">Pro Term Lect</option>
                                <option value="Professor">Professor</option>
                                <option value="Registrar">Registrar</option>
                                <option value="Section Officer">Section Officer</option>
                                <option value="Semi Skilled Asst">Semi Skilled Asst</option>
                                <option value="Senior Clerk">Senior Clerk</option>
                                <option value="Skilled Assistant">Skilled Assistant</option>
                                <option value="Sr Technical Assist">Sr Technical Assist</option>
                                <option value="Steno Typist">Steno Typist</option>
                                <option value="Superintendent">Superintendent</option>
                                <option value="Technical Assistant">Technical Assistant</option>
                                <option value="Wireman">Wireman</option>
                                <option value="Workshop Assistant">Workshop Assistant</option>
                            </select>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <input type="submit" name="update_staff_role" class="btn btn-success" value="Process" <?php echo ($self) ? "disabled" : ""  ?>>
                        </div>
                    </form>
                    <?php

                    if (isset($_POST['update_staff_role'])) {

                        $uid = $_POST['current_UID'];
                        $staff_biometic = $_POST['staff_biometic'];
                        $staff_type = $_POST['staff_type'];
                        $staff_branch = $_POST['staff_branch'];
                        $staff_approv = $_POST['staff_approv'];
                        $staff_post = $_POST['staff_post'];


                        $conn->query("UPDATE staff_role_manager
                            SET 
                                staff_biometic = '$staff_biometic',
                                staff_type = '$staff_type',
                                staff_branch = '$staff_branch',
                                staff_approv = '$staff_approv',
                                staff_post = '$staff_post'
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
                            <table id="staff_role_management_table" class="table display border-light mb-3">
                                <thead>
                                    <tr>
                                        <th>Sr</th>
                                        <th>UID</th>
                                        <th>BID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Staff Type</th>
                                        <th>Branch</th>
                                        <th>App</th>
                                        <th>Post</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $result = $conn->query("SELECT * FROM users INNER JOIN staff_role_manager ON users.UID=staff_role_manager.UID");
                                    while ($staff = $result->fetch_assoc()) {
                                        echo "<tr  class='user-select' data-id='" . $staff['UID'] . "'>";
                                        echo "<td>" . $staff['u_count'] . "</td>";
                                        echo "<td><a href=''>" . $staff['UID'] . "</a></td>";
                                        echo "<td>" . $staff['staff_biometic'] . "</td>";
                                        echo "<td class='text-uppercase'>" . $staff['u_name'] . "</td>";
                                        echo "<td class='text-uppercase'>" . $staff['u_surname'] . "</td>";
                                        echo "<td>" . $staff['staff_type'] . "</td>";
                                        echo "<td>" . $staff['staff_branch'] . "</td>";
                                        echo "<td>" . $staff['staff_approv'] . "</td>";
                                        echo "<td>" . $staff['staff_post'] . "</td>";

                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Sr</th>
                                        <th>UID</th>
                                        <th>BID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Type</th>
                                        <th>Branch</th>
                                        <th>App</th>
                                        <th>Post</th>
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
            }
        });
    });
</script>