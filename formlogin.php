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
      <div>
          <a class="ml-5 navbar-brand" style="color:black; font-weight: bold;" href="index.php">QUẢN LÝ THÔNG TIN</a>
      </div>
     <div style="color: black;">
     <a class="pr-5" style="color: black;font-weight: bold;font-size: 20px;" href="formlogin.php">Sign in</a>
        <a  style="color: black;font-weight: bold;font-size: 20px;" href="formdangki.php">Sign up</a>
     </div>
    </nav>
    <section>
        <div class="container">

            <div class="mx-auto" style="background-color: white; width:500px" id="col-left">

                <form class="mt-5" action="login.php" method="post">
                    <h1 class="text-center" style="color:white">Login</h1>
                    <?php if (isset($_GET['error'])) { ?>

                        <p class="error"><?php echo $_GET['error']; ?></p>

                    <?php } ?>
                    <div class="mb-3">
                        <label  style="font-size: 20px;" class="form-label">Username</label>
                        <input type="text" class="form-control" name="uname" placeholder="User Name">
                    </div>
                    <div class="mb-3">
                        <label  style="font-size: 20px;" class="form-label">Password</label>
                        <input type="password" class="form-control"  name="password" placeholder="Password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            


            </div>
       
        </div>
    </section>


    <?php include('./includes/footer.php'); ?>