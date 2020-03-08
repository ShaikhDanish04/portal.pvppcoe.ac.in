<style>
    .form-control[name=OTP] {
        font-size: 30px;
        font-weight: 600;
        letter-spacing: 10px;
        text-align: center;
    }
</style>

<div class="login-body">
    <p class="h2 text-center mb-3 font-weight-light"><img src="assets/img/college_logo.png" alt="" width="50px"> Recover Password</p>
    <div class="px-sm-3"><?php echo $login_response ?></div>
    <div class="card my-3">
        <div class="card-body">
            <div id="forgot_password_slide" class="carousel slide" data-touch="false" data-wrap="false" data-interval="false" data-ride="carousel">
                <div class="carousel-inner p-1">
                    <div class="carousel-item active">
                        <div class="form-group">
                            <label for="">Institite ID or Email</label>
                            <input type="text" class="form-control" name="login_id" autocomplete="on" required>
                        </div>
                        <div class="form-group m-0 text-center">
                            <input type="submit" class="btn btn-primary w-100" name="Next" value="Next">
                            <!-- <label for="" class="my-2"><a href="login">back to Login</a></label> -->
                            <label for="" class="my-2"><a href="javscript:void(0)" onclick="$('#login_slide').carousel(0)">Back to Login</a></label>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-between">
                            <p class="h3">Verification</p>
                            <a class="btn btn-dark mb-3" href="#forgot_password_slide" tabindex="-1" data-slide="prev">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </div>
                        <div class="form-group mb-2">
                            <p class="p mb-1">The OTP is sent to your mail account ...</p>
                            <p class="p-1 px-3 m-1 btn btn-sm btn-outline-info br-5rem w-100"><i class="fa fa-envelope"></i> <span id="otp_email"></span></p>
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
                        <div class="form-group m-0">
                            <input type="submit" class="btn btn-success w-100" name="verify_otp" value="Verify">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="d-flex justify-content-between">
                            <p class="h3">Update Password</p>
                            <a class="btn btn-dark mb-3" href="#forgot_password_slide" tabindex="-1" data-slide="prev">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </div>
                        <div class="form-group toggle-password">
                            <label for="u_pass">New Password</label>
                            <input type="password" class="form-control" name="u_pass" id="u_pass" autocomplete="on">
                            <i class="fa fa-eye-slash"></i>
                        </div>
                        <div class="form-group toggle-password">
                            <label for="u_pass">Confirm Password</label>
                            <input type="password" class="form-control" name="c_u_pass" id="c_u_pass" autocomplete="on">
                            <i class="fa fa-eye-slash"></i>
                        </div>
                        <div class="form-group m-0">
                            <input type="submit" class="btn btn-success w-100" name="login_submit" value="Submit">
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $('input[type=submit]').click(function() {
                    $('#forgot_password_slide').carousel("next");
                })
            </script>
            <script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            </script>


        </div>
        <div class="card-footer">
            <p class="text-center m-0">Our Term & Policies <a href="javascript:void(0)" onclick="$('#login_slide').carousel(1)"><i class="fa fa-question-circle"></i></a></p>
        </div>
    </div>
</div>