<?php require('template/header.php');
require('dbconfig.php');
$id=$_GET['id'];
$data=$company->getallcontractdatabyid($id);
?>
      <div class="main-content">
        <div class="page-title">
          <div class="title"><?php echo $data['cname'] ?></div>
          <div class="sub-title">Details Information</div>
        </div>
        <div class="timeline stacked">
          <div class="timeline-card">
            <div class="timeline-icon bg-danger text-white">
              <i class="icon-bell"></i>
            </div>
            <section class="timeline-content">
              <div class="timeline-heading">
               Contact Information 
              </div>
               <p>
               <ul>
               <li>Contact Name: <?php echo $data['cname']; ?></li>
               <li>Date of Birth: <?php echo $data['dob']; ?></li>
               <li>Telephone: <?php echo $data['telephone']; ?></li>
               <li>contact Email: <?php echo $data['contactemail']; ?></li>
               <li>Address: <?php echo $data['address']; ?></li>
               <li>Bank Name: <?php echo $data['bankname']; ?></li>
               <li>Account Name: <?php echo $data['accountname']; ?></li>
               <li>Account Number: <?php echo $data['accountnumber']; ?></li>
               <li>Home Address: <?php echo $data['haddress']; ?></li>

               </ul>
               </p>
              
            </section>
          </div>
          <div class="timeline-card">
            <div class="timeline-icon bg-info text-white">
              <i class="icon-user"></i>
            </div>
            <section class="timeline-content">
              <a href="#" class="pb5">
                <em>Others Information</em>
              </a>
              <ul>
               <li>Registration No: <?php echo $data['regno']; ?></li>
               <li>Short Code: <?php echo $data['sortcode']; ?></li>
               <li>Land Lord Name: <?php echo $data['lln']; ?></li>
               <li>Land Lord Telephone: <?php echo $data['llt']; ?></li>
           
               </ul>
              
            
            </section>
          </div>
            <div class="timeline-card">
            <div class="timeline-icon bg-info text-white">
              <i class="icon-user"></i>
            </div>
            <section class="timeline-content">
              <a href="#" class="pb5">
                <em>Electricity</em>
              </a>
              <ul>
               <li>Start Date: <?php echo $data['esd']; ?></li>
               <li>End Date: <?php echo $data['eed']; ?></li>
               <li>Meter Reading: <?php echo $data['mr']; ?></li>
               <li>Meter Images:<br> <img width="50px" height="50px" src="classes/upload/<?php echo $data['mi']; ?>"></li>
               
           
               </ul>
              
            
            </section>
          </div>
          <div class="timeline-card">
            <div class="timeline-icon bg-primary text-white">
              <i class="icon-calendar"></i>
            </div>
            <section class="timeline-content">
             
              <div class="overflow-hidden">
                <a href="javascript:;">GAS</a>
              <ul>
               <li>Start Date: <?php echo $data['gsd']; ?></li>
               <li>End Date: <?php echo $data['ged']; ?></li>
               <li>Meter Reading: <?php echo $data['gmr']; ?></li>
               <li>Meter Images:<br> <img width="50px" height="50px" src="classes/upload/<?php echo $data['gmi']; ?>"></li>
             
               </ul>
              
            </section>
          </div>
        
          <div class="timeline-card">
            <div class="timeline-icon bg-warning text-white">
              <i class="icon-picture"></i>
            </div>
            <section class="timeline-content">
              <div class="timeline-heading">
                CCTV
             <ul>
              
               <li>Start Date: <?php echo $data['csd']; ?></li>

           
               </ul>
              
            </section>
          </div>
            <div class="timeline-card">
            <div class="timeline-icon bg-warning text-white">
              <i class="icon-picture"></i>
            </div>
            <section class="timeline-content">
              <div class="timeline-heading">
               Comments
             <p><?php echo $data['comments']; ?></p>
              
            </section>
          </div>
          
        
        </div>
      </div>
      <!-- /main area -->
    </div>
    <!-- /content panel -->
    <!-- bottom footer -->
    
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
  <!-- endbuild -->
</body>

</html>