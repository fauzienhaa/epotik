<?php

session_start();

require 'function.php';

if (isset($_POST["login"])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username'");
    $result2 = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

    if (mysqli_num_rows($result)) {

        $rows = mysqli_fetch_assoc($result);

        if (password_verify($password, $rows["password"])) {

            $_SESSION["login"] = true;
            header("Location: Admin/index.php?id_admin=$rows[id_admin]");
            exit;
        }
    } else {

        if (mysqli_num_rows($result2)) {

            $rows = mysqli_fetch_assoc($result2);

            if (password_verify($password, $rows["password"])) {

                $_SESSION["login"] = true;
                header("Location: User/index.php?id=$rows[id]");
                exit;
            }
        }
    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Login</title>

    <style>
        body {
            background-color: corals;
            width: 20rem;
            margin-left: auto;
            margin-right: auto;
            font-family: Arial, Helvetica, sans-serif;
        }

        .checkbox{
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
        }
    </style>
</head>

<body class="text-center">
    
    <br>

    <div>
        <img style="width:50%; height:50%;" src="image/epotik2.png" class="img-fluid">
    </div>

    <br>

    <main class="form-signin">
        <form action="" method="POST">
            <div class="form-floating">
                <input type="text" class="form-control" name="username" id="username" placeholder="username" required autofocus>
                <label for="username">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <?php if (isset($error)) : ?>
                <p style="color:red; font-style:italic;">username atau password salah</p>
            <?php endif ?>

            <div class="checkbox">
                <label for="setcookie">
                    <input type="checkbox" name="setcookie" value="true" id="setcookie"> Remember me
                </label>
            </div>
            <div class="form" style="display: grid; grid-template-columns: 1fr 1fr; grid-gap: 10px;">
                <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Login</button>
                <a href="index.php" role="button" class="w-100 btn btn-lg btn-warning" style="color: white;" type="submit">Cancel</a>
            </div>
            <div class="checkbox">
            Don't have an account? <a href="registrasi.php" style="text-decoration: none;" class="link-danger">Register Now</a>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; E-Potik</p>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>