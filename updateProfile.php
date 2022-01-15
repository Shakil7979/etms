<?php  

	require_once('header.php');

	$user_id= $_SESSION['em_user'][0]['u_id'];

	if(isset($_POST['update_profile'])){

        $firstName= $_POST['first_name'];
        $lastName= $_POST['last_name']; 
        $birthday= $_POST['birthday'];
        $blood= $_POST['blood'];
        $fatherName= $_POST['father_name'];
        $motherName= $_POST['mother_name'];
        $parentsNumber= $_POST['parents_number']; 
        $education= $_POST['education'];
        $address= $_POST['address'];


        if(empty($firstName)){
            $error = "First name is required";
        }else if(empty($lastName)){
            $error = "Last name is required";
        }else if(empty($fatherName)){
            $error = "Father name is required";
        }else if(empty($motherName)){
            $error = "Mother name is required";
        }else if(empty($parentsNumber)){
            $error = "Parents Phone Number is required";
        }else if(empty($education)){
            $error = "Education is required";
        }else if(empty($address)){
            $error = "Address is required";
        } else{

        		$stm=$pdo->prepare("UPDATE em_user SET first_name=?,last_name=?,birthday=?,blood_group=?,father_name=?,mother_name=?,parents_number=?,education=?,address=? WHERE u_id=?");
        		$stm->execute(array($firstName,$lastName,$birthday,$blood,$fatherName,$motherName,$parentsNumber,$education,$address,$user_id));

            	$success = "Register is Successfull!";
        }
    }

 ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 d-inline-block ">Update Profile</h1>


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
                    <?php endif; ?>

    				<div class="from-group">
    					<label for="first_name">First Name</label>
    					<input type="text" class="form-control" value="<?php echo em_user($user_id,'first_name'); ?>" name="first_name" id="first_name">
    				</div>

    				<div class="from-group">
    					<label for="last_name">Last Name</label>
    					<input type="text" class="form-control" value="<?php echo em_user($user_id,'last_name'); ?>" name="last_name" id="last_name">
    				</div>

    				<div class="from-group">
    					<label for="birthday">Birthday</label>
    					<input type="date" class="form-control" value="<?php echo em_user($user_id,'birthday'); ?>"  name="birthday" id="birthday">
    				</div>

    				<div class="from-group">
    					<label for="first_name">Blood Group</label>
    							<select name="blood" id="blood" class="form-control">
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O-">O-</option>
                                    <option value="O+">O+</option>          
                                </select>
    				</div>

    				<div class="from-group">
    					<label for="father_name">Father Name</label>
    					<input type="text" class="form-control" value="<?php echo em_user($user_id,'father_name'); ?>" name="father_name" id="father_name">
    				</div>

    				<div class="from-group">
    					<label for="mother_name">Mother Name</label>
    					<input type="text" class="form-control" value="<?php echo em_user($user_id,'mother_name'); ?>" name="mother_name" id="mother_name">
    				</div>

    				<div class="from-group">
    					<label for="parents_number">Parents Number</label>
    					<input type="text" class="form-control" value="<?php echo em_user($user_id,'parents_number'); ?>" name="parents_number" id="parents_number">
    				</div>

    				<div class="from-group">
    					<label for="education">Education</label>
    					<input type="text" class="form-control" value="<?php echo em_user($user_id,'education'); ?>" name="education" id="education">
    				</div>
    				
    				<div class="from-group">
    					<label for="address">Address</label>
    					<input type="text" class="form-control" value="<?php echo em_user($user_id,'address'); ?>" name="address" id="address">
    				</div>
    				
    				<div class="from-group mt-3">
    					<input type="submit" name="update_profile" class="btn btn-success" value="Update Profile">
    				</div>
    				

    				
    			</form>
    		</div>
    	</div>
    </div>
<?php require_once('footer.php'); ?>