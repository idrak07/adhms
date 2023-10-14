<?php require_once('template/header.php');
require('dbconfig.php');
$employeeid = $_GET['id'];
$result = $team->teamedit($employeeid);
?>
<div class="container-fluid">
  <div class="row my-3">
    <div class="col-6">
      <h3>User- <?php echo $result['fname'] . ' ' . $result['lname']; ?></h3>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div id="updateemployeeMessage"></div>
    </div>
  </div>
  <form id="updateemployeeForm" class="form-horizontal" role="form" action="" method="POST">
    <input type="text" name="id" id="id" value="<?php echo $employeeid ?>" hidden>
    <div class="row">
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="firstName">First name</label>
          <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $result['fname']; ?>" required>
        </div>
      </div>
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $result['lname']; ?>" required>
        </div>
      </div>
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label>User name</label>
          <?php if ($result['username'] == 'ashoaib77') : ?>
            <input type="text" class="form-control" name="username" id="userName" disabled minlength="8" value="<?php echo $result['username']; ?>" required>
          <?php endif; ?>
          <?php if ($result['username'] != 'ashoaib77') : ?>
            <input type="text" class="form-control" name="username" id="userName" minlength="8" value="<?php echo $result['username']; ?>" required>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="phonenumber">Phone Number</label>
          <input type="text" class="form-control" name="phonenumber" id="phonenumber" value="<?php echo $result['phonenumber'] ?>" required>
        </div>
      </div>
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" id="email" value="<?php echo $result['email']; ?>" required>
        </div>
      </div>
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label>User Type</label>
          <?php if ($result['username'] == 'ashoaib77') : ?>
            <select class="form-control" name="type" id="type" disabled required>
            <?php endif; ?>
            <?php if ($result['username'] != 'ashoaib77') : ?>
              <select class="form-control" name="type" id="type" required>
              <?php endif; ?>
              <option value="" selected>Select User type</option>
              <?php if ($result['type'] == 'admin') : ?>
                <option value="user">User</option>
                <option value="admin" selected>Admin</option>
              <?php endif; ?>

              <?php if ($result['type'] == 'user') : ?>
                <option value="user" selected>User</option>
                <option value="admin">Admin</option>
              <?php endif; ?>
              </select>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <div class="form-group">
          <input type="text" name="updateemployee" id="updateemployee" value="updateemployee" hidden>
          <input type="submit" class="btn btn-block btn-success" name="submit" id="submit" value="Save">
        </div>
      </div>
    </div>
  </form>
</div>


<?php require_once('template/footer.php') ?>
<!-- end initialize page scripts -->
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
  });
</script>
</body>

</html>