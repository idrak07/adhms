<?php require_once('template/header.php') ?>

<div class="container-fluid">
  <div class="row my-3">
    <div class="col-6">
      <h3>Transaction Report</h3>
    </div>
    <div class="col-6 text-right">
      <a href="dailytransaction.php" class="btn" style="background-color: #137d34; color: white;"><i class="fa fa-plus"></i> New transaction</a>
    </div>
  </div>
  <form id="transactionForm" action="" method="POST" role="form">
    <div class="row my-3">

      <div class="col-12 col-sm-3">
        <div class="form-group">
          <label class="control-label">Start Date</label>
          <input type="date" class="form-control" name="startdate" id="startdate" placeholder="Enter start date">
        </div>
      </div>

      <div class="col-12 col-sm-3">
        <div class="form-group">
          <label class="control-label">End Date:</label>
          <input type="date" class="form-control" name="enddate" id="enddate" placeholder="Enter end date">
        </div>
      </div>

      <div class="col-12">
        <input type="hidden" name="transaction" id="transaction" value="transaction">
        <input type="submit" class="btn btn-outline-info mt-auto"  name="submit" id="submit" value="Search">
      </div>
    </div>
  </form>
  <br /><br />
  <div class="row">
    <div class="col-12">
      <table id="transactionreport" class="table table-bordered table-condensed datatable m-b-0">
        <thead>
          <th>Date</th>
          <th>Particular(expense)</th>
          <th>Amount(&pound)</th>
          <th>Particular(income)</th>
          <th>Amount(&pound)</th>
          <th>Remarks</th>
        </thead>
        <tbody id="transactionMessage">

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
<script src="vendor/jquery/dist/jquery.js"></script>
<script src="scripts/bootstrap-datepicker.js"></script>
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd'
  });
</script>
<script src="ajax.js"></script>
</body>

</html>