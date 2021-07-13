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
    <form method="post">
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

    <div class="form-group">
      <label for=""> Address :</label>
      <input type="text" name="address" class="form-control" placeholder="Insert Address">
    </div>
    <input class="btn btn-primary" type="submit" name="add" value="Add">
    <input class="btn btn-danger" type="submit" name="cancel" value="Cancel">
  </form>
    </div>

  </div>

  <?php
  session_start();
  if (isset($_POST['add'])) {
    include 'config.php';
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $majors = $_POST['majors'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    if ($student_id != '' && $name != '' && $majors != '' && $address != '') {
      $sql = "INSERT INTO college_student (student_id,name,majors,gender,address) VALUES ('$student_id','$name','$majors','$gender','$address')";
      if ($conn->query($sql) === false) { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
        // trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        trigger_error('The Student ID already exists');
        echo "<script>alert('The Student ID already exists!')</script>";
      } else { // Jika berhasil alihkan ke halaman tampil.php
        echo "<script>alert('Add Success!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
      }
    } else {
      echo "<script>alert('Please complete all information!')</script>";
    }
  }
  if(isset($_POST['cancel'])){
    echo "<meta http-equiv=refresh content=\"0; url=index.php\">";		
    }
  ?>
</div>
<?php include('includes/footer.php'); ?>
<?php }else{

header("Location: formlogin.php");

exit();

}

?>