     <!-- main navigation -->
      <nav role="navigation">
      <?php if($_SESSION['username']=='ashoaib77'){
        echo '<ul class="nav">
          <!-- dashboard -->
          <li>
            <a href="dashboard.php">
              <i class="icon-compass"></i>
              <span>Home</span>
            </a>
          </li>
          <!-- /dashboard -->
     
          <!-- forms -->
          <li>
           
              <li>
                <a href="addCompany.php">
                <i class="icon-loop"></i>
                  <span>Add Company</span>
                </a>
              </li>
              <li>
                <a href="javascript:;">
                <i class="icon-share-alt"></i>
                  <span>Contract</span>
                </a>
                 <ul class="sub-menu">
             <li>
                <a href="contract.php">
                  <span>Add Contract</span>
                </a>
              </li>
              <li>
                <a href="contractlist.php">
                  <span>Contract List</span>
                </a>
              </li>
          </ul></li>
              <li>
                <a href="allcompanies.php">
                 <i class="icon-loop"></i>
                  <span>All Company</span>
                </a>
              </li>
                <li>
                <a href="javascript:;">
                <i class="icon-share-alt"></i>
                  <span>Mileage</span>
                </a>
                 <ul class="sub-menu">
             <li>
                <a href="mileage.php">
                  <span>Mileage</span>
                </a>
              </li>
              <li>
                <a href="mileagereport.php">
                  <span>Mileage Report</span>
                </a>
              </li>
          </ul></li>
              
              <li>
                <a href="teammember.php">
                 <i class="icon-loop"></i>
                  <span>Team Member</span>
                </a>
              </li>
             
          
          <!-- /forms -->
          <!-- tables -->
          
              <li>
                <a href="javascript:;">
                <i class="icon-share-alt"></i>
                  <span>All Transaction</span>
                </a>
                 <ul class="sub-menu">
             <li>
                <a href="dailytransaction.php">
                  <span>Daily Transaction</span>
                </a>
              </li>
              <li>
                <a href="transactionreport.php">
                  <span>Transaction Report</span>
                </a>
              </li>
          </ul></li>
              </li>
              
          <!-- /tables -->
          <!--settings-->
          <li><a href="javascript:;">
              <i class="icon-share-alt"></i>
              <span>Settings</span>
            </a>
          <ul class="sub-menu">
             <li>
                <a href="addmember.php">
                  <span>Add Team Member</span>
                </a>
              </li>
              <li>
                <a href="changepassword.php">
                  <span>Change Password</span>
                </a>
              </li>
          </ul></li>
          <!--settings-->
         
        </ul>';
        }else{
         echo '<ul class="nav">
          <!-- dashboard -->
          <li>
            <a href="dashboard.php">
              <i class="icon-compass"></i>
              <span>Home</span>
            </a>
          </li>
          <!-- /dashboard -->
     
          <!-- forms -->
          <li>
           
              <li>
                <a href="addCompany.php">
                <i class="icon-loop"></i>
                  <span>Add Company</span>
                </a>
              </li>
              <li>
                <a href="contract.php">
                <i class="icon-loop"></i>
                  <span>Contract</span>
                </a>
              </li>
              <li>
                <a href="allcompanies.php">
                 <i class="icon-loop"></i>
                  <span>All Company</span>
                </a>
              </li>
            
             
          
          <!-- /forms -->
          <!-- tables -->
          
           
              
          <!-- /tables -->
          <!--settings-->
          <li><a href="javascript:;">
              <i class="icon-share-alt"></i>
              <span>Settings</span>
            </a>
          <ul class="sub-menu">
             
              <li>
                <a href="changepassword.php">
                  <span>Change Password</span>
                </a>
              </li>
          </ul></li>
          <!--settings-->
         
        </ul>';
        
        
        }?>
      </nav>
      <!-- /main navigation -->