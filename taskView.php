<?php   require_once('header.php');

	$user_id = $_SESSION['em_user'][0]['u_id'];
	$tid= $_REQUEST['tid'];

	$stm=$pdo->prepare("SELECT * FROM em_task WHERE user_id=? AND t_id=? ORDER BY t_id DESC");
	$stm->execute(array($user_id,$tid));
	$result = $stm->fetchAll(PDO::FETCH_ASSOC);

	foreach ($result as $row){
		$name = $row['task_name'];
		$details = $row['task_details'];
		$date_time = $row['date_time'];
		$submit_date_time = $row['submit_date_time'];
        $status = $row['status'];
        $work_details = $row['work_details'];
        $review = $row['review'];
        $review_date = $row['review_date'];
	}



    if (isset($_POST['submit_work'])) {
        $work_details = $_POST['work_details'];
        $status = "completed";
        $updated_at = date("Y-m-d H:i:s");

        if (empty($work_details)) {
            $error = "fild is Required!";
        }else{
            $stm = $pdo->prepare("UPDATE em_task SET  updated_at=?, work_details=?,status=? WHERE user_id=? AND t_id=?");
            $stm->execute(array($updated_at,$work_details,$status,$user_id,$tid));
            $success= "Work submited successfully!";
        }
    }




 ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">View Task</h1>


   <div class="row">
       <div class="col-md-8">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">View Task</h6>
            </div>

            <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error ?></div>
            <?php endif; ?>

            <?php if(isset($success)): ?>
            <div class="alert alert-success"><?php echo $success ?></div>
            <?php endif; ?>

            <div class="card-body"> 

                <table class="table">
                    <tr>
                        <td><b>Name:</b></td>
                        <td><?php echo $name; ?></td>
                    </tr>
                    <tr>
                        <td><b>Details:</b></td>
                        <td><?php echo $details; ?></td>
                    </tr>
                    <tr>
                        <td><b>Deadline:</b></td>
                        <td><?php echo date('d-M-Y',strtotime($date_time))." <b>TO</b> ". date('d-M-Y',strtotime($submit_date_time)); ?></td>
                    </tr>
                    <tr>
                        <td><b>Status:</b></td>
                        <td><?php 
                             $status = $row['status'];
                            if ($status== 'pending') {
                                echo '<span class="badge badge-warning">Pending</span>' ;
                            }else if ($status == 'submited') {
                                echo '<span class="badge badge-info">Submited</span>' ;
                            }else if ($status== 'modification') {
                                echo '<span class="badge badge-primary">Modification</span>' ;
                            } else if ($status== 'completed') {
                                echo '<span class="badge badge-success">Completed</span>' ;
                            }else if ($status== 'notApproved') {
                                echo '<span class="badge badge-danger">not Approved</span>' ;
                            }  ?></td>
                    </tr>
                </table>

                <?php if($status != 'completed'): ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="word_details">Work Details: <small>If you need upload any files, share link on box..</small> </label>
                        <textarea name="work_details" class="form-control summernote" id="work_details" ></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit_work" value="Submit Work" class="btn btn-success btn-sm">
                    </div>
                </form>
                <?php else: ?>
                    <p><b class="text-primary">Your work is:</b> <?php echo $work_details; ?></p>

                    <div class="alert alert-success">
                        Review Date : <?php echo date('d-M-Y h:i A',strtotime($review_date)); ?> <br>
                        Review : <?php echo $review; ?> 
                    </div>


                <?php endif; ?>

                          
            </div>
        </div>
       </div>
   </div>


    

<?php   require_once('footer.php'); ?>