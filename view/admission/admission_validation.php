<style>
    .symbol-reference .verification-response {
        font-size: .8rem;
        height: 30px;
        width: 30px;
        flex-shrink: 0;
        margin: 5px;
        border-width: 2px;
    }

    .symbol-reference p {
        flex-shrink: 0;
        font-weight: 600;
    }

    .symbol-reference div {
        display: flex;
        align-items: center
    }

    .symbol-reference {
        margin-top: 10px;
        background: #f5f5f5;
        padding: 5px;
        border-radius: 25px;
        box-shadow: 2px 2px 6px #d6d6d7;
    }
</style>
<script>
    var admission_form = JSON.parse('[<?php echo $JSON_admission_form ?>]');

    $(document).ready(function() {
        // console.log(admission_form[0]["form_status"]);

        switch (admission_form[0]["form_status"]) {
            case "pending":
                $('.admission-form i.fa').attr('data-ver-response', 'pending');
                break;
            case "verified":
                $('.admission-form i.fa').attr('data-ver-response', 'verified');
                break;
            case "rejected":
                $('.admission-form i.fa').attr('data-ver-response', 'rejected');
                break;
            case "not_filled":
                $('.admission-form i.fa').attr('data-ver-response', 'incomplete');
                break
        }
    })
</script>

<div class="card mb-1">
    <div class="card-head text-info">
        <p><i class="fa fa-user-plus"></i> Admission Validation</p>
    </div>
    <div class="card-body">
        <div class="slider admission-slider">
            <div class="text-center admission-form">
                <button class="btn btn-dark btn-sm small br-5rem mt-2 mb-3">Admission Form</button>
                <i class="verification-response fa" data-ver-response="incomplete"></i>
                <p class="px-1 font-weight-bold">Submit Admission Form</p>
            </div>
            <div class="text-center">
                <button class="btn btn-dark btn-sm small br-5rem mt-2 mb-3">Upload Documents</button>
                <i class="verification-response fa " data-ver-response="incomplete"></i>
                <p class="px-1 font-weight-bold">Document Verification</p>
            </div>
            <div class="text-center">
                <button class="btn btn-dark btn-sm small br-5rem mt-2 mb-3">Course Enrollment</button>
                <i class="verification-response fa" data-ver-response="incomplete"></i>
                <p class="px-1 font-weight-bold">Verification By Student Section</p>
            </div>
            <div class="text-center">
                <button class="btn btn-dark btn-sm small br-5rem mt-2 mb-3">Payment</button>
                <i class="verification-response fa" data-ver-response="incomplete"></i>
                <p class="px-1 font-weight-bold">Payment to Account Section</p>
            </div>
        </div>
        <div class="row symbol-reference">
            <div class="col-6 col-md-2">
                <i class="fa fa-exclamation text-info verification-response"></i>
                <p>Incomplete</p>
            </div>
            <div class="col-6 col-md-2">
                <i class="fa fa-question-circle text-warning verification-response"></i>
                <p>Pending</p>
            </div>
            <div class="col-6 col-md-2">
                <i class="fa fa-check-circle text-success verification-response"></i>
                <p>Verified</p>
            </div>
            <div class="col-6 col-md-2">
                <i class="fa fa-times-circle text-danger verification-response"></i>
                <p>Rejected</p>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('[data-ver-response="verified"]').each(function() {
                $(this).addClass("fa-check-circle text-success");
            })
            $('[data-ver-response="incomplete"]').each(function() {
                $(this).addClass("fa-exclamation text-info");
            })
            $('[data-ver-response="pending"]').each(function() {
                $(this).addClass("fa-question-circle text-warning");
            })
            $('[data-ver-response="rejected"]').each(function() {
                $(this).addClass("fa-times-circle text-danger");
            })

            $('.admission-slider').slick({
                slidesToShow: 4,
                // arrows: true,
                autoplay: false,
                dots: true,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 800,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ],

                prevArrow: '<div class="slick-prev"></div>',
                nextArrow: '<div class="slick-next"></div>'
            });
        })
    </script>
</div>