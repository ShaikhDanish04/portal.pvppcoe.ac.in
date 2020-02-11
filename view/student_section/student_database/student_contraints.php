<!-- The Modal -->
<?php
include('../../../connect.php');

$UID = $_POST['user_uid_form'];


$result = $conn->query("SELECT * FROM `admission_table` WHERE `UID` = '$UID'");

$result_peronsal = $result->fetch_assoc();
$row_personal = json_decode($result_peronsal['admission_form'], true);

?>

<div class="modal fade SC-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Student Section</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="response"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-head">
                                <p class="">Student Admission</p>
                            </div>
                            <div class="card-body">
                                <?php
                                print_r($row_personal);
                                $result = $conn->query("SELECT * FROM `admission_table` WHERE `UID` = '$UID'");

                                if ($result->num_rows == 0) {
                                    echo '<div class="form-group form-switch">' .
                                        '     <label>Admission Form Not Created</label>' .
                                        '     <input type="button" class="btn btn-sm btn-success" name="create_form" value="Create">' .
                                        ' </div>';
                                } else {
                                    echo '<div class="form-group form-switch">' .
                                        '    <label>View Admission Form</label>' .
                                        '    <input type="button" class="btn btn-sm btn-primary" name="view_form" value="View Form">' .
                                        '</div>';
                                }
                                ?>
                                <div class="form-group form-switch">
                                    <label class="form-check-label">Allow Edit Admission Form</label>
                                    <label class="switch">
                                        <input type="checkbox" name="allow_admission_form_edit">
                                        <span class="slider"></span>
                                    </label>
                                </div>
                                <div class="form-group form-switch">
                                    <label>Admission Form Status</label>
                                    <!-- <span class="status"><i class="fa fa-check text-success"></i> Verified</span> -->
                                    <!-- <span class="status"><i class="fa fa-times text-danger"></i> Rejected</span> -->
                                    <!-- <span class="status"><i class="fa fa-question text-warning"></i> Pending</span> -->
                                    <span class="status"><i class="fa fa-exclamation text-info"></i> No Filled</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="" method="post">
                    <input type="text" name="admission_form_edit" value="<?php echo $row_personal['admission_form_edit'] ?>">
                    <input type="text" name="admission_form_status" value="<?php echo $row_personal['admission_form_status'] ?>">
                    <input type="submit" name="submt" value="Submit">
                </form>

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('[name="allow_admission_form_edit"]').click(function() {
            if ($(this).prop("checked") == true) {
                alert('allowed');
            } else if ($(this).prop("checked") == false) {
                alert('not allowed');
            }
        })

        $('[name="create_form"]').click(function() {
            $.post("view/student_section/student_database/control_admission_form.php", {
                    UID: "<?php echo $UID ?>",
                    operation: "create_admission_form"
                },
                function(data, status) {

                    $('.response').html(data);
                });
        })

    })
</script>

<style>
    .modal-content {
        background: #f5f5f5;
    }

    .form-switch label {
        margin: 0;
    }

    .form-group .status {
        padding: 0px 5px;
        font-size: 20px;
    }
</style>