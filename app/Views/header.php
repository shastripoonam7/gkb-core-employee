<?php
    $css=array(
        'plugins/fontawesome-free/css/all.min.css','plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
        'plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
        'plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
        'dist/css/adminlte.min.css',
        'plugins/datatables-responsive/css/responsive.bootstrap4.css'
    );
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employee Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link href="css/style.css" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
        <style>
            .error{
                color:red;
            }
            </style>
        <?php
            foreach($css as $css)
            {
                echo "<link rel='stylesheet' href='".ASSETSURL."$css'>";
            }
        ?>
    </head>
    <body>
    
   