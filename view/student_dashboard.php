<div class="dashboard">
    <div class="row">
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-success-gradient">
                <div>
                    <span class="count">0</span>
                    <p>Personal Notice</p>
                </div>
                <i class="fa fa-comments"></i>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-secondary-gradient">
                <div>
                    <span class="count">78 %</span>
                    <p>Average Attendence</p>
                </div>
                <i class="fa fa-calendar-check-o"></i>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-warning-gradient">
                <div>
                    <span class="count">5</span>
                    <p>Achievements</p>
                </div>
                <i class="fa fa-trophy"></i>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card bg-danger-gradient">
                <div>
                    <span class="count">120240 ₹</span>
                    <p>Payment Due</p>
                </div>
                <i class="fa fa-credit-card"></i>
            </div>
        </div>
        <!-- <div class="col-6 col-sm-6 col-md-3 p-0">
            <div class="head-card">
                <div id="collapseOne" class="collapse fade" data-parent="div">
                    <a class="opn-button bg-danger-gradient" href="javascript:void(0)">
                        <div>
                            <span class="count">120240 ₹</span>
                            <p>Payment Due</p>
                        </div>
                        <i class="fa fa-credit-card"></i>
                    </a>
                </div>
                <div id="collapseTwo" class="collapse fade" data-parent="div">
                    <a class="opn-button bg-warning-gradient" href="javascript:void(0)">
                        <div>
                            <span class="count">5</span>
                            <p>Achievements</p>
                        </div>
                        <i class="fa fa-trophy"></i>
                    </a>
                </div>
                <div id="collapseThree" class="collapse fade" data-parent="div">
                    <a class="opn-button bg-secondary-gradient" href="javascript:void(0)">
                        <div>
                            <span class="count">78 %</span>
                            <p>Average Attendence</p>
                        </div>
                        <i class="fa fa-calendar-check-o"></i>
                    </a>
                </div>
                <div id="collapseFour" class="collapse fade show" data-parent="div">
                    <a class="opn-button bg-success-gradient" href="javascript:void(0)">
                        <div>
                            <span class="count">0</span>
                            <p>Personal Notice</p>
                        </div>
                        <i class="fa fa-comments"></i>
                    </a>
                </div>

                <div class="dropdown">
                    <button type="button" class="btn dropdown-toggle text-white" data-toggle="dropdown"></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" data-toggle="collapse" href="#collapseOne">Payment Due</a>
                        <a class="dropdown-item" data-toggle="collapse" href="#collapseTwo">Achievements</a>
                        <a class="dropdown-item" data-toggle="collapse" href="#collapseThree">Average Attendence</a>
                        <a class="dropdown-item" data-toggle="collapse" href="#collapseFour">Personal Notice</a>
                    </div>
                </div>
            </div>
        </div> -->

    </div>

    <?php

    $sql = "SELECT * FROM student_admission_table WHERE `UID`='$UID'";

    $result = $conn->query($sql);
    echo $conn->error;

    $JSON_admission_form = "";
    $row_admission = $result->fetch_assoc();

    $JSON_admission_form .= json_encode(
        array_merge(
            array("UID" => $row_admission['UID']),
            json_decode($row_admission['personal'], true),
            json_decode($row_admission['address'], true),
            json_decode($row_admission['allotment'], true),
            json_decode($row_admission['education'], true),
            json_decode($row_admission['bank'], true),
            json_decode($row_admission['family'], true),
            array("form_status" => $row_admission['form_status'])
            )
        );

    // print_r($JSON_admission_form);

    ?>

    <script>
        var admission_form = JSON.parse('[<?php echo $JSON_admission_form ?>]');

        $(document).ready(function() {
            console.log(admission_form[0]["form_status"]);

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
    <div class="row">
        <div class="col-md-12 p-0">
            <div class="card">
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
                    <div class="row symbol-reference">
                        <div class="col-6 col-md-2">
                            <i class="fa fa-exclamation text-info verification-response"></i>
                            <p>Not Filled</p>
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
            </div>
            <script>
                $(document).ready(function() {
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
                });
            </script>
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
            })
        </script>
    </div>
</div>