<style>
    .navigation-bar {
        padding: 10px;
        box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.32);
        background: #d4d4d4;
    }

    .navigation-bar .btn.back {
        padding: 0;
        margin: 0px 2px;
        text-align: center;
        height: 30px;
        width: 30px;
        border-radius: 50%;
        /* font-size: 10px; */
    }

    .navigation-bar .btn.back:hover {
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.32);
        background: #fff;
    }

    .navigation-bar .btn.back:focus {
        background: #fff;
        box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.32);

    }
</style>
<div class="navigation-bar d-flex align-items-center justify-content-between">
    <div class="d-flex align-items-center">
        <button class="btn back text-danger" onclick="window.history.back()"><i class="fa fa-chevron-left"></i></button>
        <button class="btn back text-success" onclick="window.history.forward()"><i class="fa fa-chevron-right"></i></button>

        <p class=" px-3 text-capitalize"><?php echo str_replace('_', ' ', str_replace('/', ' / ', str_replace('.view', ' ', $_GET['page']))); ?></p>
    </div>
    <div>
        <a class="btn btn-lg p-0 px-2 btn-dark" href="?page=dashboard.view"><i class="fa fa-home"></i></a>
    </div>


</div>