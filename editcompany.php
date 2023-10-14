<?php require_once('template/header.php');
require('dbconfig.php');
$id = $_GET['id'];
$result = $company->editcompany($id);
?>

<div class="container-fluid">
  <div class="row my-3">
    <div class="col-6">
      <h3>Update Company</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div id="updatecompanyMessage"></div>
    </div>
  </div>
  <form id="updatecompanyForm" action="" method="POST" role="form">
    <div class="row">
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="companyName">Company Name</label>
          <input type="text" class="form-control" name="cname" id="cname" value="<?php echo @$result['cname'] ?>">
        </div>
      </div>
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="businessType">Business Type:</label>
          <select class="form-control" name="btype" id="btype">
            <option value="">Select Business Type</option>
            <option value="limited" <?php if ($result['btype'] == "limited") {
                                      echo 'selected';
                                    } ?>>Limited</option>
            <option value="soletraders" <?php if ($result['btype'] == 'soletraders') {
                                          echo 'selected';
                                        } ?>>Sole Traders</option>
          </select>
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="route">Route</label>
          <input type="text" class="form-control" name="route" id="route" value="<?php echo $result['route'] ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="telephone">Telephone</label>
          <input type="text" class="form-control" name="telephone" id="telephone" value="<?php echo  $result['telephone'] ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="ownerName">Owner Name</label>
          <input type="text" class="form-control" name="ownername" id="ownername" value="<?php echo $result['ownername']; ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="ownerMobile">Owner Mobile</label>
          <input type="text" class="form-control" name="ownermobile" id="ownermobile" value="<?php echo $result['ownermobile']; ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="dateOfBirth">Date of Birth</label>
          <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $result['dob']; ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="businessEmail">Business Email</label>
          <input type="text" class="form-control" name="bemail" id="bemail" value="<?php echo $result['bemail']; ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="businessAdress">Business Address</label>
          <input type="text" class="form-control" name="baddress" id="baddress" value="<?php echo $result['baddress'] ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="homeAddress">Home Address</label>
          <input type="text" class="form-control" name="haddress" id="haddress" value="<?php echo $result['haddress']; ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="regNo">Registration No</label>
          <input type="text" class="form-control" name="regno" id="regno" value="<?php echo $result['regno'] ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="bankAccNo">Bank Account Number</label>
          <input type="text" class="form-control" name="ban" id="ban" value="<?php echo $result['ban']; ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="landLordName">Land Lord Name</label>
          <input type="text" class="form-control" name="lln" id="lln" value="<?php echo $result['lln']; ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="landLordTel">Land Lord Telephone</label>
          <input type="text" class="form-control" name="llt" id="llt" value="<?php echo $result['llt']; ?>">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="landLordTel">Ratings (0 to 100)</label>
          <input type="number" class="form-control" name="rating" id="rating" value="<?php echo $result['rating']; ?>">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12 col-sm-6">
        <div class="row">
          <div class="col-12">
            <h4>Electricity</h4>
          </div>
          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Elec Current Supplier</label>
              <input type="text" class="form-control" name="ecs" id="ecs" value="<?php echo $result['ecs']; ?>">
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">MPAN</label>
              <input type="text" class="form-control" name="mpan" id="mpan" value="<?php echo $result['mpan']; ?>">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Meter Serial Number Elec</label>
              <input type="text" class="form-control" name="msne" id="msne" value="<?php echo $result['msne']; ?>">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">ACQ</label>
              <input type="text" class="form-control" name="eacq" id="eacq" value="<?php echo $result['eacq']; ?>">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Contract End Date</label>
              <input type="date" class="form-control" name="eced" id="eced" value="<?php echo $result['eced']; ?>">
            </div>
          </div>


        </div>
      </div>

      <div class="col-12 col-sm-6">
        <div class="row">
          <div class="col-12">
            <h4>GAS</h4>
          </div>
          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">GAS Current Supplier</label>
              <input type="text" class="form-control" name="gcs" id="gcs" value="<?php echo $result['gcs']; ?>">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">MPRN</label>
              <input type="text" class="form-control" name="mprn" id="mprn" value="<?php echo $result['mprn']; ?>">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Meter Serial Number GAS</label>
              <input type="text" class="form-control" name="msng" id="msng" value="<?php echo $result['msng']; ?>">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">ACQ</label>
              <input type="text" class="form-control" name="gacq" id="gacq" value="<?php echo $result['gacq']; ?>">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Contract End Date</label>
              <input type="date" class="form-control" name="gced" id="gced" value="<?php echo $result['gced']; ?>">
            </div>
          </div>


        </div>
      </div>

      <div class="col-12 col-sm-6">
        <div class="row">
          <div class="col-12">
            <h4>CCTV</h4>
          </div>
          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Contract End Date</label>
              <input type="date" class="form-control" name="cced" id="cced" value="<?php echo $result['cced']; ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="landLordTel">Comments</label>
          <textarea name="comments" class="form-control"><?php echo $result['comments']; ?></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <div class="form-group">
          <input type="hidden" name="updatecompany" id="updatecompany" value="updatecompany">
          <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
          <input type="submit" class="btn btn-success" value="Save">
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
<!-- end initialize page scripts -->
</body>

</html>