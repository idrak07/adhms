<?php require_once('template/header.php');
require('dbConfig.php');

$id = $_GET['id'];
$entry = $defect->getDefectsById($id);
$subjectId = $entry['subject_id'];

$datetime1 = date_create($entry['date_of_entry']);
$datetime2 = date_create($entry['date_of_clearance']);
$interval = date_diff($datetime1, $datetime2);
$downTime = $interval->format('%a days');


$reporter = $defect->getReporterName($entry['created_by_user_id']);
$reporterFname = $reporter['first_name'];
$reporterLname = $reporter['last_name'];

$recUser = $defect->getReporterName($entry['rectification_by']);
$recUserFname = $recUser['first_name'];
$recUserLname = $recUser['last_name'];


?>
<div class="container">

    <div class="row mt-3">
        <div class="col-12 text-center">
            <h2 class="btn btn-info">HISTORY</h2>
        </div>
        <div class="col-12 text-right">
            <a href="defects.php?subjectId=<?php echo $subjectId; ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-4">
            <h6><b>Date of entry</b></h6>
        </div>
        <div class="col-6">
            <h6><?php echo $entry['date_of_entry']; ?></h6>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h5><b>Date of clearance</b></h5>
        </div>
        <div class="col-8">
            <h5><?php echo $entry['date_of_clearance']; ?></h5>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h5><b>Downtime</b></h5>
        </div>
        <div class="col-8">
            <h5><?php echo $downTime; ?></h5>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h6><b>Engine No</b></h6>
        </div>
        <div class="col-8">
            <h6><?php echo $entry['engine_no']; ?></h6>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h6><b>Description</b></h6>
        </div>
        <div class="col-8">
            <h6><?php echo $entry['description']; ?></h6>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h6><b>Rectification work</b></h6>
        </div>
        <div class="col-8">
            <h6><?php echo $entry['rectification_work']; ?></h6>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h6><b>Remarks</b></h6>
        </div>
        <div class="col-8">
            <h6><?php echo $entry['remarks']; ?></h6>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h5><b>Rectification By</b></h5>
        </div>
        <div class="col-8">
            <h5><?php echo $recUserFname . ' ' . $recUserLname ?></h5>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-4">
            <h5><b>Reporter</b></h5>
        </div>
        <div class="col-8">
            <h5><?php echo $reporterFname . ' ' . $reporterLname ?></h5>
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