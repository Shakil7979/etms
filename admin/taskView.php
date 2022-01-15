 <?php require_once('header.php');

    $tid = $_REQUEST['tid']; 



    if (isset($_POST['task_review'])) {
        $tid = $_REQUEST['tid']; 
        $review = $_POST['review'];
        $status = $_POST['new_status'];
        $review_date = date('Y-m-d H:i:s');
 

        $stm = $pdo->prepare("UPDATE em_task SET status=?,review=?,review_date=? WHERE t_id=?");
        $stm->execute(array($status,$review,$review_date,$tid));

        $success = "Task Review Successfully!"; 
 
    }


    $stm = $pdo->prepare("SELECT * FROM em_task WHERE t_id=?");
    $stm->execute(array($tid));
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $row) {
        $user_id = $row['user_id'];
        $task_name = $row['task_name'];
        $task_details = $row['task_details'];
        $status = $row['status'];
        $work_details = $row['work_details'];
        $assign_date = $row['submit_date_time'];
        $user_submit_date = $row['updated_at'];
        $review = $row['review'];
    }






?>
 <div class="row">
              <div class="col-8">
                <div class="card">
                  <div class="card-header border-bottom">
                    <h4>View Task
                        <?php
                            $status = $row['status'];
                            if ($status== 'pending..') {
                                echo '<span class="badge badge-warning">Pending..</span>' ;
                            }else if ($status== 'submited') {
                                echo '<span class="badge badge-info">Submited</span>' ;
                            }else if ($status== 'modification') {
                                echo '<span class="badge badge-primary">Modification</span>' ;
                            }else if ($status== 'completed') {
                                echo '<span class="badge badge-success">Completed</span>' ;
                            }else if ($status== 'notApproved') {
                                echo '<span class="badge badge-danger">Not Approved</span>' ;
                            }
                          ?>
                    </h4>
                  </div>
                  <div class="card-body"> 
                    <form action="" method="POST">

                        <?php if(isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error ?></div>
                        <?php endif; ?>

                        <?php if(isset($success)):?>
                        <div class="alert alert-success"><?php echo $success ?></div>
                        <?php endif; ?>

                        <div class="form-group">
                            <label for="em_select">Employee Name:</label> 
                            <p><?php echo em_user($user_id,'first_name')." ".em_user($user_id,'last_name'); ?></p>
                        </div>

                        <div class="form-group">
                            <label for="task_name">Task Name:</label> 
                            <p><?php echo $task_name; ?></p>
                        </div>

                        <div class="form-group alert alert-info">
                            <h6>Task Details:</h6> 
                            <p> <?php echo $task_details; ?> </p> 
                        </div>

                        <div class="form-group">
                            <label for="task_deadline">Task Deadline:</label> 
                            <p><b>Assign Date:</b> <?php echo $assign_date;?> <b>Submited Date:</b> <?php echo $user_submit_date; ?> </p>
                        </div>

                        <?php if($work_details != null): ?>
                        <div class="form-group alert alert-success">
                            <h6>Submitted Works Details:</h6> 
                            <p><?php echo $work_details; ?></p>
                        </div>
                        <?php endif; ?>
 
                         <?php if ($status != 'completed'): ?> 
                        <div class="form-group">
                            <label for="review">Review:</label> 
                            <textarea type="text" name="review" id="review" class="form-control summernote" ><?php echo $review; ?></textarea>
                        </div>

                         
                        <div class="form-group">
                            <label for="status">Status:</label> 
                            <select name="new_status" class="custom-select" id="status">
                                <option value="<?php echo $status; ?>" selected><?php echo $status; ?></option>
                                <option value="completed">Completed</option>
                                <option value="notApproved">Not Approved</option>
                            </select>
                        </div>

                        <div class="form-group">  
                            <input type="submit" name="task_review" value="Submit Task" class="btn btn-success">
                        </div>
                        <?php else: ?>
                        <?php if ($review !=null): ?>
                            <div class="form-group alert alert-primary">
                                <h6>Review Details:</h6> 
                                <p> <?php echo $review; ?> </p> 
                            </div>
                        <?php endif; ?>
                        <?php endif; ?>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            
<?php require_once('footer.php');?>
