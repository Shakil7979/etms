<?php  

	require_once('header.php');

	$user_id= $_SESSION['em_user'][0]['u_id'];

	if(isset($_POST['update_photo'])){

		

		$photo=$_FILES['upload_phpto'];
		$name=$_FILES['upload_phpto']['name'];
		$tmp_name=$_FILES['upload_phpto']['tmp_name'];
		$size=$_FILES['upload_phpto']['size'];

		$extencion=pathinfo($name,PATHINFO_EXTENSION);

        if(empty($name)){
            $error = "Photo is required";
        }
        else if($extencion != 'PNG' AND $extencion != 'png' AND
		   $extencion != 'jpg' AND $extencion != 'JPG' AND
		   $extencion != 'jpeg' AND $extencion != 'JPEG' AND
		   $extencion != 'GIF' AND $extencion != 'gif' ){

        	$error="Place Attach jpg | png | gif";
        }
        else{

        	$newname= $user_id.".".$extencion;
        	$upload=move_uploaded_file($tmp_name, 'profilephotos/'.$newname);
        	
        	$stm=$pdo->prepare("UPDATE em_user SET photo=? WHERE u_id=?");
        	$stm->execute(array($newname,$user_id));

        	if($upload == true){
        		$success = "Profie Photo Upload Success";
        	}else{
        		$error="Profile Upload failed";
        	}
       	}


        }
    

 ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 d-inline-block ">Update Profile Photo</h1>


    <div class="row">
    	<div class="col-md-6">
    		<div class="ptofileDetails">	
    		
    			<form action="" method="POST" enctype="multipart/form-data">

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
    					<label for="upload_phpto">Upload Photo</label>
    					<input type="file" class="form-control" name="upload_phpto" id="upload_phpto">
    				</div>


    				
    				<div class="from-group mt-3">s
    					<input type="submit" name="update_photo" class="btn btn-success" value="Update Photo">
    				</div>
    				

    				
    			</form>
    		</div>
    	</div>
    </div>
<?php require_once('footer.php'); ?>