<div class="container">
    <div class="card about-us">
        <div class="card-head px-0">
            <p class="h3">Meet the Team</p>
        </div>
        <div class="card-body px-0">
            <p class="mb-5 text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora cupiditate corrupti qui esse odio. Neque, numquam. Odio est maiores fuga, quia doloremque cum, eos possimus dolorem aspernatur autem nesciunt? Veniam?
            </p>

            <div class="dev-prof d-flex mb-2 flex-column flex-md-row">
                <img class="dev-img" src="assets/img/team/danish_shaikh.jpg" alt="">
                <div class="dev-details">
                    <p class="dev-name">Danish Shaikh</p>
                    <p class="dev-role">Project Leader | Full Stack Developer</p>
                    <p class="dev-desc text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, iure? Cupiditate recusandae ea quam omnis? Impedit harum optio maiores voluptas vitae accusantium. Magni officiis maiores accusantium doloribus placeat veniam ex?</p>
                </div>
            </div>
            <div class="dev-prof d-flex mb-2 flex-column flex-md-row">
                <img class="dev-img" src="assets/img/team/sayalee_falle.png" alt="">
                <div class="dev-details">
                    <p class="dev-name">Sayalee Falle</p>
                    <p class="dev-role">UX Designer | Tester</p>
                    <p class="dev-desc text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, iure? Cupiditate recusandae ea quam omnis? Impedit harum optio maiores voluptas vitae accusantium. Magni officiis maiores accusantium doloribus placeat veniam ex?</p>
                </div>
            </div>
            <div class="dev-prof d-flex mb-2 flex-column flex-md-row">
                <img class="dev-img" src="assets/img/team/sandeep_raskar.png" alt="">
                <div class="dev-details">
                    <p class="dev-name">Dr. Sandeep Raskar</p>
                    <p class="dev-role">Project Mentor</p>
                    <p class="dev-desc text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, iure? Cupiditate recusandae ea quam omnis? Impedit harum optio maiores voluptas vitae accusantium. Magni officiis maiores accusantium doloribus placeat veniam ex?</p>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .about-us {

        padding: 5px 20px;
    }

    .dev-img {

        flex-shrink: 0;
        margin: 10px;
        height: 180px;
        width: 180px;
        border: 1px solid;
        transition: .5s;
        border-radius: 50%;
        background: url(assets/img/dummy-avatar.png);
        background-size: cover;
        background-position: center;
    }

    .dev-prof:hover .dev-img {
        border-radius: 5px;
        height: 200px;
    }

    .dev-details {
        padding: 10px 20px;
        margin: 10px;
        border-left: 1px solid #ccc;
    }

    .dev-prof {
        transition: .5s;
    }

    .dev-prof:hover {
        padding: 30px 0px;
    }

    .dev-name {
        transition: .5s;
        font-size: 24px;
        font-weight: 500;
    }

    .dev-role {
        transition: .5s;
        font-size: 20px;
        margin-top: -5px;
        font-style: italic;
        color: #444;
        margin-bottom: 5px;
    }
</style>