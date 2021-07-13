<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
  <?php include('includes/header.php'); ?>
  <div class="container mt-3 mb-5" style="width:500px;">

    <?php
    include 'config.php';
    $a = mysqli_query($conn, "SELECT * FROM college_student WHERE student_id='$_GET[student_id]'");
    $b = mysqli_fetch_array($a, MYSQLI_ASSOC)
    ?>

    <div class="card shadow rounded " style="border-radius: 25px;">
      <div class="card-header">
        Update
      </div>
      <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for=" id"> Student ID : </label>
            <input type="text" name="student_id" class="form-control" placeholder="Insert Student ID" value="<?= $b['student_id'] ?>">
          </div>
          <div class="form-group">
            <label for=""> Name : </label>
            <input type="text" name="name" class="form-control" placeholder="Insert Name" value="<?= $b['name']; ?>">
          </div>
          <div class="form-group">
            <label for="">Majors : </label>
            <input type="text" name="majors" class="form-control" placeholder="Insert Majors" value="<?= $b['majors']; ?>">
          </div>
          <div class="form-group">
            <label for="">Gender :</label>
            <select name="gender" class="form-control" name="" id="">

              <option value="Male" <?php if ($b['gender'] == "Male") echo "selected"; ?>>Male</option>
              <option value="Female" <?php if ($b['gender'] == "Female") echo "selected"; ?>>Female</option>

            </select>
          </div>

          <div class="form-group">
            <label for=""> Address :</label>
            <input type="text" name="address" class="form-control" placeholder="Insert Address" value="<?= $b['address']; ?>">
          </div>
          <div class="form-group d-flex">
            <label for="">Choose an alternative photo</label>
            <img class="shadow  bg-white" style=" width: 90px;height: 110px; border-radius: 15%;" src='<?= $b['img']; ?>'>
            <input  style="margin:10px;" type="file" name="file" />
            <!-- <button type="submit" name = "uploadimage">Upload</button> -->
          </div>
          <input class="btn btn-primary" type="submit" name="update" value="Update">
          <input class="btn btn-danger" type="submit" name="cancel" value="Cancel">
        </form>
      </div>

    </div>


    <?php

    if (isset($_POST['update'])) {
      include 'config.php';
      $location = './test/';
      // $image = $_FILES['file']['name'];
      // move_uploaded_file($_FILES['file']['tmp_name'], $location.$_FILES["file"]['name']);
      
      $student_id = $_POST['student_id'];
      $name = $_POST['name'];
      $majors = $_POST['majors'];
      $gender = $_POST['gender'];
      $address = $_POST['address'];
      //new random name        
      $temp = explode(".", $_FILES["file"]["name"]);
      $newfilename = round(microtime(true)) . '.' . end($temp);
      $image2 = $location . $newfilename;
      
      $sql = "UPDATE college_student SET student_id='$student_id',img='$image2',name='$name',majors='$majors',gender='$gender',address='$address' WHERE student_id='$_GET[student_id]'";
      if ($conn->query($sql) === false) {
        echo "<script>alert('primary key duplicate error!')</script>";
        // trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
      } else {
        unlink($b['img']);
        move_uploaded_file($_FILES['file']['tmp_name'], $image2);
        echo "<script>alert('Update Success!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
      }
    }

    if (isset($_POST['cancel'])) {
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
    ?>

  </div>
  <?php include('includes/footer.php'); ?>
<?php } else {

  header("Location: formlogin.php");

  exit();
}

?>