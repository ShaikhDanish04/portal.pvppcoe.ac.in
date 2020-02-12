<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="theme-color" content="#1e1e1e">
<meta name="description" content="PVPPCOE Management Portal">
<meta name="author" content="Danish Shaikh">
<link rel="shortcut icon" href="assets/img/college_logo.png" type="image/x-icon">


<link rel="stylesheet" href="<?php echo $addr_space ?>assets/fonts/font-awesome.min.css?v4.6">
<link rel="stylesheet" href="<?php echo $addr_space ?>assets/bootstrap/bootstrap.min.css?v4.6">
<link rel="stylesheet" href="<?php echo $addr_space ?>assets/style.css?v4.7">

<script src="<?php echo $addr_space ?>assets/jQuery/jquery.min.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/bootstrap/popper.min.js"></script>
<script src="<?php echo $addr_space ?>assets/bootstrap/bootstrap.min.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/dropzone/dropzone.min.js?v4.6"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>





<?php
include("connect.php");

if (isset($_GET['logout'])) {
    setcookie("cK123", "", 0); // 86400 = 1 day
    setcookie("cKsd", "", 0); // 86400 = 1 day
    session_unset();
    session_destroy();

    header('Location: login');
}



if (!isset($_GET['page'])) {
    $_GET['page'] = 'my_profile';
}
?>

<style>
    /* The switch - the box around the slider */
    .form-switch {
        align-items: center;
        justify-content: space-between;
        display: flex;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 24px;
        margin: 0px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .switch .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 34px;
    }

    .switch .slider:before {
        position: absolute;
        content: "";
        height: 15px;
        width: 15px;
        left: 6px;
        right: unset;
        top: 50%;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
        transform: translateY(-50%);
    }

    input:checked+.slider:before {
        left: unset;
        right: 6px;

    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    .upload-here:hover::after {
        cursor: pointer;
        content: "\f093 \a";
        white-space: pre;
        display: flex;
        align-items: center;
        font: normal normal normal 18px/1 FontAwesome;
        justify-content: center;
        position: absolute;
        border-radius: inherit;
        color: #fff;
        border: 2px dashed #fff;
        height: 90%;
        width: 90%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%)
    }

    .upload-here:hover::before {
        content: "";
        top: 0px;
        left: 0px;
        position: absolute;
        height: 100%;
        width: 100%;
        background: rgba(0, 0, 0, 0.6);
    }
</style>