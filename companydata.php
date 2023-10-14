<?php require('template/header.php');
require('dbconfig.php');
$id = $_GET['id'];
$data = $company->getallcompanydatabyid($id);

$rating = $data['rating'];
$ratingBg = "bg-success";
$ratingText = "Excellent!";
if ($rating != null && $rating < 80 && $rating >= 50) {
  $ratingBg = "bg-warning";
  $ratingText = "Good";
} else if ($rating != null && $rating < 50) {
  $ratingBg = "bg-danger";
  $ratingText = "";
}



?>
<div class="container-fluid" style="margin-top:50px">
  <div class="row my-3">
    <div class="col-12 col-sm-6">
      <h3 style="font-weight: bold;"><?php echo $data['cname'] ?></h3>
    </div>

    <div class="col-12 col-sm-3">
      <?php
      if ($rating != null && $rating <= 100 && $rating >= 0) {
        echo "<div class='progress' style='height: 40px;'>
        <div class='progress-bar $ratingBg' role='progressbar' style='width: $rating%' aria-valuenow='$rating' aria-valuemin='0' aria-valuemax='100'>$ratingText</div>
      </div>";
      }
      ?>
    </div>

    <div class="col-sm-3 text-right">
    <a onClick="javascript: return confirm('Are you sure that you want to delete this company?');" class='btn btn-outline-danger mx-1  mb-1' href='deletecompany.php?id=<?php echo $data['companyId']; ?>'> <i class='fa fa-trash' aria-hidden='true'></i> Delete Company</a>
      <a href="editcompany.php?id=<?php echo $data['companyId']; ?>" class="btn btn-outline-info"><i class="fa fa-pencil-square"></i> Edit Company</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <h3 class="my-3">Contact Information</h3>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="businessType"><b>Business Type</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['btype']; ?></h4>
      </div>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="route"><b>Route</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['route']; ?></h4>
      </div>
    </div>

    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="telephone"><b>Telephone</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['telephone']; ?></h4>
      </div>
    </div>

    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="ownername"><b>Owner Name</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['ownername']; ?></h4>
      </div>
    </div>

    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="ownermobile"><b>Owner Mobile</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['ownermobile']; ?></h4>
      </div>
    </div>

    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="dob"><b>Date Of Birth(DOB)</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['dob']; ?></h4>
      </div>
    </div>

    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="bemail"><b>Business Email</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['bemail']; ?></h4>
      </div>
    </div>

    <div class="col-12 col-sm-6 px-3">
      <div class="form-group">
        <label for="baddress"><b>Business Address</b></label>
        <h5 style="text-transform: capitalize;"><?php echo $data['baddress']; ?></h5>
      </div>
    </div>

    <div class="col-12 col-sm-6 px-3">
      <div class="form-group">
        <label for="haddress"><b>Home Address</b></label>
        <h5 style="text-transform: capitalize;"><?php echo $data['haddress']; ?></h5>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-12">
      <h3 class="my-3">Other Information</h3>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="regno"><b>Registration No</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['regno']; ?></h4>
      </div>
    </div>

    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="ban"><b>Bank Account Number</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['ban']; ?></h4>
      </div>
    </div>


    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="lln"><b>Land Lord Name</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['lln']; ?></h4>
      </div>
    </div>


    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="llt"><b>Land Lord Telephone</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['llt']; ?></h4>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-12">
      <h3 class="my-3">Electricity</h3>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="ecs"><b>Elec Current Supplier</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['ecs']; ?></h4>
      </div>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="mpan"><b>MPAN</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['mpan']; ?></h4>
      </div>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="msne"><b>Meter Serial Number Elec</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['msne']; ?></h4>
      </div>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="eacq"><b>ACQ</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['eacq']; ?></h4>
      </div>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="eced"><b>Contract End Date</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['eced']; ?></h4>
      </div>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-12">
      <h3 class="my-3">GAS</h3>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="gcs"><b>GAS Current Supplier</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['gcs']; ?></h4>
      </div>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="mprn"><b>MPRN</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['mprn']; ?></h4>
      </div>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="msng"><b>Meter Serial Number GAS</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['msng']; ?></h4>
      </div>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="gacq"><b>ACQ</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['gacq']; ?></h4>
      </div>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="gced"><b>Contract End Date</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['gced']; ?></h4>
      </div>
    </div>
  </div>

  <hr>
  <div class="row">
    <div class="col-12">
      <h3 class="my-3">CCTV</h3>
    </div>
    <div class="col-12 col-sm-3 px-3">
      <div class="form-group">
        <label for="cced"><b>Contract End Date</b></label>
        <h4 style="text-transform: capitalize;"><?php echo $data['cced']; ?></h4>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-12">
      <h3 class="my-3">Comments</h3>
    </div>
    <div class="col-12 px-3">
      <div class="form-group">
        <h4 style="text-transform: capitalize;"><?php echo $data['comments']; ?></h4>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-12">
      <h3 class="my-3">Files</h3>
    </div>
    <div class="col-12">
      <form action="upload.php" method="post" enctype="multipart/form-data">
        <div class="row">
          <input type="hidden" name="companyId" value="<?php echo $id; ?>">
          <div class="col-12 col-sm-6 my-2">
            <!-- <label for="files"><b>Select image to upload</b></label> -->
            <input accept="application/pdf,application/vnd.ms-excel, image/gif, image/jpeg" type="file" name="fileToUpload" id="fileToUpload" class="form-control">
          </div>
          <div class="col-12 col-sm-3 my-2">
            <input class="btn btn-primary" type="submit" value="Upload Image" name="submit">
          </div>
        </div>
      </form>
    </div>

    <div class="col-12">
      <?php $company->getAllFilesForCompany($id); ?>
    </div>
  </div>
</div>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top" style="margin-top: 50px;">
  <p class="col-md-4 mb-0 text-muted">© <?php echo date('Y') ?> Energy Solutions-UK16 Ltd.</p>

  <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <svg class="bi me-2" width="40" height="32">
      <use xlink:href="#bootstrap"></use>
    </svg>
  </a>

  <ul class="nav col-md-4 justify-content-end">
    <!-- <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li> -->
  </ul>
</footer>


<script src="scripts/helpers/modernizr.js"></script>
<script src="vendor/jquery/dist/jquery.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="vendor/fastclick/lib/fastclick.js"></script>
<script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="scripts/helpers/smartresize.js"></script>
<script src="scripts/constants.js"></script>
<script src="scripts/main.js"></script>
<script src="scripts/bootstrap-datepicker.js"></script>
<!-- endbuild -->

<!-- end page scripts -->
<!-- initialize page scripts -->
<script src="scripts/helpers/sameheight.js"></script>
<script src="scripts/ui/dashboard.js"></script>
<!-- end initialize page scripts -->
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
  });
</script>
<script type="text/javascript" src="ajax.js"></script>
</body>

</html>