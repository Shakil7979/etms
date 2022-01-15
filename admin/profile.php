
<?php 

      require_once('header.php');
      $ad_id= $_SESSION['em_admin'][0]['ad_id'];
 ?>
 

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-4">
                <div class="card author-box">
                  <div class="card-body">
                    <div class="author-box-center">
                      <img alt="image" src="assets/img/users/user-1.png" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                      <div class="author-box-name">
                        <a href="#"><?php echo em_admin($ad_id,'name'); ?></a>
                      </div>
                      <div class="author-box-job"><?php echo em_admin($ad_id,'designation'); ?></div>
                    </div>
                  </div>
                </div>  
              </div>

              <div class="col-12 col-md-12 col-lg-8">
                <div class="card">
                  <div class="padding-20">
                    <ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#about" role="tab"
                          aria-selected="true">Profile</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#settings" role="tab"
                          aria-selected="false">Change  Password</a>
                      </li>
                    </ul>

                    <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="row">
                          <div class="card-header">
                            <h4>Edit Profile</h4>
                          </div>
                          <div class="card-body">
                            <form action="" method="POST">
                            <div class="row">
                              <div class="from-group col-md-12">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="<?php echo em_admin($ad_id,'name'); ?>">
                              </div>
                            </div>
                            <div class="row">
                              <div class="from-group col-md-12">
                                <label>User Name</label>
                                <input type="text" class="form-control" name="u_name " id="u_name" value="<?php echo em_admin($ad_id,'username'); ?>">
                              </div>
                            </div>
                           <div class="row">
                              <div class="from-group col-md-12">
                                <label>Photo</label>
                                <input type="file" class="form-control" name="profile_photo" id="profile_photo">
                              </div>
                            </div>
                            </form>
                          </div> 
                        </div>
                        <div class="card-footer text-left">
                            <button class="btn btn-primary" name="update_profile" type="submit">Update Profile</button>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="profile-tab2">
                        <form method="post" class="needs-validation" action="">
                          <div class="card-header">
                            <h4>Edit Password</h4>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Current Password</label>
                                <input type="password" name="current_password" class="form-control">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>New Password</label>
                                <input type="password" name="new_password" class="form-control">
                              </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-md-6 col-12">
                                <label>Confrim New Password</label>
                                <input type="password" name="confrim_new_password" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="card-footer text-left">
                            <button class="btn btn-primary" type="submit" name="change_password">Change Password</button>
                          </div>
                        </form>
                      </div>

                    </div>  
                  </div>    
                </div>
              </div>
            </div>
       
  

<?php require_once('footer.php'); ?>