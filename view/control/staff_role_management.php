<?php
$sql = "SELECT users.*,staff_role_management.*
            FROM users INNER JOIN staff_role_management ON users.UID=staff_role_management.UID";

$result = $conn->query($sql);

$GLOBALS['urow'] = $row;

if (!isset($_GET['UID'])) {
    $_GET['UID'] = $_SESSION["UID"];
}

$self = false;
if ($_GET['UID'] == $_SESSION["UID"]) {
    $self = true;
}

while ($row = $result->fetch_assoc()) {
    if ($_GET['UID'] == $row['UID'])
        $GLOBALS['urow'] = $row;
}
// print_r($GLOBALS['urow']['UID']);
// print_r($urow);
// print_r($urow);
?>
<div class="container-fluid">
    <div class="row flex-md-row-reverse">
        <div class="col-md-4 p-0">

            <div class="card">
                <div class="card-head d-flex align-items-center">
                    <img class="reg-user-img" src="" alt="">
                    <div class="d-block">
                        <p><?php echo $urow['u_fname'] ?></p>
                        <h4 class="text-success m-0"><?php echo $urow['u_lname'] ?></h4>
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text my-2"><b>UID : </b><?php echo $urow['UID'] ?></p>
                    <p class="card-text my-1"><b>Biometric ID : </b><?php echo $urow['staff_bid'] ?></p>
                    <p class="card-text my-1"><b>Email : </b><?php echo $urow['u_email'] ?></p>
                    <p class="card-text my-1"><b>Phone : </b><?php echo $urow['u_phone'] ?></p>
                    <div class="divider"></div>
                    <p class="card-text my-1"><b>Staff Type : </b><?php echo $urow['staff_type'] ?></p>
                    <p class="card-text my-1"><b>Branch : </b><?php echo $urow['staff_branch'] ?></p>
                    <p class="card-text my-1"><b>Application : </b><?php echo $urow['staff_app'] ?></p>
                    <p class="card-text my-1"><b>Post : </b><?php echo $urow['staff_post'] ?></p>
                </div>
                <div class="card-footer">
                    <form action="" method="post">
                        <input type="hidden" name="current_UID" value="<?php echo $urow['UID'] ?>">
                        <div class="form-group">
                            <label for="">Biometric ID</label>
                            <input type="tel" class="form-control" name="staff_bid" value="<?php echo $urow['staff_bid'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="">Staff Type</label>

                            <select class="form-control text-capitalize" name="staff_type" required>

                                <?php echo $urow['staff_type'] != "" ? '<option value="' . $urow['staff_type'] . '">' . $urow['staff_type'] . '</option>' : '<option value="">--- Select ---</option>'; ?>
                                <option value="Administration">Administration</option>
                                <option value="Teaching">Teaching</option>
                                <option value="Technical">Technical</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Branch</label>
                            <select class="form-control text-capitalize" name="staff_branch" required>
                                <?php echo $urow['staff_branch'] != "" ? '<option value="' . $urow['staff_branch'] . '">' . $urow['staff_branch'] . '</option>' : '<option value="">--- Select ---</option>'; ?>
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
                            <select class="form-control text-capitalize" name="staff_app" required>
                                <?php echo $urow['staff_app'] != "" ? '<option value="' . $urow['staff_app'] . '">' . $urow['staff_app'] . '</option>' : '<option value="">--- Select ---</option>'; ?>
                                <option value="ADHOC">ADHOC</option>
                                <option value="Contract">Contract</option>
                                <option value="Permenent">Permenent</option>
                                <option value="Temperory">Temperory</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Post</label>
                            <select class="form-control text-capitalize" name="staff_post" required>
                                <?php echo $urow['staff_post'] != "" ? '<option value="' . $urow['staff_post'] . '">' . $urow['staff_post'] . '</option>' : '<option value="">--- Select ---</option>'; ?>
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
                            <input type="submit" name="update_staff_role" class="btn btn-success" value="Process" <?php echo ($self) ? "disabled" : "" ?>>
                        </div>
                    </form>
                    <?php

                    if (isset($_POST['update_staff_role'])) {

                        $uid = $_POST['current_UID'];

                        $staff_bid = $_POST['staff_bid'];
                        $staff_type = $_POST['staff_type'];
                        $staff_branch = $_POST['staff_branch'];
                        $staff_app = $_POST['staff_app'];
                        $staff_post = $_POST['staff_post'];


                        $conn->query("UPDATE staff_role_management 
                            SET 
                                staff_bid = '$staff_bid',
                                staff_type = '$staff_type',
                                staff_branch = '$staff_branch',
                                staff_app = '$staff_app',
                                staff_post = '$staff_post',
                                status = '1'
                            WHERE UID = '$uid'");

                        echo '<script>location.reload()</script>';
                    }

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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr  class='user-select' data-id='" . $row['UID'] . "'>";
                                        echo "<td>" . $row['u_count'] . "</td>";
                                        echo "<td><a href=''>" . $row['UID'] . "</a></td>";
                                        echo "<td>" . $row['staff_bid'] . "</td>";
                                        echo "<td class='text-uppercase'>" . $row['u_fname'] . "</td>";
                                        echo "<td class='text-uppercase'>" . $row['u_lname'] . "</td>";
                                        echo "<td>" . $row['staff_type'] . "</td>";
                                        echo "<td>" . $row['staff_branch'] . "</td>";
                                        echo "<td>" . $row['staff_app'] . "</td>";
                                        echo "<td>" . $row['staff_post'] . "</td>";
                                        echo $row['status'] == 1 ? "<td class='alert-success'> Active </td>" : "<td class='alert-warning'> Inactive</td>";

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
                                        <th>Status</th>
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