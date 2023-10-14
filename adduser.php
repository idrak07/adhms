<?php require_once('template/header.php');
require('dbconfig.php');
// $employeeid=$_GET['id'];
// $result=$team->teamedit($employeeid);
?>


<div class="container-fluid">
    <div class="row my-3">
        <div class="col-6">
            <h3>Add user</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="addusermessage"></div>
        </div>
    </div>
    <form id="adduser" action="" method="POST" role="form">
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" name="fname" id="fname" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="lastName">Last name</label>
                    <input type="text" class="form-control" name="lname" id="lname" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="username">User name</label>
                    <input type="text" class="form-control" name="username" id="userName" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="phoneno">Phone Number</label>
                    <input type="text" class="form-control" name="phoneno" id="phoneno" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="type">User Type</label>
                    <select class="form-control" name="type" id="type" required>
                        <option value="" selected>Select User type</option>
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['username'] ?>">
                    <input type="hidden" name="adduser" id="adduser" value="user">
                    <input type="submit" class="btn btn-block btn-success" value="Save">
                </div>
            </div>
        </div>
    </form>
</div>
<?php require_once('template/footer.php') ?>
<script type="text/javascript">
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
    });
</script>

</body>

</html>