
<div class="container my-5">
    <div class="card">
        <div class="card-head">
            <p class="h3">Add Latest News</p>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-8">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="" required>
                        <small class="form-text text-muted">*Required</small>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="">Date</label>
                        <input type="date" class="form-control" name="date" value="<?php echo Date('Y-m-d') ?>" id="" required>
                        <small class="form-text text-muted">*Required</small>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Reference Type</label>
                        <div class="form-radio col-md-12 row py-2">
                            <div class="col-md-4 d-flex">
                                <input type="radio" value="link" name="type" class="ml-0" required>
                                <label for="">Reference Link</label>
                            </div>

                            <div class="col-md-4 d-flex">
                                <input type="radio" value="document" name="type" class="ml-md-3" required>
                                <label for="">Document</label>
                            </div>

                            <div class="col-md-4 d-flex">
                                <input type="radio" value="none" name="type" class="ml-md-3" required>
                                <label for="">None</label>
                            </div>
                        </div>
                        <small class="form-text text-muted">*Required</small>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Reference Link</label>
                        <input type="text" class="form-control" name="refrence_link" placeholder="" required disabled>
                        <small class="form-text text-muted">*Required</small>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="">Reference Document</label>
                        <input type="file" class="form-control" name="refrence_document" placeholder="" required disabled>
                        <small class="form-text text-muted">*Required</small>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('[name="type"]').change(function() {
                            $('[name="refrence_link"]').attr("disabled", "true");
                            $('[name="refrence_document"]').attr("disabled", "true");
                            switch ($(this).val()) {
                                case "link":
                                    $('[name="refrence_link"]').removeAttr("disabled");
                                    break;
                                case "document":
                                    $('[name="refrence_document"]').removeAttr("disabled");
                                    break;
                            }
                        })
                    })
                </script>

                <input class="btn btn-success" type="submit" value="Submit">
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-head">
            <p class="h3">List Latest News</p>
        </div>
        <div class="card-body">
            <?php
            $result = $conn_main->query("SELECT * FROM `latest_news`");
            $row = $result->fetch_assoc();

            print_r($row);
            print_r($_POST['form_data']);
            ?>
        </div>
    </div>
</div>

