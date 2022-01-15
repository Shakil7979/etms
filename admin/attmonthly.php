<?php require_once('header.php');?>
 <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">

                  <?php if(isset($_POST['date_filter'])): ?>
                    <h4>Monthly Attendance ~~ <span><?php 

                    echo "1"."-".$_POST['month_name']."-".$_POST['year_name']; ?> To 
                    <?php 
                     $st_month = $_POST['year_name']."-".$_POST['month_name'];
                     echo date('t-M-Y',strtotime($st_month)); ?> </span></h4>

                    <?php else : ?>
                    <h4>Monthly Attendance ~~ <span><?php echo "1".date('-M-Y'); ?> To <?php echo date('d-M-Y'); ?> </span></h4>
                  <?php endif; ?>   
                  </div>
                <div class="filter_atts">
                  <form action="" method="POST">
                      <div class="form-group">
                            <label for="month_name">Month:</label>
                          <select name="month_name" class="custom-select" id="month_name">
                            <?php if(isset($_POST['month_name'])) : ?>
                               
                               <option seleceted value=" <?php echo $_POST['month_name'];?> "> <?php 
                               $st_month = $_POST['year_name']."-".$_POST['month_name'];
                               echo date('F',strtotime($st_month));?> </option>

                            <?php endif; ?>
                              <option value="01">January</option>
                              <option value="02">February</option>
                              <option value="03">March</option>
                              <option value="04">April</option>
                              <option value="05">May</option>
                              <option value="06">June</option>
                              <option value="07">July</option>
                              <option value="08">August</option>
                              <option value="09">September</option>
                              <option value="10">Octobor</option>
                              <option value="11">November</option>
                              <option value="12">December</option>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="year_name">Year:</label>
                          <select name="year_name" class="custom-select" id="year_name">
                            <?php if(isset($_POST['year_name'])) : ?>
                                <option value="<?php echo $_POST['year_name']; ?>"> <?php echo $_POST['year_name']; ?> </option>
                            <?php endif; ?>
                            <?php 
                                $strat_year= 2018;
                                $end_year= date('Y');

                                for ($i=$strat_year; $i<=$end_year ; $i++) :?>
                              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                          </select>
                      </div> 

                      <div class="form-group">
                        <label for="">&nbsp;</label>
                        <input type="submit" value="Filter" class="btn btn-info form-control" name="date_filter"> 
                       </div>

                  </form>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Present</th>
                                            <th>Absent</th>
                                            <th>Date</th>
 											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php if(isset($_POST['date_filter'])) : ?>

                                         <tbody>

                                        <?php 
                                            $start_date = 1;
                                            $month = $_POST['month_name'];
                                            $year = $_POST['year_name'];
                                            $getDate= $year."-".$month;
                                            $end_date = date('t',strtotime($getDate));

                                            for ($i=$start_date; $i <=$end_date ; $i++) { 
                                            
                                            ?>

                                            <tr>
                                                <td> <?php echo $i;?> </td>
                                                <td><?php 
                                                    $loppdate = $getDate."-".$i;
                                                    $PresentCount= checkAttendanceCount($loppdate);
                                                    echo $PresentCount;
                                                 ?></td>
                                                <td><?php 
                                                    $total_user= em_user_count();
                                                    $Absent = $total_user-$PresentCount;
                                                    echo $Absent;
                                                
                                                 ?></td>
                                                <td> <?php 
                                                $date2 = $getDate."-".$i;
                                                echo date('d-M-Y',strtotime($date2)); ?> </td>
                                                <td>
                                                    <a href="#" class="btn btn-warning"><i class="fa fa-eye">View</i>View</a>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                        ?>
                                    </tbody>

                                    <?php else :  ?>
                                    <tbody>

                                    	<?php 
                                    		$start_date = 1;
                                    		$end_date = date('d');

                                    		for ($i=$start_date; $i <=$end_date ; $i++) { 
                                    		
                                    		?>

                                    		<tr>
                                    			<td> <?php echo $i;?> </td>
                                    			<td><?php 
                                    				$loppdate = date('Y-m-').$i;
                                    				$PresentCount= checkAttendanceCount($loppdate);
                                    				echo $PresentCount;
                                    			 ?></td>
                                    			<td><?php 
                                    				$total_user= em_user_count();
                                    				$Absent = $total_user-$PresentCount;
                                    				echo $Absent;
                                    			
                                    			 ?></td>
                                    			<td> <?php echo $i.date('-M-Y'); ?> </td>
                                    			<td>
                                    				<a href="attToday.php" class="btn btn-warning"><i class="fa fa-eye">View</i>View</a>
                                    			</td>
                                    		</tr>
                                    		<?php
                                    		}
                                    	?>
                                    </tbody>
                                    <?php endif; ?>
                                </table>
                        </div>
                  </div>
                </div>
              </div>
            </div>
            
<?php require_once('footer.php');?>
