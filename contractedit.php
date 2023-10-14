<?php require_once('template/header.php');require('dbconfig.php');
$id=$_GET['id'];
$result=$company->editcontract($id);
 ?>
<div class="container col-sm-offset-2" style="margin-top:50px;">

	<h2 class="text-left">Contract</h2>
	 <div class="col-sm-8">
               <div id="contracteditMessage"></div>
                <form id="contracteditForm" class="form-horizontal" role="form" action="" method="POST" enctype="multipart/formdata">
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Company Name:</label>
                    <div class="col-sm-5">
                      <select onchange="data(this.value)"  name="cname" id="cname" class="form-control" required>
                       <option selected="" value="<?php $result['cname']; ?>"><?php echo $result['cname'] ?></option>
                     <?php $company->getAllCompanyName(); ?>
                      </select>
                    </div>
                  </div>
                  <div id="contractdata">
                  
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Bank Name:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="bankname" id="bankname" value="<?php echo $result['bankname'] ?>">
                    </div>
                    </div>
                      <div class="form-group">
                    <label class="col-sm-3 control-label">Account Name:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="accountname" id="accountname" value="<?php echo $result['accountname']  ?>">
                    </div>
                  </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Sort Code:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="sortcode" id="sortcode" value="<?php echo $result['sortcode'] ?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Driving Licence Copy:</label>
                    <div class="col-sm-5">
                      <input type="file" class="form-control" name="dlc" id="dlc" multiple value="<?php echo $result['dlc'] ?>">
                    </div>
                  </div>
                  <div class="panel-heading"><h4 class="text-left">Electricity</h4></div>
                  <div class="panel-body">
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Start Date:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control datepicker" name="esd" id="esd" required value="<?php echo $result['esd'] ?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">End Date:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control datepicker" name="eed" id="eed" required value="<?php echo $result['eed'] ?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Meter Reading:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="mr" id="mr" value="<?php echo $result['mr'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Mater Image:</label>
                    <div class="col-sm-5">
                      <input type="file" class="form-control" name="mi" id="mi" multiple value="<?php echo $result['mi'] ?>">
                    </div>
                  </div>
                 
                  </div>
                     <div class="panel-heading"><h4 class="text-left">GAS</h4></div>
                  <div class="panel-body">
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Start Date:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control datepicker" name="gsd" id="gsd" required value="<?php echo $result['gsd'] ?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">End Date:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control datepicker" name="ged" id="ged" required value="<?php echo $result['ged'] ?>">
                    </div>
                  </div>
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Meter Reading:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" name="gmr" id="gmr" value="<?php echo $result['gmr'] ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Meter Image:</label>
                    <div class="col-sm-5">
                      <input type="file" class="form-control" name="gmi" id="gmi" value="<?php echo $result['gmi'] ?>">
                    </div>
                  </div>
                 
                  </div>
                  <div class="panel-heading"><h4 class="text-left">CCTV</h4></div>
                  <div class="panel-body">
                   <div class="form-group">
                    <label class="col-sm-3 control-label">Start Date:</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control datepicker" name="csd" id="csd" value="<?php echo $result['csd'] ?>">
                    </div>
                  </div>
                  </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Comments:</label>
                    <div class="col-sm-5">
                      <textarea name="comments" class="form-control"><?php echo $result['comments'] ?></textarea>
                    </div>
                  </div>
                   <div class="form-group">
                   <input type="hidden" name="contractedit" id="contractedit" value="contractedit">
                   <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['username'] ?>"
                    <div class="col-sm-3">
                      <input type="submit" class="btn btn-success" value="Enter">
                    </div>
                  </div>

                     
                </form>
              </div>
</div>
 <!-- build:js({.tmp,app}) scripts/app.min.js -->
  <script src="scripts/helpers/modernizr.js"></script>
  <script src="vendor/jquery/dist/jquery.js"></script>
  <script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
  <script src="vendor/fastclick/lib/fastclick.js"></script>
  <script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
  <script src="scripts/helpers/smartresize.js"></script>
  <script src="scripts/constants.js"></script>
  <script src="scripts/main.js"></script>
  <script src="scripts/bootstrap-datepicker.js"></script>
  <script type="text/javascript">
    $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
});
  </script>
 <script>

 function data(value){
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("contractdata").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST", "contractdata.php?value=" + value, true);
        xmlhttp.send();
      }

</script>
  <script type="text/javascript" src="ajax.js"></script>
  <!-- endbuild -->
</body>

</html>
