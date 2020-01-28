<style>
    .id-card-holder {
        overflow-x: scroll;
        padding: 10px;
        background: #242424;
    }

    .id-card-body .details-col .principal-sign img {
        display: block;
        /* background: red; */
        width: 100%;
        height: .6cm;
    }

    .id-card-body .details-col .principal-sign p {
        text-align: center;
        font-size: 8px;
    }

    .id-card-bg {
        height: 3cm;
        width: 12cm;
        position: absolute;
        border-radius: 50%;
        top: -49px;
        left: -17px;
        border-bottom: 2px solid #007bff;
        box-shadow: 3px 1px 5px #222;

    }

    .EXTC .id-card-bg {
        background: #008000;
    }

    .COMP .id-card-bg {
        background: #d71c1c;
    }

    .IT .id-card-bg {
        background: #0b0b88;
    }

    .id-card {
        background: #f3f3f3;
        width: 8.6cm;
        height: 5.4cm;
        border-radius: .25rem;
        position: relative;
        overflow: hidden;
        z-index: 0;
        margin: 10px auto;
    }

    .id-card .id-card-header {
        padding: .2cm .3cm .1cm;
        display: flex;
        z-index: 1;
        color: #ffffff;
    }

    .id-card .college-heading .h6 {
        font-family: sans-serif;
        font-size: 10px;
        text-transform: uppercase;
        text-align: center;
        font-weight: 600;
    }

    .id-card .college-heading p {
        font-size: 10px;
        text-align: center;
    }

    .id-card .college-logo {
        height: 1.5cm;
        border-radius: 0.25rem;
        height: 1.5cm;
        background: #fff;
        padding: .1cm;
        width: 1.5cm;
    }

    .id-card-body {
        display: flex;
    }

    .id-card-body .image-col p {
        font-size: 10px;
        text-align: center;
        font-weight: 600;
    }

    .id-card-body .details-col p.name {
        height: .75cm;
    }

    .id-card-body .details-col p {
        font-size: 10px;
        text-align: left;
        font-weight: 600;
    }

    .id-card-body .details-col span {
        color: red;
    }

    .id-card-body .details-col .h6 {
        font-size: 12px;
        text-align: center;
        text-transform: uppercase;
        font-weight: 600;
        font-style: italic;
        margin-bottom: .1cm !important;
    }

    .id-card-body .details-col {
        width: 100%;
    }

    .id-card-body .image-col .photo {
        height: 2.2cm;
        width: 2cm;
        display: block;
        border: 2px solid #7e7e7e;
        margin: 0 .2cm;
        background: url(assets/img/dummy-avatar.png);
        background-size: contain;
        background-repeat: no-repeat;
        margin-bottom: 0;
    }

    .id-card-body .image-col .sign {
        margin: 0 .2cm;
        margin-top: 0;
        height: 0.6cm;
        width: 2cm;
        display: block;
        border: 2px solid #7e7e7e;
        border-top: 0;
    }

    .id-card-body .details-col p.valid {
        font-size: 8px;
    }
</style>
<div class="card-head">
    <p class="small">Identity Card</p>
</div>
<div class="card-body id-card-holder">
    <div class="card id-card <?php echo $user['student_branch'] ?>">
        <div class="id-card-bg"></div>
        <div class="id-card-header">
            <img class="college-logo" src="assets/img/college_logo.png" alt="">
            <div class="college-heading">
                <p class="h6">Padmabhushan Vasantdada Patil Pratishthan’s</p>
                <p class="h6">College of Engineering</p>
                <p>Sion, Mumbai - 400 022.</p>
            </div>
        </div>
        <div class="id-card-body">
            <div class="image-col">
                <!-- <img src="" alt=""> -->
                <img class="photo" src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("uploads/" . $user['student_id'] . "/photo.jpg")) ?>" alt="Profile Photo" height="100%" width="100%" />
                <img class="sign" src="data:image/jpg;base64,<?php echo base64_encode(file_get_contents("uploads/" . $user['student_id'] . "/signature.jpg")) ?>" alt="Profile Photo" height="100%" width="100%" />
                <p>Student's Sign</p>
            </div>
            <div class="details-col">
                <p class="h6 mb-2">Identity Card</p>
                <p><span>Name :</span> SHAIKH MOHD DANISH MOHD SHABBIR DILAFROZ</p>
                <div class="d-flex">
                    <div class="mr-3">
                        <p><span>Course:</span> COMP ENGG</p>
                        <p><span>Birthday:</span> 04-01-1999</p>
                        <p><span>ID No.:</span> VU1S1718012</p>
                        <p><span>Admission :</span> DSE 2017-18</p>
                        <p><span>Category :</span> OPEN</p>
                    </div>
                    <div>
                        <p><span>Blood Group:</span> O+ (Positive)</p>
                        <p><span>GR No:</span> 6443</p>
                        <div class="principal-sign">
                            <img src="" alt="">
                            <p>Dr. Alam N. Shaikh</p>
                            <p>Principal</p>
                        </div>
                    </div>

                </div>
                <p class="text-center valid">VALID UPTO JULY-2020</p>
            </div>
        </div>

    </div>

</div>