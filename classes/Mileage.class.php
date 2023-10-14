<?php

class Mileage{

	private $db;

	public function __construct($con){
		$this->db=$con;
	}

	public function addMile($date,$placefrom,$placeto,$mile,$reason,$user){
  	try{
  		$stm=$this->db->prepare("INSERT INTO mileage(miledate,placefrom,placeto,mile,reason,user) VALUES('$date','$placefrom','$placeto','$mile','$reason','$user')");
  		if($stm->execute()){
				echo "<p class='alert alert-success'>Mileage Added Successfully</p>";
			}else{
				echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
			}

  	}catch(PDOException $e){
  		echo $e->getMessage();
  	}
  }

  public function mileReport($startdate,$enddate){
  	try{
			$stm=$this->db->prepare("SELECT * FROM mileage
			 WHERE miledate BETWEEN '$startdate' AND '$enddate'");
			$stm->execute();
			global $totalmile;
			
			$i=0;
			while($result=$stm->fetch(PDO::FETCH_ASSOC))
			{
				$date=$result['miledate'];
				$fmile=$this->getsummile($date);
				$mile=$result['mile'];
				$placefrom=$result['placefrom'];
				$placeto=$result['placeto'];
				$reason=$result['reason'];
				$totalmile+=$mile;
				$fmile=$this->getsummile($date);
				$i++;
				echo "
				      <tr><td>$i</td><td>$date</td><td>$placefrom-$placeto</td><td>$mile</td><td class='alert-warning'>$fmile</td><td>$reason</td></tr>";
				    }

			echo "  <tr><td></td><td></td><td></td><td><strong>Total</strong></td><td><strong>$totalmile</strong></td></tr>";
			

		}catch(PDOEXCEPTION $e)
		{
			echo $e->getMessage();
		}


  }
  
   public function getsummile($date){
	  
	  try{
	 
	  $stm=$this->db->prepare("SELECT SUM(mile) as mile FROM mileage WHERE miledate='$date'");
	  $stm->execute();
	  $data=$stm->fetch(PDO::FETCH_ASSOC);
	  $fmile=$data['mile'];
	  return $fmile;
	   }catch(PDOEXCEPTION $e){
	   echo $e->getMessage();
	  
	  }
	  
	  }
  }

