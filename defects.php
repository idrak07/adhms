<?php require_once('template/header.php');
require('dbConfig.php');

$subjectId = $_GET['subjectId'];

?>
<div class="container-fluid">

    <div class="row mt-2 mb-5">
        <div class="col-6">
            <h3 class="btn btn-info">DEFECTS</h3>
        </div>
        <div class="col-6 text-right">
        <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'supervisor') : ?>
                <a href="add-history.php?subjectId=<?php echo $subjectId; ?>" class="btn" style="background-color: #9c0b94; color: white;"><i class="fa fa-plus"></i> ADD NEW</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th style="width:5%" style="Height:5%" class="p-2 mb-2 bg-secondary text-white">No</th>
                        <th style="width:10%" style="Height:5%" class="p-2 mb-2 bg-primary text-white">Date</th>
                        <th style="width:10%" style="Height:5%" class="p-2 mb-2 bg-secondary text-white">Engine no</th>
                        <th style="width:25%" style="Height:5%" class="p-2 mb-2 bg-primary text-white">Description</th>
                        <th style="width:25%" style="Height:5%" class="p-2 mb-2 bg-secondary text-white">Rectification</th>
                        <th style="width:5%" style="Height:5%" class="p-2 mb-2 bg-primary text-white">Editor</th>
                        <th style="width:20%" style="Height:5%" class="p-2 mb-2 bg-secondary text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $defect->getHistoriesBySubject($subjectId); ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $('.datatable').dataTable({

    });
</script>
<?php require_once('template/footer.php') ?>