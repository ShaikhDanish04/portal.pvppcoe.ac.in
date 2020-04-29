<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="theme-color" content="#1e1e1e">
<meta name="description" content="PVPPCOE Management Portal">
<meta name="author" content="Danish Shaikh">
<link rel="shortcut icon" href="assets/img/college_logo.png" type="image/x-icon">


<link rel="stylesheet" href="<?php echo $addr_space ?>assets/fonts/font-awesome.min.css?v4.6">
<link rel="stylesheet" href="<?php echo $addr_space ?>assets/bootstrap/bootstrap.min.css?v4.6">
<link rel="stylesheet" href="<?php echo $addr_space ?>assets/style.css?v5">

<script src="<?php echo $addr_space ?>assets/jQuery/jquery.min.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/bootstrap/popper.min.js"></script>
<script src="<?php echo $addr_space ?>assets/bootstrap/bootstrap.min.js?v4.6"></script>
<script src="<?php echo $addr_space ?>assets/dropzone/dropzone.min.js?v4.6"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


<script>
    url = window.location.search;
    string = "";
    var i = 0;
    if (url.charAt(0) == '?') {

        while (i < url.length) {
            // console.log(url.charAt(i));

            switch (url.charAt(i)) {
                case '?':
                    string = string.concat('{"');
                    break;
                case '=':
                    string = string.concat('":"');
                    break;
                case '&':
                    string = string.concat('","');
                    break;

                default:
                    string = string.concat(url.charAt(i));
            }
            i++;
        }
        string = string.concat('"}');
        getObj = JSON.parse(string);
    }
</script>


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

    .table {
        overflow-x: hidden;
    }

    .table:hover {
        overflow-x: scroll;
    }
</style>
<style>
    .body-loading-overlay {
        position: fixed;
        height: 100%;
        width: 100%;
        background: #fff;
        /* background: rgba(0, 0, 0, 0.75); */
        display: flex;
        z-index: 99999;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .content-view .body-loading-overlay {
        position: absolute;
        top: 0;
        background: rgba(0, 0, 0, 0.75);
    }

    .pre-loader {
        position: relative;
    }

    .content-view .pre-loader {
        background: #fff;
        padding: 30px 10px;
        border-radius: 2rem;
    }

    .content-view .body-loading-overlay .pre-loader-logo {
        height: 160px;
    }

    .body-loading-overlay .pre-loader-logo {
        height: 200px;
        display: block;
        margin: auto;
    }

    .body-loading-overlay .pre-loader-gif {
        height: 80px;
        display: block;
        margin: auto;
    }

    .body-loading-overlay .fa {
        margin-top: 20px;
        color: #fff;
        display: block;
        font-size: 50px;
    }

    .bar-menu {
        transition: .3s;
        height: 0px;
        font-size: 0px;
        width: 0px;
        padding: 0px;
        overflow: hidden;
        color: #fff;
        border-radius: 5rem;
        background: rgba(0, 0, 0, 0);
    }

    .bar-menu.open {
        background: rgba(0, 0, 0, 0.5);
        font-size: unset;
        height: unset;
        width: unset;
        padding: 4px 10px;
    }

    .bar-menu i.fa:hover {
        cursor: pointer;
        text-shadow: 0 0 3px;
    }

    .caret-on .banner {
        padding: 0;
        height: 0;
    }
</style>
<style>
    .user-content .dropdown-menu.show {
        top: 15px !important;
        left: 15px !important;
        text-shadow: 0 0 0;
        padding-bottom: 0px;
        overflow: hidden;
    }

    .user-content .content-data p.title {
        white-space: nowrap;
        width: 250px;
        overflow: hidden;
        font-size: 12px;
        text-overflow: ellipsis;
        padding: 5px 0px;
        font-weight: 400;
    }

    .user-content .dropdown-foot {
        font-size: 12px;
        background: #ebebeb;
        padding: 10px;
        margin-top: 10px;
        text-align: center;
        font-weight: 400;
    }

    .user-content .dropdown-head {
        text-align: center;
        color: #ad2822;
        padding: 10px;
        border-bottom: 1px solid #ebebeb;
        margin-bottom: 10px;
    }

    .content-data .date-time {
        transition: .2s;
        height: 0;
        overflow: hidden;
        font-size: 10px;
        /* color: inher; */
    }

    .content-data:hover .date-time {
        height: unset;
    }

    .banner-zoom {
        display: flex;
        flex-direction: column;
    }

    .banner-zoom .btn {
        padding: 0.1rem .4rem !important;
        /* box-shadow: none; */
        border-radius: 5rem;
        font-size: 10px;
    }

    .side.hover .my-profile:hover,
    .side.stick .my-profile:hover {
        /* transition: all 1s; */
        background: linear-gradient(-45deg, #dcdcdc, #969696);
        box-shadow: 0 0 10px #000;
        height: 265px;
    }

    .my-profile {
        cursor: pointer;

    }

    .my-profile .profile-link {
        transition: .5s;
        height: 0px;
        /* display: inline-block; */
        overflow: hidden;
    }

    .side:hover .my-profile:hover .profile-link {
        transition: .5s;
        height: 20px;
    }

    .side-dropdown {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        padding-right: 10px;
    }

    .content.stick {
        margin-left: 200px;
        width: calc(100% - 150px);
    }

    .ui-loader {
        opacity: 0;
    }
</style>

<style>
    .min-height {
        min-height: calc(100vh - 120px);
    }
    .reg-user-img {
        display: block;
        height: 65px;
        width: 65px;
        border-radius: 5rem;
        background: url(assets/img/dummy-avatar.png);
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        box-shadow: 0 3px 5px #ddd;

    }
</style>
<style>
    table:hover {
        overflow-x: scroll !important;
    }
</style>