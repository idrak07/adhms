<?php require_once('template/header.php');
require('dbconfig.php'); ?>

<div class="container-fluid">
  <div class="row my-3">
    <div class="col-6">
      <h3 class="btn btn-info">USERS</h3>
    </div>
    <div class="col-6 text-right">
      <?php if ($_SESSION['type'] == 'admin') : ?>
        <a href="addmember.php" class="btn" style="background-color:#9c0b94 ; color: white;"><i class="fa fa-plus"></i> Add User</a>
      <?php endif; ?>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered table-condensed datatable m-b-0">
        <thead>
          <tr>
            <th class="p-3 mb-2 bg-secondary text-white">BD No</th>
            <th class="p-3 mb-2 bg-info text-white">FLT</th>
            <th class="p-3 mb-2 bg-secondary text-white">Name</th>
            <th class="p-3 mb-2 bg-info text-white">User type</th>
            <th class="p-3 mb-2 bg-secondary text-white">Email</th>
            <?php if ($_SESSION['type'] == 'admin') : ?>
              <th class="p-3 mb-2 bg-info text-white">Action</th>
            <?php endif; ?>
          </tr>

        </thead>
        <tbody>
          <?php $team->getAllMembers(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>



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