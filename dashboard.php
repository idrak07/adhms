<?php require_once('template/header.php');
require('dbconfig.php') ?>
<!-- main area -->
<div class="container-fluid" style="margin-top:10px">
  <div class="row">
    <div class="col-12">
      <h6 class="font-weight-bold p-3 mb-2 bg-danger text-white">AIRCRAFT INVENTORY</h6>
    </div>
  </div>
  <div class="row"style="margin-top:30px" >
     <?php $airCraftType->getAirCraftTypesForDashboard(); ?>
  </div>
</div>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
  <p class="col-md-4 mb-0 text-muted">© <?php echo date('Y') ?> MAINT CONTROL BAF MTR</p>

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

<!-- build:js({.tmp,app}) scripts/app.min.js -->
<script src="scripts/helpers/modernizr.js"></script>
<script src="vendor/jquery/dist/jquery.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="vendor/fastclick/lib/fastclick.js"></script>
<script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="scripts/helpers/smartresize.js"></script>
<script src="scripts/constants.js"></script>
<script src="scripts/main.js"></script>
<!-- endbuild -->
<!-- page scripts -->
<script src="vendor/flot/jquery.flot.js"></script>
<script src="vendor/flot/jquery.flot.resize.js"></script>
<script src="vendor/flot/jquery.flot.categories.js"></script>
<script src="vendor/flot/jquery.flot.stack.js"></script>
<script src="vendor/flot/jquery.flot.time.js"></script>
<script src="vendor/flot/jquery.flot.pie.js"></script>
<script src="vendor/flot-spline/js/jquery.flot.spline.js"></script>
<script src="vendor/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<!-- end page scripts -->
<!-- initialize page scripts -->
<script src="scripts/helpers/sameheight.js"></script>
<script src="scripts/ui/dashboard.js"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<!-- end initialize page scripts -->
</body>

</html>