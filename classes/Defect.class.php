<?php
class Defect
{
    private $db;

    public function __construct($con)
    {
        $this->db = $con;
    }
    public function getHistoriesBySubject($subjectId)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `defect_histories` WHERE `subject_id` = $subjectId");
            $stm->execute();
            $i = 0;
            while ($result = $stm->fetch(PDO::FETCH_ASSOC)) {
                $i++;
                $dateOfEntry = $result['date_of_entry'];
                $engineNo = $result['engine_no'];
                $description = $result['description'];
                $rectificationWork = $result['rectification_work'];
                $remarks = $result['remarks'];
                $reporter = $this->getReporterName($result['created_by_user_id']);
                $id = $result['id'];
                $fname = $reporter['first_name'];
                $lname = $reporter['last_name'];
                $str = "<tr>
                        <td>$i</td>
                        <td>$dateOfEntry</td>
                        <td>$engineNo</td>
                        <td>$description</td>
                        <td>$rectificationWork</td>
                        <td>$fname $lname</td>
                        <td>
                            <a class='btn btn-sm btn-success mx-1 mb-1' href='defect.php?id=$id'>View</a>
                            ";
                if ($_SESSION['type'] == "admin") {
                    $str = $str . "<a class='btn btn-sm btn-info mx-1 mb-1' href='edit-defect.php?id=$id'>Edit</a>
                    <a onClick=\"javascript: return confirm('Are you sure you want to delete it?');\" class='btn btn-sm btn-danger mx-1  mb-1' href='deleteHistory.php?id=$id'>Delete</a>
                    </td>
                </tr>";
                } else if ($_SESSION['type'] == "supervisor") {
                    $str = $str . "<a class='btn btn-sm btn-info mx-1 mb-1' href='edit-defect.php?id=$id'>Edit</a>
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

    public function getReporterName($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `users` WHERE `id`='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function deleteById($id)
    {
        try {
            $d = $this->getDefectsById($id);
            $subjectId = $d['subject_id'];
            $stm = $this->db->prepare("DELETE FROM defect_histories WHERE id='$id'");
            $stm->execute();
            header('Location:defects.php?subjectId='. $subjectId);
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function getDefectsById($id)
    {
        try {
            $stm = $this->db->prepare("SELECT * FROM `defect_histories` WHERE `id`='$id'");
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function insert($subjectId, $date_of_entry, $engine_no, $description, $rectification_work, $remarks, $userId, $date_of_clearance, $rectification_by)
    {
        try {
            $stm = $this->db->prepare("INSERT INTO `defect_histories`(`date_of_entry`, `engine_no`, `description`, `rectification_work`, `remarks`, `subject_id`, `created_by_user_id`, `last_modified_by_user_id`, `date_of_clearance`, `rectification_by`) VALUES ('$date_of_entry','$engine_no','$description','$rectification_work','$remarks','$subjectId','$userId','$userId','$date_of_clearance',$rectification_by)");
            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                echo "<p class='alert alert-success'>New entry successfully created</p>";
            } else {
                echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
            }
        } catch (PDOEXCEPTION $e) {
            echo $e->getMessage();
        }
    }

    public function update($id, $date_of_entry, $engine_no, $description, $rectification_work, $remarks, $userId, $date_of_clearance, $rectification_by)
    {
        try {
            $timestamp = time();
            $stm = $this->db->prepare("UPDATE `defect_histories` SET `date_of_entry`='$date_of_entry',`engine_no`='$engine_no',`description`='$description',`rectification_work`='$rectification_work',`remarks`='$remarks', `last_modified_by_user_id`='$userId',`last_modified_time`='$timestamp', `date_of_clearance`='$date_of_clearance',`rectification_by`=$rectification_by WHERE `id`=$id");
            if ($stm->execute()) {
                $id = $this->db->lastInsertId();
                echo "<p class='alert alert-success'>Entry successfully updated</p>";
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