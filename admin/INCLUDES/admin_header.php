
<?php include "../includes/dp.php"?>
<?php include "function.php"?>
<?php ob_start(); ?>
<?php session_start(); ?>


<?php

if(!isset($_SESSION['role'])){
   
        header('Location: ../index.php');
 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="css/Style.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <!-- yeh jo summernote ki link miane add ki hai yeh kuch nahi hai bas post ko ache tarike se likhne ke liye ek kind of api hai , sir ne iski local file banake usko use kiya tha taki in future koi problem nahi aaye but mai abhi ke loiye direct net se hi utha hu , in th hope ki agar 9 sal me api change nahi hui ya free se charge nahi hui to aage bhi nahi hogi agar koi issue aaye in future to mai phir uss time ke hisab se koi dusri api dal dunga thanks  -->
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>