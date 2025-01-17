<style>
    @media print {
        .card {
            page-break-inside: avoid;
        }

        body,
        .content,
        .content-view,
        .body-container {
            overflow: unset;
            position: unset;
            height: unset;
            margin: 0;
            background: none;
        }

        .banner,
        .navigation-bar,
        .top-bar,
        .side,
        .nav-card,
        .footer,
        .modal-header,
        .modal-footer,
        .no-print {
            display: none !important;
        }

        .modal-open .modal-backdrop,
        .modal-header,
        .modal-footer,
        .modal-open .body-container {
            display: none !important;
        }

        body.modal-open,
        .modal {
            padding: 0 !important;
            position: relative;
        }

        .modal-dialog {
            margin: 0px !important;
            max-width: 100%;
        }
    }


    .required {
        border-bottom-color: #dc3545 !important;
        color: #dc3545 !important;
    }
</style>

<div class="review_page">

    <div class="card">
        <img class="my-3" src="<?php echo $addr_space ?>assets/img/letter_head.jpg" width="100%" alt="">
        <div class="divider my-0"></div>
        <p class="h3 text-center my-3 text-uppercase text-success">Admission Form 2020 - 2021</p>
    </div>
    <div class="card <?php echo ($_form_verified) ? 'd-none' : '' ?>">
        <div class="card-head">
            <p class="text-danger">Details Pending</p>
        </div>
        <div class="card-body">
            <div class="pending-fields"></div>
        </div>
    </div>
    <?php
    // print_r($_POST);
    $review = false;
    if (isset($_POST['user_uid_form']) || $result_SAT['form_status'] == "verified") {
        if (isset($_POST['user_uid_form'])) {
            $Selected_UID = $_POST['user_uid_form'];
        } else {
            $Selected_UID = $UID;
        }
        $review = true;
        $result = $conn->query("SELECT * FROM student_admission_table WHERE UID = '$Selected_UID'");
        $result_SAT = $result->fetch_assoc();

        $personal_details = openssl_decrypt($result_SAT['personal'], "AES-128-CTR", "$Selected_UID", 0, $iv);
        $address_details = openssl_decrypt($result_SAT['address'], "AES-128-CTR", "$Selected_UID", 0, $iv);
        $allotment_details = openssl_decrypt($result_SAT['allotment'], "AES-128-CTR", "$Selected_UID", 0, $iv);
        $education_details = openssl_decrypt($result_SAT['education'], "AES-128-CTR", "$Selected_UID", 0, $iv);
        $bank_details = openssl_decrypt($result_SAT['bank'], "AES-128-CTR", "$Selected_UID", 0, $iv);
        $family_details = openssl_decrypt($result_SAT['family'], "AES-128-CTR", "$Selected_UID", 0, $iv);
    }


    ?>
    <script>
        var personal_details = JSON.parse('<?php echo $personal_details ?>');
        var address_details = JSON.parse('<?php echo $address_details ?>');
        var allotment_details = JSON.parse('<?php echo $allotment_details ?>');
        var education_details = JSON.parse('<?php echo $education_details ?>');
        var bank_details = JSON.parse('<?php echo $bank_details ?>');
        var family_details = JSON.parse('<?php echo $family_details ?>');
        var form_complete;

        $(document).ready(function() {

            Object.keys(personal_details).forEach(function(key) {
                $('[name="' + key + '"]').val(personal_details[key]);
                // $('img[id="' + key + '"]').attr("src", personal_details[key]);
            })

            Object.keys(address_details).forEach(function(key) {
                $('[name="' + key + '"]').val(address_details[key]);
            });

            Object.keys(allotment_details).forEach(function(key) {

                $('[type="radio"][name=' + key + '][value="' + allotment_details[key] + '"]').prop("checked", true);
                $('[type="text"][name="' + key + '"]').val(allotment_details[key]);
            });

            Object.keys(education_details).forEach(function(key) {

                $('[name="' + key + '"]').val(education_details[key]);

            });

            Object.keys(bank_details).forEach(function(key) {
                $('[type="radio"][name=' + key + '][value="' + bank_details[key] + '"]').prop("checked", true);
                $('[type="text"][name="' + key + '"]').val(bank_details[key]);
            });


            Object.keys(family_details).forEach(function(key) {
                $('[type="radio"][name=' + key + '][value="' +

                    family_details[key] + '"]').prop("checked", true);
                $('[type="text"][name="' + key + '"]').val(family_details[key]);
                $('[type="number"][name="' + key + '"]').val(family_details[key]);

            });

            count = 0;
            $('.review_page [name]').each(function() {
                if ($(this).val() == "") {
                    if ($(this).hasClass('require')) {
                        count++;
                        $(this).addClass('required');
                        $('.pending-fields').append("<li class='p-2 d-inline-block m-1 btn-sm btn-link'>" + count + ". " + $($(this).prev()).text() + "</li>");
                        $($(this).next('small')).addClass('required');

                        // $(this).closest()
                    }
                }
            })

            if (count > 0) {
                $('.pending-fields').append("<p class='h6 p-3'>*" + count + " Fields Pending</p>");
                form_complete = false;
            } else {
                $($('.pending-fields').closest('.card')).remove();
                form_complete = true;

            }
        });
    </script>
    <?php

    $personal_details_decoded = json_decode($personal_details, true);
    $address_details_decoded = json_decode($address_details, true);
    $allotment_details_decoded = json_decode($allotment_details, true);
    $education_details_decoded = json_decode($education_details, true);
    $bank_details_decoded = json_decode($bank_details, true);
    $family_details_decoded = json_decode($family_details, true);

    include("admission_form/personal_details.php");
    include("admission_form/address_details.php");
    include("admission_form/allotment_details.php");
    include("admission_form/education_details.php");
    include("admission_form/bank_details.php");
    include("admission_form/family_details.php");

    ?>
    <div class="card submit-form">
        <form action="" method="post">
            <div class="card-body d-flex justify-content-between align-items-center">
                <p class="mr-2"><input type="checkbox" class="form-control-checkbox submit-form" disabled required> *I Agree all the above information is true and verified</p>
                <input type="submit" class="btn btn-success btn-dark btn-sm m-1 submit-form" name="admission_form_submit" value="Submit Form" disabled>
        </form>
    </div>
</div>
<script>
    if ("<?php echo (isset($allotment_details_decoded['admission_type'])) ? $allotment_details_decoded['admission_type'] : $user["admission_type"]; ?>" == "F") {
        $('.DSE').remove();
        $('.alert-for-admision-type').remove();
    } else if ("<?php echo (isset($allotment_details_decoded['admission_type'])) ? $allotment_details_decoded['admission_type'] : $user["admission_type"]; ?>" == "S") {
        $('.FE').remove();
        $('.alert-for-admision-type').remove();
    } else {
        $('.admission-card input').attr('disabled', 'true');
    }


    $(document).ready(function() {



        $('.review_page .personal_photo').removeClass('upload-here');
        $('.review_page .form-group').addClass('form-preview');
        $('.review_page .card-foot,.review_page input[type=file],.review_page [type=submit],.review_page [type=button]').addClass('d-none');
        $(".review_page input,.review_page textarea,.review_page select").addClass('stick');
        $(".review_page input,.review_page textarea,.review_page select").attr('disabled', "true");
        $(".review_page button").remove();

        // form_complete = true;
        if (form_complete) {
            $('.submit-form').removeAttr('disabled');
            $('.submit-form').removeClass('btn-dark');
            $('.submit-form').removeClass('d-none');
        } else {
            $('.submit-form').remove();
        }

        $(document).click(function() {
            if (location.hash == "#p6") {
                $('#print_button').removeClass('btn-danger');
                $('#print_button').addClass('btn-success');
                $('#print_button').removeAttr('disabled')
            } else {
                $('#print_button').addClass('btn-danger');
                $('#print_button').removeClass('btn-success');
                $('#print_button').attr('disabled', 'true');
            }

        })
    })
</script>
</div>