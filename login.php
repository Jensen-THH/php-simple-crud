<?php 

session_start(); 

include "config.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);

    $pass = validate($_POST['password']);

    if (empty($uname)) {

        // header("Location: index.php?error=User Name is required");
        echo "<script>alert('Please complete user name information!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=formlogin.php\">";
        exit();

    }else if(empty($pass)){

        // header("Location: index.php?error=Password is required");
        echo "<script>alert('Please complete password information!')</script>";
        echo "<meta http-equiv=refresh content=\"0; url=formlogin.php\">";
        exit();

    }else{

        $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_name'] === $uname && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['name'] = $row['name'];
                $_SESSION['name'] = $uname;

                $_SESSION['id'] = $row['id'];
            
                header("Location: index.php");

                exit();

            }else{

                // header("Location: index.php?error=Incorect User name or password");
                echo "<script>alert('Incorect User name or password!')</script>";
                echo "<meta http-equiv=refresh content=\"0; url=formlogin.php\">";
                exit();

            }

        }else{

            // header("Location: index.php?error=Incorect User name or password");
            echo "<script>alert('Incorect User name or password!')</script>";
            echo "<meta http-equiv=refresh content=\"0; url=formlogin.php\">";
            exit();

        }

    }

}else{

    header("Location: formlogin.php");

    exit();

}