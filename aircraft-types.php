<?php require_once('template/header.php');
require('dbConfig.php') ?>
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-12">
            <h6 class="font-weight-bold p-3 mb-2 bg-danger text-white">AIRCRAFT TYPES</h6>
        </div>
       
    </div>
    <div class="row mt-5">
        <?php $airCraftType->getAirCraftTypes(); ?>
        </br>
    </div>
    </br>


    <div class="col-12 text-right">
            <a href="add-type.php" class="btn" style="background-color: #9c0b94; color: white;"><i class="fa fa-plus"></i> ADD NEW</a>
        </div>


</div>
<?php require_once('template/footer.php') ?>
