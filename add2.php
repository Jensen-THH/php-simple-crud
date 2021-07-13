<?php
    $location = './test/';
    $image = $_FILES["upww"]['name'];
    // $path = $_FILES['up']['tmp_name'];
    if (isset($_POST['add'])) {
      include 'config.php';
      $student_id = $_POST['student_id'];
      $name = $_POST['name'];
      $majors = $_POST['majors'];
      $gender = $_POST['gender'];
      $address = $_POST['address'];

       //new random name        
       $temp = explode(".", $_FILES["upww"]["name"]);
       $newfilename = round(microtime(true)) . '.' . end($temp);
       $image2 = $location . $newfilename;
    //   $image2 = $location.$image;  
      //

      if ($student_id != '' && $name != '' && $majors != '' && $address != '' && $image != '') {
        $sql = "INSERT INTO college_student (student_id,img,name,majors,gender,address) VALUES ('$student_id','$image2','$name','$majors','$gender','$address')";
        if ($conn->query($sql) === false) {
          // trigger_error('Wrong SQL Command: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
          trigger_error('The Student ID already exists');
          echo "<script>alert('The Student ID already exists!')</script>";
          echo "<meta http-equiv=refresh content=\"0; url=add.php\">";
        } else {
         move_uploaded_file($_FILES['upww']['tmp_name'], $image2);
          echo "<script>alert('Add Success!')</script>";
          echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
        }
      } else {
        echo "<script>alert('Please complete all information!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=add.php\">";
      }
    }
 

    if (isset($_POST['cancel'])) {
      echo "<meta http-equiv=refresh content=\"0; url=index.php\">";
    }
    ?>