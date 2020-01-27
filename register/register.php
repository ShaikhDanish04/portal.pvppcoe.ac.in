<style>
    #register_slider .progress {
        background-color: #f7f7f7;
        border-radius: .25rem .25rem 0rem 0rem;
    }

    .login-body .h2 {
        font-size: 1.8rem;
    }

    a.disabled {
        pointer-events: none;
    }

    .form-control[name=OTP] {
        font-size: 30px;
        font-weight: 600;
        letter-spacing: 10px;
        text-align: center;
    }
</style>

<div class="login-body">
    <form action="" method="post">
        <p class="h2 text-center mb-3 font-weight-light"><img src="assets/img/college_logo.png" alt="" width="50px"> Signup to the Portal</p>
        <div class="card my-3">
            <div id="register_slider" class="carousel slide" data-touch="false" data-interval="false" data-ride="carousel">
                <!-- The slideshow -->
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:0%"></div>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#register_slider").on('slid.bs.carousel', function() {

                            if ($($(this).find('.active')).hasClass('reg_details')) {
                                $('#register_slider .progress-bar').css("width", "0%");
                            }
                            if ($($(this).find('.active')).hasClass('otp_verification')) {
                                $('#register_slider .progress-bar').css("width", "40%");
                            }
                            if ($($(this).find('.active')).hasClass('personal_details')) {
                                $('#register_slider .progress-bar').css("width", "80%");
                            }
                        });
                    })
                </script>
                <div class="carousel-inner">
                    <div class="card-body carousel-item reg_details active">
                        <div class="row">
                            <div class="col-sm-6 p-1">
                                <div class="form-group mb-0">
                                    <label for="">First Name</label>
                                    <input class="form-control" name="fname">
                                </div>
                            </div>
                            <div class="col-sm-6 p-1">
                                <div class="form-group mb-0">
                                    <label for="">Last Name</label>
                                    <input class="form-control" name="lname">
                                </div>
                            </div>
                            <div class="col-sm-12 p-1">
                                <div class="form-group mb-0">
                                    <label for="">Email</label>
                                    <input type="email" name="u_email" class="form-control">
                                    <small class="text-muted">*Use valid & active email account</small>
                                </div>
                            </div>
                            <div class="col-sm-12 p-1">
                                <div class="form-group mb-0">
                                    <label for="">Phone</label>
                                    <input type="tel" pattern="[7-9]{1}[0-9]{9}" maxlength="10" name="u_phone" class="form-control">
                                    <small class="text-muted">*10 - digit contact number</small>
                                </div>
                            </div>
                            <div class="col-sm-12 p-1">
                                <div class="form-group mb-0 toggle-password">
                                    <label for="">Password</label>
                                    <input type="password" name="u_reg_pass" autocomplete="on" class="form-control">
                                    <i class="fa fa-eye-slash"></i>
                                    <small class="text-muted">*Should be 8-digit or more with atleast 1-Capital Letter,1-Small Letter, 1-Number, 1-Symbol</small>
                                </div>
                            </div>
                            <div class="col-sm-12 p-1 mb-0">
                                <div class="form-group">
                                    <label for="">Confirm Password</label>
                                    <input type="password" name="u_reg_pass_c" autocomplete="off" class="form-control">
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                var email, phone, input, password, confirm_password;
                                $('.reg_details input').on('focus keyup', function() {
                                    if ($(this).val() != "") {
                                        $(this).removeClass('alert-danger border-danger');
                                        $(this).addClass('border-success');
                                        input = 1;
                                    } else {
                                        $(this).addClass('alert-danger border-danger');
                                        $(this).removeClass('border-success');
                                        input = 0;
                                    }
                                })

                                $('.reg_details [name="u_phone"]').on('focusout keyup', function() {
                                    var regex = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
                                    if (regex.test($(this).val())) {
                                        $(this).removeClass('alert-danger border-danger');
                                        $(this).addClass('border-success');
                                        phone = 1;
                                    } else {
                                        $(this).addClass('alert-danger border-danger');
                                        $(this).removeClass('border-success');
                                        phone = 0;
                                    }
                                })

                                $('.reg_details [name="u_email"]').on('focusout keyup', function() {
                                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                    if (regex.test($(this).val())) {
                                        $(this).removeClass('alert-danger border-danger');
                                        $(this).addClass('border-success');
                                        $('#otp_email').text($(this).val());
                                        email = 1;
                                    } else {
                                        $(this).addClass('alert-danger border-danger');
                                        $(this).removeClass('border-success');
                                        email = 0;
                                    }
                                })

                                $('.reg_details [name="u_reg_pass"]').on('focusout keyup', function() {
                                    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
                                    if (regex.test($(this).val())) {
                                        $(this).removeClass('alert-danger border-danger');
                                        $(this).addClass('border-success');
                                        password = 1;
                                    } else {
                                        $(this).addClass('alert-danger border-danger');
                                        $(this).removeClass('border-success');
                                        password = 0;
                                    }
                                })

                                $('.reg_details [name="u_reg_pass_c"]').on('focusout keyup', function() {
                                    if ($('[name="u_reg_pass"]').val() == $(this).val() && $(this).val() != "") {
                                        $(this).removeClass('alert-danger border-danger');
                                        $(this).addClass('border-success');
                                        confirm_password = 1;
                                    } else {
                                        $(this).addClass('alert-danger border-danger');
                                        $(this).removeClass('border-success');
                                        confirm_password = 0;
                                    }
                                })

                                $('.reg_details input').on('focusout keyup', function() {
                                    if (email == 1 && phone == 1 && input == 1 && password == 1 && confirm_password == 1) {
                                        $('.reg_details .w-100[href="#register_slider"]').removeAttr('disabled');
                                    } else {
                                        $('.reg_details .w-100[href="#register_slider"]').attr('disabled', 'true');
                                    }
                                })

                                $('.reg_details .w-100[href="#register_slider"]').click(function() {
                                    $(this).html('<div><span class="spinner-grow spinner-grow-sm"></span> Loading...</div>');
                                    $.post("register/reg_details_validation.php", {
                                            u_fname: $('.reg_details [name="fname"]').val(),
                                            u_lname: $('.reg_details [name="lname"]').val(),
                                            u_email: $('.reg_details [name="u_email"]').val(),
                                        },
                                        function(data, status) {
                                            $('.reg_details_response').html(data);
                                        });
                                })
                            })
                        </script>
                        <div class="reg_details_response"></div>


                        <button type="button" class="btn btn-primary w-100 m-1" href="#register_slider" disabled> Next</button>
                    </div>
                    <div class="card-body carousel-item otp_verification">
                        <div class="reg_details_response"></div>
                        <div class="d-flex justify-content-between">
                            <p class="h3">Verification</p>
                            <a class="btn btn-dark mb-3" href="#register_slider" tabindex="-1" data-slide="prev">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </div>
                        <div class="reg_resend_response"></div>
                        <div class="form-group mb-2">
                            <p class="p mb-1">The OTP is sent to your mail account ...</p>
                            <p class="p-1 px-3 m-1 btn btn-sm btn-outline-success br-5rem w-100"><i class="fa fa-envelope"></i> <span id="otp_email"></span></p>
                        </div>
                        <div class="divider mb-3"></div>
                        <div class="form-group">
                            <label for="">Enter OTP</label>
                            <input type="text" maxlength="6" name="OTP" class="form-control">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">*The OTP is been sent to your email</small>
                                <label for="" class="my-2"><a class="resend_OTP" tabindex="-1">Resend OTP</a></label>
                            </div>
                        </div>
                        <div class="otp_response"></div>
                        <button type="button" class="btn btn-primary w-100 m-1" href="#register_slider"> Next</button>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('[name="OTP"]').on('focus keyup', function() {
                                if ($(this).val().length == 6) {
                                    $('.otp_verification .w-100[href="#register_slider"]').removeAttr('disabled');
                                } else {
                                    $('.otp_verification .w-100[href="#register_slider"]').attr('disabled', 'true');
                                }
                            })

                            $('.resend_OTP').click(function() {
                                $(this).html('<div><span class="spinner-grow spinner-grow-sm"></span> Loading...</div>');
                                $(this).addClass('disabled');
                                $.post("register/reg_details_validation.php", {
                                        u_fname: $('.reg_details [name="fname"]').val(),
                                        u_lname: $('.reg_details [name="lname"]').val(),
                                        u_email: $('.reg_details [name="u_email"]').val(),
                                        u_resend_otp: 1
                                    },
                                    function(data, status) {
                                        $('.reg_details_response').html(data);
                                        $('.otp_response').html("");
                                    });
                            })

                            $('.otp_verification .w-100[href="#register_slider"]').click(function() {
                                $(this).html('<div><span class="spinner-grow spinner-grow-sm"></span> Loading...</div>');
                                $.post("register/otp_validation.php", {
                                        u_email: $('.reg_details [name="u_email"]').val(),
                                        u_otp: $('.otp_verification [name="OTP"]').val()
                                    },
                                    function(data, status) {
                                        $('.reg_details_response').html("");
                                        $('.otp_response').html(data);
                                    });
                            })
                        })
                    </script>

                    <div class="card-body carousel-item personal_details">
                        <div class="otp_response"></div>
                        <div class="d-flex justify-content-between">
                            <p class="h3">Personal Details</p>
                            <a class="btn btn-dark mb-3" href="#register_slider" tabindex="-1" data-slide="prev">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </div>

                        <div class="form-group">
                            <label for="">Are you a Student ?</label>
                            <div class="form-control form-radio">
                                <input type="radio" name="user_type" value="student" class="ml-0">
                                <label for="">Yes</label>
                                <input type="radio" name="user_type" value="staff" class="ml-3">
                                <label for="">No</label>
                            </div>
                            <small class="text-muted">*Select student if you are a student</small>
                        </div>

                        <div class="form-group d-none">
                            <label for="">Enter Authentication Token</label>
                            <input type="text" name="staff_auth" class="form-control" disabled>
                            <small class="text-muted">*It will be given by your admin staff</small>
                        </div>
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select class="form-control" name="gender" id="">
                                <option value="">--- Select ---</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group mb-0">
                            <label for="">Date of Birth</label>
                            <input type="date" value="1980-01-01" name="date_of_birth" min="1960-01-01" class="form-control">
                        </div>
                        <div class="form-group p-1 d-flex">
                            <input type="checkbox" name="agree" class="m-1">
                            I Agree the terms and conditions.
                        </div>

                        <div class="reg_response"></div>
                        <button type="button" class="btn btn-success w-100 m-1" href="#register_slider" disabled> Register</button>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        var checkbox = 0,
                            auth = 1,
                            select = 0;
                        $('.personal_details select,.personal_details input').on('change keyup focus', function() {
                            if ($(this).val() != "") {
                                $(this).addClass('border-success');
                                $(this).removeClass('alert-danger border-danger');
                                select = 1;
                            } else {
                                $(this).addClass('alert-danger border-danger');
                                $(this).removeClass('border-success');
                                select = 0;
                            }
                        })

                        $('[name="user_type"]').change(function() {
                            if ($(this).val() == "staff") {
                                $('[name="staff_auth"]').removeAttr("disabled");
                                $($('[name="staff_auth"]').closest('.form-group')).removeClass('d-none');
                                auth = 0;
                                if ($(this).val() != "") {
                                    $(this).addClass('border-success');
                                    $(this).removeClass('alert-danger border-danger');
                                    auth = 1;
                                }
                            } else {
                                $('[name="staff_auth"]').attr("disabled", "true");
                                $($('[name="staff_auth"]').closest('.form-group')).addClass('d-none');
                                $('[name="staff_auth"]').removeClass('alert-danger border-danger');
                                auth = 1;
                            }
                        })

                        $('[name="staff_auth"]').on('focus keyup', function() {
                            if ($(this).val() != "") {
                                $(this).addClass('border-success');
                                $(this).removeClass('alert-danger border-danger');
                                auth = 1;
                            } else {
                                $(this).addClass('alert-danger border-danger');
                                $(this).removeClass('border-success');
                                auth = 0;
                            }
                        })
                        $('[name="agree"]').change(function() {
                            if ($(this).is(":checked")) {
                                checkbox = 1;
                            } else {
                                checkbox = 0;
                            }
                        })

                        $('.personal_details input,.personal_details select').on('change keyup', function() {
                            if (select == 1 && checkbox == 1 && auth == 1) {
                                $('.personal_details .w-100[href="#register_slider"]').removeAttr('disabled');
                            } else {
                                $('.personal_details .w-100[href="#register_slider"]').attr('disabled', 'true');
                            }
                        })

                        $('.personal_details .w-100[href="#register_slider"]').click(function() {
                            $(this).html('<div><span class="spinner-grow spinner-grow-sm"></span> Loading...</div>');
                            $.post("register/registeration_validation.php", {
                                    u_fname: $('.reg_details [name="fname"]').val(),
                                    u_lname: $('.reg_details [name="lname"]').val(),
                                    u_email: $('.reg_details [name="u_email"]').val(),
                                    u_phone: $('.reg_details [name="u_phone"]').val(),
                                    u_reg_pass: $('.reg_details [name="u_reg_pass"]').val(),
                                    u_type: $('.personal_details [name="user_type"]:checked').val(),
                                    u_staff_auth: $('.personal_details [name="staff_auth"]').val(),
                                    u_gender: $('.personal_details [name="gender"]').val(),
                                    u_date_of_birth: $('.personal_details [name="date_of_birth"]').val()
                                },
                                function(data, status) {
                                    $('.reg_details_response').html("");
                                    $('.otp_response').html("");
                                    $('.reg_response').html(data);
                                });
                        })
                    })
                </script>
            </div>
            <div class="card-footer">
                <p class="text-center m-0">Already Register? <a href="javascript:void(0)" onclick="$('#login_slide').carousel(0)">login</a></p>
            </div>
        </div>
    </form>
</div>