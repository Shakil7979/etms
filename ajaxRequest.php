<?php 

	require_once('config.php');
	
	if (isset($_POST['forgotEmail'])) {

		$email = $_POST['forgotEmail'];

		$stm = $pdo->prepare("SELECT email FROM em_user WHERE email=?");
		$stm->execute(array($email)); 
		$user_count = $stm->rowCount();
	 	
		if ($user_count == 1) { 


			// get user id
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
			$user_id = $result[0]['u_id'];

			$reset_code = rand(9999,999999);

			$stm = $pdo->prepare("UPDATE em_user SET reset_code=? WHERE email=?");
			$stm->execute(array($reset_code,$email)); 

			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			$massege = "Your Password Reset Code:". "\r\n";
			$massege .= $reset_code. "\r\n";
			$mail = mail($email,'Reset Password',$massege,$headers);
			if ($mail) {
				$success = " Your Password Reset Successfully!, Check your Email"; 
			}


		}else{
			$error = "Email is Wrong!";
		};

		$response = array(
			'success' => $success,
			'error' => $error
		);

		echo json_encode($response);
 
	}

	// Reset Code Ajax request

	if (isset($_POST['user_code'])) {

		$user_code = $_POST['user_code'];
		$user_id = $_POST['user_id'];

		$stm = $pdo->prepare("SELECT u_id,reset_code FROM em_user WHERE u_id=? AND reset_code=?");
		$stm->execute(array($user_id,$user_code)); 
		$user_count = $stm->rowCount();


	 	
		if ($user_count == 1) { 

			// get user id
			// $result = $stm->fetchAll(PDO::FETCH_ASSOC);
			// $user_id = $result[0]['u_id'];

			// $new_password = rand(9999,999999);

			// $stm = $pdo->prepare("UPDATE em_user SET reset_code=? WHERE email=?");
			// $stm->execute(array($new_password,$email)); 

			// $headers = "MIME-Version: 1.0" . "\r\n";
			// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// $massege = "Your Password Reset Success:". "\r\n";
			// $massege .= $new_password. "\r\n";
			// $mail = mail($email,'Reset Password',$massege,$headers);
			// if ($mail) {
			// 	$success = " Your Password Reset Successfully!, Check your Email";
			// }
			$success = "code is working";

		}else{
			// $error = "Code is Wrong!"; 
			$error = $user_id;
		};

		$response = array(
			'success' => $success,
			'error' => $error,
			'user_id' => $user_id
		);

		echo json_encode($response);
 
	}

 ?>