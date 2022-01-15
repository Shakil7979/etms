<?php 
	
	require_once("config.php");

	function inputCount($col,$val){
	 	global $pdo;

		$stm=$pdo->prepare("SELECT $col FROM em_user WHERE $col=? ");
		$stm->execute(array($val)); 
	 	$count=$stm->rowCount();
	 	return $count;
 
	}


	function em_user($id,$col){
	 	global $pdo;

		$stm=$pdo->prepare("SELECT $col FROM em_user WHERE u_id=?");
		$stm->execute(array($id)); 
	 	$result=$stm->fetchAll(PDO::FETCH_ASSOC);
	 	return $result[0]["$col"];
 
	}

	function em_user_count(){
	 	global $pdo;

		$stm=$pdo->prepare("SELECT * FROM em_user");
		$stm->execute(); 
	 	$count=$stm->rowCount();
	 	return $count;
 
	}


	function em_admin($id,$col){
	 	global $pdo;

		$stm=$pdo->prepare("SELECT $col FROM em_admin WHERE ad_id=?");
		$stm->execute(array($id)); 
	 	$result=$stm->fetchAll(PDO::FETCH_ASSOC);
	 	return $result[0]["$col"];
 
	}


	function em_att_submit($date,$user_id){
	 	global $pdo;

		$stm=$pdo->prepare("SELECT em_id,user_time FROM em_attendance WHERE DATE(user_time)=? AND em_id=? ");
		$stm->execute(array($date,$user_id)); 
	 	// $result=$stm->fetchAll(PDO::FETCH_ASSOC);
	 	return $result = $stm->rowCount();
	 	// return $result[0]["user_time"];
 
	}
	  // echo em_att_submit('2020-12-17', '1');

	function checkAttendance($user_id,$checkDate){
		global $pdo;

		$stm=$pdo->prepare("SELECT * FROM em_attendance WHERE em_id=? AND DATE(user_time)=?");
		$stm->execute(array($user_id,$checkDate)); 
	 	// $result=$stm->fetchAll(PDO::FETCH_ASSOC);
	 	// return $result[0]["$col"];
	 	// $user_time = $result[0]["user_time"];
	 	// return date('Y-m-d',strtotime($user_time));
	 	return $result = $stm->rowCount();
 
	}

	function checkAttendanceCount($checkDate){
		global $pdo;

		$stm=$pdo->prepare("SELECT * FROM em_attendance WHERE DATE(user_time)=?");
		$stm->execute(array($checkDate)); 
	 	// $result=$stm->fetchAll(PDO::FETCH_ASSOC);
	 	// return $result[0]["$col"];
	 	// $user_time = $result[0]["user_time"];
	 	// return date('Y-m-d',strtotime($user_time));
	 	return $result = $stm->rowCount();
 
	}

	function checkAttInfo($user_id,$checkDate,$col){
		global $pdo;

		$stm=$pdo->prepare("SELECT * FROM em_attendance WHERE em_id=? AND DATE(user_time)=?");
		$stm->execute(array($user_id,$checkDate)); 
	 	$result=$stm->fetchAll(PDO::FETCH_ASSOC);
	 	return $result[0]["$col"];
	 	
	} 

/***********Monthly Count***********/
	// monthly attendance count
	function checkAttEMCount($year,$month,$em_id){
		global $pdo;

		$stm=$pdo->prepare("SELECT user_time,em_id FROM em_attendance WHERE YEAR(user_time)=? AND MONTH(user_time)=? AND em_id=?");
		$stm->execute(array($year,$month,$em_id));  
	 	return $result = $stm->rowCount();

 
	}
	// monthly practice class count
	function MonthlyPracticeClass($year,$month,$em_id){
		global $pdo;

		$stm=$pdo->prepare("SELECT date_time,user_id FROM em_class WHERE YEAR(date_time)=? AND MONTH(date_time)=? AND user_id=?");
		$stm->execute(array($year,$month,$em_id));  
	 	return $result = $stm->rowCount();

 
	}
	// monthly pending task 
	function MonthlyClass($year,$month,$em_id,$status){
		global $pdo;

		$stm=$pdo->prepare("SELECT date_time,user_id,status FROM em_task WHERE YEAR(date_time)=? AND MONTH(date_time)=? AND user_id=? AND status=?"); 
		$stm->execute(array($year,$month,$em_id,$status));  
	 	return $result = $stm->rowCount();
  
	} 
	// monthly pending task 
	function MonthlyTotalTask($year,$month,$em_id){
		global $pdo;

		$stm=$pdo->prepare("SELECT date_time,user_id FROM em_task WHERE YEAR(date_time)=? AND MONTH(date_time)=? AND user_id=?"); 
		$stm->execute(array($year,$month,$em_id));  
	 	return $result = $stm->rowCount();
  
	} 

	/***********Yearly Count***********/
		// monthly attendance count
	function checkAttEYCount($year,$em_id){
		global $pdo;

		$stm=$pdo->prepare("SELECT user_time,em_id FROM em_attendance WHERE YEAR(user_time)=? AND em_id=?");
		$stm->execute(array($year,$em_id));  
	 	return $result = $stm->rowCount();

 
	}
	// monthly practice class count
	function EarlyPracticeClass($year,$em_id){
		global $pdo;

		$stm=$pdo->prepare("SELECT date_time,user_id FROM em_class WHERE YEAR(date_time)=? AND user_id=?");
		$stm->execute(array($year,$em_id));  
	 	return $result = $stm->rowCount();

 
	}
	// monthly pending task 
	function EarlyClass($year,$em_id,$status){
		global $pdo;

		$stm=$pdo->prepare("SELECT date_time,user_id,status FROM em_task WHERE YEAR(date_time)=? AND user_id=? AND status=?"); 
		$stm->execute(array($year,$em_id,$status));  
	 	return $result = $stm->rowCount();
  
	} 
 ?>