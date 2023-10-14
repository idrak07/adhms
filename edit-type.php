<?php
require_once('template/header.php');
require('dbconfig.php');
$id = $_GET['id'];
$result = $airCraftType->getTypeById($id);

?>

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-12">
            <h4 class="p-2 mb-2 bg-info text-white">AC TYPE- <?php echo $result['name']; ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="messageaircrafttype"></div>
        </div>
    </div>
    <form id="editaircrafttypeForm">
        <input type="number" name="id" id="id" value="<?php echo $id ?>" hidden>
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="typename">Type name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $result['name'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="toac">Type of AC/HEL</label>
                    <input type="text" class="form-control" name="toac" id="toac" value="<?php echo $result['toac'] ?>">
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="tac">Total AC/HEL</label>
                    <input type="text" class="form-control" name="tac" id="tac" value="<?php echo $result['tac'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="nais">NOF AC IN STORE</label>
                    <input type="text" class="form-control" name="nais" id="nais" value="<?php echo $result['nais'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="nafo">NO OF AC FOR O/H</label>
                    <input type="text" class="form-control" name="nafo" id="nafo" value="<?php echo $result['nafo'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="nav">NO OF AC AVAIL</label>
                    <input type="text" class="form-control" name="nav" id="nav" value="<?php echo $result['nav'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="noas">NO OF AC SVC</label>
                    <input type="text" class="form-control" name="noas" id="noas" value="<?php echo $result['noas'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="noau">NO OF AC U/S</label>
                    <input type="text" class="form-control" name="noau" id="noau" value="<?php echo $result['noau'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="noaub">NO OF AC UNDER BOI/BOO</label>
                    <input type="text" class="form-control" name="noaub" id="noaub" value="<?php echo $result['noaub'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="mtr">MTR</label>
                    <input type="text" class="form-control" name="mtr" id="mtr" value="<?php echo $result['mtr'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="bbd">BBD</label>
                    <input type="text" class="form-control" name="bbd" id="bbd" value="<?php echo $result['bbd'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="fis">FIS</label>
                    <input type="text" class="form-control" name="fis" id="fis" value="<?php echo $result['fis'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="cxb">CXB</label>
                    <input type="text" class="form-control" name="cxb" id="cxb" value="<?php echo $result['cxb'] ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <input type="submit" class="btn btn-block btn-success" onsubmit="submitForm(event)" onclick="submitForm(event)" value="Save">
                </div>
            </div>
        </div>
    </form>
</div>
<script src="scripts/helpers/modernizr.js"></script>
<script src="vendor/jquery/dist/jquery.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.js"></script>
<script src="vendor/fastclick/lib/fastclick.js"></script>
<script src="vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="scripts/helpers/smartresize.js"></script>
<script src="scripts/constants.js"></script>
<script src="scripts/main.js"></script>
<script>
    function submitForm(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        var formData = new FormData(document.getElementById("editaircrafttypeForm"));
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("messageaircrafttype").innerHTML = xhr.responseText;
                setTimeout(function() {
                    window.location = "aircrafts.php?typeId=<?php echo $id; ?>";
                }, 3000);
                // Perform necessary actions on success
            } else {
                document.getElementById("messageaircrafttype").innerHTML = xhr.responseText;
                setTimeout(function() {
                    document.getElementById("messageaircrafttype").innerHTML = "";
                }, 3000);
            }
        };

        xhr.open("POST", "editTypeProcess.php", true);
        xhr.send(formData);
    }
</script>
</body>

</html>