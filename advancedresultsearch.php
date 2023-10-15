<?php
session_start();
require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>CARTLANKA ||ADVANCED SEARCH</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "header.php";
            require "search.php";
            ?>
            <div class="col-12">
                <div id="searchresult" class="row">
                    
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
    <script src="script.js"></script>
</body>

</html>