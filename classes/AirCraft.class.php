<?php
class AirCraft
{
    private $db;

    public function __construct($con)
    {
        $this->db = $con;
    }
    public function getAirCraftsByTypeId($typeId)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `aircrafts` WHERE `aircraft_type_id`=$typeId");
            $stm->execute();
            $i = 0;
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                $serialNo = $result['serial_no'];
                $id = $result['id'];
                $dateOfAcceptance = $result['date_of_acceptance'];
                $presentHours = $result['present_hours'];
                $tso = $result['tso'];
                $nextOh = $result['next_oh'];
                $fileKey = $result['unique_image_key'] . '.' . $result['ext'];
                echo "<div class='col-4'>
                <a href='trades.php?aircraftId=$id' style='text-decoration: none;'>
                    <div class='card border-20' style='width: 08rem;'>
                        <img src='images/aircrafts/$fileKey' alt='$serialNo'>
                        <div class='text-center' >
                            <h10 style='color: blue;'>$serialNo</h10>
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

    public function getAirCraftsByTypeIdandOps($typeId, $opsStyle)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `aircrafts` WHERE `aircraft_type_id`=$typeId and ops_style=$opsStyle");
            $stm->execute();
            $i = 0;
            $echoLine = '';
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                $serialNo = $result['serial_no'];
                $id = $result['id'];
                $echoLine = $echoLine . $serialNo . ', ';
            }
            echo substr($echoLine, 0, -2);
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getAIrCraftById($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `aircrafts` WHERE `id`='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function update($id, $doa, $ph, $tso, $noh, $tonh, $hlnoh, $hlopsl, $style)
    {
        $userId = $_SESSION['userId'];
        $timestamp = time();
        try {
            $stm = $this->db->prepare("UPDATE `aircrafts` SET `date_of_acceptance`='$doa',`present_hours`='$ph',`tso`='$tso',`next_oh`='$noh',`type_of_next_oh`='$tonh',`hours_left_next_oh`='$hlnoh',`hours_left_ops_life`='$hlopsl',`ops_style`='$style' WHERE `id`= $id");
            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                echo "<p class='alert alert-success'>Aircraft type successfully updated</p>
                <script>setTimeout(function() { location.replace('trades.php?aircraftId=$id')},1500);</script>";
            } else {
                echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function deleteById($id)
    {
        try {
            $d = $this->getAIrCraftById($id);
            $subjectId = $d['aircraft_type_id'];
            $stm = $this->db->prepare("DELETE FROM `aircrafts` WHERE id='$id'");
            $stm->execute();
            header('Location:aircrafts.php?typeId='. $subjectId);
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
}

// <a onClick=\"javascript: return confirm('Please confirm deletion');\" class='btn btn-outline-danger mx-1  mb-1' href='deletecompany.php?id=$id'> <i class='fa fa-trash' aria-hidden='true'></i></a>
//                             <a class='btn btn-outline-info mx-1  mb-1' href='editcompany.php?id=$id'><i class='fa fa-pencil-square'></i></a>