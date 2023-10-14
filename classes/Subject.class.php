<?php
class Subject
{
    private $db;

    public function __construct($con)
    {
        $this->db = $con;
    }
    public function getSubjectsByTradeId($tradeId)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `subject` WHERE `trade_id` = $tradeId");
            $stm->execute();
            $i = 0;
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                $subjectName = $result['subject_name'];
                $id = $result['id'];
                $str = "<tr>
                        <td>$i</td>
                        <td>$subjectName</td>
                        <td>
                            <a class='btn btn-sm btn-success mx-1 mb-1' href='defects.php?subjectId=$id'>View</a>
                            ";
                if ($_SESSION['type'] == "admin") {
                    $str = $str . "<a class='btn btn-sm btn-info mx-1 mb-1' href='edit-subject.php?id=$id'>Edit</a>
                    <a onClick=\"javascript: return confirm('Are you sure you want to delete it?');\" class='btn btn-sm btn-danger mx-1  mb-1' href='deletesubject.php?id=$id'>Delete</a>
                            </td>
                        </tr>";
                } else if ($_SESSION['type'] == "supervisor") {
                    $str = $str . "<a class='btn btn-sm btn-info mx-1 mb-1' href='edit-subject.php?id=$id'>Edit</a>
                            </td>
                        </tr>";
                } else {
                    $str = $str . "</td></tr>";
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
            $d = $this->getSubjectById($id);
            $subjectId = $d['trade_id'];
            $stm = $this->db->prepare("DELETE FROM `subject` WHERE id='$id'");
            $stm->execute();
            header('Location:subjects.php?tradeId='. $subjectId);
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function insert($name, $tradeId, $userId)
    {
        try {
            $stm = $this->db->prepare("INSERT INTO `subject`(`subject_name`, `trade_id`, `created_by_user_id`, `last_modified_by_user_id`) VALUES ('$name','$tradeId','$userId','$userId')");
            if ($stm->execute()) {
                echo "<p class='alert alert-success'>New Subject successfully created</p>";
            } else {
                echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getSubjectById($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `subject` WHERE `id`='$id'");
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
            $stm = $this->db->prepare("UPDATE `subject` SET `subject_name`='$name',`last_modified_by_user_id`='$userId',`last_modified_time`='$timestamp' WHERE `id`= $id");
            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                echo "<p class='alert alert-success'>Subject successfully updated</p>";
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