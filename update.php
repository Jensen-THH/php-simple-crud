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
    <form method="post">
    <div class="form-group" ">
  <label for=" id"> Student ID : </label>
      <input  type="text" name="student_id" class="form-control" placeholder="Insert Student ID" value="<?= $b['student_id'] ?>">
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

    <input class="btn btn-primary" type="submit" name="update" value="Update">
    <input class="btn btn-danger" type="submit" name="cancel" value="Cancel">
  </form>
    </div>
   
  </div>

 
  <?php
  
  if (isset($_POST['update'])) {
    include 'config.php';
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $majors = $_POST['majors'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $sql = "UPDATE college_student SET student_id='$student_id',name='$name',majors='$majors',gender='$gender',address='$address' WHERE student_id='$_GET[student_id]'";
    if ($conn->query($sql) === false) {
      echo "<script>alert('primary key duplicate error!')</script>";
      // trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } else {
      echo "<script>alert('Update Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
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