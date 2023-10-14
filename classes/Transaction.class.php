<?php 
class Transaction{
	private $db;
	public function __construct($con){
		$this->db=$con;
	}
	public function income($date,$incomeType,$incomeAmount,$note,$expenseAmount,$expenseType){
		try{
			$stm=$this->db->prepare("INSERT INTO incomeexpense(iedate,incomeType,expenseType,incomeAmount,expenseAmount,note)VALUES('$date','$incomeType','$expenseType','$incomeAmount','$expenseAmount','$note')");
			
			if($stm->execute()){
				echo "<p class='alert alert-success'>Income Added Successfully</p>";
			}else{
				echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
			}


		}catch(PDOEXCEPTION $e){
			echo $e->getMessage();
		}
	}
	public function expense($date,$expenseType,$expenseAmount,$note,$incomeAmount,$incomeType){
		try{
			$stm=$this->db->prepare("INSERT INTO incomeexpense(iedate,incomeType,expenseType,incomeAmount,expenseAmount,note)VALUES('$date','$incomeType','$expenseType','$incomeAmount','$expenseAmount','$note')");
			
			if($stm->execute()){
				echo "<p class='alert alert-success'>Expense Added Successfully</p>";
			}else{
				echo "<p class='alert alert-danger'>Something wrong.Try Again</p>";
			}


		}catch(PDOEXCEPTION $e){
			echo $e->getMessage();
		}

	}
	public function report($startdate,$enddate)
	{
		try{
			$stm=$this->db->prepare("SELECT * FROM incomeexpense WHERE iedate BETWEEN '$startdate' AND '$enddate'");
			$stm->execute();
			global $totalexpense;
			global $totalincome;
			while($result=$stm->fetch(PDO::FETCH_ASSOC))
			{
				$date=$result['iedate'];
				$expenseType=$result['expenseType'];
				$incomeType=$result['incomeType'];
				$expenseAmount=$result['expenseAmount'];
				$incomeAmount=$result['incomeAmount'];
				$note=$result['note'];
				$totalexpense+=$expenseAmount;
				$totalincome+=$incomeAmount;
				
				echo "
				      <tr><td>$date</td><td>$expenseType</td><td>$expenseAmount</td><td>$incomeType</td><td>$incomeAmount</td><td>$note</td></tr>";
				    }

			echo "  <tr><td><strong>Total(&pound)</strong></td><td></td><td><strong>$totalexpense</strong></td><td></td><td><strong>$totalincome</strong></td><td></td></tr>";
			$balance=$totalincome-$totalexpense;
			echo "<tr><td class='text-center' colspan='4'><strong class='text-center'>Balance(&pound) :$balance</strong></td></tr>";

		}catch(PDOEXCEPTION $e)
		{
			echo $e->getMessage();
		}

	}
}