<?php
session_start();
require "connection.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>CARTLANKA || SEARCH</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php require "header.php";
            require "search.php";
            ?>
            <div class="col-12">
                <div class="row">
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        function mySearchFunction() {
            // Your search function logic here
            console.log("Search function executed");
        }

        // Check if the 'trigger' query parameter is set to 'true' in the URL
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('trigger') === 'true') {
            // Call your function when the 'trigger' parameter is set
            mySearchFunction();
        }
    </script>
<script src="script.js"></script>
</body>

</html>