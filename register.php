<?php 

    require_once("config.php");
    require_once('function.php');
    
    if(isset($_POST['submit_register'])){

        $firstName= $_POST['firstName'];
        $lastName= $_POST['lastName'];
        $email= $_POST['email'];
        $mobileNumber= $_POST['mobileNumber'];
        $birthday= $_POST['birthday'];
        $blood= $_POST['blood'];
        $fatherName= $_POST['fatherName'];
        $motherName= $_POST['motherName'];
        $parentsNumber= $_POST['parentsNumber']; 
        $education= $_POST['education'];
        $address= $_POST['address'];
        $password= $_POST['password'];
        $date= date('Y-m-d H:i:s');

        $emailCount= inputCount('email',$email);
        $mobileCount= inputCount('mobile',$mobileNumber);


        if(empty($firstName)){
            $error = "First name is required";
        }else if(empty($lastName)){
            $error = "Last name is required";
        }else if(empty($email)){
            $error = "Email is required";
        }else if($emailCount == 1){
            $error = "Email is already exits";
        }else if(empty($mobileNumber)){
            $error = "Mobile number is required";
        }else if(!is_numeric($mobileNumber)){
            $error = "Mobile number must be numeric";
        }else if(strlen($mobileNumber) != 11 ){
            $error = "Mobile number must be 11 Degit";
        }else if($mobileCount == 1){
            $error = "Mobile num is already exits";
        }else if(empty($fatherName)){
            $error = "Father name is required";
        }else if(empty($motherName)){
            $error = "Mother name is required";
        }else if(empty($parentsNumber)){
            $error = "Parents Phone Number is required";
        }else if(empty($address)){
            $error = "Address is required";
        }else if(empty($password)){
            $error = "Password is required";
        }else{

            $password=SHA1($password);

            $stm=$pdo->prepare("INSERT INTO 
                em_user(
                    first_name,
                    last_name,
                    email,
                    mobile,
                    birthday,
                    blood_group,
                    father_name,
                    mother_name,
                    parents_number,
                    education,
                    address,
                    password,
                    register_time
            ) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stm->execute(array($firstName,$lastName,$email,$mobileNumber,$birthday,$blood,$fatherName,$motherName,$parentsNumber,$education,$address,$password,$date));

            $success = "Register is Successfull!";
        }

    }
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ETMS - Register</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register an Account!</h1>
                            </div>

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

                            <form class="user" method="POST" action="">

                                <!-- Name -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="firstName" class="form-control form-control-user" id="firstName"
                                            placeholder="First Name *">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lastName" class="form-control form-control-user" id="lastName"
                                            placeholder="Last Name *">
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="email"
                                        placeholder="Email Address *">
                                </div>

                                <!-- Mobile Number -->
                                <div class="form-group">
                                    <input type="text" name="mobileNumber" class="form-control form-control-user" id="mobileNumber"
                                        placeholder="Mobile Number *">
                                </div>

                                <!-- Birthday & Blood -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="date" name="birthday" class="form-control form-control-user"
                                            id="birthday" placeholder="Birthday">
                                    </div>
                                    <div class="col-sm-6">
                                       <select name="blood" id="blood" class="form-control">

                                           <option value="A+">A+</option>
                                           <option value="A-">A-</option>
                                           <option value="B+">B+</option>
                                           <option value="B-">B-</option>
                                           <option value="AB+">AB+</option>
                                           <option value="AB-">AB-</option>
                                           <option value="O-">O-</option>
                                           <option value="O+">O+</option>
                                           
                                       </select>
                                    </div>
                                </div>

                                <!-- Father Name -->
                                <div class="form-group">
                                    <input type="text" name="fatherName" class="form-control form-control-user" id="fatherName"
                                        placeholder="Father's Name *">
                                </div>

                                <!-- Mother Name  -->
                                <div class="form-group">
                                    <input type="text" name="motherName" class="form-control form-control-user" id="motherName"
                                        placeholder="Mother's Name *">
                                </div>

                                <!-- Parents Mobile Number -->
                                <div class="form-group">
                                    <input type="text" name="parentsNumber" class="form-control form-control-user" id="parentsNumber"
                                        placeholder="Parents Mobile Number *">
                                </div>

                                <!-- Education Lavel -->
                                <div class="form-group">
                                    <input type="text" name="education" class="form-control form-control-user" id="education"
                                        placeholder="Education Lavel">
                                </div>

                                <!-- Address -->
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control form-control-user" id="address"
                                        placeholder="Address *">
                                </div>

                                <!-- Password -->
                                <div class="form-group col-md-6 offset-md-3">
                                    <input type="password" name="password" class="form-control form-control-user" id="password"
                                        placeholder="Login Password">
                                </div>

                                <!-- Register BTN -->
                                <input class="btn btn-primary btn-user btn-block" type="submit" name="submit_register" value="Register Account">
                                <hr>
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
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

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>