<?php require_once('template/header.php');
require('dbconfig.php'); ?>


<!-- main area -->
<div class="container-fluid">
  <div class="row my-3">
    <div class="col-6">
      <h3>Contracts</h3>
    </div>
    <div class="col-6 text-right">
      <a href="contract.php" class="btn" style="background-color: #137d34; color: white;"><i class="fa fa-plus"></i> Add contract</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <table id="contracts" class="table table-bordered table-condensed datatable m-b-0">
        <thead>
          <tr>
            <th>Company ID</th>
            <th>Company Name</th>
            <th>Contact Name</th>
            <th>Mobile Number</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $company->getAllCotract($_SESSION['username']); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $('.datatable').dataTable({

  });
</script>
</body>

</html>
