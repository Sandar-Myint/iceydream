<?php
include '../components/connect.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);

    $pass = $_POST['pass'];
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $hashed_pass = sha1($pass);

    //prepare the sql statement to check matching credentials
    $select_seller = $conn->prepare("SELECT * FROM `sellers` WHERE email = ? AND password=?");
    $select_seller->execute([$email, $hashed_pass]);

    $row = $select_seller->fetch(PDO::FETCH_ASSOC);

  if ($select_seller->rowCount() > 0){
        setcookie('seller_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('Location: dashboard.php');
        exit();
    }else {
        $warning_msg[] = 'Incorrect email or password';
    }

}

?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ice Cream delights - Seller Login Page</title>

    <link rel="stylesheet" type="text/css" href="../css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>
<body>

    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data" class="register">
            <h2>Login Now</h2>
                    
                    <div class="input-field">
                        <p>Your Email <span>*</span></p>
                        <input type="text" name="email" placeholder="Enter Your email" maxlength="50" required class="box">
                    </div>

                    <div class="input-field">
                        <p>Your Password <span>*</span></p>
                        <input type="password" name="pass" placeholder="Enter Your password" maxlength="50" required class="box">
                    </div>
           

              <p class="link">Do not have an account? <a href="register.php">Register Now</a> </p>

            <button type="submit" name="submit" class="btn">Login Now</button>

                      
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <?php include '../components/alert.php'; ?>
    
</body>
</html>


