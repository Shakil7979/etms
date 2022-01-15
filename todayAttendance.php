<?php   require_once('header.php'); ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Attendance</h1>
<?php 	

	$user_id = $_SESSION['em_user'][0]['u_id'];

	if(isset($_POST['submit_attendance'])){
		$ip_address = $_SERVER['SERVER_ADDR'];
		$device_details = $_SERVER['HTTP_USER_AGENT'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$sys_time = date('Y-m-d H:i:s');

		$attendance= $_POST['attendance'];
		$att_datetime= $_POST['att_datetime']; 


		$today = date('Y-m-d');	
	    $today_attendance = em_att_submit($today,$user_id);

		// 12/17/2020 08:40 PM
		$date = $att_datetime;
		$date = str_replace('/', '-', $date);
		$newdate= date('Y-m-d H:i:s', strtotime($date));


		if(empty($att_datetime)){
			$error ="Date Time is required";
		}else if($today_attendance == 1 ){
			$error = "Already Attendance Subbmitted";
		}
		else{

			$stm = $pdo->prepare("INSERT INTO em_attendance(

				em_id,attendance,user_time,sys_time,latitude,longitude,ip_address,device_details

			) VALUES(?,?,?,?,?,?,?,?)");
			$stm->execute(array($user_id,$attendance,$newdate,$sys_time,$latitude,$longitude,$ip_address,$device_details));

			$success = "Attendance Submit Successfully!!";
		}
	}


 ?>


    <div class="row">
    	<div class="col-md-6">
    		<div class="card shadow">
    			<form action="" method="POST">

    				<?php if(isset($error)) : ?>
    					<div class="alert alert-danger">
    						<?php echo $error; ?>
    					</div>
    				<?php endif; ?>

    				<?php if(isset($success)) : ?>
    					<div class="alert alert-success">
    						<?php echo $success; ?>
    					</div>
    				<?php endif; ?>

    				
    				<!-- Location Error Hidden -->
    				<div class="alert alert-danger" id="locationError">
    					
    				</div>

    				
    				<div class="form-group">
    					<label for="attendance">
    					    <input type="checkbox" value="1" name="attendance" id="attendance" checked> Present
    					</label>
    				</div>

    				<div class="form-group">
    					<label for="att_datetime"><b>Date Time:</b></label>
    					    <input class="form-control" type="text" name="att_datetime" id="att_datetime" placeholder="Select your in Time">
    				</div>

    				<input type="hidden" name="latitude" id="latitude">
    				<input type="hidden" name="longitude" id="longitude">

    				<div class="form-group">
    					<input type="submit" name="submit_attendance" class="btn btn-success" value="Submit Attendance" id="submit_attendance" disabled>
    				</div>
    				
    			</form>
    		</div>
    	</div>
    </div>



<?php require_once('footer.php'); ?>


<script>


function getLocation(){
	$('#locationError').hide();
	navigator.geolocation.getCurrentPosition(function(position){

		let lati = position.coords.latitude;
 		let long = position.coords.longitude;

 		$('#latitude').val(lati);
 		$('#longitude').val(long);

 		$('#submit_attendance').attr('disabled', false);



	},
		function showError(error){
			$('#locationError').show();
			$('#submit_attendance').attr('disabled', true);

			if(error.PERMISSION_DENIED){
				$('#locationError').text("User denied the request for Geolocation");
			}
			else if(error.POSITION_UNAVAILABLE){
				$('#locationError').text("Location information is unavailable.");
			}
			else if(error.TIMEOUT){
				$('#locationError').text("The request to get user location timed out.");
			}
			else if(error.UNKNOWN_ERROR){
				$('#locationError').text("An unknown error occurred.");
			}
		}
	);
}

	getLocation();

</script>