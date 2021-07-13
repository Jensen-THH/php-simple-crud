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

    <nav class="navbar navbar-dark text-dark  shadow p-3 mb-2 bg-white rounded">
      <div class="container">
        <a class="navbar-brand" style="color:black; font-weight: bold;" href="index.php">QUẢN LÝ THÔNG TIN</a>
        <a style="color: black;font-weight: bold;font-size: 20px;" href="formlogin.php">Sign in</a>
      </div>
    </nav>
    <section>
        <div class="container">

            <div class="mx-auto" style="background-color: white; width:500px" id="col-left">

                <form class="mt-5"  method="post">
                    <h1 class="text-center" style="color:white">Login</h1>
                
                    <div class="mb-3">
                        <label  style="font-size: 20px;" class="form-label">Username</label>
                        <input type="text" class="form-control" name="uname" placeholder="User Name">
                    </div>
                    <div class="mb-3">
                        <label  style="font-size: 20px;" class="form-label">Password</label>
                        <input type="password" class="form-control"  name="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label  style="font-size: 20px;" class="form-label">Re-enter password</label>
                        <input type="password" class="form-control"  name="repassword" placeholder="Password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <!-- <button type="submit" value='add'  class="btn btn-primary">Sign up</button> -->
                    <input class="btn btn-primary" type="submit" name="add" value="Create account">
                    <input class="btn btn-danger" type="submit" name="cancel" value="Cancel">
                </form>
            


            </div>
       
        </div>
    </section>
    <?php
  if (isset($_POST['add'])) {
    include 'config.php';
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if ($repassword === $password){

   
    if ( $username != '' && $password != '' ) {
      $sql = "INSERT INTO users (id,user_name,password) VALUES (123,'$username','$password')";
      if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
        // trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
       
        echo "<script>alert('Error user name exists!')</script>";
      } else { // Jika berhasil alihkan ke halaman tampil.php
        echo "<script>alert('Create account Success!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=formlogin.php\">";
      }
    } else {
      echo "<script>alert('Please complete all information!')</script>";
    }
  }
  else{
    echo "<script>alert('Please try again, two passwords do not match !')</script>";
  }
}
  if(isset($_POST['cancel'])){
    echo "<meta http-equiv=refresh content=\"0; url=formlogin.php\">";		
    }
  ?>


<?php include('./includes/footer.php'); ?>