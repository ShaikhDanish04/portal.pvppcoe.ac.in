<style>
    .user-img {
        transition: all .1s;
        margin: 5px 10px 0px auto;
        height: 80px;
        width: 80px;
        display: inline-block;
        background: #e7e7e7;
        border-radius: 5rem;
        /* padding: 5px; */
        border: 2px solid #4e4e4e;
        background-image: url(assets/img/dummy-avatar.png);
        background-size: contain;
        background-position: center;
    }
</style>

<?php $message = "";
include('constraint/password_update.php') ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mb-2 d-flex align-items-center">
            <div class="d-block">
                <h1 class="h3 mb-0"><?php echo $user['u_name'] . " " . $user['u_surname']; ?> <span class="badge badge-info text-capitalize"><?php echo $user['u_type']; ?></span></h1>
                <p class="">UID : <?php echo $user['UID']; ?></p>
            </div>
            <img class="user-img" src="" alt="">
        </div>
        <div class="divider w-100 mb-3"></div>

        <div class="col-12">
            <?php echo $message ?>
        </div>

        <div class="col-6 col-lg-4 mb-3">
            <button class="w-100 btn btn-primary p-3 nav-link" data-toggle="collapse" href="#collapseOne">Update Password</button>
        </div>
        <div class="col-6 col-lg-4 mb-3">
            <button class="w-100 btn btn-secondary p-3 nav-link" data-toggle="collapse" href="#collapseTwo">Request Update Details</button>
        </div>
        <div class="col-12 col-lg-4 mb-3">
            <button class="w-100 btn btn-info p-3 nav-link" data-toggle="collapse" href="#collapseThree">Submit Feedback</button>
        </div>
        <div id="accordion" class="col-md-12">

            <div id="collapseOne" class="collapse" data-parent="#accordion">
                <div class="card">
                    <div class="card-head">
                        Update Password
                    </div>
                    <div class="card-body">
                        <form action="" onSubmit="return confirm('Are you sure?');" method="post">
                            <div class="form-group toggle-password">
                                <label>Current Password</label>
                                <input type="password" class="form-control" autocomplete="on" name="current_password" required>
                                <i class="fa fa-eye-slash"></i>
                            </div>
                            <div class="form-group toggle-password">
                                <label>New Password</label>
                                <input type="password" class="form-control" autocomplete="on" name="new_password" required>
                                <i class="fa fa-eye-slash"></i>
                                <small class="text-muted">*Should be 8-digit or more with atleast 1-Capital Letter,1-Small Letter, 1-Number, 1-Symbol</small>
                            </div>
                            <div class="form-group toggle-password">
                                <label>Confirm New Password</label>
                                <input type="password" class="form-control" autocomplete="on" name="confirm_password" required>
                                <i class="fa fa-eye-slash"></i>
                            </div>
                            <div class="d-flex">
                                <button type="submit" name="update_password" class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                <div class="card">
                    <div class="card-head">
                        Request Update Details
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Reason</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="collapseThree" class="collapse" data-parent="#accordion">
                <div class="card">
                    <div class="card-head">
                        Submit System Feedback / System Issues
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Feedback</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="d-flex">
                            <button class="btn btn-success">Send</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-6 p-0">
            <div class="card">
                <div class="card-head">
                    Personal Info
                </div>

                <?php //echo $row['u_fname']; 
                ?>
                <?php //echo $row['u_lname']; 
                ?>
                <?php //echo $row['u_gender']; 
                ?>
                <?php //echo $row['u_date_of_birth']; 
                ?>
                <?php //echo $row['u_type']; 
                ?>
                <div class="card-body">
                    <p>Name : <?php echo $user['u_name'] . " " . $user['u_surname'] ?></p>
                    <p>Gender : <?php //echo $row['u_gender'] ?></p>
                    <p>Birthday : <?php //echo $row['u_date_of_birth'] ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-0">
            <div class="card">
                <div class="card-head">
                    Contact Info
                </div>
                <div class="card-body">
                    <p>Email : <?php echo $user['u_email']; ?></p>
                    <p>Phone : <?php echo $user['u_phone']; ?></p>
                    <p>Address : </p>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .row {
        margin-right: -15px;
        margin-left: -15px;
    }
</style>