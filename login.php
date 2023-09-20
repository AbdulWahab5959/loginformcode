<?php 
require_once('includes/db.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset ($_POST['login']))
{
    $email =$_POST['email'];
    $password =$_POST['password'];

if ( $email != '' || $password != '') {    
$sql = "SELECT * FROM `registeration` WHERE  email='$email' AND `password` ='$password' ";
$result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result))
       {
        $_SESSION ['login'] = true; 
        echo "<script>window.location.href='index.php'</script>";
      }
    } else {
               echo "<script>alert('incorrect credentials try again')</script>";
    }
}
else{
		echo "<script>alert('Fill up all fields !')</script>";

}
mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <title>Login Form</title>
    <!-- custom css -->
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 p-0 backgroundcolor " style="height: 100vh;">
                <div class="text-setting1 text-center text-md-left ">
                    <p class="h1">Write a thank-you note</p>
                    <p class="h2">to my interviewer</p>
                </div>
            </div>
            <div class="col-md-5 p-0 bg-black text-white" style="height: 100vh;">
                <div class="text-setting justify-content-center text-center ">
                    <h1>Login</h1>
                </div>
                <div class="justify-content-center align-content-center d-flex text-center text-md-left">
                    <form method="POST" action="">
                        <div class="input-group">
                            <input class="form-control" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="form-control my-1 " type="password" placeholder="password" name="password">
                        </div>
                        <div class="d-flex">
                            <button class="btn mt-1 w-100 btn-primary" name="login" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
