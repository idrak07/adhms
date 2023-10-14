<?php require_once('template/header.php');
require('dbConfig.php');

$aircraftId = $_GET['aircraftId'];
$ac = $airCraft->getAIrCraftById($aircraftId);
$typeId = $ac['aircraft_type_id'];
$acType = $airCraftType->getTypeById($typeId);
$fileKey = $ac['unique_image_key'] . '.' . $ac['ext'];

?>
<div class="container-fluid">

    <div class="row mt-3">
        <div class="col-12 text-center">
            <h4 class="p-2 mb-2 bg-info text-white"><?php $airCraftType->printTypeName($typeId); ?>: SERIAL NO <?php echo $ac['serial_no']; ?></h4>
        </div>
        <div class="col-12 text-right">
            <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'supervisor') : ?>
                <a href="edit-aircraft.php?id=<?php echo $aircraftId; ?>" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
            <?php endif; ?>
            <?php if ($_SESSION['type'] == 'admin') : ?>
                <a onClick="javascript: return confirm('Are you sure you want to delete it?');" class='btn btn-danger' href='deleteaircraft.php?id=<?php echo $aircraftId; ?>'>Delete</a>
            <?php endif; ?>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-4 text-center">
            <img src="images/aircrafts/<?php echo $fileKey; ?>" alt="" srcset="" width="100%">
        </div>
        <div class="col-6">
            <div class="row">
                <div class="col-6">
                    <h6 class="font-weight-bold">Date of acceptance:</h6>
                </div>
                <div class="col-6">
                    <h6><?php echo $ac['date_of_acceptance']; ?></h6>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <h6 class="font-weight-bold">Present hours (TSN):</h6>
                </div>
                <div class="col-6">
                    <h6><?php echo $ac['present_hours']; ?></h6>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <h6 class="font-weight-bold">TSO:</h6>
                </div>
                <div class="col-6">
                    <h6><?php echo $ac['tso']; ?></h6>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <h6 class="font-weight-bold">Next OH:</h6>
                </div>
                <div class="col-6">
                    <h6><?php echo $ac['next_oh']; ?></h6>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <h6 class="font-weight-bold">Type of Next OH:</h6>
                </div>
                <div class="col-6">
                    <h6><?php echo $ac['type_of_next_oh']; ?></h6>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <h6 class="font-weight-bold">Hrs left for Next OH:</h6>
                </div>
                <div class="col-6">
                    <h6><?php echo $ac['hours_left_next_oh']; ?></h6>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <h6 class="font-weight-bold">Hrs left from total OPS life:</h6>
                </div>
                <div class="col-6">
                    <h6><?php echo $ac['hours_left_ops_life']; ?></h6>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-6">
                    <h6 class="font-weight-bold">OPS status:</h6>
                </div>
                <div class="col-6" type="button" class="btn btn-success">
                    <?php if ($ac['ops_style'] == 1) : ?>
                        <h6>OPS</h6>
                    <?php endif; ?>
                    <?php if ($ac['ops_style'] == 2) : ?>
                        <h6>STS/ LTS</h6>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 my-5">
            <h4 class="btn btn-info">TRADES</h4>
        </div>
        <div class="col-6 my-5 text-right">
            <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'supervisor') : ?>
                <a href="add-trade.php?aircraftId=<?php echo $aircraftId; ?>" class="btn" style="background-color: #9c0b94; color: white;"><i class="fa fa-plus"></i> ADD NEW</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12 mb-5">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th class="p-2 mb-2 bg-secondary text-white">No</th>
                        <th class="p-2 mb-2 bg-primary text-white">Trade name</th>
                        <th class="p-2 mb-2 bg-secondary text-white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $trade->getTradesByAirCraftId($aircraftId); ?>
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