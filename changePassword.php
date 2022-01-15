<?php  

	require_once('header.php');

	$user_id= $_SESSION['em_user'][0]['u_id'];

	if(isset($_POST['change_password'])){

		$c_password=$_POST['c_password'];
		$n_password=$_POST['n_password'];
		$c_n_password=$_POST['c_n_password'];

		$db_password = em_user($user_id,'password');

        if(empty($c_password)){
            $error = "Current Password is required";
        }else if(empty($n_password)){
            $error = "New is required";
        }else if(empty($c_n_password)){
            $error = "Current Confrim Password is required";
        }else if($n_password != $c_n_password){
        	$error= "New password & Confrim password not match";
        }else{

        	$c_password= SHA1($c_password);
        	if($c_password != $db_password){
        		$error="Current Password not match";
        	}else{
        		$n_password=SHA1($n_password);
        		$stm=$pdo->prepare("UPDATE em_user SET password=? WHERE u_id=?");
        		$stm->execute(array($n_password,$user_id));

            	$success = "Password Change Successfull!";
        	}

        }
    }

 ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 d-inline-block ">Change Password</h1>


    <div class="row">
    	<div class="col-md-6">
    		<div class="ptofileDetails">	
    		
    			<form action="" method="POST">

                    <?php if(isset($error)): ?>
                        <div class="alert alert-danger">
                            <?php echo $error; ?>
                        </div>
               		<?php endif; ?>


                    <?php if(isset($success)): ?>
                        <div class="alert alert-success">
                            <?php echo $success; ?>
                        </div>
                        <script>
                        	setTimeout(function(){
                        		window.location="logout.php";
                        	},2000);
                        </script>
                    <?php endif; ?>

    				<div class="from-group">
    					<label for="c_password">Current Password</label>
    					<input type="password" class="form-control" name="c_password" id="c_password">
    				</div>

    				<div class="from-group">
    					<label for="n_password">New Password</label>
    					<input type="password" class="form-control" name="n_password" id="n_password">
    				</div>

    				<div class="from-group">
    					<label for="c_n_password">Confrim Password</label>
    					<input type="password" class="form-control"  name="c_n_password" id="c_n_password">
    				</div>

    				
    				<div class="from-group mt-3">
    					<input type="submit" name="change_password" class="btn btn-success" value="Change Password">
    				</div>
    				

    				
    			</form>
    		</div>
    	</div>
    </div>
<?php require_once('footer.php'); ?>