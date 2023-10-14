<?php require_once('template/header.php') ?>

<div class="container-fluid">
  <div class="row my-3">
    <div class="col-6">
      <h3>Add Mileage</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div id="mileMessage"></div>
    </div>
  </div>
  <form id="mileForm" action="" method="POST" role="form">
    <div class="row">
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="date">Date</label>
          <input type="text" class="form-control datepicker" name="date" id="date" required="">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="from">From</label>
          <input type="text" class="form-control" name="placefrom" id="placefrom" required="">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="to">To</label>
          <input type="text" class="form-control" name="placeto" id="placeto" required="">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="mile">Mile</label>
          <input type="text" class="form-control" name="mile" id="mile" required="">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="reason">Reason</label>
          <input type="text" class="form-control" name="reason" id="reason">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <div class="form-group">
          <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['username'] ?>">
          <input type="hidden" name="mileadd" id="mileadd" value="mileadd">
          <input type="submit" class="btn btn-success" value="Save">

        </div>
      </div>
  </form>

</div>
<footer class="fixed-bottom d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
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