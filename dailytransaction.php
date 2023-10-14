<?php require_once('template/header.php');
require('dbconfig.php'); ?>
<div class="container" style="margin-top:50px">
  <h2 class="text-left">Add Company</h2>
  <div class="col-sm-12">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#income">Income</a></li>
      <li><a data-toggle="tab" href="#expense">Expense</a></li>

    </ul>

    <div class="tab-content">
      <div id="income" class="tab-pane fade in active">
        <div style="margin-top:20px;" id="incomeMessage"></div>
        <form style="margin-top:30px;" id="incomeForm" action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-sm-4 control-label"> Date:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control datepicker" name="date" id="date" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label">Income Type:</label>
            <div class="col-sm-6">
              <select name="incomeType" class="form-control" required="">
                <option value="" selected="">Select Income Type</option>
                <?php echo $company->getAllCompanyName(); ?>
                <option value="others">Others</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label"> Income Amount(&pound):</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="incomeAmount" id="incomeAmount" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label"> Note:</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="note" id="note"></textarea>
            </div>
          </div>
          <div class="form-group">
            <input type="hidden" name="income" id="income" value="income">
            <div class="col-sm-3 col-sm-offset-2">
              <input type="submit" class="btn btn-success" name="submit" id="submit" value="Enter">
            </div>
          </div>
        </form>
      </div>
      <div id="expense" class="tab-pane fade">
        <div id="expenseMessage" style="margin-top:20px;"></div>
        <form style="margin-top:30px;" id="expenseForm" action="" method="POST" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-sm-4 control-label"> Date:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control datepicker" name="date" id="date" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label"> Expense Type:</label>
            <div class="col-sm-6">
              <select class="form-control" name="expenseType" id="expenseType" required="">
                <option value="" selected="">Select Expense Type</option>
                <option value="Office Rent">Office Rent</option>
                <option value="Salary">Salary</option>
                <option value="Fuel Cos">Fuel Cost</option>
                <option value="Commission Paid">Commission Paid </option>
                <option value="Food Cos">Food Cost</option>
                <option value="Travel Cost">Travel Cost</option>
                <option value="Driver Wages">Driver Wages</option>
                <option value="Toll Fee">Toll Fee </option>
                <option value="Train Fare">Train Fare</option>
                <option value="Bus Fare">Bus Fare</option>
                <option value="Accountant Fee">Accountant Fee</option>
                <option value="Others">Others</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label"> Expense Amount(&pound):</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" name="expenseAmount" id="expenseAmount" required="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label"> Note:</label>
            <div class="col-sm-6">
              <textarea class="form-control" name="note" id="note"></textarea>
            </div>
          </div>
          <div class="form-group">
            <input type="hidden" name="expense" id="expense" value="expense">
            <div class="col-sm-3 col-sm-offset-2">
              <input type="submit" class="btn btn-success" name="submit" id="submit" value="Enter">
            </div>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>
<script type="text/javascript">
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
  });
</script>
<script type="text/javascript" src="ajax.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
</body>

</html>