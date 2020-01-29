<style>
    .form-control[name=OTP] {
        font-size: 30px;
        font-weight: 600;
        letter-spacing: 10px;
        text-align: center;
    }

    .reg_details_response .alert {
        margin: 1rem 1rem 0rem;
    }
</style>
<div class="card" id="verification">
    <div class="card-head">
        <p class="text-danger"><i class="fa fa-envelope"></i> Email Verification</p>
    </div>

    <div id="email_verification" class="carousel slide" data-touch="false" data-ride="carousel" data-interval="false">
        <!-- The slideshow -->
        <div class="reg_details_response"></div>
        <div class="carousel-inner">
            <div class="card-body carousel-item active otp_email">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="hidden" name="fname" class="form-control" value="<?php echo $user['u_name'] ?>">
                    <input type="hidden" name="lname" class="form-control" value="<?php echo $user['u_surname'] ?>">
                    <input type="hidden" name="UID" class="form-control" value="<?php echo $user['UID'] ?>">
                    <input type="email" name="otp_email" class="form-control" value="<?php echo $user['u_email'] ?>">
                    <small class="form-text text-muted">*Enter Valid Email</small>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary btn-sm submit">Send OTP</button>
                </div>
            </div>
            <script>
                $(document).ready(function() {

                    $('.otp_email [type="email"]').on('focusout keyup', function() {
                        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                        if (regex.test($(this).val())) {
                            $(this).removeClass('alert-danger border-danger');
                            $(this).addClass('border-success');
                            $('.otp_email .submit').removeAttr('disabled');
                        } else {
                            $(this).addClass('alert-danger border-danger');
                            $(this).removeClass('border-success');
                            $('.otp_email .submit').attr('disabled', 'true');
                        }
                    })
                    $('.otp_email .submit').click(function() {
                        $(this).html('<div><span class="spinner-grow spinner-grow-sm"></span> Sending...</div>');
                        $(this).attr('disabled', 'true');
                        $('#otp_email_u').text($('.otp_email [type="email"]').val());
                        $.post("constraint/otp_verification.php", {

                                UID: $('#email_verification [name="UID"]').val(),
                                u_fname: $('#email_verification [name="fname"]').val(),
                                u_lname: $('#email_verification [name="lname"]').val(),
                                otp_email: $('[name="otp_email"]').val(),
                                otp_email_set: true
                            },
                            function(data, status) {
                                $('.reg_details_response').html(data);
                            });
                    })
                    $('.resend_OTP').click(function() {
                        $(this).html('<div><span class="spinner-grow spinner-grow-sm"></span> Sending...</div>');
                        $(this).attrClass('disabled');
                        $.post("constraint/otp_verification.php", {
                                UID: $('#email_verification [name="UID"]').val(),
                                u_fname: $('#email_verification [name="fname"]').val(),
                                u_lname: $('#email_verification [name="lname"]').val(),
                                otp_email: $('#email_verification [name="otp_email"]').val(),
                                otp_email_set: true,
                                u_resend_otp: 1
                            },
                            function(data, status) {
                                $('.reg_details_response').html(data);
                            });
                    })
                    $('.otp_verification .submit').click(function() {
                        $(this).html('<div><span class="spinner-grow spinner-grow-sm"></span> Loading...</div>');
                        $(this).attr('disabled', 'tru');
                        $.post("constraint/otp_verification.php", {

                                UID: $('#email_verification [name="UID"]').val(),
                                otp_email: $('#email_verification [name="otp_email"]').val(),
                                otp_email: $('#email_verification [name="otp_email"]').val(),
                                u_otp: $('#email_verification [name="OTP"]').val(),
                                otp_verification_set: true
                            },
                            function(data, status) {
                                $('.reg_details_response').html(data);
                            });
                    })
                })
            </script>
            <div class="card-body carousel-item otp_verification">
                <div class="d-flex justify-content-between">
                    <p class="h3">Verification</p>
                    <a class="btn btn-dark mb-3" href="#email_verification" tabindex="-1" data-slide="prev">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </div>
                <div class="reg_resend_response"></div>
                <div class="form-group mb-2">
                    <p class="p mb-1">The OTP is sent to your mail account ...</p>
                    <p class="p-1 px-3 m-1 btn btn-sm btn-outline-success br-5rem w-100"><i class="fa fa-envelope"></i> <span id="otp_email_u"></span></p>
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
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success btn-sm submit">Verify</button>
                </div>
            </div>
        </div>
    </div>
</div>