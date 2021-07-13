<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<?php include('./includes/header.php'); ?>


<div class="container mt-5" style="width:auto;">
<div class="card shadow p-3 mb-5 bg-white " style="border-radius: 25px;">
   <div class="card-header shadow p-3 mb-3    bg-white " style="font-size: 25px;border-radius:25px">
     INFOMATION STUDENT
<a name="" id="" class="btn btn-dark" style="border-radius: 25px;float: right; font-weight: bold;" href="add.php" role="button"><i style="color:white" class="fas fa-user-plus"></i></a>

   </div>
   <div class="card-body table-responsive">
   <table  class="table table-borderless table-hover" style="font-size: 18px;" >
 <tbody>
    <tr style="text-transform: uppercase; text-align: center;" class="shadow-sm p-3 mb-5 bg-white" >
       <th>Student ID</th>
       <th>Image</th>
       <th>Name</th>
       <th>Majors</th>
       <th>Gender</th>
       <th>Address</th>
       <th>Action</th>
    </tr>
   
   
    <?php
    include 'config.php';
    $a=mysqli_query($conn,"SELECT * FROM college_student");

    foreach ($a as $b)
    {
    ?>
    <tr class="" style="text-align: center;">
       <td style="padding-top: 45px; font-weight: 510;"><?= $b['student_id']; ?></td>
       <td> <img class="shadow  bg-white" style=" width: 90px;height: 110px; border-radius: 15%;" src='<?= $b['img']; ?>'> </td>
       <td style="padding-top: 45px"><?= $b['name']; ?></td>
       <td style="padding-top: 45px"><?= $b['majors']; ?></td>
       <td style="padding-top: 45px"><?= $b['gender']; ?></td>
       <td style="padding-top: 45px"><?= $b['address']; ?></td>
       <td style="padding-top: 45px">
            <a href="update.php?student_id=<?= $b['student_id']; ?>"><b><i style="font-size:22px;" class="far fa-edit"></i></b></a> | 
            <a href="index.php?student_id=<?= $b['student_id']; ?>" onclick="return confirm('Are you sure?')"><b><i style="font-size:22px;color:red" class="far fa-trash-alt"></i></b></a>
        </td>
    </tr>  
    <?php } ?>                          
 </tbody>
</table>
   </div>
</div>



<?php
include 'config.php';
if(isset($_GET['student_id']))
{
    $student_id=$_GET['student_id'];
    $result = mysqli_query($conn,"SELECT img from college_student WHERE student_id='$student_id'");
    $sql="DELETE FROM college_student WHERE student_id='$student_id'";
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
         unlink($row["img"]);
      }
    }
    if($conn->query($sql) === false)
    { 
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } 
    else 
    { 
      echo "<script>alert('Delete Success!')</script>";
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
}

?>

</div>
<?php include('./includes/footer.php'); ?>

<?php }else{

header("Location: formlogin.php");

exit();

}

?>