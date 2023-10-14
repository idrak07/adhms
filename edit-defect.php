<?php
require_once('template/header.php');
require('dbconfig.php');
$id = $_GET['id'];
$entry = $defect->getDefectsById($id);
$subjectId = $entry['subject_id'];
$users = $team->getUsers();
?>

<div class="container-fluid">
    <div class="row my-3">
        <div class="col-6">
            <h3 class="btn btn-info">ENTRIES</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div id="messageDefect"></div>
        </div>
    </div>
    <form id="editDefectForm">
        <input type="number" name="id" id="id" value="<?php echo $id ?>" hidden>
        <div class="row">
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="date_of_entry">Date of Entry</label>
                    <input type="date" class="form-control" name="date_of_entry" id="date_of_entry" value="<?php echo $entry['date_of_entry'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="date_of_clearance">Date of Clearance</label>
                    <input type="date" class="form-control" name="date_of_clearance" id="date_of_clearance" value="<?php echo $entry['date_of_clearance'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-3 px-3">
                <div class="form-group">
                    <label for="engine_no">Engine No</label>
                    <input type="text" class="form-control" name="engine_no" id="engine_no" value="<?php echo $entry['engine_no'] ?>" required>
                </div>
            </div>
            <div class="col-12 col-sm-4 px-3">
                <div class="form-group">
                    <label for="rectification_by">Rectification by</label>
                    <select class="form-control" name="rectification_by" id="rectification_by" required>
                        <?php foreach ($users as $user) : ?>
                            <option value="<?php echo $user['id']; ?>" <?php echo ($user['id'] == $entry['rectification_by']) ? 'selected' : ''; ?>><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-3">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" rows="4" cols="50"><?php echo $entry['description'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-3">
                <div class="form-group">
                    <label for="rectification_work">Rectification work</label>
                    <textarea class="form-control" name="rectification_work" id="rectification_work" rows="4" cols="50" ><?php echo $entry['rectification_work'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 px-3">
                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea class="form-control" name="remarks" id="remarks" rows="4" cols="50"><?php echo $entry['remarks'] ?></textarea>
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

        var formData = new FormData(document.getElementById("editDefectForm"));
        var xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("messageDefect").innerHTML = xhr.responseText;
                setTimeout(function() {
                    window.location = "defects.php?subjectId=<?php echo $subjectId; ?>";
                }, 3000);
                // Perform necessary actions on success
            } else {
                document.getElementById("messageDefect").innerHTML = xhr.responseText;
                setTimeout(function() {
                    document.getElementById("messageDefect").innerHTML = "";
                }, 3000);
            }
        };

        xhr.open("POST", "editHistoryProcess.php", true);
        xhr.send(formData);
    }
</script>
</body>

</html>