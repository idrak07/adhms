<?php require_once('template/header.php');
require('dbConfig.php');

$tradeId = $_GET['tradeId'];

?>
<div class="container-fluid">
    <div class="row my-5">
        <div class="col-6">
            <h2 class="btn btn-info">SUBJECTS</h2>
        </div>
        <div class="col-6 text-right">
        <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'supervisor') : ?>
                <a href="add-subject.php?tradeId=<?php echo $tradeId; ?>" class="btn" style="background-color: #9c0b94; color: white;"><i class="fa fa-plus"></i> Add new</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th class="p-2 mb-2 bg-secondary text-white">No</th>
                        <th class="p-2 mb-2 bg-info text-white">Subject name</th>
                        <th class="p-2 mb-2 bg-secondary text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $subject->getSubjectsByTradeId($tradeId); ?>
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