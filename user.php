<?php include('./conn.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $_SESSION['user_name'];?></p>
    <p><?php echo $_SESSION['user_type'];?></p>
    <a href="./index.php"><button>back</button></a>
</body>
</html>