<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ETMS-Dashboard</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="admin/assets/bundles/summernote/summernote-bs4.css">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

   <link href="assets/css/user.css" rel="stylesheet">
   <style> 
        #errormsg {
            padding: 11px 20px;
            background: red;
            color: #fff;
            border-radius: 23px;
            display: none;
            width: 90%;
            margin: 0 auto;
        }
        #successmsg {
            padding: 11px 20px;
            background: green;
            color: #fff;
            border-radius: 23px;
            display: none;
            width: 90%;
            margin: 0 auto;
        }
        #forgotCodeForm{
            display: none;
        }
        #passwordForm{
            display: none;
        }
   </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div> 
                                    <div id="successmsg"></div> 
                                    <div id="errormsg"></div> 
                                    <form class="user" method="POST" id="forgotForm">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="forgotEmail" placeholder="Enter Email Address...">   
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>

                                    <input type="hidden" id="p_user_id" name="">

                                    <form class="user" method="POST" id="forgotCodeForm">
                                        <div class="form-group">
                                            <label for="code">Type Your Receive Code</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="user_code" placeholder="Code Your Email Code">   
                                        </div> 
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Submit Code
                                        </button>
                                    </form> 

                                    <form class="user" method="POST" id="passwordForm">
                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="new_password" placeholder="New Password">   
                                        </div>
                                        <div class="form-group">
                                            <label for="cnew_password">Confirm New Password</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="cnew_password" placeholder="Confirm New Password">   
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Change Password
                                        </button>
                                    </form>  

                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="assets/js/dateTime.js"></script>
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="admin/assets/bundles/summernote/summernote-bs4.js"></script>

    <script>
        $('#forgotForm').on('submit',function(event){
            event.preventDefault();

             var forgotEmail = $('#forgotEmail').val(); 
             if (forgotEmail.length == 0) {
                $('#errormsg').show().text("Email is Required!");
                $('#successmsg').hide();   
             }else{ 
                $('#errormsg').hide(); 
                $.ajax({
                    type:'POST',
                    url:'ajaxRequest.php',
                    dataType:'JSON',
                    data:{
                        forgotEmail:forgotEmail, 
                    },
                    success:function(response){  

                      if (response.success != null) {
                        $('#successmsg').show().text(response.success);
                        $('#p_user_id').val(response.user_id);
                        $('#errormsg').hide();

                        $('#forgotForm').hide();
                        $('#forgotCodeForm').show();


                      }else if(response.error != null) {
                        $('#errormsg').show().text(response.error);
                        $('#successmsg').hide();
                      }
                         
                         console.log(response); 
 
                        
                    } 
                })
             } 

        });


        // code form 

        $('#forgotCodeForm').on('submit',function(event){
            event.preventDefault();

             var user_code = $('#user_code').val(); 
             var user_id = $('#p_user_id').val(); 


             if (user_code.length == 0) {
                $('#errormsg').show().text("Code Feild is Required!");
                $('#successmsg').hide();   
             }else{ 
                $('#errormsg').hide(); 
                $.ajax({
                    type:'POST',
                    url:'ajaxRequest.php',
                    dataType:'JSON',
                    data:{
                        user_code:user_code,
                        user_id:user_id
                    },
                    success:function(response){  

                      if (response.success != null) {
                        $('#successmsg').show().text(response.success);
                        $('#errormsg').hide();

                        $('#forgotForm').hide();
                        $('#forgotCodeForm').show();


                      }else if(response.error != null) {
                        $('#errormsg').show().text(response.error);
                        $('#successmsg').hide();
                      }
                         
                         console.log(response); 
 
                        
                    } 
                })
             } 

        });
    </script>
</body>

</html>