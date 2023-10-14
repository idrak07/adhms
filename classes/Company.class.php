<?php
class Company
{
    private $db;

    public function __construct($con)
    {
        $this->db = $con;
    }
    public function addCompany($cname, $btype, $route, $telephone, $ownername, $ownermobile, $dob, $bemail, $baddress, $haddress, $regno, $ban, $lln, $llt, $ecs, $mpan, $msne, $eacq, $eced, $gcs, $mprn, $msng, $gacq, $gced, $cced, $comments, $user, $rating)
    {
        try {
            $stm = $this->db->prepare("INSERT INTO company(cname,btype,route,telephone,ownername,ownermobile,dob,bemail,baddress,haddress,regno,ban,lln,llt,ecs,mpan,msne,eacq,eced,gcs,mprn,msng,gacq,gced,cced,comments,user, rating)VALUES('$cname','$btype','$route','$telephone','$ownername','$ownermobile','$dob','$bemail','$baddress','$haddress','$regno','$ban','$lln','$llt','$ecs','$mpan','$msne','$eacq','$eced','$gcs','$mprn','$msng','$gacq','$gced','$cced','$comments','$user','$rating')");

            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                echo "<p class='alert alert-success'>Company Successfully Added</p>
                <script>setTimeout(function() { location.replace('companydata.php?id=$id')},1500);</script>";
            } else {
                echo "<p class='alert alert-danger'>Something Worng.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
    //update company
    public function updateCompany($cname, $btype, $route, $telephone, $ownername, $ownermobile, $dob, $bemail, $baddress, $haddress, $regno, $ban, $lln, $llt, $ecs, $mpan, $msne, $eacq, $eced, $gcs, $mprn, $msng, $gacq, $gced, $cced, $id, $comments, $rating)
    {
        try {
            $stm = $this->db->prepare("UPDATE company SET cname='$cname',btype='$btype',route='$route',telephone='$telephone',ownername='$ownername',ownermobile='$ownermobile',dob='$dob',bemail='$bemail',baddress='$baddress',haddress='$haddress',regno='$regno',ban='$ban',lln='$lln',llt='$llt',ecs='$ecs',mpan='$mpan',msne='$msne',eacq='$eacq',eced='$eced',gcs='$gcs',mprn='$mprn',msng='$msng',gacq='$gacq',gced='$gced',cced='$cced',comments='$comments',rating='$rating' WHERE companyId='$id'");

            if ($stm->execute()) {
                echo "<p class='alert alert-success'>Company Successfully Updated</p>
                <script>setTimeout(function() { location.replace('companydata.php?id=$id')},1500);</script>";
            } else {
                echo "<p class='alert alert-danger'>Something Worng.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
    public function getAllCompany($user, $userType)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `company` WHERE `user`='$user'");
            if ($userType == 'admin') {
                $stm = $this->db->prepare("SELECT * FROM `company`");
            }
            $stm->execute();
            $i = 0;
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                $id = $result['companyId'];
                $cname = $result['cname'];
                $btype = $result['btype'];
                $ownermobile = $result['ownermobile'];
                $route = $result['route'];
                $email = $result['bemail'];
                $rating = $result['rating'];
                $mpan = $result['mpan'];
                $mprn = $result['mprn'];
                $ratingBg = "bg-success";
                if ($rating != null && $rating < 80 && $rating >= 50) {
                    $ratingBg = "bg-warning";
                } else if ($rating != null && $rating < 50) {
                    $ratingBg = "bg-danger";
                }

                echo "<tr>
                        <td>$i</td>
                        <td>$cname</td>
                        <td>$btype</td>
                        <td>$ownermobile</td>
                        <td>$email</td>
                        <td>$mpan</td>
                        <td>$mprn</td>
                        <td>
                        <span hidden>$rating</span>
                            <div class='progress'>
                                <div class='progress-bar $ratingBg' role='progressbar' style='width: $rating%' aria-valuenow='$rating' aria-valuemin='0' aria-valuemax='100'></div>
                            </div>
                        </td>
                        <td>
                            <a class='btn btn-outline-success mx-1 mb-1' href='companydata.php?id=$id'><i class='fa fa-file'></i></a>
                            <a onClick=\"javascript: return confirm('Please confirm deletion');\" class='btn btn-outline-danger mx-1  mb-1' href='deletecompany.php?id=$id'> <i class='fa fa-trash' aria-hidden='true'></i></a>
                            <a class='btn btn-outline-info mx-1  mb-1' href='editcompany.php?id=$id'><i class='fa fa-pencil-square'></i></a>
                        </td>
                    </tr>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
    public function contract($cname, $telephone, $contactname, $address, $contactemail, $bankname, $accountname, $regno, $dbo, $dlc, $sortcode, $lln, $llt, $haddress, $esd, $eed, $mr, $mi, $gsd, $ged, $gmr, $gmi, $csd, $comments, $user)
    {
        if (!empty($dlc['name'])) {
            $upload = __DIR__ . '/upload/';
            $target_file = $upload . basename($dlc['name']);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($dlc['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($dlc['size'] > 500000) {
                echo "<p class='alert alert-danger'>Sorry your image too large</p>";
                $uploadOk = 0;
                exit();
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "<p class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                $uploadOk = 0;
                exit();
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<p class='alert alert-danger'>Sorry, your file was not uploaded.</p>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($dlc["tmp_name"], $target_file)) {
                    echo "<p class='alert alert-success'>Image successfully Uploaded</p>";
                } else {
                    echo "<p class='alert alert-danger'>Sorry, there was an error uploading your Image.</p>";
                }
            }
        }
        if (!empty($mi['name'])) {
            $upload = __DIR__ . '/upload/';
            $target_file = $upload . basename($mi['name']);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($mi['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($mi['size'] > 500000) {
                echo "<p class='alert alert-danger'>Sorry your image too large</p>";
                $uploadOk = 0;
                exit();
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "<p class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                $uploadOk = 0;
                exit();
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<p class='alert alert-danger'>Sorry, your file was not uploaded.</p>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($mi["tmp_name"], $target_file)) {
                    echo "<p class='alert alert-success'>Image successfully Uploaded</p>";
                } else {
                    echo "<p class='alert alert-danger'>Sorry, there was an error uploading your Image.</p>";
                }
            }
        }
        if (!empty($gmi['name'])) {
            $upload = __DIR__ . '/upload/';
            $target_file = $upload . basename($gmi['name']);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($gmi['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($gmi['size'] > 500000) {
                echo "<p class='alert alert-danger'>Sorry your image too large</p>";
                $uploadOk = 0;
                exit();
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "<p class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                $uploadOk = 0;
                exit();
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<p class='alert alert-danger'>Sorry, your file was not uploaded.</p>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($gmi["tmp_name"], $target_file)) {
                    echo "<p class='alert alert-success'>Image successfully Uploaded</p>";
                } else {
                    echo "<p class='alert alert-danger'>Sorry, there was an error uploading your Image.</p>";
                }
            }
        }

        try {
            $dlc = $dlc['name'];
            $mi = $mi['name'];
            $gmi = $gmi['name'];

            $stm = $this->db->prepare("INSERT INTO contract(cname,telephone,contactname,address,contactemail,bankname,accountname,regno,dob,dic,sortcode,lln,llt,haddress,esd,eed,mr,mi,gsd,ged,gmr,gmi,csd,comments,user)VALUES('$cname','$telephone','$contactname','$address','$contactemail','$bankname','$accountname','$regno','$dbo','$dlc','$sortcode','$lln','$llt','$haddress','$esd','$eed','$mr','$mi','$gsd','$ged','$gmr','$gmi','$csd','$comments','$user')");
            if ($stm->execute()) {
                echo "<p class='alert alert-success'>Contract Submitted Successfully</p>";
            } else {
                echo "<p class='alert alert-danger'>Something wrong.Try again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    //contract edit 
    public function contractedit($cname, $telephone, $contactname, $address, $contactemail, $bankname, $accountname, $regno, $dbo, $dlc, $sortcode, $lln, $llt, $haddress, $esd, $eed, $mr, $mi, $gsd, $ged, $gmr, $gmi, $csd, $comments, $user)
    {
        if (!empty($dlc['name'])) {
            $upload = __DIR__ . '/upload/';
            $target_file = $upload . basename($dlc['name']);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($dlc['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($dlc['size'] > 500000) {
                echo "<p class='alert alert-danger'>Sorry your image too large</p>";
                $uploadOk = 0;
                exit();
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "<p class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                $uploadOk = 0;
                exit();
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<p class='alert alert-danger'>Sorry, your file was not uploaded.</p>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($dlc["tmp_name"], $target_file)) {
                    echo "<p class='alert alert-success'>Image successfully Uploaded</p>";
                } else {
                    echo "<p class='alert alert-danger'>Sorry, there was an error uploading your Image.</p>";
                }
            }
        }
        if (!empty($mi['name'])) {
            $upload = __DIR__ . '/upload/';
            $target_file = $upload . basename($mi['name']);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($mi['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($mi['size'] > 500000) {
                echo "<p class='alert alert-danger'>Sorry your image too large</p>";
                $uploadOk = 0;
                exit();
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "<p class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                $uploadOk = 0;
                exit();
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<p class='alert alert-danger'>Sorry, your file was not uploaded.</p>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($mi["tmp_name"], $target_file)) {
                    echo "<p class='alert alert-success'>Image successfully Uploaded</p>";
                } else {
                    echo "<p class='alert alert-danger'>Sorry, there was an error uploading your Image.</p>";
                }
            }
        }
        if (!empty($gmi['name'])) {
            $upload = __DIR__ . '/upload/';
            $target_file = $upload . basename($gmi['name']);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $check = getimagesize($gmi['tmp_name']);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($gmi['size'] > 500000) {
                echo "<p class='alert alert-danger'>Sorry your image too large</p>";
                $uploadOk = 0;
                exit();
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "<p class='alert alert-danger'>Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>";
                $uploadOk = 0;
                exit();
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<p class='alert alert-danger'>Sorry, your file was not uploaded.</p>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($gmi["tmp_name"], $target_file)) {
                    echo "<p class='alert alert-success'>Image successfully Uploaded</p>";
                } else {
                    echo "<p class='alert alert-danger'>Sorry, there was an error uploading your Image.</p>";
                }
            }
        }

        try {
            $dlc = $dlc['name'];
            $mi = $mi['name'];
            $gmi = $gmi['name'];

            $stm = $this->db->prepare("UPDATE contract SET cname='$cname',telephone='$telephone',contactname='$contactname',bankname='$bankname',accountname='$accountname',regno='$regno',sortcode='$sortcode',lln='$lln',llt='$llt',haddress='$haddress',esd='$esd',eed='$eed',mr='$mr',mi='$mi',gsd='$gsd',ged='$ged',gmr='$gmr',gmi='$gmi',csd='$csd',comments='$comments',user='$user'");
            if ($stm->execute()) {
                echo "<p class='alert alert-success'>Contract Updated Successfully</p>";
            } else {
                echo "<p class='alert alert-danger'>Something wrong.Try again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    //get all contract 
    public function getAllCotract($user)
    {
        try {
            if ($user == 'ashoaib77') {
                $stm = $this->db->prepare("SELECT * FROM contract");
                $stm->execute();
                while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                    $id = $result['contractId'];
                    $cname = $result['cname'];
                    $contactname = $result['contactname'];
                    $telephone = $result['telephone'];

                    $contactemail = $result['contactemail'];

                    echo "<tr><td>$id</td><td>$cname</td><td>$contactname</td><td>$telephone</td><td>$contactemail</td><td><a class='btn btn-outline-success mx-1' href='contractalldata.php?id=$id'><i class='fa fa-file'></i> View</a><a onClick=\"javascript: return confirm('Please confirm deletion');\" class='btn btn-outline-danger mx-1' href='deletecontract.php?id=$id' <i class='fa fa-trash'></i> Delete</a> <a class='btn btn-outline-info mx-1' href='contractedit.php?id=$id'><i class='fa fa-pencil-square'></i> Edit</a></td></tr>";
                }
            } else {
                $stm = $this->db->prepare("SELECT * FROM company WHERE user='$user'");
                $stm->execute();
                while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                    $id = $result['companyId'];
                    $cname = $result['cname'];
                    $btype = $result['btype'];
                    $ownermobile = $result['ownermobile'];
                    $route = $result['route'];
                    $email = $result['bemail'];

                    echo "<tr><td>$id</td><td>$cname</td><td>$btype</td><td>$ownermobile</td><td>$route</td><td>$email</td><td><a href='companydata.php?id=$id' ><i class='btn btn-success btn-xs fa fa-file'></i></a><a href='deletecompany.php?id=$id' <i class='btn btn-danger btn-xs fa fa-trash'></i></a> <a href='editcompany.php?id=$id'><i class='btn btn-info btn-xs fa fa-pencil-square'></i></a></td></tr>";
                }
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
    public function getAllCompanyName()
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `company` ORDER by `companyId` ASC");
            $stm->execute();
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $cname = $result['cname'];
                $cId = $result['companyId'];
                echo "<option class='form-control' value='$cname'>$cId- $cname</option>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    //calculation 

    public function getElectricRemaining($user)
    {
        if ($user == 'ashoaib77') {
            $stm = $this->db->prepare("Select * from contract");
            $stm->execute();
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $cname = $result['cname'];
                $eed = $result['eed'];
                $now = date("Y-m-d");
                $datetime1 = date_create($eed);
                $datetime2 = date_create($now);
                $interval = date_diff($datetime1, $datetime2);
                $v = $interval->format('%a days');

                if ($v >= 0 && $v <= 30) {
                    echo "<tr><td>$cname</td><td class='alert-danger'>$v</td></tr>";
                } else if ($v >= 31 && $v <= 90) {
                    echo "<tr><td>$cname</td><td class='alert-warning'>$v</td></tr>";
                } else if ($v >= 91 && $v <= 180) {
                    echo "<tr><td>$cname</td><td class='alert-success'>$v</td></tr>";
                } else {
                    echo "";
                }
            }
        } else {
            $stm = $this->db->prepare("Select * from contract WHERE user='$user'");
            $stm->execute();
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $cname = $result['cname'];
                $eed = $result['eed'];
                $now = date("Y-m-d");
                $datetime1 = date_create($eed);
                $datetime2 = date_create($now);
                $interval = date_diff($datetime1, $datetime2);
                $v = $interval->format('%a days');

                if ($v >= 0 && $v <= 30) {
                    echo "<tr><td>$cname</td><td class='alert-danger'>$v</td></tr>";
                } else if ($v >= 31 && $v <= 60) {
                    echo "<tr><td>$cname</td><td class='alert-warning'>$v</td></tr>";
                } else if ($v >= 61 && $v <= 180) {
                    echo "<tr><td>$cname</td><td class='alert-success'>$v</td></tr>";
                } else {
                    echo "";
                }
            }
        }
    }
    public function getGasRemaining($user)
    {

        if ($user == 'ashoaib77') {
            $stm = $this->db->prepare("Select * from contract");
            $stm->execute();
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $cname = $result['cname'];
                $ged = $result['ged'];
                $now = date("Y-m-d");
                $datetime1 = date_create($ged);
                $datetime2 = date_create($now);
                $interval = date_diff($datetime1, $datetime2);
                $v = $interval->format('%a days');
                if ($v >= 0 && $v <= 30) {
                    echo "<tr><td>$cname</td><td class='alert-danger'>$v</td></tr>";
                } else if ($v >= 31 && $v <= 60) {
                    echo "<tr><td>$cname</td><td class='alert-warning'>$v</td></tr>";
                } else if ($v >= 61 && $v <= 180) {
                    echo "<tr><td>$cname</td><td class='alert-success'>$v</td></tr>";
                } else {
                    echo "";
                }
            }
        } else {
            $stm = $this->db->prepare("Select * from contract WHERE user='$user'");
            $stm->execute();
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $cname = $result['cname'];
                $ged = $result['ged'];
                $now = date("Y-m-d");
                $datetime1 = date_create($ged);
                $datetime2 = date_create($now);
                $interval = date_diff($datetime1, $datetime2);
                $v = $interval->format('%a days');
                if ($v >= 0 && $v <= 30) {
                    echo "<tr><td>$cname</td><td class='alert-danger'>$v</td></tr>";
                } else if ($v >= 31 && $v <= 60) {
                    echo "<tr><td>$cname</td><td class='alert-warning'>$v</td></tr>";
                } else if ($v >= 61 && $v <= 180) {
                    echo "<tr><td>$cname</td><td class='alert-success'>$v</td></tr>";
                } else {
                    echo "";
                }
            }
        }
    }

    //for company 

    public function getElectricRemainingcompany($user, $userType, $preference)
    {
        $stm = $this->db->prepare("SELECT * FROM `company` WHERE `user`='$user' and `eced` >= CURDATE() ORDER BY `eced` ASC");

        if ($userType == 'admin') {
            $stm = $this->db->prepare("SELECT c.cname AS cname, c.companyId AS companyId, c.eced AS eced, CONCAT(e.fname, ' ', e.lname) AS fullname, e.employeeId as empolyeeId FROM company AS c INNER JOIN empolyee AS e ON c.user = e.username WHERE c.eced >= CURDATE() ORDER BY c.eced ASC");
        }
        $stm->execute();
        while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
            $cname = $result['cname'];
            $id = $result['companyId'];
            $eed = $result['eced'];
            $now = date("Y-m-d");
            $datetime1 = date_create($eed);
            $datetime2 = date_create($now);
            $interval = date_diff($datetime1, $datetime2);
            $v = $interval->format('%a days');

            if($userType == 'admin') {
                $fullName= $result['fullname'];
                $userId = $result['empolyeeId'];
                if ($v >= 0 && $v <= 30 && $preference == 1) {
                    echo "<tr><td class='text-light' style='background-color: #F90000;color: white;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td style='background-color: #F90000;color: white;'>$v</td><td class='text-light' style='background-color: #F90000;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else if ($v >= 31 && $v <= 60 && $preference == 2) {
                    echo "<tr><td style='background-color: #CC6600;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td class='' style='background-color: #CC6600;color: white;'>$v</td><td class='text-light' style='background-color: #CC6600;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else if ($v >= 61 && $v <= 180 && $preference == 3) {
                    echo "<tr><td style='background-color: #137d34;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #137d34;'>$v</td><td class='text-light' style='background-color: #137d34;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else if ($v >= 181 && $v <= 360 && $preference == 4) {
                    echo "<tr><td style='background-color: #0a6bb0;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #0a6bb0;'>$v</td><td class='text-light' style='background-color: #0a6bb0;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else {
                    echo "";
                }
            } else {
                if ($v >= 0 && $v <= 30 && $preference == 1) {
                    echo "<tr><td class='text-light' style='background-color: #F90000;color: white;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td style='background-color: #F90000;color: white;'>$v</td></tr>";
                } else if ($v >= 31 && $v <= 60 && $preference == 2) {
                    echo "<tr><td style='background-color: #CC6600;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td class='' style='background-color: #CC6600;color: white;'>$v</td></tr>";
                } else if ($v >= 61 && $v <= 180 && $preference == 3) {
                    echo "<tr><td style='background-color: #137d34;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #137d34;'>$v</td></tr>";
                } else if ($v >= 181 && $v <= 360 && $preference == 4) {
                    echo "<tr><td style='background-color: #0a6bb0;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #0a6bb0;'>$v</td></tr>";
                } else {
                    echo "";
                }
            }
        }
    }

    public function getGasRemainingcompany($user, $userType, $preference)
    {

        $stm = $this->db->prepare("SELECT * FROM `company` WHERE `user`='$user' and `gced` >= CURDATE() ORDER BY `gced` ASC");

        if ($userType == 'admin') {
            $stm = $this->db->prepare("SELECT c.cname AS cname, c.companyId AS companyId, c.gced AS gced, CONCAT(e.fname,  ' ', e.lname) AS fullname, e.employeeId as empolyeeId FROM company AS c INNER JOIN empolyee AS e ON c.user = e.username WHERE `gced` >= CURDATE() ORDER BY `gced` ASC");
        }
        $stm->execute();
        while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
            $cname = $result['cname'];
            $id = $result['companyId'];
            $eed = $result['gced'];
            $now = date("Y-m-d");
            $datetime1 = date_create($eed);
            $datetime2 = date_create($now);
            $interval = date_diff($datetime1, $datetime2);
            $v = $interval->format('%a days');

            if($userType == 'admin') {
                $fullName= $result['fullname'];
                $userId = $result['empolyeeId'];
                if ($v >= 0 && $v <= 30 && $preference == 1) {
                    echo "<tr><td class='text-light' style='background-color: #F90000;color: white;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td style='background-color: #F90000;color: white;'>$v</td><td class='text-light' style='background-color: #F90000;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else if ($v >= 31 && $v <= 60 && $preference == 2) {
                    echo "<tr><td style='background-color: #CC6600;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td class='' style='background-color: #CC6600;color: white;'>$v</td><td class='text-light' style='background-color: #CC6600;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else if ($v >= 61 && $v <= 180 && $preference == 3) {
                    echo "<tr><td style='background-color: #137d34;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #137d34;'>$v</td><td class='text-light' style='background-color: #137d34;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else if ($v >= 181 && $v <= 360 && $preference == 4) {
                    echo "<tr><td style='background-color: #0a6bb0;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #0a6bb0;'>$v</td><td class='text-light' style='background-color: #0a6bb0;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else {
                    echo "";
                }
            } else {
                if ($v >= 0 && $v <= 30 && $preference == 1) {
                    echo "<tr><td class='text-light' style='background-color: #F90000;color: white;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td style='background-color: #F90000;color: white;'>$v</td></tr>";
                } else if ($v >= 31 && $v <= 60 && $preference == 2) {
                    echo "<tr><td style='background-color: #CC6600;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td class='' style='background-color: #CC6600;color: white;'>$v</td></tr>";
                } else if ($v >= 61 && $v <= 180 && $preference == 3) {
                    echo "<tr><td style='background-color: #137d34;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #137d34;'>$v</td></tr>";
                } else if ($v >= 181 && $v <= 360 && $preference == 4) {
                    echo "<tr><td style='background-color: #0a6bb0;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #0a6bb0;'>$v</td></tr>";
                } else {
                    echo "";
                }
            }
        }
    }

    public function getcctvRemainingcompany($user, $userType, $preference)
    {
        $stm = $this->db->prepare("SELECT * FROM `company` WHERE `user`='$user' and `cced` >= CURDATE() ORDER BY `cced` ASC");

        if ($userType == 'admin') {
            $stm = $this->db->prepare("SELECT c.cname AS cname, c.companyId AS companyId, c.cced AS cced, CONCAT(e.fname,  ' ', e.lname) AS fullname, e.employeeId as empolyeeId FROM company AS c INNER JOIN empolyee AS e ON c.user = e.username WHERE c.cced >= CURDATE() ORDER BY c.cced ASC");
        }
        $stm->execute();
        while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
            $cname = $result['cname'];
            $id = $result['companyId'];
            $cced = $result['cced'];
            $now = date("Y-m-d");
            $datetime1 = date_create($cced);
            $datetime2 = date_create($now);
            $interval = date_diff($datetime1, $datetime2);
            $v = $interval->format('%a days');

            if($userType == 'admin') {
                $fullName= $result['fullname'];
                $userId = $result['empolyeeId'];
                if ($v >= 0 && $v <= 30 && $preference == 1) {
                    echo "<tr><td class='text-light' style='background-color: #F90000;color: white;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td style='background-color: #F90000;color: white;'>$v</td><td class='text-light' style='background-color: #F90000;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else if ($v >= 31 && $v <= 60 && $preference == 2) {
                    echo "<tr><td style='background-color: #CC6600;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td class='' style='background-color: #CC6600;color: white;'>$v</td><td class='text-light' style='background-color: #CC6600;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else if ($v >= 61 && $v <= 180 && $preference == 3) {
                    echo "<tr><td style='background-color: #137d34;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #137d34;'>$v</td><td class='text-light' style='background-color: #137d34;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else if ($v >= 181 && $v <= 360 && $preference == 4) {
                    echo "<tr><td style='background-color: #0a6bb0;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #0a6bb0;'>$v</td><td class='text-light' style='background-color: #0a6bb0;color: white;'><a href='editteam.php?id=$userId' style='text-decoration: none;color: white;'>$fullName</a></td></tr>";
                } else {
                    echo "";
                }
            } else {
                if ($v >= 0 && $v <= 30 && $preference == 1) {
                    echo "<tr><td class='text-light' style='background-color: #F90000;color: white;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td style='background-color: #F90000;color: white;'>$v</td></tr>";
                } else if ($v >= 31 && $v <= 60 && $preference == 2) {
                    echo "<tr><td style='background-color: #CC6600;'><a href='companydata.php?id=$id' style='text-decoration: none;color: white;'>$cname</a></td><td class='' style='background-color: #CC6600;color: white;'>$v</td></tr>";
                } else if ($v >= 61 && $v <= 180 && $preference == 3) {
                    echo "<tr><td style='background-color: #137d34;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #137d34;'>$v</td></tr>";
                } else if ($v >= 181 && $v <= 360 && $preference == 4) {
                    echo "<tr><td style='background-color: #0a6bb0;'><a href='companydata.php?id=$id' style='text-decoration: none; color: white;'>$cname</a></td><td class='alert-success' style='color: white; background-color: #0a6bb0;'>$v</td></tr>";
                } else {
                    echo "";
                }
            }
        }
    }

    public function companydelete($id)
    {
        try {
            $stm = $this->db->prepare("DELETE FROM company WHERE companyId='$id'");
            $stm->execute();
            header('Location:allcompanies.php');
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
    public function editcompany($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM company WHERE companyId='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
    public function editcontract($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM contract  WHERE contractId='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
    public function getcompanydatabyname($cname)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM company WHERE cname='$cname'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            $id = $result['companyId'];
            $stm = $this->db->prepare("SELECT * FROM company WHERE companyId='$id'");
            $stm->execute();
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $id = $result['companyId'];
                $cname = $result['cname'];
                $btype = $result['btype'];
                $telephone = $result['telephone'];
                $ownermobile = $result['ownermobile'];
                $email = $result['bemail'];
                $contactname = $result['ownername'];
                $address = $result['baddress'];
                $contactemail = $result['bemail'];
                $baddress = $result['baddress'];
                $ban = $result['ban'];
                $regno = $result['regno'];
                $dob = $result['dob'];
                $lln = $result['lln'];
                $llt = $result['llt'];
                $haddress = $result['haddress'];
                echo '<div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Telephone</label>
                      <input type="text" class="form-control" name="telephone" id="telephone" required value="' . $telephone . '">
                  </div></div>
                  <div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Contact Name</label>
                      <input type="text" class="form-control" name="contactname" id="contactname" required value="' . $contactname . '">
                  </div></div>
                  <div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Address</label>
                      <input type="text" class="form-control" name="address" id="address" required value="' . $baddress . '">
                  </div></div>
                  <div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Contact Email</label>
                      <input type="text" class="form-control" name="contactemail" id="contactemail" value="' . $contactemail . '">
                  </div></div>
                                   
                  <div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Account Number</label>
                      <input type="text" class="form-control" name="accountnumber" id="accountnumber" value="' . $ban . '">
                  </div></div>
                 
                  <div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Registration No</label>
                      <input type="text" class="form-control" name="regno" id="regno" value="' . $regno . '">
                  </div></div>
                  <div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Date of Birth</label>
                      <input type="text" class="form-control datepicker" name="dob" value="' . $dob . '">
                  </div></div>
                  
                
                  <div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Land Lord Name</label>
                      <input type="text" class="form-control" name="lln" id="lln" value="' . $lln . '">
                  </div></div>
                  <div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Land Lord Telephone:</label>
                      <input type="text" class="form-control" name="llt" id="llt" value="' . $llt . '">
                  </div></div>
                  <div class="col-12 col-sm-3 px-3"><div class="form-group">
                    <label>Home Address</label>
                      <input type="text" class="form-control" name="haddress" value="' . $haddress . '">
                    </div></div>';
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
    public function contractdelete($id)
    {
        try {
            $stm = $this->db->prepare("DELETE FROM contract WHERE contractId='$id'");
            $stm->execute();
            header('Location:contractlist.php');
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getallcompanydatabyid($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM company WHERE companyId='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getFileDetailsById($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM files WHERE id='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getAllFilesForCompany($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM files WHERE company_id='$id'");
            $stm->execute();
            $stm->execute();
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $originalName = $result['original_name'];
                echo '<div class="col-12 col-sm-3 m-3">
                <div class="card">
                  <h5 class="card-header bg--light">' . $originalName . '</h5>
                  <div class="card-body">
                  <a href="download.php?id=' . $result['id'] . '" class="btn btn-outline-success">Open</a>
                  <a href="deletefile.php?id=' . $result['id'] . '" class="btn btn-outline-danger ml-3">Delete</a>
                  </div>
                </div>
              </div>';
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function deleteFileById($id)
    {
        try {
            $stm = $this->db->prepare("DELETE FROM files WHERE id='$id'");
            $stm->execute();
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }


    public function getallcontractdatabyid($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM contract WHERE contractId='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
}
