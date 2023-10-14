<?php
require_once('template/header.php');
require('dbconfig.php');
$id = $_GET['id'];
$trade = $trade->getTradeById($id);

?>

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-6">
            <h3 class="btn btn-info">TRADE- <?php echo $trade['trade_name']; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="messagetrade"></div>
        </div>
    </div>
    <form id="editTradeForm">
        <input type="number" name="id" id="id" value="<?php echo $id ?>" hidden>
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $trade['trade_name'] ?>" required>
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

        var formData = new FormData(document.getElementById("editTradeForm"));
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("messagetrade").innerHTML = xhr.responseText;
                setTimeout(function() {
                    window.location = "trades.php?aircraftId=<?php echo $trade['aircraft_id']; ?>";
                }, 3000);
                // Perform necessary actions on success
            } else {
                document.getElementById("messagetrade").innerHTML = xhr.responseText;
                setTimeout(function() {
                    document.getElementById("messagetrade").innerHTML = "";
                }, 3000);
            }
        };

        xhr.open("POST", "editTradeProcess.php", true);
        xhr.send(formData);
    }
</script>
</body>

</html>