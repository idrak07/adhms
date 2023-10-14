<?php require_once('template/header.php');
require('dbConfig.php');

$typeId = $_GET['typeId'];

?>
<div class="container-fluid">

    <div class="row mt-3">
        <div class="col-12 text-center">
            <h5 class="font-weight-bold p-2 mb-2 bg-info text-white"><?php $airCraftType->printTypeName($typeId); ?></h5>
        </div>
    </div>


    <div class="row mt-3">
        <div class="col-6 col-sm-3">
            <h6 class="font-weight-bold p-2 mb-2 bg-info text-white">AC STATE</h6>
        </div>
        <div class="col-12 col-sm-12 text-right">
            <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'supervisor') : ?>
                <a href="edit-type.php?id=<?php echo $typeId; ?>" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
            <?php endif; ?>
        </div>

    </div>
    <div class="row">
        <div class="col-12 text-center my-3">
            <table class="table table-bordered datatable w-100">
                <thead>
                    <tr class="font-weight-bold p-2 mb-2 bg-secondary text-white">
                        <th>Type of AC/HEL</th>
                        <th>Total AC/HEL</th>
                        <th>STS/LTS</th>
                        <th>NO OF AC FOR O/H</th>
                        <th>NO OF AC AVAIL</th>
                        <th>NO OF AC SVC</th>
                        <th>NO OF AC U/S</th>
                        <TH>NO OF AC UNDER BOI/BOO/TIR</TH>
                        <TH>MTR</TH>
                        <TH>BBD</TH>
                        <TH>FIS</TH>
                        <TH>CXB</TH>
                    </tr>
                </thead>
                <tbody>
                    <?php $airCraftType->getOverallStatus($typeId); ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-3">
            <h6 class="font-weight-bold p-2 mb-2 bg-success text-white">AC in OPS</h6>
        </div>

    </div>
    </br>
    <div class="row">
        <div class="col-12 my-3">
            <?php $airCraft->getAirCraftsByTypeIdandOps($typeId, 1); ?>
        </div>
    </div>
    </br>

    <div class="row mt-3">
        <div class="col-3">
            <h6 class="font-weight-bold p-2 mb-2 bg-danger text-white">AC in STS/LTS</h6>
        </div>
    </div>
    </br>
    <div class="row">
        <div class="col-12 my-3">
            <?php $airCraft->getAirCraftsByTypeIdandOps($typeId, 2); ?>
        </div>
    </div>
    </br>

    <div class="row mt-3">
        <div class="col-3">
            <h6 class="font-weight-bold p-2 mb-2 bg-info text-white">AIRCRAFTS</h6>
        </div>
        <div class="col-12 text-right">
            <?php if ($_SESSION['type'] == 'admin' || $_SESSION['type'] == 'supervisor') : ?>
                <a href="add-aircraft.php?typeId=<?php echo $typeId; ?>" class="btn" style="background-color: #9c0b94; color: white;"><i class="fa fa-plus"></i> ADD NEW</a>
            <?php endif; ?>
        </div>

    </div>
    </br>

    <div class="row mb-5">
        <?php $airCraft->getAirCraftsByTypeId($typeId); ?>
    </div>


</div>
<?php require_once('template/footer.php') ?>