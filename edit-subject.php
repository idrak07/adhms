<?php
require_once('template/header.php');
require('dbconfig.php');
$id = $_GET['id'];
$subject = $subject->getSubjectById($id);

?>

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-6">
            <h3 class="btn btn-info">SUBJECT- <?php echo $subject['subject_name']; ?></h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="messageSubject"></div>
        </div>
    </div>
    <form id="editSubjectForm">
        <input type="number" name="id" id="id" value="<?php echo $id ?>" hidden>
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $subject['subject_name'] ?>" required>
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

        var formData = new FormData(document.getElementById("editSubjectForm"));
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("messageSubject").innerHTML = xhr.responseText;
                setTimeout(function() {
                    window.location = "subjects.php?tradeId=<?php echo $subject['trade_id']; ?>";
                }, 3000);
                // Perform necessary actions on success
            } else {
                document.getElementById("messageSubject").innerHTML = xhr.responseText;
                setTimeout(function() {
                    document.getElementById("messageSubject").innerHTML = "";
                }, 3000);
            }
        };

        xhr.open("POST", "editSubjectProcess.php", true);
        xhr.send(formData);
    }
</script>
</body>

</html>