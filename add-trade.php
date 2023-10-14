<?php
require_once('template/header.php');
require('dbconfig.php');
$aircraftId = $_GET['aircraftId'];

?>

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-6">
            <h3 class="btn btn-info">TRADE</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="messagetrade"></div>
        </div>
    </div>
    <form id="addTradeForm">
        <input type="number" name="aircraftId" id="aircraftId" value="<?php echo $aircraftId ?>" hidden>
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
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

        var formData = new FormData(document.getElementById("addTradeForm"));
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("messagetrade").innerHTML = xhr.responseText;
                setTimeout(function() {
                    window.location = "trades.php?aircraftId=<?php echo $aircraftId; ?>";
                }, 3000);
                // Perform necessary actions on success
            } else {
                document.getElementById("messagetrade").innerHTML = xhr.responseText;
                setTimeout(function() {
                    document.getElementById("messagetrade").innerHTML = "";
                }, 3000);
            }
        };

        xhr.open("POST", "addTradeProcess.php", true);
        xhr.send(formData);
    }
</script>
</body>

</html>