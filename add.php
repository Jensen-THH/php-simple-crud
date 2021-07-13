<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
  <?php include('includes/header.php'); ?>
  <div class="container mt-3" style="width:500px;">
    <div class="card shadow rounded">
      <div class="card-header">
        Add
      </div>
      <div class="card-body">
        <form action="add2.php" method="POST" enctype="multipart/form-data">
          <div class="form-group" ">
  <label for=" id"> Student ID : </label>
            <input type="text" name="student_id" class="form-control" placeholder="Insert Student ID">
          </div>
          <div class="form-group">
            <label for=""> Name : </label>
            <input type="text" name="name" class="form-control" placeholder="Insert Name">
          </div>
          <div class="form-group">
            <label for="">Majors : </label>
            <input type="text" name="majors" class="form-control" placeholder="Insert Majors">
          </div>
          <div class="form-group">
            <label for="">Gender :</label>
            <select name="gender" class="form-control" name="" id="">
              <option value="Male">Male</option>
              <option value="Female">Female</option>

            </select>
          </div>
          <!-- <div class="form-group"> -->
            <label for="">Image :</label>
            <!-- <input type="file" name="image" /> -->
            <input type="file" accept=".jpg,.png,.jpeg" id="upww" name="upww" >
            <!-- <button type="submit" name = "uploadimage">Upload</button> -->
          <!-- </div> -->

          <div class="form-group">
            <label for=""> Address :</label>
            <input type="text" name="address" class="form-control" placeholder="Insert Address">
          </div>
          <button class="btn btn-primary" type="submit" name="add"> ADD </button>
          <button class="btn btn-danger" type="submit" name="cancel"> CANCEL </button>
        </form>
      </div>

    </div>

    
  </div>
  <?php include('includes/footer.php'); ?>
<?php } else {

  header("Location: formlogin.php");

  exit();
}

?>