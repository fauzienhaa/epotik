<?php

require 'function.php';

if (isset($_POST["registrasi"])) {

    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('Registrasi berhasil');
            document.location.href = 'login.php';
        </script>
        ";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Registrasi</title>

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
    <main class="form-signin">
        <form action="" method="post">
            <h1 class="h3 mb- fw-normal">Registrasi</h1>
    <br>
            <div class="form-floating">
                <input type="text" name="nama" class="form-control" id="nama" placeholder="nama" required autofocus>
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating">
                <input type="text" name="username" class="form-control" id="username" placeholder="username" required autofocus>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password2" class="form-control" id="password2" placeholder="password" required>
                <label for="floatingPassword">Re-type Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" name="registrasi" type="submit">Register</button>
            <div class="checkbox">
            Already have an account? <a href="login.php" style="text-decoration: none;" class="link-primary">Login!</a>
            </div>
            <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
        </form>
    </main>
</body>

</html>