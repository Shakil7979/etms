<?php require_once('header.php');


    if (isset($_POST['task_submit'])) {
        $user_id = $_POST['user_id'];
        $task_name = $_POST['task_name'];
        $task_details = $_POST['task_details'];
        $task_deadline = $_POST['task_deadline'];
        $status = "pending";
        $date_time=date('Y-m-d H:i:s');

        if (empty($task_name) OR empty($task_details)) {
            $error = "Fild is Required!";
        }else{
            $stm= $pdo->prepare("INSERT INTO em_task(user_id,task_name,task_details,submit_date_time,status,date_time) VALUES(?,?,?,?,?,?)");
            $stm->execute(array($user_id,$task_name,$task_details,$task_deadline,$status,$date_time));

            $success = "Task Assign Successfully!";
        }


    }



?>
 <div class="row">
              <div class="col-8">
                <div class="card">
                  <div class="card-header border-bottom">
                    <h4>Assign a New Task</h4>
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
                            <label for="em_select">Select Employee:</label>
                            <select name="user_id" id="em_select" class="custom-select">
                                <?php 

                                $stm = $pdo->prepare("SELECT u_id,first_name,last_name FROM em_user");
                                $stm->execute();
                                $result=$stm->fetchAll(PDO::FETCH_ASSOC); 
                                foreach ($result as $row): 
                                 ?>

                                <option value="<?php echo $row['u_id'] ?>"><?php echo $row['first_name']." ".$row['last_name']; ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="task_name">Task Name:</label> 
                            <input type="text" name="task_name" id="task_name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="task_details">Task Details:</label> 
                            <textarea type="text" name="task_details" id="task_details" class="form-control summernote"></textarea> 
                        </div>

                        <div class="form-group">
                            <label for="task_deadline">Task Deadline:</label> 
                            <input type="Date" name="task_deadline" id="task_deadline" class="form-control">
                        </div>

                        <div class="form-group">  
                            <input type="submit" name="task_submit" value="Submit" class="btn btn-success">
                        </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            
<?php require_once('footer.php');?>
