<?php   require_once('header.php');

	$user_id = $_SESSION['em_user'][0]['u_id'];

 ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Task</h1>


     <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Task</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" >
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Details</th>
 											<th>Deadline</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php 
                                    		$stm=$pdo->prepare("SELECT * FROM em_task WHERE user_id=? AND status=? ORDER BY t_id DESC");
                                    		$stm->execute(array($user_id,'completed'));
                                    		$result = $stm->fetchAll(PDO::FETCH_ASSOC);
                                    		$a=1;
                                    		foreach ($result as $row) :
                                    		
                                    	 ?>
                                    	<tr>
                                    		<td><?php echo $a;$a++; ?></td>
                                    		<td><?php echo $row['task_name']; ?></td>
                                    		<td><?php echo $row['task_details']; ?></td>
                                    		<td><?php echo date('d-M-Y',strtotime($row['date_time']))." <b>TO</b> ". date('d-M-Y',strtotime($row['submit_date_time'])); ?></td>
                                            <td><?php
                                                $status = $row['status'];
                                                if ($status== 'completed') {
                                                    echo '<span class="badge badge-success">Completed</span>' ;
                                                } 
                                              ?></td>
                                            <td><a href="taskView.php?tid=<?php echo $row['t_id']?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> view</a></td>
                                    	</tr>
                                    	<?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


    

<?php   require_once('footer.php'); ?>