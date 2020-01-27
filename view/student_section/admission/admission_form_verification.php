<?php $UID = $_POST['user_uid_form'] ?>
<div class="card no-print">
    <div class="card-head">
        <p class="text-danger"><i class="fa fa-user"></i> Office Use</p>
    </div>
    <div class="card-body row">
        <div class="form-group col-md-4">
            <input type="hidden" name="user_uid_form" value="<?php echo $UID ?>">

            <?php
            $result = $conn->query("SELECT * FROM `admission_table` WHERE `UID` = '$UID'");

            $result_admission_form = $result->fetch_assoc();
            $row_admission_form = json_decode($result_admission_form['admission_form'], true);
            // print_r($result_admission_form['admission_form']);
            ?>
            <script>
                var admission_form_details = JSON.parse('<?php echo $result_admission_form["admission_form"] ?>');

                $(document).ready(function() {

                    Object.keys(admission_form_details).forEach(function(key) {
                        // $('[name=' + key + '][value="' + admission_form_details[key] + '"]').prop('checked', true);;
                        $('textarea[name="' + key + '"]').text(admission_form_details[key]);
                        $('[type="text"][name="' + key + '"]').val(admission_form_details[key]);
                        $('[type=checkbox][name=' + key + ']').prop('checked', admission_form_details[key]);
                    });
                })
            </script>

            <label for="">Verification Status</label>
            <select type="text" name="admission_form_status" class="form-control" required>
                <option class="p-2 alert-success" value="verified">Verified</option>
                <option class="p-2 alert-success" value="verified">Verified</option>
                <option class="p-2 alert-warning" value="pending">Pending</option>
                <option class="p-2 alert-danger" value="rejected">Rejected</option>

            </select>
            <small class="text-muted">*Required</small>
        </div>

        <div class="form-group form-switch mb-0 col-md-4">
            <label for="">Admission Form Edit</label>
            <label class="switch d-block mx-auto">
                <input type="checkbox" name="admission_form_edit">
                <span class="slider"></span>
            </label>
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
                    $('[type=checkbox][name="admission_form_edit"]').prop('checked', false);
                    $('[type=checkbox][name="admission_form_edit"]').val(0);
                } else {
                    $('textarea[name="verification_response"]').text('');
                    $('[type=checkbox][name="admission_form_edit"]').prop('checked', true);
                    $('[type=checkbox][name="admission_form_edit"]').val(1);
                }

            })
            $('[name=admission_form_edit]').click(function() {
                if ($(this).prop("checked") == true) {
                    $(this).val(1);
                } else if ($(this).prop("checked") == false) {
                    $(this).val(0);
                }
            });

            $('[name="student_verification"]').click(function() {

                $.post("view/student_section/admission/admission_form_review.php", {
                        user_uid_form: $('[name="user_uid_form"]').val(),
                        admission_form_edit: Number($('[name="admission_form_edit"]').val()),
                        admission_form_status: $('[name="admission_form_status"]').val(),
                        verification_response: $('[name="verification_response"]').val(),
                        student_verification: 'true'
                    },
                    function(data, status) {
                        // alert("Data: " + data + "\nStatus: " + status);
                        $('.modal-body').html(data);
                        $('.modal').modal('hide');
                        $("#data").load("view/student_section/admission/admission_form_table.php");
                    });
            })
        })
    </script>
</div>