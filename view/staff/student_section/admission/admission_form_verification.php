<?php $selected_UID = $_POST['user_uid_form'] ?>
<div class="card no-print">
    <div class="card-head">
        <p class="text-danger"><i class="fa fa-user"></i> Office Use</p>
    </div>
    <div class="card-body row">
        <div class="form-group col-md-4">
            <input type="hidden" name="user_uid_form" value="<?php echo $selected_UID ?>">

            <?php
            $result = $conn->query("SELECT * FROM `student_admission_table` WHERE `UID` = '$selected_UID'");

            $JSON_admission_form = "";
            $row_admission = $result->fetch_assoc();

            $JSON_admission_form .= json_encode(
                array_merge(
                    array("UID" => $row_admission['UID']),
                    array("form_status" => $row_admission['form_status'])
                )
            );
            ?>
            <script>
                var admission_form = JSON.parse('[<?php echo $JSON_admission_form ?>]');

                $(document).ready(function() {

                    console.log(admission_form[0]["form_status"]);

                    $('[type="text"][name="admission_form_status"]').val(admission_form[0]["form_status"]);
                })
            </script>

            <label for="">Verification Status</label>
            <select type="text" name="admission_form_status" class="form-control" required>
                <option class="p-2 alert-success" value="verified">Verified</option>
                <option class="p-2 alert-warning" value="pending">Pending</option>
                <option class="p-2 alert-danger" value="rejected">Rejected</option>

            </select>
            <small class="text-muted">*Required</small>
        </div>

       
        <div class="form-group col-md-12">
            <label for="">Submit Verification Response</label>
            <textarea name="verification_response" class="form-control" required></textarea>
            <small class="text-muted">*Required</small>
        </div>
        <div class="form-group col-md-12">
            <p class="text-danger">*The data of verified student will be sent to general register </p>
        </div>
    </div>
    <div class="card-foot d-flex align-items-center justify-content-end flex-column-reverse flex-md-row">
        <p class="mr-2">*Please verify all details</p>
        <input type="submit" class="btn btn-success btn-sm m-1" name="student_verification" value="Submit">
        <button class="btn btn-primary ml-2 print-button" onclick="window.print();"><i class="fa fa-print"></i></button>
    </div>


    <script>
        $(document).ready(function() {
            $('[name="admission_form_status"]').change(function() {
                // console.log($(this).val());
                if ($(this).val() == "verified") {
                    $('textarea[name="verification_response"]').text('All Details are appropriate proceeding this form for Document Verification');
                } else {
                    $('textarea[name="verification_response"]').text('');
                }

            })
            $('[name="student_verification"]').click(function() {

                $.post("view/student_section/admission/admission_form_review.php", {
                        user_uid_form: $('[name="user_uid_form"]').val(),
                        admission_form_status: $('[name="admission_form_status"]').val(),
                        verification_response: $('[name="verification_response"]').val(),
                        student_verification: 'true'
                    },
                    function(data, status) {
                        // alert("Data: " + data + "\nStatus: " + status);
                        $('.modal-body').html(data);
                        $('.modal').modal('hide');
                        $("#admission_table_data").load("view/student_section/admission/admission_form_table.php");
                    });
            })
        })
    </script>
</div>