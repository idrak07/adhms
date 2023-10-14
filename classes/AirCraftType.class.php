<?php
class AirCraftType
{
    private $db;

    public function __construct($con)
    {
        $this->db = $con;
    }
    public function getAirCraftTypes()
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `aircraft_types`");
            $stm->execute();
            $i = 0;
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                $id = $result['id'];
                $name = $result['name'];
                $fileKey = $result['unique_image_key'] . '.' . $result['ext'];
                echo "<div class='col-4'>
                <a href='aircrafts.php?typeId=$id' style='text-decoration: none;'>
                    <div class='card border-0' style='width: 6rem;'>
                        <img class='img-thumbnail' src='images/aircraft_types/$fileKey' alt='$name'>
                        </br>
                        <div class='text-center'>
                            <h10 style='color: blue;'>$name</h10>
                        </div>
                        </br>
                        </br>
                    </div>
                </a>
            </div>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function printTypeName($typeId)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM aircraft_types WHERE id='$typeId'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            echo $result['name'];
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getOverallStatus($typeId)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM aircraft_types WHERE id='$typeId'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            $toac = $result['toac'];
            $tac = $result['tac'];
            $nais = $result['nais'];
            $nafo = $result['nafo'];
            $nav = $result['nav'];
            $noas = $result['noas'];
            $noau = $result['noau'];
            $noaub = $result['noaub'];
            $mtr = $result['mtr'];
            $bbd = $result['bbd'];
            $fis = $result['fis'];
            $cxb = $result['cxb'];

            echo "<tr>
                        <td>$toac</td>
                        <td>$tac</td>
                        <td>$nais</td>
                        <td>$nafo</td>
                        <td>$nav</td>
                        <td>$noas</td>
                        <td>$noau</td>
                        <td>$noaub</td>
                        <td>$mtr</td>
                        <td>$bbd</td>
                        <td>$fis</td>
                        <td>$cxb</td>
                    </tr>";
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getAirCraftTypesForDashboard()
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `aircraft_types`");
            $stm->execute();
            $i = 0;
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                $id = $result['id'];
                $name = $result['name'];
                $fileKey = $result['unique_image_key'] . '.' . $result['ext'];
                echo "<div class='col-4'>
                <a href='aircrafts.php?typeId=$id' style='text-decoration: none;'>
                    <div class='card border-0' style='width: 6rem;'>
                        <img class='img-thumbnail' src='images/aircraft_types/$fileKey' alt='$name'>
                        <div class='text-center' >
                        </br>
                            <h10 style='color: blue;'>$name</h10>
                        </div>
                        </br>
                        </br>

                    </div>
                </a>
            </div>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function addType($tname)
    {
        try {
            $stm = $this->db->prepare("INSERT INTO `aircraft_types`(`name`, `created_by_user_id`, `last_modified_by_user_id`) VALUES ('$tname',1,1)");
            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                echo "<p class='alert alert-success'>New Aircraft type successfully created</p>
                <script>setTimeout(function() { location.replace('aircraft-types.php')},1500);</script>";
            } else {
                echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function update($id, $tname, $toac, $tac, $nais, $nafo, $nav, $noas, $noau, $noaub, $mtr, $bbd, $fis, $cxb)
    {
        $userId = $_SESSION['userId'];
        $timestamp = time();
        try {
            $stm = $this->db->prepare("UPDATE `aircraft_types` SET `name`='$tname', `last_modified_by_user_id`='$userId',`last_modified_time`='$timestamp', `toac`='$toac',`tac`='$tac',`nais`='$nais',`nafo`='$nafo',`nav`='$nav',`noas`='$noas',`noau`='$noau',`noaub`='$noaub',`mtr`='$mtr',`bbd`='$bbd',`fis`='$fis',`cxb`='$cxb' WHERE id = $id");
            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                echo "<p class='alert alert-success'>Aircraft state successfully updated</p>
                <script>setTimeout(function() { location.replace('aircrafts.php?typeId=$id')},1500);</script>";
            } else {
                echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getTypeById($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM aircraft_types WHERE id='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
}

// <a onClick=\"javascript: return confirm('Please confirm deletion');\" class='btn btn-outline-danger mx-1  mb-1' href='deletecompany.php?id=$id'> <i class='fa fa-trash' aria-hidden='true'></i></a>
//                             <a class='btn btn-outline-info mx-1  mb-1' href='editcompany.php?id=$id'><i class='fa fa-pencil-square'></i></a>