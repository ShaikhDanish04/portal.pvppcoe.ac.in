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
    <div class="card">
        <div class="card-head">
            <p class="text-danger">Details Pending</p>
        </div>
        <div class="card-body">
            <div id="input_check"></div>
        </div>
    </div>
    <?php


    include("admission_form/personal_details.php");
    include("admission_form/address_details.php");
    include("admission_form/allotment_details.php");
    include("admission_form/education_details.php");
    include("admission_form/bank_details.php");
    include("admission_form/family_details.php");

    ?>
    <script>
        if ("<?php echo $user["admission_type"]; ?>" == "F") {
            $('.DSE').remove();
            $('.alert-for-admision-type').remove();
        } else if ("<?php echo $user["admission_type"]; ?>" == "S") {
            $('.FE').remove();
            $('.alert-for-admision-type').remove();
        } else {
            $('.admission-card input').attr('disabled', 'true');
        }
        $(document).ready(function() {


            count = 0;
            $('.review_page [name]').each(function() {
                if ($(this).val() == "") {
                    if ($(this).hasClass('require')) {
                        count++;
                        $(this).addClass('required');
                        $('#input_check').append("<li class='p-2 d-inline-block m-1 btn-sm btn-link'>" + count + ". " +
                            $(this).prev('label').text() + "</li>"
                        );

                        $(this).closest()
                        $($(this).next('small')).addClass('required');
                    }
                }
            })
            if (count > 0) {
                $('#input_check').append("<p class='h6 p-3'>*" + count + " Fields Pending</p>");
            } else {
                $($('#input_check').closest('.card')).remove();
            }

            $('.review_page .personal_photo').removeClass('upload-here');
            $('.review_page .form-group').addClass('form-preview');
            $('.review_page .card-foot,.review_page input[type=file],.review_page [type=submit],.review_page [type=button]').addClass('d-none');
            $(".review_page input,.review_page textarea,.review_page select").addClass('stick');
            $(".review_page input,.review_page textarea,.review_page select").attr('disabled', "true");
            $(".review_page button").remove();

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