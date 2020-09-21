<!DOCTYPE html>

<html lang="en">

<head>
    <?php include('main/head.php') ?>
</head>

<body class="c-app">
    <?php include('main/navbar.php') ?>


    <div class="c-wrapper">
        <?php include('main/header.php') ?>

        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div id="ui-view">
                        <div>
                            <?php

                            $page = $_GET['page'];

                            require_once('pages/' . $page . '.php') ?>
                            
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <footer class="c-footer">
            <div><a href="https://coreui.io">CoreUI</a> © 2020 creativeLabs.</div>
            <div class="mfs-auto">Powered by&nbsp;<a href="https://coreui.io/pro/">CoreUI Pro</a></div>
        </footer>
    </div>
    <?php include('main/foot.php') ?>

</body>

</html>