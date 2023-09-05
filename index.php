<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LK.com Sign in || Sign Up</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="font.css">
</head>

<body>
    <div class=" container-fluid">
        <div class="row">
            <div class="col-12 align-items-center justify-content-center text-center ">
                <!--logo-->
                <img src="resources/logo.png" class="logo" alt="" srcset="">
                <!--logo-->
            </div>
            <div class="col-12 text-center text-1 ">
                <span class=" text-capitalize h2 text-2">
                    <u>Welcome to cart lanka.com</u>
                </span>
            </div>
            <div class="col-12  col-lg-6 mt-3 offset-lg-3" id="crDiv" >
                <div class="row">
                    <div class="col-12 text-center  form-control shadow-lg">\
                        <div class="mt-2">
                            <span class="signupstart h3  fw-bold text-uppercase">
                                CReate new account
                            </span>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-lg-6 text-start ">
                                <label class="form-label label-font text-muted "> Enter first name </label>
                                <input type="text" class="form-control" placeholder="EX:John" id="fname">
                            </div>
                            <div class="col-12 col-lg-6 text-start ">
                                <label class="form-label label-font text-muted "> Enter first name </label>
                                <input type="text" class="form-control" placeholder="EX:Doyley" id="lname">
                            </div>
                            <div class="col-12 text-start mt-1 ">
                                <label class="form-label label-font text-muted "> Enter Email Adress </label>
                                <input type="email" class="form-control" placeholder="EX:Johndoiley@example.com" id="email">
                            </div>
                            <div class="col-12 col-lg-6 text-start mt-1 ">
                                <label class="form-label label-font text-muted "> Enter New Password </label>
                                <input type="password" class="form-control" placeholder="EX:: **********" id="pw1">
                            </div>
                            <div class="col-12 col-lg-6 text-start mt-1 ">
                                <label class="form-label label-font text-muted "> Retype your password </label>
                                <input type="password" class="form-control" placeholder="EX:: **********" id="pw2">
                            </div>
                            <div class="col-12 col-lg-6 text-start mt-1">
                                <label class="form-label label-font text-muted">Enter your mobile number</label>
                                <input type="text" class="form-control" name="" id="mobile" placeholder="07XXXXXXXXX">
                            </div>
                            <div class="col-12 col-lg-6 text-start mt-1 mb-4 ">
                                <label class="form-label form-label text-muted">Select Your gender</label>
                                <select name="" class="form-control" id="">
                                    <option value="0">Select your gender</option>

                                    <?php 
                                    
                                    require "connection.php";
                                    
                                    $rs = Database::search("SELECT * FROM `gender`");
                                    $nr = $rs->num_rows;
                                    
                                    for ($i=0; $i < $nr ; $i++) { 
                                        $data = $rs->fetch_assoc();
                                        ?>

                                        <option value="<?php echo $i ?>"> <?php echo $data["gender_name"] ?></option>

                                        <?php
                                    }

                                    ?>

                                </select>
                            </div>
                            <hr>
                            <div class="col-12 col-lg-6 mt-4 mb-lg-2">
                                <v-button class="btn btn-primary form-control shadow">CREATE ACCOUNT</v-button>
                            </div>
                            <div class="col-12 col-lg-6 mt-1 mt-lg-4 mb-2">
                                <v-button class="btn btn-dark form-control shadow  " onclick="togDiv();" >Already have account? LOGIN</v-button>
                            </div>
                            <div class="text-start col-12 mt-4">
                                <span class=" text-uppercase social h4">
                                    Login with social account
                                </span>
                            </div>
                            <div class="col-6 mt-3 mb-4 align-items-center justify-content-center ">
                                <button type="button" class="btn btn-warning form-control  shadow">
                                    <i class="bi bi-google login "> Login with Google</i>
                                </button>
                            </div>
                            <div class="col-6 mt-3 mb-4 align-items-center justify-content-center ">
                                <button type="button" class="btn btn-info form-control  shadow">
                                    <i class="bi bi-facebook login "> Login with Facebook</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 d-none col-lg-6 offset-lg-3" id="logDiv" >
                <div class="row mt-2 ">
                    <div class="col-12 form-control shadow-lg ">
                        <div class="row">
                            <div class="mt-2 col-12 text-center ">
                                <span class="signupstart h3  fw-bold text-uppercase">
                                    Login Account
                                </span>
                                <div class="col-12 text-start mt-1 ">
                                    <label class="form-label label-font text-muted "> Enter Email Adress / Mobile Number</label>
                                    <input type="email" class="form-control" placeholder="EX:Johndoiley@example.com / 07XXXXXXX" id="email">
                                </div>
                                <div class="col-12 text-start mt-1 ">
                                    <label class="form-label label-font text-muted ">Enter Your Password </label>
                                    <input type="password" class="form-control" placeholder="EX:********" id="password">
                                </div>
                                <div class="row">
                                    <div class="col-6 text-start mt-2 mb-2 ">
                                        <input type="checkbox" name="" id=" check">
                                        <label class="text-muted">Remember me </label>
                                    </div>
                                    <div class="col-6 text-end mt-2 mb-2">
                                        <span><a href="#">Forgot password</a></span>
                                    </div>
                                    <hr>
                                    <div class="col-12 col-lg-6 mt-4 mb-lg-4">
                                        <v-button class="btn btn-primary form-control text-uppercase shadow">Login account</v-button>
                                    </div>
                                    <div class="col-12 col-lg-6 mt-1 mt-lg-4 mb-4">
                                        <v-button onclick="togCrDiv();" class="btn btn-dark form-control text-uppercase shadow ">Don't have an account? CREATe</v-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer-->
            <div class="col-12 fixed-bottom text-center ">
                <span class="text-muted text-capitalize ">
                    copyright &copy; 2022-2023 cart lanka lnc. All rights reserved
                </span>
            </div>
            <!--footer-->

        </div>
    </div>
    <script src="bootstrap.css"></script>
    <script src="script.js"></script>t
</body>

</html>