<!-- The Modal -->
<div class="modal fade" id="upload">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-dark">
                <p class="modal-title h6 text-white text-center text-capitalize"><i class="fa fa-upload"></i> <?php echo str_replace("_", " ", $_POST['document']) ?></p>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="dropzone"></div>
                <button class="btn btn-danger btn-sm delete-button">Delete Current Linked File</button>
            </div>

        </div>
    </div>
</div>
<style>
    .extra-progress-wrapper .progress {
        margin: 20px auto !important;
    }

    .nniicc-dropzoneParent::before {
        color: #ccd6e3;
        content: "\f093";
        font: normal normal normal 110px/1 FontAwesome;
        position: absolute;
        top: 50%;
        right: 50%;
        transform: translate(50%, -50%);

    }
</style>
<script>
    $(document).ready(function() {
        $('.delete-button').click(function() {
            if (confirm('Are you sure?')) {
                $.ajax({
                    method: "POST",
                    url: "constraint/file_handle_script.php",
                    data: {
                        'ID': '<?php echo $_POST['ID'] ?>',
                        'document': '<?php echo $_POST['document'] ?>',
                        "delete": '1'
                    },
                    success: function(result) {
                        // $("#file_handle").html(result);
                        // alert(result);
                        location.reload();
                    }
                })
            }
        })
        $(".dropzone").dropzone({
            url: 'constraint/file_handle_script.php',
            margin: 20,
            width: "unset",
            params: {

                'ID': '<?php echo $_POST['ID'] ?>',
                'document': '<?php echo $_POST['document'] ?>',
                'upload': '1',
                'action': 'save'
            },
            success: function(res, index, data) {
                console.log(res, index);
                // alert(data);
                // $("#upload").modal('hide')
                alert('Your file is been uploaded');
                location.reload();
            }
        });
    })
</script>