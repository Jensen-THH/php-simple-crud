<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>QUẢN LÝ THÔNG TIN</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>
  <?php 
  // include "login.php";
  // session_start();
  // echo  $_SESSION['name'] 
  ?>
    <nav class="navbar navbar-dark text-dark  shadow p-3 mb-2 bg-white rounded">
      <div class="container">
        <a class="navbar-brand" style="color:black; font-weight: bold;" href="index.php">QUẢN LÝ THÔNG TIN</a>
      </div>
      <a  style="color: black;font-weight: bold;font-size: 20px; margin-right:10px"  href="logout.php">Logout</a>
      <a  style="color: black;font-weight: bold;font-size: 20px; margin-right:10px"><?=  $_SESSION['name']; ?></a>
    </nav>
