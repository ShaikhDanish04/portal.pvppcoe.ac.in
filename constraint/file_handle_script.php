    <?php
    $target_dir = "../uploads/";

    $user_dir = $_POST['ID'];
    $key = $_POST['document'];

    $path = $target_dir . $user_dir;

    if (!is_dir($path)) {
        echo ("$path is not a directory");
        mkdir($path);
    }
    $path = $path . "/";

    $file_name = $key . ".jpg";
    $target_file = $path . $file_name;

    if (isset($_POST['delete'])) {

        if (!unlink($target_file)) {
            echo ("Error deleting $target_file");
        } else {
            echo ("Deleted $target_file");
        }
    }
    if (isset($_POST['upload'])) {


        $_POST[$key] = $target_file;
        move_uploaded_file($_FILES['files']['tmp_name'][0], $target_file);

    }
    ?>

    