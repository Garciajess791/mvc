<?php
  
    $titulo = ["Home"];
    $rt_css = $RHTTP.'themes/css/';
    $lang = $_SERVER['HTTP_ACCEPT_LANGUAGE'];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo[0]; ?></title>
    <meta name="description" content="asdfsd" />
    <!-- CDN BOOSTRAP CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- CSS DATATABLES JQUREY --->
    <link id="SDTable" href="<?php echo $RHTTP.'themes/css/datatable.min.css'; ?>" rel="stylesheet" type="text/css">    
    <link id="Style"   href="<?php echo $RHTTP.'themes/css/style.css'; ?>" rel="stylesheet" type="text/css"/>
    <!-- CDN BOOSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js" ></script>
    <!--<script src="<?php //echo $RHTTP.'themes/js/script.js'; ?>" ></script> -->

</head>
<body>
    <header>
        <?php require('menu.php'); ?>
    </header>

