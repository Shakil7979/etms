<?php require_once('header.php');?>
 <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>All Task</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th class="text-center">
                              SL
                            </th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Assign Date</th>
                            <th>Submited Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        	 <?php 

                        	 	$stm=$pdo->prepare("SELECT * FROM em_task WHERE status !=?");
                        	 	$stm->execute(array('completed'));
                        	 	$result=$stm->fetchAll(PDO::FETCH_ASSOC);
                        	 	$a=1;
                        	 	foreach($result as $row):

                        	  ?>
                        	  <tr>
                        	  	<td><?php echo $a;$a++; ?></td>
                        	  	<td><?php echo em_user($row['user_id'],'first_name')." ".em_user($row['user_id'],'last_name'); ?></td>
                        	  	<td><?php echo $row['task_name']; ?></td>
                        	  	<td><?php echo date('d-M-Y h-i A',strtotime($row['date_time'])) ; ?></td> 
                        	  	<td><?php echo date('d-M-Y',strtotime($row['submit_date_time'])) ; ?></td> 
                        	  	<td><?php
                        	  		$status = $row['status'];
                        	  		if ($status== 'pending') {
                        	  			echo '<span class="badge badge-warning">Pending</span>' ;
                        	  		}else if ($status== 'submited') {
                        	  			echo '<span class="badge badge-info">Submited</span>' ;
                        	  		}else if ($status== 'modification') {
                        	  			echo '<span class="badge badge-primary">Modification</span>' ;
                        	  		}else if ($status== 'notApproved') {
                                        echo '<span class="badge badge-danger">Not Approved</span>' ;
                                    }
                        	  	  ?></td> 
                        	  	<td><a href="taskView.php?tid=<?php echo $row['t_id'];?>" class="btn btn-success"><i class="fa fa-eye"></i> View</a></td> 

                        	  </tr>
                        	<?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
<?php require_once('footer.php');?>

 