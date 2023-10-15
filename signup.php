<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>ADHMS</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <!-- build:css({.tmp,app}) styles/app.min.css -->
  <link rel="stylesheet" href="styles/webfont.css">
  <link rel="stylesheet" href="styles/climacons-font.css">
  <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" href="styles/font-awesome.css">
  <link rel="stylesheet" href="styles/card.css">
  <link rel="stylesheet" href="styles/sli.css">
  <link rel="stylesheet" href="styles/animate.css">
  <link rel="stylesheet" href="styles/app.css">
  <link rel="stylesheet" href="styles/app.skins.css">
  <!-- endbuild -->
</head>

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signin usersession">
    <div class="session-wrapper">
      <div class="page-height-o row-equal align-middle">
        <div class="column">
          <div class="card bg-white no-border">
            <div class="card-block">
              <div id="signupMessage"></div>
              <form role="form" id="signupForm" class="form-layout">
                <div class="text-center m-b">
                  <h1>Registration</h1>
                </div>
                <div class="form-inputs">
                  <label class="text-uppercase">First Name</label>
                  <input type="text" name="fname" id="fname" class="form-control input-lg" placeholder="First name" required>
                  <label class="text-uppercase">Last Name</label>
                  <input type="text" name="lname" id="lname" class="form-control input-lg" placeholder="Last name" required>
                  <label class="text-uppercase">Bd No</label>
                  <input type="number" name="bdno" id="bdno" class="form-control input-lg" placeholder="BD No" required>
                  <label class="text-uppercase">FLT</label>
                  <input type="text" name="flt" id="flt" class="form-control input-lg" placeholder="FLT" required>
                  <label class="text-uppercase">Email</label>
                  <input type="email" autocomplete="off" class="form-control input-lg" placeholder="Email" name="username" id="username" required>
                  <label class="text-uppercase">Password</label>
                  <input type="password" autocomplete="off" name="password" id="password" class="form-control input-lg" placeholder="Password" required>
                  <label class="text-uppercase">Role</label>
                  <select class="form-control input-lg" name="role" id="role" onchange="populateRank()">
                    <option value="OFFICER" selected>Officer</option>
                    <option value="JCO">JCO</option>
                    <option value="AIRMEN">Airmen</option>
                    <option value="CIVILIAN">Civilian</option>
                  </select>

                  <label class="text-uppercase">Select Rank</label>
                  <select id="rank" name="rank" class="form-control input-lg">
                    <!-- Options will be populated dynamically using JavaScript -->
                  </select>
                </div>
                <input type="hidden" name="signup" id="signup" value="signup">
                <button style="background-color: #0A6BB0;border:none;outline:none" class="btn btn-primary btn-block btn-lg m-b" type="submit" name="submit" id="submit" onsubmit="submitForm(event)" onclick="submitForm(event)">Sign up</button>
                <a style="font-size:15px" href="index.php" class="forgot_pass ml-5">Back to login</a>
              </form>
            </div>

          </div>
        </div>
      </div>
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
  <script>
    function populateRank() {
      var firstDropdown = document.getElementById("role");
      var secondDropdown = document.getElementById("rank");
      var selectedOption = firstDropdown.options[firstDropdown.selectedIndex].value;

      // Clear previous options in the second dropdown
      secondDropdown.innerHTML = "";

      // Populate the second dropdown based on the selected option
      if (selectedOption === "OFFICER") {
        // Add options for option1
        addOption(secondDropdown, "COAS", "COAS");
        addOption(secondDropdown, "AVM ( Air Vice Marshal)", "AVM ( Air Vice Marshal)");
        addOption(secondDropdown, "Air Commodore", "Air Commodore");
        addOption(secondDropdown, "Gp Capt", "Gp Capt");
        addOption(secondDropdown, "Wg Cdr", "Wg Cdr");
        addOption(secondDropdown, "Sqn Ldr", "Sqn Ldr");
        addOption(secondDropdown, "Flt Lt", "Flt Lt");
        addOption(secondDropdown, "Flg Offr", "Flg Offr");
        addOption(secondDropdown, "Offr Cadet", "Offr Cadet");
      } else if (selectedOption === "JCO") {
        // Add options for option2
        addOption(secondDropdown, "MWO", "Suboption MWO-1");
        addOption(secondDropdown, "SWO", "SWO");
        addOption(secondDropdown, "WO", "WO ");
      } else if (selectedOption === "AIRMEN") {
        // Add options for option3
        addOption(secondDropdown, "Sgt", "Sgt");
        addOption(secondDropdown, "Cpl", "Cpl");
        addOption(secondDropdown, "LAC", "LAC");
        addOption(secondDropdown, "AC", "AC");
      } else if (selectedOption === "CIVILIAN") {
        // Add options for option3
        addOption(secondDropdown, "CIV-II", "SCIV-II");
        addOption(secondDropdown, "CIV-III", "CIV-III");
        addOption(secondDropdown, "CIV-IV", "CIV-IV");
      }
    }

    function addOption(selectElement, value, text) {
      var option = document.createElement("option");
      option.value = value;
      option.text = text;
      selectElement.add(option);
    }

    // Call the function initially to populate the second dropdown based on the default selection
    populateRank();
  </script>
  <script>
    function submitForm(event) {
      // Prevent the default form submission behavior
      event.preventDefault();

      var formData = new FormData(document.getElementById("signupForm"));
      var xhr = new XMLHttpRequest();

      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          document.getElementById("signupMessage").innerHTML = xhr.responseText;
          setTimeout(function() {
            window.location = "index.php";
          }, 3000);
          // Perform necessary actions on success
        } else {
          document.getElementById("signupMessage").innerHTML = xhr.responseText;
          setTimeout(function() {
            document.getElementById("signupMessage").innerHTML = "";
          }, 3000);
        }
      };

      xhr.open("POST", "signupProcess.php", true);
      xhr.send(formData);
    }
  </script>
  <script>
    // JavaScript to remove the alert after 3 seconds
  </script>
  <!-- endbuild -->
</body>

</html>