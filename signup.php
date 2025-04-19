<?php include('./conn.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br>

    <div style="display: flex; justify-content: center;">
        <div class="div">
            <h1 style="text-align: center; font-size: 20px; font-weight: bold;">Sign Up</h1>
            <br>

            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="Enter a name" name="name" class="form-control">
                    </div>
                </div>
                <br>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" placeholder="Enter a email" name="email" class="form-control">
                    </div>
                </div>
                <br>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="pass" class="form-control">
                    </div>
                </div>
                <br>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">User Type</label>
                    <div class="col-sm-10">
                      <select name="type" class="form-control">
                        <option value="" selected disabled>Select User Type</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                      </select>
                    </div>
                </div>
                <br>

                <button type="submit" name="submit" class="btn btn-primary w-100">Sign Up</button>
            </form>

            <?php 
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $type = $_POST['type'];

                $hashPass = password_hash($pass, PASSWORD_DEFAULT);

                $signupSql = "INSERT INTO users(user_name, user_email, user_password, user_type) VALUES('$name','$email','$hashPass','$type')";

                if (mysqli_query($conn, $signupSql)) {
                    echo "<script>Swal.fire({
                    title:'Account Registered',
                    text:'Your account has been registered successfully',
                    icon:'success'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href='./index.php';
                    }
                    })</script>";
                }
            }
            ?>

            <hr>

            <a href="./index.php"><button class="btn btn-light w-100">Login</button></a>
        </div>
    </div>
</body>
</html>