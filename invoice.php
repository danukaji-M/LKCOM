<?php
session_start();
require "connection.php";
if(isset($_SESSION["ud"])){
    $email=$_SESSION["ud"]["email"];

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart Lanka ||"INVOICE</title>
    </head>
    <body>
        <div class="conainer-fluid" >
            <div class="row">
                <div class="col-12">
                    <?php require "header.php"; ?>
                    <hr>
                    <div class="row justify-content-center " >
                        <div class="col-10 bg-info">
                            <h1 class="h1 signupstart m-2 mt-2 text-center align-items-center" >INVOICE</h1>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php

}else{
    echo "<script>window.location='home.php'</script>";
}
?>