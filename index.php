<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<?php include('./includes/header.php'); ?>


<div class="container mt-5" style="width:auto;">
<div class="card shadow p-3 mb-5 bg-white " style="border-radius: 25px;">
   <div class="card-header shadow p-3 mb-3    bg-white " style="font-size: 25px;border-radius:25px">
     INFOMATION STUDENT
<a name="" id="" class="btn btn-dark" style="border-radius: 25px;float: right; font-weight: bold;" href="add.php" role="button">Add</a>

   </div>
   <div class="card-body table-responsive">
   <table  class="table table-borderless table-hover" style="font-size: 18px;" >
 <tbody>
    <tr style="text-transform: uppercase;" class="shadow-sm p-3 mb-5 bg-white" >
       <th>Student ID</th>
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
    <tr class="">
       <td><?= $b['student_id']; ?></td>
       <td><?= $b['name']; ?></td>
       <td><?= $b['majors']; ?></td>
       <td><?= $b['gender']; ?></td>
       <td><?= $b['address']; ?></td>
       <td>
            <a href="update.php?student_id=<?= $b['student_id']; ?>"><b><i>Edit</i></b></a> | 
            <a href="index.php?student_id=<?= $b['student_id']; ?>" onclick="return confirm('Are you sure?')"><b><i>Delete</i></b></a>
        </td>
    </tr>  
    <?php } ?>                          
 </tbody>
</table>
   </div>
</div>



<?php
if(isset($_GET['student_id']))
{
    $student_id=$_GET['student_id'];
    $sql="DELETE FROM college_student WHERE student_id='$student_id'";
    if($conn->query($sql) === false)
    { // Jika gagal meng-insert data tampilkan pesan dibawah 'Perintah SQL Salah'
      trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
    } 
    else 
    { // Jika berhasil alihkan ke halaman tampil.php
      // echo "<script>alert('Delete Success!')</script>";
      // echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
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