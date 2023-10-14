<?php
require_once('template/header.php');
require('dbconfig.php');
$id = $_GET['id'];
$result = $airCraft->getAIrCraftById($id);

?>

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-6">
            <h3>AIRCRAFT- <?php echo $result['serial_no']; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="messageaircraft"></div>
        </div>
    </div>
    <form id="editaircraftForm">
        <input type="number" name="id" id="id" value="<?php echo $id ?>" hidden>
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="doa">Date of acceptance</label>
                    <input type="date" class="form-control" name="doa" id="doa" value="<?php echo $result['date_of_acceptance'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="ph">Present hours</label>
                    <input type="number" class="form-control" name="ph" id="ph" value="<?php echo $result['present_hours'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="tso">TSO</label>
                    <input type="text" class="form-control" name="tso" id="tso" value="<?php echo $result['tso'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="noh">Next OH</label>
                    <input type="number" class="form-control" name="noh" id="noh" value="<?php echo $result['next_oh'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="tonh">Type of Next OH</label>
                    <input type="text" class="form-control" name="tonh" id="tonh" value="<?php echo $result['type_of_next_oh'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="hlnoh">Hours left Next OH</label>
                    <input type="number" class="form-control" name="hlnoh" id="hlnoh" value="<?php echo $result['hours_left_next_oh'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="hlopsl">Hourse left OPS life</label>
                    <input type="number" class="form-control" name="hlopsl" id="hlopsl" value="<?php echo $result['hours_left_ops_life'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="style" id="style" required>
                        <?php if ($result['ops_style'] == 1) : ?>
                            <option value="1" selected>OPS</option>
                            <option value="2">STS/LTS</option>
                        <?php endif; ?>
                        <?php if ($result['ops_style'] == 2) : ?>
                            <option value="1">OPS</option>
                            <option value="2" selected>STS/LTS</option>
                        <?php endif; ?>
                    </select>
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

        var formData = new FormData(document.getElementById("editaircraftForm"));
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("messageaircraft").innerHTML = xhr.responseText;
                setTimeout(function() {
                    window.location = "trades.php?aircraftId=<?php echo $id; ?>";
                }, 3000);
                // Perform necessary actions on success
            } else {
                document.getElementById("messageaircraft").innerHTML = xhr.responseText;
                setTimeout(function() {
                    document.getElementById("messageaircraft").innerHTML = "";
                }, 3000);
            }
        };

        xhr.open("POST", "editAirCraftProcess.php", true);
        xhr.send(formData);
    }
</script>
</body>

</html>