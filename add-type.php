<?php require_once('template/header.php') ?>

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-12">
            <h4 class="p-3 mb-2 bg-danger text-white">ADD AIRCRAFT TYPE</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="messageaircrafttype"></div>
        </div>
    </div>
    <form id="aircrafttypeForm" action="addAirCraftType.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="typename">Type name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <label for="fileToUpload">Image</label>
                <input required accept="image/*" type="file" name="fileToUpload" id="fileToUpload" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <input type="text" name="employee" id="employee" value="employee" hidden>
                    <input type="submit" class="btn btn-block btn-success" value="Save">
                </div>
            </div>
        </div>
    </form>
</div>
<?php require_once('template/footer.php') ?>
<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
</script>
</body>

</html>