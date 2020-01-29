<?php
$simpletext = "{}";
$encryption = "";
if (isset($_POST['request_admission_form'])) {
    $encryption = openssl_encrypt($simpletext, "AES-128-CTR", "$UID", 0, $iv);

    $conn->query("INSERT INTO `student_admission_table` (`UID`, `personal`, `address`, `allotment`, `education`, `bank`, `family`, `form_status`) 
        VALUES ('$UID', '$encryption', '$encryption', '$encryption', '$encryption', '$encryption', '$encryption', 'pending')");

    $conn->error;
}

// Display the decrypted string 


if (isset($_POST['personal_details'])) {
    $encryption = openssl_encrypt(json_encode($_POST), "AES-128-CTR", "$UID", 0, $iv);
    $conn->query("UPDATE `student_admission_table` SET `personal` = '$encryption' WHERE `UID` = '$UID'");
}
if (isset($_POST['address_details'])) {
    $encryption = openssl_encrypt(json_encode($_POST), "AES-128-CTR", "$UID", 0, $iv);
    $conn->query("UPDATE `student_admission_table` SET `address` = '$encryption' WHERE `UID` = '$UID'");
}
if (isset($_POST['allotment_details'])) {
    $encryption = openssl_encrypt(json_encode($_POST), "AES-128-CTR", "$UID", 0, $iv);
    $conn->query("UPDATE `student_admission_table` SET `allotment` = '$encryption' WHERE `UID` = '$UID'");
}
if (isset($_POST['education_details'])) {
    $encryption = openssl_encrypt(json_encode($_POST), "AES-128-CTR", "$UID", 0, $iv);
    $conn->query("UPDATE `student_admission_table` SET `education` = '$encryption' WHERE `UID` = '$UID'");
}
if (isset($_POST['bank_details'])) {
    $encryption = openssl_encrypt(json_encode($_POST), "AES-128-CTR", "$UID", 0, $iv);
    $conn->query("UPDATE `student_admission_table` SET `bank` = '$encryption' WHERE `UID` = '$UID'");
}
if (isset($_POST['family_details'])) {
    $encryption = openssl_encrypt(json_encode($_POST), "AES-128-CTR", "$UID", 0, $iv);
    $conn->query("UPDATE `student_admission_table` SET `family` = '$encryption' WHERE `UID` = '$UID'");
}


$result = $conn->query("SELECT * FROM `student_admission_table` WHERE `UID` = '$UID'");
$result_SAT = $result->fetch_assoc();

if ($result->num_rows == 0) {
    $_have_form = false;
} else {
    $_have_form = true;
}

if ($result_SAT['form_status'] == "verified") {
    $_form_verified = true;
} else {
    $_form_verified = false;
}



$personal_details = openssl_decrypt($result_SAT['personal'], "AES-128-CTR", "$UID", 0, $iv);
$address_details = openssl_decrypt($result_SAT['address'], "AES-128-CTR", "$UID", 0, $iv);
$allotment_details = openssl_decrypt($result_SAT['allotment'], "AES-128-CTR", "$UID", 0, $iv);
$education_details = openssl_decrypt($result_SAT['education'], "AES-128-CTR", "$UID", 0, $iv);
$bank_details = openssl_decrypt($result_SAT['bank'], "AES-128-CTR", "$UID", 0, $iv);
$family_details = openssl_decrypt($result_SAT['family'], "AES-128-CTR", "$UID", 0, $iv);

?>

<script>
    var personal_details = JSON.parse('<?php echo $personal_details ?>');
    var address_details = JSON.parse('<?php echo $address_details ?>');
    var allotment_details = JSON.parse('<?php echo $allotment_details ?>');
    var education_details = JSON.parse('<?php echo $education_details ?>');
    var bank_details = JSON.parse('<?php echo $bank_details ?>');
    var family_details = JSON.parse('<?php echo $family_details ?>');

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


    });
</script>
<div class="container <?php echo ($_have_form) ? 'd-none' : '' ?>">

    <div class="card mt-5 mx-auto" style="max-width: 500px;">
        <form action="" method="post">

            <div class="card-body text-center">
                <p class="h2 my-3 text-info">WELCOME</p>
                <p class="h5 mb-3 text-dark"><?php echo $user['u_name'] . " " . $user['u_surname'] ?></p>
                <p class="mb-3">The following admission form consist of your personal, address, allotment, education, bank and family details. Please fill correct and valid details according to the available blocks and instructions.</p>
                <button type="submit" name="request_admission_form" class="btn btn-success btn-sm mb-5">Request Admission Form</button>
            </div>
        </form>
    </div>
</div>

<div class="container <?php echo ($_form_verified) ? '' : 'd-none' ?>">
    <div class="alert alert-success m-3">Your Admission Form is been verified.</div>
    <?php include('admission_form_review.php'); ?>
</div>

<div class="container <?php echo ($_have_form) ? '' : 'd-none';
                        echo ($_form_verified) ? 'd-none' : '' ?>">
    <div class="nav-card card  mb-3">
        <div class="card-body">

            <!-- Nav pills -->
            <ul class="nav nav-pills nav-justified align-items-center">
                <li class="nav-item">
                    <a class="nav-link m-1 active" data-toggle="tab" href="#p0">Personal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link m-1" data-toggle="tab" href="#p1">Address</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link m-1" data-toggle="tab" href="#p2">Allotment</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link m-1" data-toggle="tab" href="#p3">Education</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link m-1" data-toggle="tab" href="#p4">Bank</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link m-1" data-toggle="tab" href="#p5">Family</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link m-1 btn-warning" data-toggle="tab" href="#p6">Review</a>
                </li>
                <li class="nav-item flex-grow-0">
                    <button id="print_button" class="btn btn-danger ml-2" onclick="window.print();" disabled><i class="fa fa-print"></i></button>
                </li>
            </ul>
        </div>
    </div>



    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="p0">
            <?php include('admission_form/personal_details.php'); ?>
        </div>
        <div class="tab-pane fade" id="p1">
            <?php include('admission_form/address_details.php'); ?>
        </div>
        <div class="tab-pane fade" id="p2">
            <?php include('admission_form/allotment_details.php'); ?>
        </div>
        <div class="tab-pane fade" id="p3">
            <?php include('admission_form/education_details.php'); ?>
        </div>
        <div class="tab-pane fade" id="p4">
            <?php include('admission_form/bank_details.php'); ?>
        </div>
        <div class="tab-pane fade" id="p5">
            <?php include('admission_form/family_details.php'); ?>
        </div>
        <div class="tab-pane fade" id="p6">
            <?php include('admission_form_review.php');
            ?>
        </div>
    </div>
</div>


<script>
    $(document).ready(() => {
        let url = location.href;

        if (location.hash) {
            const hash = url.split("#");

            $('.nav a[href="#' + hash[1] + '"]').tab("show");

            // url = location.href.replace(/\/#/, "#");
            // $('[href="' + hash + '"]').addClass('active');

            history.replaceState(null, null, url);
        }


        let hash;
        $('[data-toggle="tab"],[data-toggle="pill"]').on("click", function() {
            let newUrl;

            hash = $(this).attr("href");
            $('a.nav-link.active').removeClass('active');
            // $('a[href="' + hash + '"]').removeClass('active');

            $('[type=button]').removeClass('active');

            // console.log(hash);

            newUrl = url.split("#")[0] + hash;

            // newUrl += "/";

            history.replaceState(null, null, newUrl);
        });
        $('[type=button]').click(function() {
            $('a[href="' + hash + '"]').addClass('active');
        });

        $('input,select,textarea').on('input', function() {

            $($(this).closest("form")).find('input[type=submit]').removeAttr('disabled');
            $($(this).closest("form")).find('input[type=submit]').val('Save');
            $($(this).closest("form")).find('input[type=submit]').removeClass('btn-dark');
        })

    });
</script>