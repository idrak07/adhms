<?php 
require_once('template/header.php');
$typeId = $_GET['typeId'];
?>
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-12">
            <h3 class="p-3 mb-2 bg-danger text-white">ADD AIRCRAFT</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="messageaircraft"></div>
        </div>
    </div>
    <form id="aircraftForm" action="addAirCraft.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="serialNo">Serial No</label>
                    <input type="text" class="form-control" name="serialNo" id="serialNo" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="doa">Date of acceptance</label>
                    <input type="date" class="form-control" name="doa" id="doa" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="ph">Present hours</label>
                    <input type="number" class="form-control" name="ph" id="ph" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="tso">TSO</label>
                    <input type="text" class="form-control" name="tso" id="tso" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="noh">Next OH</label>
                    <input type="number" class="form-control" name="noh" id="noh" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="tonh">Type of Next OH</label>
                    <input type="text" class="form-control" name="tonh" id="tonh" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="hlnoh">Hours left Next OH</label>
                    <input type="number" class="form-control" name="hlnoh" id="hlnoh" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="hlopsl">Hourse left OPS life</label>
                    <input type="number" class="form-control" name="hlopsl" id="hlopsl" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <label for="fileToUpload">Type name</label>
                <input required accept="image/*" type="file" name="fileToUpload" id="fileToUpload" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-3 mt-5">
                <div class="form-group">
                    <input type="number" name="typeId" id="typeId" value="<?php echo $typeId?>" hidden>
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