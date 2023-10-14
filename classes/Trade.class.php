<?php
class Trade
{
    private $db;

    public function __construct($con)
    {
        $this->db = $con;
    }
    public function getTradesByAirCraftId($airCraftId)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `trades` WHERE `aircraft_id`=$airCraftId");
            $stm->execute();
            $i = 0;
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                $tradeName = $result['trade_name'];
                $id = $result['id'];
                $str = "<tr>
                        <td>$i</td>
                        <td>$tradeName</td>
                        <td>
                            <a class='btn btn-sm btn-success mx-1 mb-1' href='subjects.php?tradeId=$id'>View</a>
                            ";
                if ($_SESSION['type'] == "admin") {
                    $str =$str . "<a class='btn btn-sm btn-info mx-1 mb-1' href='edit-trade.php?id=$id'>Edit</a>
                    <a onClick=\"javascript: return confirm('Are you sure you want to delete it?');\" class='btn btn-sm btn-danger mx-1  mb-1' href='deletetrade.php?id=$id'>Delete</a>
                    </td>
                </tr>";
                } elseif ($_SESSION['type'] == "supervisor") {
                    $str =$str . "<a class='btn btn-sm btn-info mx-1 mb-1' href='edit-trade.php?id=$id'>Edit</a>
                    </td>
                </tr>";
                } else {
                    $str =$str . "</td></tr>";
                }

                echo $str;
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function deleteById($id)
    {
        try {
            $d = $this->getTradeById($id);
            $subjectId = $d['aircraft_id'];
            $stm = $this->db->prepare("DELETE FROM `trades` WHERE id='$id'");
            $stm->execute();
            header('Location:trades.php?aircraftId='. $subjectId);
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function insert($name, $aircraftId, $userId)
    {
        try {
            $stm = $this->db->prepare("INSERT INTO `trades`(`trade_name`, `aircraft_id`, `created_by_user_id`, `last_modified_by_user_id`) VALUES ('$name','$aircraftId','$userId','$userId')");
            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                echo "<p class='alert alert-success'>New Trade successfully created</p>
                <script>setTimeout(function() { location.replace('trades.php?aircraftId=$aircraftId')},1500);</script>";
            } else {
                echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getTradeById($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `trades` WHERE `id`='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function update($name, $id, $userId)
    {
        $timestamp = time();
        try {
            $stm = $this->db->prepare("UPDATE `trades` SET `trade_name`='$name',`last_modified_by_user_id`='$userId',`last_modified_time`='$timestamp' WHERE `id`= $id");
            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                echo "<p class='alert alert-success'>Trade successfully updated</p>";
            } else {
                echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }
}

// <a onClick=\"javascript: return confirm('Please confirm deletion');\" class='btn btn-outline-danger mx-1  mb-1' href='deletecompany.php?id=$id'> <i class='fa fa-trash' aria-hidden='true'></i></a>
//                             <a class='btn btn-outline-info mx-1  mb-1' href='editcompany.php?id=$id'><i class='fa fa-pencil-square'></i></a>