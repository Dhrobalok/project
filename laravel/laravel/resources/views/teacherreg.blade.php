<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body style="background: url('');">
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="images/img-01.png" alt="">
                </div>

                <form class="login100-form validate-form" enctype="multipart/form-data" action="{{url('/teacherreg2')}}" method="POST">
                    {{ csrf_field() }}
                    <span class="login100-form-title">
                        Teacher Registration
                    </span>
                     
                       @if(Session::has("success"))

                         <div class="alert alert-success">
                             <b>Registration Apply Successfull</b>

                         </div>

                        @endif

                         @if(Session::has("alert"))

                         
                        <div class="alert alert-success">
                             <b>This Email Already Taken Try use another </b>

                         </div>


                        @endif

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="name" placeholder="Name">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-address-book" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        
                       
                         <input class="input100" type="email" name="email"placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>

                    </div>

                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>



                    <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="file" name="image" placeholder="image">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                           
                        </span>
                    </div>


                      <div class="wrap-input100 validate-input" data-validate = "Password is required">
                        <input class="input100" type="text" name="t_id" placeholder="teacher id">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                           <i class="fa fa-address-book" aria-hidden="true"></i>
                        </span>
                    </div>

                     

                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>
                     <a  href="{{URL::to('/adminlogin')}}">
                            Teacher Login
                       

                    <div class="text-center p-t-12">
                        <span class="txt1">
                            
                        </span>
                        
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script >
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>