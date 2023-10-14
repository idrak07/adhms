<?php require_once('template/header.php');
require('dbconfig.php'); ?>
<div class="container-fluid">
    <div class="row my-3">
        <div class="col-6">
            <h3>Contract</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="contractMessage"></div>
        </div>
    </div>
    <form id="contractForm" role="form" action="" method="POST" enctype="multipart/formdata">
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="companyName">Company Name</label>
                    <select onchange="data(this.value)" name="cname" id="cname" class="form-control" required>
                        <option selected="" value=""></option>
                        <?php $company->getAllCompanyName(); ?>
                    </select>
                </div>
            </div>
        </div>
        <div id="contractdata" class="row"></div><br><br>
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label>Bank Name</label>
                    <input type="text" class="form-control" name="bankname" id="bankname">
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label>Account Name</label>
                    <input type="text" class="form-control" name="accountname" id="accountname">
                </div>
            </div>

            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label>Sort Code</label>
                    <input type="text" class="form-control" name="sortcode" id="sortcode">
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label>Driving Licence Copy</label>
                    <input type="file" class="form-control" name="dlc" id="dlc" multiple>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="row">
                    <div class="col-12">
                        <h4>Electricity</h4>
                    </div>

                    <div class="col-12 col-sm-6 px-3">
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" class="form-control datepicker" name="esd" id="esd">
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 px-3">
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="text" class="form-control datepicker" name="eed" id="eed">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 px-3">
                        <div class="form-group">
                            <label>Meter Reading</label>
                            <input type="text" class="form-control" name="mr" id="mr">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 px-3">
                        <div class="form-group">
                            <label>Meter Image</label>
                            <input type="file" class="form-control" name="mi" id="mi" multiple>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="row">
                    <div class="col-12">
                        <h4>GAS</h4>
                    </div>
                    <div class="col-12 col-sm-6 px-3">
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" class="form-control datepicker" name="gsd" id="gsd">
                        </div>
                    </div>


                    <div class="col-12 col-sm-6 px-3">
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="text" class="form-control datepicker" name="ged" id="ged">
                        </div>
                    </div>


                    <div class="col-12 col-sm-6 px-3">
                        <div class="form-group">
                            <label>Meter Reading</label>
                            <input type="text" class="form-control" name="gmr" id="gmr">
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 px-3">
                        <div class="form-group">
                            <label>Meter Image</label>
                            <input type="file" class="form-control" name="gmi" id="gmi">
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-sm-6">
                <div class="row">
                    <div class="col-12">
                        <h4>CCTV</h4>
                    </div>
                    <div class="col-12 col-sm-6 px-3">
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" class="form-control datepicker" name="csd" id="csd">
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
                    <input type="hidden" name="contract" id="contract" value="contract">
                    <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['username'] ?>">
                    <input type="submit" class="btn btn-success btn-block" value="Enter">
                </div>
            </div>
    </form>

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
    function data(value) {
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