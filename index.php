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
            <h1 style="text-align: center; font-size: 20px; font-weight: bold;">Login</h1>
            <br>

            <form action="" method="POST">
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

                <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>
            </form>
            <hr>

            <?php 
            if (isset($_POST['submit'])) {
                $email = $_POST['email'];
                $pass = $_POST['pass'];

                $loginSql = "SELECT * FROM users WHERE user_email = '$email'";
                $loginResult = mysqli_query($conn, $loginSql);
                $loginRow = mysqli_fetch_assoc($loginResult);

                if (isset($loginRow['user_email']) && $loginRow['user_email'] === $email) {
                    if (password_verify($pass, $loginRow['user_password'])) {
                        if ($loginRow['user_type'] === 'admin') {
                            $_SESSION['user_name'] = $loginRow['user_name'];
                            $_SESSION['user_type'] = $loginRow['user_type'];

                            echo "<script>window.location.href='./admin.php';</script>";
                        } else if ($loginRow['user_type'] === 'user') {
                            $_SESSION['user_name'] = $loginRow['user_name'];
                            $_SESSION['user_type'] = $loginRow['user_type'];

                            echo "<script>window.location.href='./user.php';</script>";
                        }
                    }

                    else {
                        echo "<script>Swal.fire({
                        title:'Invalid Password',
                        text:'Your password is invalid please try again',
                        icon:'error'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href='./index.php';
                        }
                        })</script>";
                    }
                }

                else {
                    echo "<script>Swal.fire({
                    title:'Email Not Registered',
                    text:'Your email is not registered please try again',
                    icon:'error'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href='./index.php';
                    }
                    })</script>";
                }
            }
            ?>

            <a href="./signup.php"><button class="btn btn-light w-100">Sign Up</button></a>
        </div>
    </div>
</body>
</html>