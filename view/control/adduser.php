<style>
    .register-card {
        max-width: 500px;
        margin: auto;
    }
</style>
<?php
$user_result = $conn->query("SELECT (u_count) FROM users ORDER BY u_count DESC LIMIT 1");
$user_count = $user_result->fetch_assoc();
$u_uid_gen = "UD_" . ($user_count['u_count'] + 1);

if (isset($_POST['adduser'])) {
    print_r($_POST);
    date("d-m-Y h:i:s:a");
}
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-3 py-0">
            <div class="card m-0">

                <div class="card-head">
                    <p class="text-primary text-uppercase"><i class="fa fa-address-book"></i> User Record</p>
                </div>

                <div class="card-body text-center">
                    <canvas id="doughnut-chart" class="mb-3 text-danger" width="600" height="450">

                    </canvas>
                    <span class="value text-success h3"><?php echo $user_count['u_count'] ?></span>
                    <p class="h6">Accounts we have</p>

                    <script>
                        $(document).ready(function() {

                            new Chart(document.getElementById("doughnut-chart"), {
                                type: 'doughnut',
                                data: {
                                    labels: ["Students", "Staff" , "Parents"],
                                    datasets: [{
                                        // label: "Count of Users",
                                        backgroundColor: ["#f63a6d", "#ffb554", "#3fbfbe"],
                                        data: [1230, 150 , 500]
                                    }]
                                },
                                options: {
                                    legend: {
                                        display: false
                                    },
                                    title: {
                                        display: true,
                                        text: 'Chart of User Accoounts',
                                        fontSize: 16,
                                        padding: 10
                                    },
                                    animation: {
                                        duration: 1500 // general animation time
                                    },
                                }
                            });
                        })
                    </script>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card register-card">

                <form action="" method="post">
                    <div class="card-head">
                        <p class="text-danger"><i class="fa fa-user-plus"></i> Add New User</p>
                </div>
                <div class="card-body px-2">
                    <div class="row">
                        <input type="hidden" name="u_count" value="<?php echo $user_count['u_count'] + 1 ?>" required>
                        <input type="hidden" name="UID" value="<?php echo $u_uid_gen ?>" required>
                        <div class="form-group col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="u_name" required>
                            <small class="form-text text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="u_surname" required>
                            <small class="form-text text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="u_email" required>
                            <small class="form-text text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Phone</label>
                            <input type="number" class="form-control" name="u_phone" required>
                            <small class="form-text text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">User Type</label>
                            <select class="form-control" name="u_type">
                                <option value="">--- Select ---</option>
                                <option value="staff">Staff</option>
                                <option value="student">Student</option>
                            </select>
                            <small class="form-text text-muted">*Required</small>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="u_password" value="123456" required>
                            <small class="form-text text-muted">*Required</small>
                        </div>
                        <!-- <div class="form-group col-md-12">
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="" value="checkedValue">
                                All the above details are valid
                            </label>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="card-foot">
                <input type="submit" name="adduser" class="btn btn-success btn-sm ml-auto d-block" value="Add User" required>
            </div>
        </form>
    </div>
</div>
    </div>
</div>