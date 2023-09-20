<?php
require_once('includes/db.php');
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['cpassword'];

    if ($name != '' || $email != '' || $password != '' || $repassword != '') {
        if ($password == $repassword) {
            $sql = "SELECT * FROM `users` WHERE email='{$email}'";

			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				echo "<script>alert('Username already exists')</script>";

			} else{
                $sql = "INSERT INTO `registeration`(`name`, `email`, `password`) VALUES 
            ('$name','$email','$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location.href='login.php'</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
                } 
                else {
            echo "<script>alert('Please Enter the Same Password!')</script>";
            echo "<script>window.location.href='register.php'</script>";
        }
    }
 else {
        echo "<script>alert('Please Enter Fields First!')</script>";
}
$conn->close();
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
    <title>Register Form</title>
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
                <div class="text-setting justify-content-center text-center text-md-left ">
                    <h1>Register</h1>
                </div>
                <div class="justify-content-center align-content-center d-flex text-center text-md-left">
                    <form method="POST">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Username" name="name">
                        </div>
                        <div class="input-group">
                            <input class="form-control my-1" type="email" placeholder="Email" name="email">
                        </div>
                        <div class="input-group">
                            <input class="form-control my-1 " type="password" placeholder="Password" name="password">
                        </div>
                        <div class="input-group">
                            <input class="form-control my-1 " type="password" placeholder="Confirm Password" name="cpassword">
                        </div>
                        <div class="d-flex">
                            <button class="btn mt-1 w-100 btn-primary" name="register" type="submit">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
