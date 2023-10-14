<?php require_once('template/header.php') ?>
<div class="container-fluid">
  <div class="row my-3">
    <div class="col-6">
      <h3>Add Company</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div id="companyMessage"></div>
    </div>
  </div>
  <form id="companyForm" action="" method="POST" role="form">
    <div class="row">
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="companyName">Company Name</label>
          <input type="text" class="form-control" name="cname" id="cname">
        </div>
      </div>
      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="businessType">Business Type:</label>
          <select class="form-control" name="btype" id="btype">
            <option value="" selected>Select Business Type</option>
            <option value="limited">Limited</option>
            <option value="soletraders">Sole Traders</option>
          </select>
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="route">Route</label>
          <input type="text" class="form-control" name="route" id="route">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="telephone">Telephone</label>
          <input type="text" class="form-control" name="telephone" id="telephone">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="ownerName">Owner Name</label>
          <input type="text" class="form-control" name="ownername" id="ownername">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="ownerMobile">Owner Mobile</label>
          <input type="text" class="form-control" name="ownermobile" id="ownermobile">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="dateOfBirth">Date of Birth</label>
          <input type="date" class="form-control" name="dob" id="dob">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="businessEmail">Business Email</label>
          <input type="text" class="form-control" name="bemail" id="bemail">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="businessAdress">Business Address</label>
          <input type="text" class="form-control" name="baddress" id="baddress">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="homeAddress">Home Address</label>
          <input type="text" class="form-control" name="haddress" id="haddress">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="regNo">Registration No</label>
          <input type="text" class="form-control" name="regno" id="regno">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="bankAccNo">Bank Account Number</label>
          <input type="text" class="form-control" name="ban" id="ban">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="landLordName">Land Lord Name</label>
          <input type="text" class="form-control" name="lln" id="lln">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="landLordTel">Land Lord Telephone</label>
          <input type="text" class="form-control" name="llt" id="llt">
        </div>
      </div>

      <div class="col-12 col-sm-3 px-3">
        <div class="form-group">
          <label for="rating">Rating (0 to 100)</label>
          <input type="number" class="form-control" name="rating" id="rating">
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
              <input type="text" class="form-control" name="ecs" id="ecs">
            </div>
          </div>
          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">MPAN</label>
              <input type="text" class="form-control" name="mpan" id="mpan">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Meter Serial Number Elec</label>
              <input type="text" class="form-control" name="msne" id="msne">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">ACQ</label>
              <input type="text" class="form-control" name="eacq" id="eacq">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Contract End Date</label>
              <input type="date" class="form-control" name="eced" id="eced">
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
              <input type="text" class="form-control" name="gcs" id="gcs">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">MPRN</label>
              <input type="text" class="form-control" name="mprn" id="mprn">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Meter Serial Number GAS</label>
              <input type="text" class="form-control" name="msng" id="msng">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">ACQ</label>
              <input type="text" class="form-control" name="gacq" id="gacq">
            </div>
          </div>

          <div class="col-12 col-sm-6">
            <div class="form-group">
              <label for="landLordTel">Contract End Date</label>
              <input type="date" class="form-control" name="gced" id="gced">
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
              <input type="date" class="form-control" name="cced" id="cced">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="landLordTel">Comments</label>
          <textarea name="comments" class="form-control"></textarea>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-3">
        <div class="form-group">
          <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['username'] ?>">
          <input type="hidden" name="company" id="company" value="company">
          <input type="submit" class="btn btn-block btn-success" value="Save">
        </div>
      </div>
    </div>
  </form>

</div>
<?php require_once('template/footer.php') ?>
</body>

</html>