<?php require_once('template/header.php') ?>
<div class="container col-sm-offset-6" style="margin-top:30px">
  <h4 class="p-2 mb-2 bg-info text-white">Change Password</h4>
  <div class="col-sm-8">
    <div id="updatepasswordmessage"></div>
    <form id="updatepassword" class="form-horizontal" role="form" action="" method="POST">
      <div class="form-group">
        <label class="col-sm-3 control-label">Old Password:</label>
        <div class="col-sm-5">
          <input type="password" name="oldpassword" id="oldpassword" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">New Password:</label>
        <div class="col-sm-5">
          <input type="password" class="form-control" name="newpassword" id="newpassword">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-5 control-label">Retype Password:</label>
        <div class="col-sm-5">
          <input type="password" class="form-control" name="rpassword" id="rpassword">
        </div>
      </div>
      <div class="form-group">
        <input type="hidden" name="updatepassword" id="updatepassword" value="updatepassword">
        <div class="col-sm-3">
          <input type="submit" class="btn btn-success" name="submit" id="submit" value="Enter">
        </div>
      </div>
    </form>
  </div>
</div>
<?php require_once('template/footer.php') ?>
</body>

</html>